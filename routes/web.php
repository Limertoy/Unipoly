<?php


use App\Http\Controllers\ChatController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\LobbyController;
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

Route::get('/messages', [ChatController::class, 'fetchMessages'])->middleware('auth');

Route::post('/messages', [ChatController::class, 'sendMessage'])->middleware('auth');

Route::get('/lobbies', [LobbyController::class, 'show'])->middleware('auth')->name('lobbies');

Route::get('/lobbies/get', [LobbyController::class, 'fetchLobbies'])->middleware('auth');

Route::post('/lobbies', [LobbyController::class, 'createLobby'])->middleware('auth');

Route::put('/lobbies', [LobbyController::class, 'joinToLobby'])->middleware('auth');

require __DIR__.'/auth.php';

