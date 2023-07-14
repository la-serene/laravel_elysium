<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Http\Response; // Import the Response class
class UserController extends Controller
{
    public function index(Request $request)
    {
        $state = $request->query('state');

        // Retrieve orders based on the state parameter
        if ($state === 'new') {
            // Retrieve pending orders
            $orders = User::where('state', 'pending')->get();
        } else {
            $orders = User::all();
        }
        

        return new Response(view('admin.users.index', compact('users')));
    }
    public function show($id)
    {
        // Retrieve the product from the database based on the ID
        $user = User::find($id);

        // Check if the product exists
        if (!$user) {
            // Handle the case when the product does not exist
            abort(404);
        }

        // Pass the product data to the view
        return view('admin.orders.show', ['order' => $user]);
    }
    
}