<?php

use App\Http\Controllers\InventoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/inventory', [InventoryController::class, 'show'])->
middleware(['auth'])->name('inventory');

Route::get('/game', function () {
    return view('game');
})->middleware(['auth'])->name('game');

Route::get('/profile/{id}', [UserController::class, 'show'])->
middleware('auth')->name('profile');

require __DIR__.'/auth.php';

