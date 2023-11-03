<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.pages.login');
    }
    public function login(Request $request)
    {
        //dd($request);
        $credentials = $request->only('email', 'password');
        dd($credentials);
        
        if (Auth::guard('admin')->attempt($credentials)) {
            // Authentication successful
            return redirect()->intended('/admin/dashboard');
        } else {
            dd($request);
            //return redirect()->back()->with('error', 'Invalid credentials');
        }
    }
    
    public function index()
    {

    return redirect()->route('admin.dashboard');
    }
    public function dashboard()
    {
        $page_title = 'Dashboard';
        $tab_title = 'Dashboard';
        return view('admin.pages.dashboard', ['page_title' => $page_title, 'tab_title' => $tab_title]);
    }
    public function sales()
    {
        return view('admin.pages.sales');
    }

}
