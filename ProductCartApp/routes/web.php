<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductCartController;

Route::get('/', [ProductCartController::class, 'index']);
Route::post('/products', [ProductCartController::class, 'store'])->name('products.store');
Route::post('/cart/{productId}', [ProductCartController::class, 'addToCart'])->name('cart.add');
Route::delete('/cart/{id}', [ProductCartController::class, 'removeFromCart'])->name('cart.remove');
