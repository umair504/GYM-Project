<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MembershipPlanController;
use App\Http\Controllers\adminDashboard;



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

// Frontend routes
Route::get('/membership-plans', [MembershipPlanController::class, 'index'])->name('membership-plans');
Route::get('/membership-plans/{slug}', [MembershipPlanController::class, 'show'])->name('membership-plans.show');

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
Route::prefix('admin')->name('admin.')->group(function() {
    Route::middleware(['auth'])->group(function() {
        Route::get('/', [adminDashboard::class, 'index'])->name('admin.dashboard');
        Route::resource('products', ProductController::class);
        
        Route::get('/membership-plans', [MembershipPlanController::class, 'adminIndex'])->name('membership-plans.index');
        Route::get('/membership-plans/create', [MembershipPlanController::class, 'create'])->name('membership-plans.create');
        Route::post('/membership-plans', [MembershipPlanController::class, 'store'])->name('membership-plans.store');
        Route::get('/membership-plans/{membershipPlan}/edit', [MembershipPlanController::class, 'edit'])->name('membership-plans.edit');
        Route::put('/membership-plans/{membershipPlan}', [MembershipPlanController::class, 'update'])->name('membership-plans.update');
        Route::delete('/membership-plans/{membershipPlan}', [MembershipPlanController::class, 'destroy'])->name('membership-plans.destroy');
    });
});

Route::get('/search-products', [ProductController::class, 'search'])->name('products.search');
