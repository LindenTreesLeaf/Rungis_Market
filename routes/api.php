<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiAuthController;


Route::middleware('api')->group(function () {
    Route::post('/api/login',[ApiAuthController::class, 'store']);
});