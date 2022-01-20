<?php

use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;

Route::get('/game/{id}', [GameController::class, 'show'])
    ->middleware('auth')
    ->name('joinGame');
