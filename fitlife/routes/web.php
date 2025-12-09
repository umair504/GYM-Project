<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



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




// Admin Routes
Route::prefix('admin')->group(function() {

    Route::middleware(['auth'])->group(function() {
        Route::resource('products', ProductController::class);
    });

});

Route::get('/search-products', [ProductController::class, 'search'])->name('products.search');
