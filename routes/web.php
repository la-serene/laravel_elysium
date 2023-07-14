<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\HandleAjaxController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::fallback(function () {
    return view('fallback');
});


Route::prefix('/ajax')
->controller(HandleAjaxController::class)
->name('ajax')
->group(function() {
    Route::get('/category', 'receiveCategory')->name('category');
});



Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->group(function () {
    // Admin Dashboard
    Route::get('/',  'AdminController@index')->name('home');
    Route::get('dashboard', 'AdminController@dashboard')->name('admin.dashboard');
    Route::get('sales', 'AdminController@sales')->name('admin.sales');
    // Admin Login
    Route::get('login', 'AdminController@login')->name('admin.login');
    Route::post('login', 'AdminController@login_post')->name('admin.login.post');
    
    
    
    // Manage Products
    Route::get('products', 'ProductController@index')->name('admin.products.index');
    Route::get('products/create', 'ProductController@create')->name('admin.products.create');
    Route::post('products/create', 'ProductController@createPost')->name('admin.products.createPost');
    Route::delete('products/{id}', 'ProductController@delete')->name('admin.products.delete');
    Route::get('products/{id}/edit', 'ProductController@edit')->name('admin.products.edit');
    Route::put('products/{id}', 'ProductController@update')->name('admin.products.update');
    Route::get('products/{id}', 'ProductController@show')->name('admin.products.show');
    

    // Manage Categories
    Route::get('categories', 'ProductController@categoriesIndex')->name('admin.products.categories');


    // Manage Orders
    Route::get('orders', 'OrderController@index')->name('admin.orders.index');
    Route::get('orders/{id}', 'OrderController@show')->name('admin.orders.show');
    Route::get('orders/create', 'OrderController@create')->name('admin.orders.create');

    // Manage Users
    Route::get('users', 'UserController@index')->name('admin.users.index');
    Route::get('users/{id}', 'UserController@show')->name('admin.users.show');
    Route::get('users/create', 'UserController@create')->name('admin.users.create');
});
