<?php


use Illuminate\Support\Facades\Route;






use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;



Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});



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
Route::controller(LoginController::class)
    ->prefix('/password')
    ->name('password.')
    ->group(function () {
       Route::post('/forget', 'forget_password')->name('forget');
    });

Route::controller(UserController::class)
    ->prefix('/user')
    ->name('user.')
    ->group(function () {
        Route::get('/logout', 'logout')->name('logout');
    });




    


Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->group(function () {
    

    // Admin Dashboard
    Route::get('/',  'AdminController@index')->name('admin.home');
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
    Route::post('/admin/products/delete-selected', 'ProductController@deleteSelected')->name('admin.products.deleteSelected');



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
Route::fallback(function () {
    return view('fallback');
});
