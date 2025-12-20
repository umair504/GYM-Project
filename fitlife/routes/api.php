<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\MembershipPlanApiController;
use App\Http\Controllers\Api\ProfileApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| All routes here return JSON responses
*/

// Public APIs
Route::get('/products', [ProductApiController::class, 'index']);
Route::get('/products/{id}', [ProductApiController::class, 'show']);

Route::get('/membership-plans', [MembershipPlanApiController::class, 'index']);
Route::get('/membership-plans/{slug}', [MembershipPlanApiController::class, 'show']);



    // Admin APIs
    Route::post('/products', [ProductApiController::class, 'store']);
    Route::put('/products/{id}', [ProductApiController::class, 'update']);
    Route::delete('/products/{id}', [ProductApiController::class, 'destroy']);

    Route::post('/membership-plans', [MembershipPlanApiController::class, 'store']);
    Route::put('/membership-plans/{id}', [MembershipPlanApiController::class, 'update']);
    Route::delete('/membership-plans/{id}', [MembershipPlanApiController::class, 'destroy']);
