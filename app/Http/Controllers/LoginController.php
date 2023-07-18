<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthenticateUserRequest;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function welcome(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view("index", [
            'title' => "Elysium",
        ]);
    }
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

    public function authenticate(AuthenticateUserRequest $request): RedirectResponse
    {
        $credentials = $request->validated();

        $pass = DB::table('users')->where('email', $credentials['email'])->get('password');
        if (!$pass->isEmpty()) {
            $hashed = $pass[0]->password;

            $user = User::where('email', $credentials['email'])->first();
            if ($user) {
                if (Hash::check($credengitials['password'], $hashed)) {
                    Auth::login($user);
                    $request->session()->regenerate();
                    return redirect()->route('welcome');
                }
            }
        }

        return redirect()->route('login')->withErrors([
            'email' => 'The provided credentials do not match our records.',
            'password' => 'Wrong password'
        ])->onlyInput('email');
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        $credentials = $request->validated();
        User::create($credentials);

        return redirect()->route('login');
    }

    public function forget_password(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('auth.forget_password', [
            'title' => 'Forget Password'
        ]);
    }
}
