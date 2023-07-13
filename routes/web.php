<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
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

Route::controller(LoginController::class)
    ->group(function () {
        Route::get('/', 'welcome')->name('welcome');
        Route::get('/login', 'login')->name('login');
        Route::get('/register', 'register')->name('register');
        Route::post('/authenticate', 'authenticate')->name('authenticate');
        Route::post('/store', 'store')->name('store');
        Route::get('/', 'welcome')->name('welcome');
    });

Route::controller(UserController::class)
    ->prefix('/user')
    ->name('user.')
    ->group(function () {
        Route::get('/logout', 'logout')->name('logout');
    });

Route::controller(\App\Http\Controllers\ProductController::class)
    ->prefix('/product')
    ->name('product.')
    ->group(function () {
       Route::get('/', 'index')->name('index');
    });
