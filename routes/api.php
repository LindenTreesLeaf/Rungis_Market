<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\Api\ApiOrdersController;
use App\Http\Controllers\Api\ApiBundlesController;
use App\Http\Controllers\Api\ApiNotificationsController;
use App\Http\Controllers\Api\ApiBuildingsController;


Route::middleware('api')->group(function () {
    Route::post('/api/login',[ApiAuthController::class, 'store']);
    Route::delete('/api/logout',[ApiAuthController::class, 'destroy']);


    Route::post('/api/orders', [ApiOrdersController::class,'getOrders']);
    Route::post('api/orders/bundles',[ApiOrdersController::class, 'getOrdersBundles']);
    Route::post('api/orders/validate',[ApiOrdersController::class, 'validateOrder']);
    Route::post('api/orders/ready',[ApiOrdersController::class,'setOrderReady']);


    Route::post('api/buildings', [ApiBuildingsController::class, 'getBuildings']);



    Route::post('api/bundles/validate',[ApiBundlesController::class, 'validateBundle']);
    Route::post('api/bundles',[ApiBundlesController::class, 'getBundles']);


    Route::delete('api/notifications',[ApiNotificationsController::class,'deleteNotification']);
    Route::post('api/notifications',[ApiNotificationsController::class, 'getNotifications']);


});