<?php

use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

// Bosh sahifa
Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'check.permission'])->prefix('admin')->group(function () {
    Route::get('/', [LoginController::class, 'dashboard'])->name('dashboard');

    Route::resource('users', LoginController::class);
    Route::resource('roles', RoleController::class);
});


