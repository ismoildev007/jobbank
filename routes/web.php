<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SubController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'userRegister'])->name('user.register');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('categories', CategoryController::class);
    Route::resource('services', ServiceController::class);
    Route::post('/subscribe/{subId}', [SubController::class, 'subscribe'])->name('subscribe');
    Route::post('/subscription/restart', [SubController::class, 'restartSubscription'])->name('subscription.restart');
    Route::get('/subscriptions', [SubController::class, 'allSubscriptions'])->name('admin.subscriptions');
});
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/users/{id}/approve', [AdminController::class, 'approveUser'])->name('admin.users.approve');
    Route::post('/users/{id}/deactivate', [AdminController::class, 'deactivateUser'])->name('admin.users.deactivate');
    Route::post('/users/{id}/toggle-status', [AdminController::class, 'toggleStatus'])->name('admin.users.toggle-status');
    Route::resource('services', ServiceController::class);
    Route::post('/subscribe/{subId}', [SubController::class, 'subscribe'])->name('subscribe');
    Route::post('/subscription/restart', [SubController::class, 'restartSubscription'])->name('subscription.restart');
    Route::get('/subscriptions', [SubController::class, 'allSubscriptions'])->name('admin.subscriptions');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::post('/subscription/cancel/{id}', [SubController::class, 'cancelSubscription'])->name('subscription.cancel');


});
Route::get('/pricing', [SubController::class, 'index'])->name('pricing');

Route::get('/get-sub-categories', [CategoryController::class, 'getSubCategories'])->name('get.sub.categories');
Route::post('locale', [LanguageController::class, 'setLocale'])->name('locale.change');





