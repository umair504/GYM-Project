<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home page
Route::get('/', fn() => view('home'))->name('home');

// Membership page
Route::get('/membership', fn() => view('membership'))->name('membership');

// Accessories page
Route::get('/accessories', [ProductController::class, 'showFrontend'])->name('accessories');

// Cart page
Route::get('/cart', fn() => view('cart'))->name('cart');

// Checkout page
Route::get('/checkout', fn() => view('checkout'))->name('checkout');

// Contact page
Route::get('/contact', fn() => view('contact'))->name('contact');

// Thank you page
Route::get('/thankyou', fn() => view('thankyou'))->name('thankyou');

// Product CRUD routes (admin panel)
Route::resource('products', ProductController::class);
