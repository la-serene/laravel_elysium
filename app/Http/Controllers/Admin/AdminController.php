<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
    return redirect()->route('admin.dashboard');
    }
    public function dashboard()
    {
        return view('admin.pages.dashboard');
    }
    public function sales()
    {
        return view('admin.pages.sales');
    }
    public function login()
    {
        return view('admin.pages.login');
    }
    
}
