<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
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

Route::controller(LoginController::class)
    ->prefix('/password')
    ->name('password.')
    ->group(function () {
        Route::get('/forget', 'forget_password')->name('forget');
    });

Route::controller(UserController::class)
    ->prefix('/user')
    ->name('user.')
    ->group(function () {
        Route::get('/logout', 'logout')->name('logout');
    });

Route::controller(ProductController::class)
    ->prefix('/product')
    ->name('product.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'show')->name('show');
    });

Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->group(function () {


    // Admin Dashboard
    Route::get('/', 'AdminController@index')->name('admin.home');
    Route::get('dashboard', 'AdminController@dashboard')->name('admin.dashboard');
    Route::get('sales', 'AdminController@sales')->name('admin.sales');

    // Manage Products
    Route::get('products', 'ProductController@index')->name('admin.products.index');
    Route::get('products/create', 'ProductController@create')->name('admin.products.create');
    Route::post('products/create', 'ProductController@createPost')->name('admin.products.createPost');
    Route::delete('products/{id}', 'ProductController@delete')->name('admin.products.delete');
    Route::get('products/{id}/edit', 'ProductController@edit')->name('admin.products.edit');
    Route::put('products/{id}', 'ProductController@update')->name('admin.products.update');
    Route::get('products/{id}', 'ProductController@show')->name('admin.products.show');
    Route::post('/admin/products/delete-selected',
        'ProductController@deleteSelected')->name('admin.products.deleteSelected');


    // Manage Orders
    Route::get('orders', 'OrderController@index')->name('admin.orders.index');
    //Route::get('orders/create', 'OrderController@create')->name('admin.orders.create');
    //Route::post('orders/create', 'OrderController@creatPost')->name('admin.orders.createPost');
    Route::get('orders/{id}', 'OrderController@show')->name('admin.orders.show');

    Route::put('/orders/{order}/update-state', 'OrderController@updateState')->name('admin.orders.updateState');


    // Manage Users
    Route::get('users', 'UserController@index')->name('admin.users.index');
    Route::get('users/create', 'UserController@create')->name('admin.users.create');
    Route::post('users/create', 'UserController@createPost')->name('admin.users.createPost');
    Route::delete('users/{id}', 'UserController@delete')->name('admin.users.delete');
    Route::put('users/{id}/edit', 'UserController@edit')->name('admin.users.edit');
    Route::put('users/{id}', 'UserController@update')->name('admin.users.update');
    Route::get('users/{id}', 'UserController@show')->name('admin.users.show');
});
