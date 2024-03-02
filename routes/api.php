<?php

use App\Http\Controllers\Auth\ForgetPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/login', [LoginController::class, 'validateLogin']);
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register/withbarcode', [RegisterController::class, 'sigupQRcode']);
Route::post('/password/forget', [ForgetPasswordController::class, 'ForgetPassword']);
Route::post('/password/reset', [ResetPasswordController::class, 'ResetPassword']);
