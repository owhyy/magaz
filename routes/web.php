<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::prefix('auth')->group(function () {
    Route::get('login', [LoginController::class, 'create'])
        ->name('login');
    Route::get('login/{token}', [LoginController::class, 'index'])
        ->name('login.do');
    Route::post('login', [LoginController::class, 'store']);
    Route::get('register', [RegisterController::class, 'create'])
        ->name('register');
    Route::post('register', [RegisterController::class, 'store']);
    Route::get('logout', [LoginController::class, 'delete'])->name('logout');
});

Route::get('/', [AdController::class, 'index'])->name('ads.index');
Route::prefix('ads')->group(function () {
    Route::get('create', [AdController::class, 'create'])->name('ads.create')->middleware('auth');
    Route::post('/', [AdController::class, 'store'])->name('ads.store');
    Route::get('{id}', [AdController::class, 'show'])->name('ads.show');
    Route::get('{id}/edit', [AdController::class, 'edit'])->name('ads.edit')->middleware('auth');
    Route::put('{id}', [AdController::class, 'update'])->name('ads.update');
    Route::delete('{id}', [AdController::class, 'destroy'])->name('ads.destroy');
});

Route::prefix('profile')->group(function () {
    Route::get('me', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');
    Route::put('me', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');
    Route::get('{nickname}', [ProfileController::class, 'show'])->name('profile.get');
});

require __DIR__ . '/auth.php';
