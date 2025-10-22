<?php

use Illuminate\Support\Facades\Route;

// FitLife Gym Website Routes
Route::get('/', fn() => view('home'))->name('home');
Route::get('/membership', fn() => view('membership'))->name('membership');
Route::get('/accessories', fn() => view('accessories'))->name('accessories');
Route::get('/cart', fn() => view('cart'))->name('cart');
Route::get('/checkout', fn() => view('checkout'))->name('checkout');
Route::get('/contact', fn() => view('contact'))->name('contact');
