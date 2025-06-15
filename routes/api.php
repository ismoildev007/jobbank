<?php

use App\Http\Controllers\Admin\SubController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/payme/webhook', [PaymeController::class, 'handleCallback'])->name('payment');
Route::get('/payment', [SubController::class, 'payment'])->name('payment');
Route::post('/register', [AuthController::class, 'userRegister'])->name('user.register');
Route::post('/send-register-code', [AuthController::class, 'sendRegisterCode'])->name('send.register.code');
