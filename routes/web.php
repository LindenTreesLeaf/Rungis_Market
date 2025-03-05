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
use App\Http\Controllers\PageController; // Ajout du contrôleur PageController
use App\Http\Controllers\SuperviseurController;

Route::get('/', function () {
    return view('home'); // Remplace 'welcome' par 'home' pour utiliser ta page d'accueil
})->name('home'); // Donne un nom à cette route


// Routes pour les utilisateurs authentifiés
Route::middleware('auth')->group(function () {
    // Affiche les informations du profil (show.blade.php)
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');

    // Formulaire de modification du profil
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

    // Mise à jour du profil
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Suppression du profil
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::resource('buildings', BuildingController::class)->middleware('can:see building|can:create building|can:edit building|can:delete building');
    Route::resource('equipments', EquipmentController::class)->middleware('can:see equipment|can:create equipment|can:edit equipment|can:delete equipment');
    Route::resource('bundles', BundleController::class)->middleware('can:see bundle|can:create bundle|can:edit bundle|can:delete bundle');
    Route::resource('cards', CardController::class)->middleware('can:see card|can:create card|can:edit card|can:delete card');
    Route::resource('conditions', ConditionController::class)->middleware('can:see condition|can:create condition|can:edit condition|can:delete condition');
    Route::resource('orders', OrderController::class)->middleware('can:see order|can:create order|can:edit order|can:delete order');
    Route::resource('places', PlaceController::class)->middleware('can:see place|can:create place|can:edit place|can:delete place');
    Route::resource('types', TypeController::class)->middleware('can:see type|can:create type|can:edit type|can:delete type');
    Route::resource('sectors', SectorController::class); // Ajout des routes pour les secteurs
});

// Routes pour "About" et "Contact"
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

// Déconnexion et redirection vers l'accueil après la déconnexion
Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('home');  // Redirection vers la page d'accueil
})->name('logout');

Route::get('/dashboard', [SuperviseurController::class, 'dashboard'])
    ->middleware(['auth', 'can:access-dashboard'])
    ->name('dashboard');


require __DIR__.'/auth.php';
require __DIR__.'/api.php';
