<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\DashboardController;
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
Route::get('detail/{id}', [ProductController::class, 'detail'])->name('client.detail');
Route::get('/detail/{id}/info', [ProductController::class, 'getAdditionalInfo']);
Route::get('/detail/{id}/comments', [ProductController::class, 'getComments']);

Route::get('user', [UserController::class, 'index'])->name('client.user');
Route::get('/user/edit', [UserController::class, 'edit'])->name('user.edit');
Route::post('/user/edit', [UserController::class, 'edit'])->name('user.edit');
Route::get('/user/change-password', [UserController::class, 'showChangePasswordForm'])->name('user.change_password.form');
Route::post('/user/change-password', [UserController::class, 'changePassword'])->name('user.change_password');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');




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

    Route::resource('categories', AdminCategoryController::class);
    Route::delete('categories/{category}/forceDestroy', [AdminCategoryController::class, 'forceDestroy'])
        ->name('categories.forceDestroy');
    Route::patch('categories/restore/{id}', [AdminCategoryController::class, 'restore'])
        ->name('categories.restore');
});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
