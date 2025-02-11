<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\Api\ApiDataController;


Route::middleware('api')->group(function () {
    Route::post('/api/login',[ApiAuthController::class, 'store']);
    Route::post('/api/data/orders', [ApiDataController::class,'getOrders']);
});