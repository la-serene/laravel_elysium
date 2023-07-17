<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HandleAjaxController extends Controller
{
    public function receiveCategory(Request $request)
    {
        $category_id = $request->input('category_id');
  
        // Assign the value to a specific variable
        $specificVariable = $category_id;

        // Return a response if needed
        return response()->json(['message' => 'Data received successfully']);
    }
}
