<?php

use App\Http\Controllers\ProductController;
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


Route::get('login', function () {
    return view('client.login');
})->name('login');

Route::get('cart', function () {
    return view('client.cart');
})->name('cart');

Route::get('check-out', function () {
    return view('client.check-out');
})->name('check-out');



