<?php


use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', [DashboardController::class, 'show'])->
middleware(['auth'])->name('dashboard');

Route::get('/inventory', [InventoryController::class, 'show'])->
middleware(['auth'])->name('inventory');

Route::get('/game', function () {
    return view('game');
})->middleware(['auth'])->name('game');

Route::get('/profile/{id}', [UserController::class, 'show'])->
middleware(['auth'])->name('profile');

Route::get('/admin', function () {
    return view('adminPanel');
})->middleware('admin')->name('adminPanel');

require __DIR__.'/auth.php';

