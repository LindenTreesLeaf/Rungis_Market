<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\Api\ApiOrdersController;


Route::middleware('api')->group(function () {
    Route::post('/api/login',[ApiAuthController::class, 'store']);
    Route::post('/api/orders', [ApiOrdersController::class,'getOrders']);
    Route::delete('/api/logout',[ApiAuthController::class, 'destroy']);
});