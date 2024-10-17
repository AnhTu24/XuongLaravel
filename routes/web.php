<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [ProductController::class, 'index'])->name('client.index');
Route::get('shop', [ProductController::class, 'shop'])->name('client.shop');
Route::get('about-us', [ProductController::class, 'aboutus'])->name('client.about-us');
Route::get('detail/{id}', [ProductController::class, 'detail'])->name('client.detail');
Route::get('/detail/{id}/info', [ProductController::class, 'getAdditionalInfo']);
Route::get('/detail/{id}/comments', [ProductController::class, 'getComments']);

Route::get('user', [UserController::class, 'index'])->name('client.user');
Route::get('/user/edit', [UserController::class, 'edit'])->name('user.edit');
Route::post('/user/edit', [UserController::class, 'edit'])->name('user.edit');
Route::get('/user/change-password', [UserController::class, 'showChangePasswordForm'])->name('user.change_password.form');
Route::post('/user/change-password', [UserController::class, 'changePassword'])->name('user.change_password');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

// Cart
Route::post('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('addToCart');
Route::get('/cart', [CartController::class, 'showCart'])->name('showCart');
Route::post('/cart/update/{id}', [CartController::class, 'updateCart'])->name('updateCart');
Route::post('/cart/remove/{id}', [CartController::class, 'removeCart'])->name('removeFromCart');

Route::get('/check-out', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'processCheckout'])->name('processCheckout');







// Routes for Admin
Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('products/{product}/comments', [CommentController::class, 'index'])
    ->name('products.comments.index');
    Route::resource('comments', CommentController::class);

    Route::resource('users', UserController::class);
    Route::delete('users/{users}/forceDestroy', [AdminCategoryController::class, 'forceDestroy'])
    ->name('users.forceDestroy');
    Route::post('users/{user}/restore', [UserController::class, 'restore'])
    ->name('users.restore');

    Route::resource('products', AdminProductController::class);
    Route::delete('products/{product}/forceDestroy', [AdminProductController::class, 'forceDestroy'])
        ->name('products.forceDestroy');
        Route::patch('products/restore/{id}', [AdminProductController::class, 'restore'])
        ->name('products.restore');

    Route::resource('categories', AdminCategoryController::class);
    Route::delete('categories/{category}/forceDestroy', [AdminCategoryController::class, 'forceDestroy'])
        ->name('categories.forceDestroy');
    Route::patch('categories/restore/{id}', [AdminCategoryController::class, 'restore'])
        ->name('categories.restore');
});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
