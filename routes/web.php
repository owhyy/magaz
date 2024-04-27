<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::prefix('auth')->group(function() {
    Route::get('login', [LoginController::class, 'create'])
    ->name('login');

    Route::get('login/{token}', [LoginController::class, 'index'])
        ->name('login.do');

    Route::post('login', [LoginController::class, 'store']);

    Route::get('register', [RegisterController::class, 'create'])
    ->name('register')->middleware("web");

    Route::post('register', [RegisterController::class, 'store'])->middleware("web");

    Route::get('logout', [LoginController::class, 'delete'])->name('logout');
});

Route::get('/', [AdController::class, 'index'])->name("main");
Route::prefix('ads')->group(function() {
    Route::get('/create', AdController::class .'@create')->name('ads.create');
    Route::get('/{id}', [AdController::class, 'show'])->name('ads.get');
});
Route::post('ads/', AdController::class .'@store')->name('ads.store');

Route::middleware('auth')->group(function() {
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
});

Route::get('profile/{nickname}', [ProfileController::class, 'show'])->name('profile.get');

require __DIR__.'/auth.php';
