<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SubController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/service', [PageController::class, 'pageService'])->name('page.service');
Route::get('/servicedetail/{id}/{slug}', [PageController::class, 'singleService'])->name('single.service');
Route::get('/order/{service}', [OrderController::class, 'showOrderPage'])->name('order.page');
Route::post('/service/{serviceId}/order', [OrderController::class, 'store'])->name('order.create');
Route::get('/order/success/{service}', [OrderController::class, 'showSuccess'])->name('order.success');


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('/send-login-code', [AuthController::class, 'sendLoginCode'])->name('send.login.code');
Route::post('/verify-login-code', [AuthController::class, 'verifyLoginCode'])->name('verify.login.code');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'userRegister'])->name('user.register');
Route::post('/send-register-code', [AuthController::class, 'sendRegisterCode'])->name('send.register.code');
Route::post('/verify-register-code', [AuthController::class, 'verifyRegisterCode'])->name('verify.register.code');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/send-sms', [AuthController::class, 'sendSms'])->name('send.sms');
Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot.password');
Route::post('/verify-reset-code', [AuthController::class, 'verifyResetCode'])->name('verify.reset.code');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('reset.password');



Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/users/{id}/approve', [AdminController::class, 'approveUser'])->name('admin.users.approve');
    Route::post('/users/{id}/deactivate', [AdminController::class, 'deactivateUser'])->name('admin.users.deactivate');
    Route::post('/users/{id}/toggle-status', [AdminController::class, 'toggleStatus'])->name('admin.users.toggle-status');
    Route::post('/users/{id}/toggle-verification', [AdminController::class, 'toggleVerification'])->name('admin.users.toggle-verification');
    Route::delete('/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');
    Route::resource('categories', CategoryController::class);
    Route::resource('services', ServiceController::class);
    Route::post('/subscribe/{subId}', [SubController::class, 'subscribe'])->name('subscribe');
    Route::post('/subscription/restart', [SubController::class, 'restartSubscription'])->name('subscription.restart');
    Route::get('/subscriptions', [SubController::class, 'allSubscriptions'])->name('admin.subscriptions');
    Route::post('/subscription/cancel/{id}', [SubController::class, 'cancelSubscription'])->name('subscription.cancel');

});
Route::middleware(['auth'])->prefix('provider')->group(function () {
    Route::resource('services', ServiceController::class);
    Route::post('/subscribe/{subId}', [SubController::class, 'subscribe'])->name('subscribe');
    Route::post('/subscription/restart', [SubController::class, 'restartSubscription'])->name('subscription.restart');
    Route::get('/subscriptions', [SubController::class, 'allSubscriptions'])->name('admin.subscriptions');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::get('/orders', [OrderController::class, 'providerOrders'])->name('provider.orders');
});


Route::middleware(['auth'])->prefix('user')->group(function () {
    Route::get('/profile', [UserController::class, 'userProfile'])->name('user.profile');
    Route::get('/orders', [UserController::class, 'orders'])->name('user.orders');
    Route::get('/dashboard', [UserController::class, 'userDashboard'])->name('user.dashboard');
    Route::post('/profile/update', [UserController::class, 'userUpdateProfile'])->name('user.profile.update');

});

Route::get('/pricing', [SubController::class, 'index'])->name('pricing');

Route::post('/tezkor/order', [OrderController::class, 'storeTezkorOrder'])->name('tezkor.order.store');
Route::get('/get-sub-categories', [CategoryController::class, 'getSubCategories'])->name('get.sub.categories');
Route::get('/get-subcategory-price/{id}', [CategoryController::class, 'getSubcategoryPrice']);

Route::post('locale', [LanguageController::class, 'setLocale'])->name('locale.change');





