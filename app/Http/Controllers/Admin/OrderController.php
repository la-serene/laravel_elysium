<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

use Illuminate\Http\Response; // Import the Response class
class OrderController extends Controller
{
    public function index(Request $request)
    {
        $state = $request->query('state');

        // Retrieve orders based on the state parameter
        if ($state === 'pending') {
            // Retrieve pending orders
            $orders = Order::where('state', 'pending')->get();
        } else {
            $orders = Order::all();
        }
        

        return new Response(view('admin.orders.index', compact('orders')));
    }
    public function show($id)
    {
        // Retrieve the product from the database based on the ID
        $order = Order::find($id);

        // Check if the product exists
        if (!$order) {
            // Handle the case when the product does not exist
            abort(404);
        }

        // Pass the product data to the view
        return view('admin.orders.show', ['order' => $order]);
    }
    
}
