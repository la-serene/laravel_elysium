<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/index', function () {
    return view('index');
});

Route::controller(LoginController::class)
    ->group(function () {
       Route::get('/login', 'login')->name('login');
       Route::get('/register', 'register')->name('register');
        Route::post('/authenticate', 'authenticate')->name('authenticate');
        Route::post('/store', 'store')->name('store');
        Route::get('/', 'welcome')->name('welcome');
    });

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
