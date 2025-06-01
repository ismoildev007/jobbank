<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\provider\ProviderController;
use App\Http\Controllers\provider\ServiceController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'userRegister'])->name('user.register');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

//Admin panel login register end
Route::middleware(['auth'])->prefix('provider')->group(function () {
    Route::get('/dashboard', [ProviderController::class, 'dashboard'])->name('provider.dashboard');
    Route::get('/profile', [ProviderController::class, 'profile'])->name('provider.profile');
    Route::resource('services', ServiceController::class);
    Route::get('/dashboard', [ProviderController::class, 'dashboard'])->name('provider.dashboard');
});

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('categories', CategoryController::class);

});

Route::post('locale', [LanguageController::class, 'setLocale'])->name('locale.change');





