<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Session;

use App\Models\User;


class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.pages.login');
    }
    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('admin.dashboard')
                        ->withSuccess('Signed in');
        }
   
        return redirect("admin.login")->withSuccess('Login details are not valid');
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
