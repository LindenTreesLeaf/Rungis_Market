<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\BundleController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\ConditionController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\SuperviseurController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::resource('buildings', BuildingController::class);

Route::resource('bundles', BundleController::class)->except('index', 'show');
Route::get('bundles/{sector_id}', [BundleController::class, 'index'])->name('bundles.index');
Route::get('bundles/sales/{user_id}', [BundleController::class, 'show'])->name('bundles.show');
Route::get('bundles/sell/{bundle_id}', [BundleController::class, 'sell'])->name('bundle.sell');

Route::get('/card/{card_id}/reserve', [CardController::class, 'reserve'])->name('card.reserve');
Route::get('/card/{card_id}/resign', [CardController::class, 'resign'])->name('card.resign');
Route::resource('cards', CardController::class)->except('edit', 'show', 'create');

Route::resource('conditions', ConditionController::class)->only('update');

Route::get('/equipments/create/{building_id}', [EquipmentController::class, 'create'])->name('equipments.create');
Route::resource('equipments', EquipmentController::class)->except('index', 'create');

Route::get('orders/addToCart/{bundle_id}', [OrderController::class, 'addToCart'])->name('order.addToCart');
Route::get('orders/removeFromCart/{bundle_id}', [OrderController::class, 'removeFromCart'])->name('order.removeFromCart');
Route::get('orders/buy/{order_id}', [OrderController::class, 'buy'])->name('orders.buy');
Route::get('orders/cancel/{order_id}', [OrderController::class, 'cancel'])->name('orders.cancel');
Route::resource('orders', OrderController::class)->only('index', 'show');

Route::post('/places/{building_id}', [PlaceController::class, 'store'])->name('places.store');
Route::get('/place/{place_id}/reserve', [PlaceController::class, 'reserve'])->name('place.reserve');
Route::resource('places', PlaceController::class)->except('store', 'create', 'show');

Route::resource('types', TypeController::class)->only('update');

Route::resource('sectors', SectorController::class)->only('edit', 'update');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/about', function(){return view('about');})->name('about');
Route::get('/contact', function(){return view('contact');})->name('contact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__.'/auth.php';
require __DIR__.'/api.php';
