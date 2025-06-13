<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'userRegister'])->name('user.register');
Route::post('/send-register-code', [AuthController::class, 'sendRegisterCode'])->name('send.register.code');
