<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function() {
    Route::get('login', [LoginController::class, 'create'])
    ->name('request-login');

    Route::get('login/{token}', [LoginController::class, 'index'])
        ->name('login');

    Route::post('login', [LoginController::class, 'store']);

    Route::get('register', [RegisterController::class, 'create'])
    ->name('register')->middleware("web");

    Route::post('register', [RegisterController::class, 'store'])->middleware("web");
});
