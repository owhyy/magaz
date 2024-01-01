<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function() {
    Route::get('login', [LoginController::class, 'create'])
    ->name('login');

    Route::get('register', [RegisterController::class, 'create'])
    ->name('register');
});
