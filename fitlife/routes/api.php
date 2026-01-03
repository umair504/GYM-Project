<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\MembershipPlanApiController;
use App\Http\Controllers\Api\ProfileApiController;
use App\Http\Controllers\Api\AuthApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| All routes here return JSON responses
*/

// Public APIs 
Route::get('/products', [ProductApiController::class, 'index']); 
Route::get('/products/{id}', [ProductApiController::class, 'show']);

Route::post('/login', [AuthApiController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthApiController::class, 'logout']);

    // Protect your admin APIs
    Route::post('/products', [ProductApiController::class, 'store']);
    Route::put('/products/{id}', [ProductApiController::class, 'update']);
    Route::delete('/products/{id}', [ProductApiController::class, 'destroy']);

    Route::post('/membership-plans', [MembershipPlanApiController::class, 'store']);
    Route::put('/membership-plans/{id}', [MembershipPlanApiController::class, 'update']);
    Route::delete('/membership-plans/{id}', [MembershipPlanApiController::class, 'destroy']);
});
