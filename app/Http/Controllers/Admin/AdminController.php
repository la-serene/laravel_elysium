<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showLoginForm(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('admin.pages.login');
    }

    public function loginPost(Request $request): \Illuminate\Foundation\Application|Redirector|RedirectResponse|Application
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('admin.dashboard');
        }

        return redirect("admin.login");
    }

    public function index(): RedirectResponse
    {

        return redirect()->route('admin.dashboard');
    }

    public function dashboard(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $page_title = 'Dashboard';
        $tab_title = 'Dashboard';
        return view('admin.pages.dashboard', ['page_title' => $page_title, 'tab_title' => $tab_title]);
    }

    public function sales(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('admin.pages.sales');
    }

}
