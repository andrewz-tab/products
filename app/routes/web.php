<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
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
    return redirect(route('products.index'));
});

Route::resource('products', ProductController::class);
Route::resource('orders', OrderController::class)
    ->only(['show', 'index']);
Route::resource('products.orders', OrderController::class)
    ->only(['create']);

Route::post('/products/{productId}/orders', [OrderController::class, 'store'])->name('products.orders.store');
Route::post('/orders/{order}/complete', [OrderController::class, 'complete'])->name('orders.complete');

