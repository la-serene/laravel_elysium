<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\ProductOption;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\CreateProductRequest;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $page_title = 'Products';
        $tab_title = 'All products';

        return new Response(view('admin.products.index', ['products' => $products, 'page_title' => $page_title, 'tab_title' => $tab_title]));
    }
    
    public function show($id)
    {
        
        $product = Product::find($id);
        $page_title = $product->title;
        $tab_title = $product->title;


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
        return view('admin.products.show', ['product' => $product, 'order_details' => $order_details, 'users' => $users, 'averageRating' => $averageRating,'page_title' => $page_title, 'tab_title' => $tab_title]);
    }
    
    public function create()
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

    public function createPost(Request $request)
    {

        dd($request);
        $productData = [
            'title' => request('productTitle'),
            'category_id' => request('category_id'),
            'subcategory_id1' => request('subcategory_id1'),
            'subcategory_id2' => request('subcategory_id2'),
            'price' => request('product_price'),
            'discount' => request('product_discount'),
            'description' => request('productDescription'),
        ];
    
        $product = Product::create($productData);
    
        $productOptionsData = [];
        $colors = request('product_colors');
        $sizes = request('product_sizes');

        dd($request->file('images'));

        
        if ($request->hasFile('images')) {
            $imagePaths = [];
    
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('img'), $imageName);
                $imagePaths[] = $imageName;
            }
    
            $productData['images'] = $imagePaths;
            $product->update($productData);
        }
        
        // Tạo các tùy chọn sản phẩm với mỗi màu sắc và kích cỡ
        foreach ($colors as $color) {
            foreach ($sizes as $size) {
                $stock = request('stock')[$color][$size] ; // Lấy giá trị stock từ request

    
                $productOptionsData = [
                    'product_id' => $product->id,
                    'stock' => $stock, // Số lượng hàng tồn kho
                    'sales' => 0, // Số lượng hàng đã bán ban đầu
                    'color_id' => $color,
                    'size_id' => $size,
                ];
    
                ProductOption::create($productOptionsData);
            }
        }
    
        return redirect()->back();
    }
    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->orderDetails()->delete();
        $product->productOptions()->delete();
        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully.');
    }
    public function edit($id)
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

        // Pass the product data to the view
        return view('admin.products.edit', [
            'product' =>   $product,   
            'categories' => $categories,
            'subcategory1s' => $subcategory1s,
            'subcategory2s' => $subcategory2s,
            'product_options ' => $product_options,
            'colors' => $colors,
            'sizes' => $sizes,  

        ]);
    }
    public function update($id)
    {
        $product = Product::find($id);

        if (!$product) {
            // Handle the case when the product does not exist
            abort(404);
        }

        // Pass the product data to the view
        return view('admin.products.edit', ['product' => $product]);
    }
    public function deleteSelected(Request $request)
    {
        $selectedProductIds = $request->input('selected_products');

        // Delete the selected products using the provided IDs
        Product::whereIn('id', $selectedProductIds)->delete();

        return response()->json(['message' => 'Selected products deleted successfully.']);
    }

    

    
}


