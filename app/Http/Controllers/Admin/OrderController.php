<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\District;
use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Response; // Import the Response class
class OrderController extends Controller
{
    public function index(Request $request)
    {
        $state = $request->query('state');

        $page_title = 'Orders';
        $tab_title = 'All orders';
        // Retrieve orders based on the state parameter
        if ($state) {
            // Retrieve pending orders
            $orders = Order::where('state', $state)->get();
            $tab_title = $state .  ' orders';
            $page_title = $state .   ' orders';
        } else {
            $orders = Order::all();
        }
    

        return new Response(view('admin.orders.index', ['orders' => $orders, 'page_title' => $page_title, 'tab_title' => $tab_title]));
    }
    public function show($id)
    {
        // Retrieve the product from the database based on the ID
        $order = Order::find($id);
        $tab_title = 'Order ' .  $order->id;
        $page_title = 'Order ' .  $order->id;

        // Check if the product exists
        if (!$order) {
            // Handle the case when the product does not exist
            abort(404);
        }

        // Pass the product data to the view
        return view('admin.orders.show', ['order' => $order, 'tab_title' => $tab_title, 'page_title' => $page_title]);
    }
    public function updateState(Request $request, Order $order)
    {
        $validatedData = $request->validate([
            'state' => 'required|in:pending,confirmed,shipping,success,canceled',
        ]);
    
        $order->state = $request->input('state');
        $order->updated_at = Carbon::now();
        $order->save();
    
        Session::flash('success', 'Order state updated successfully.');
    
        return redirect()->route('admin.orders.show', $order->id);
    }
    public function create(){
        $tab_title = 'Create new order';
        $page_title = 'Create new order';
        $cities = City::all();
        $districts = District::all();
        return view('admin.orders.create', ['tab_title' => $tab_title, 'page_title' => $page_title ,'cities' => $cities,
        'districts' => $districts,]);
    }


}
