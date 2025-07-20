<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\HomeController;

// This is the customer-facing homepage route
Route::get('/', [HomeController::class, 'index'])->name('home');

// This is the route for a single product detail page
Route::get('/products/{product:slug}', [HomeController::class, 'show'])->name('products.show');

// Admin routes remain unchanged
Route::prefix('admin')->group(function () {
    Route::resource('products', ProductController::class);
});