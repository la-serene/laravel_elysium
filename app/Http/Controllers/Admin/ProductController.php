<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\ProductOption;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Product;
use App\Models\OrderDetail;
use App\Models\Category;
use App\Models\Subcategory1;
use App\Models\Subcategory2;
use App\Models\Color;
use App\Models\Size;
use Illuminate\Http\Response; // Import the Response class

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     *
     * @return Response
     */
    public function index(): Response
    {
        $products = Product::all();
        $page_title = 'Products';
        $tab_title = 'All products';

        return new Response(view('admin.products.index', ['products' => $products, 'page_title' => $page_title, 'tab_title' => $tab_title]));
    }

    public function show($id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {

        $product = Product::find($id);
        $page_title = $product->title;
        $tab_title = $product->title;
        $product_options = ProductOption::where('product_id', $id)->get();

        // Check if the product exists
        if (!$product) {
            // Handle the case when the product does not exist
            abort(404);
        }
        if(!$product->orderDetails()){
            $averageRating = $product->orderDetails()->avg('rating');
            $order_details = OrderDetail::where('product_id', $id)->first();
            $order_ids = OrderDetail::where('product_id', $id)->first('order_id');
            $user_ids = Order::where('id', $order_ids)->first('user_id');
            $users = User::find($user_ids);
        }
        else{
            $averageRating = null;
            $order_details =null;
            $order_ids = null;
            $user_ids = null;
            $users = null;
        }
        // Pass the product data to the view
        return view('admin.products.show', ['product' => $product,'product_options' => $product_options, 'order_details' => $order_details, 'users' => $users, 'averageRating' => $averageRating,'page_title' => $page_title, 'tab_title' => $tab_title]);
    }

    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $categories = Category::all();
        $subcategory1s = Subcategory1::all();
        $subcategory2s = Subcategory2::all();
        $colors = Color::all();
        $sizes = Size::all();

        $page_title = 'Create new product';
        $tab_title = 'Create new product';

        return view('admin.products.create', [
            'categories' => $categories,
            'subcategory1s' => $subcategory1s,
            'subcategory2s' => $subcategory2s,
            'colors' => $colors,
            'sizes' => $sizes,
            'page_title' => $page_title,
            'tab_title' => $tab_title
        ]);
    }

    public function createPost(Request $request): RedirectResponse
    {

        // Validate the request data
        $request->validate([
            // Add validation rules for other fields if necessary
            'product_colors' => 'required|array',
            'product_sizes' => 'required|array',
            'product_colors.*' => 'exists:colors,id',
            'product_sizes.*' => 'exists:sizes,id',
            'stock' => 'required|array',
            'stock.*.*' => 'integer|min:0',
            'mainImg' => 'required',
            'mainImg.*.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'image' => 'required|array',
            'image.*.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $mainImage = $request->file('mainImg');
        $mainImagePath = null;
        if ($mainImage) {
            $fomartedMainImageName = request('productTitle');
            $fomartedMainImageName = strtolower($fomartedMainImageName); // Chuyển đổi thành chữ thường
            $fomartedMainImageName = preg_replace('/[^a-z0-9]+/', '-', $fomartedMainImageName); // Loại bỏ các ký tự không phải chữ cái và số, thay thế bằng dấu gạch ngang
            $fomartedMainImageName = trim($fomartedMainImageName, '-'); // Loại bỏ dấu gạch ngang từ đầu và cuối chuỗi

            $mainImageName = $fomartedMainImageName . '_'.'main'.'.' . $mainImage->getClientOriginalExtension();
            $mainImage->move(public_path('img'), $mainImageName);
            $mainImagePath = 'img/' . $mainImageName;
        }
        // Create the product
        $productData = [
            'title' => request('productTitle'),
            'category_id' => request('category_id'),
            'subcategory_id1' => request('subcategory_id1'),
            'subcategory_id2' => request('subcategory_id2'),
            'price' => request('product_price'),
            'discount' => request('product_discount'),
            'description' => request('productDescription'),
            'image' => $mainImagePath,
            'created_at' => Carbon::now(),
        ];


        $product = Product::create($productData);

        // Create the product options
        $productOptionsData = [];
        $colors = request('product_colors');
        $sizes = request('product_sizes');

        foreach ($colors as $color) {
            foreach ($sizes as $size) {
                $stock = request('stock')[$color][$size];
                $image = $request->file('image')[$color][$size];

                // Upload the image
                $imagePath = null;
                if ($image) {
                    $fomartedName = request('productTitle');
                    $fomartedName = strtolower($fomartedName); // Chuyển đổi thành chữ thường
                    $fomartedName = preg_replace('/[^a-z0-9]+/', '-', $fomartedName); // Loại bỏ các ký tự không phải chữ cái và số, thay thế bằng dấu gạch ngang
                    $fomartedName = trim($fomartedName, '-'); // Loại bỏ dấu gạch ngang từ đầu và cuối chuỗi

                    $imageName = $fomartedName . '_' . $color . '_' . $size . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('img'), $imageName);
                    $imagePath = 'img/' . $imageName;
                }

                $productOptionsData[] = [
                    'product_id' => $product->id,
                    'stock' => $stock,
                    'sales' => 0,
                    'color_id' => $color,
                    'size_id' => $size,
                    'image' => $imagePath,
                    'created_at' => Carbon::now(),
                ];
            }
        }

        // Insert the product options in bulk
        ProductOption::insert($productOptionsData);

        return redirect()->back();
    }

    public function delete($id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        $product->orderDetails()->delete();
        $product->productOptions()->delete();
        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully.');
    }

    public function edit($id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $product = Product::find($id);
        $product_options = ProductOption::where('product_id', $id)->get();

        if (!$product) {
            // Handle the case when the product does not exist
            abort(404);
        }
        $categories = Category::all();
        $subcategory1s = Subcategory1::all();
        $subcategory2s = Subcategory2::all();
        $colors = Color::all();
        $sizes = Size::all();
        $page_title = 'Edit ' . $product->title;
        $tab_title = 'Edit ' . $product->title;

        // Pass the product data to the view
        return view('admin.products.edit', [
            'product' =>   $product,
            'categories' => $categories,
            'subcategory1s' => $subcategory1s,
            'subcategory2s' => $subcategory2s,
            'product_options ' => $product_options,
            'colors' => $colors,
            'sizes' => $sizes,
            'page_title' => $page_title,
            'tab_title' => $tab_title,

        ]);
    }
    public function update($id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $product = Product::find($id);

        if (!$product) {
            // Handle the case when the product does not exist
            abort(404);
        }

        // Pass the product data to the view
        return view('admin.products.edit', ['product' => $product]);
    }
    public function deleteSelected(Request $request): JsonResponse
    {
        $selectedProductIds = $request->input('selected_products');

        // Delete the selected products using the provided IDs
        Product::whereIn('id', $selectedProductIds)->delete();

        return response()->json(['message' => 'Selected products deleted successfully.']);
    }




}
