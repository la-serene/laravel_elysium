<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAuthenticateRequest;
use App\Http\Requests\UserStoreRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function login(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('auth.login', [
            'title' => "Login",
        ]);
    }

    public function register(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('auth.register', [
            'title' => "Register",
        ]);
    }

    public function welcome()
    {
        return view('welcome');
    }

    public function authenticate(UserAuthenticateRequest $request): RedirectResponse
    {
        $credentials = $request->validated();
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('welcome');
        }

        return back()->onlyInput('email');
    }

    public function store(UserStoreRequest $request): RedirectResponse
    {
        $credentials = $request->validated();
        $user = User::create($credentials);

        return redirect()->route('login');
    }
}
