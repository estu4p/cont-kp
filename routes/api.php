<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\BEController\DashboardAdminController;
use App\Http\Controllers\BEController\DataMitraController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\BEController\PresensiController;
use App\Http\Controller\BEController\DivisiController;

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

Route::post('login', [LoginController::class, 'validateLogin'])->name('login');
    Route::post('register', [RegisterController::class, 'register'])->name('register');
Route::post('/resetPassword', [ResetPasswordController::class, 'resetPassword'])->name('password.reset');
Route::post('/sentOTP', [ResetPasswordController::class, 'verifyOTP'])->name('otp.verify');
Route::post('/createPassword', [ResetPasswordController::class, 'newPassword'])->name('password.new');

Route::get('dashboard-admin', [DashboardAdminController::class, 'index']);
Route::get('dashboard/{id}', [DashboardAdminController::class, 'detailProfile']);
Route::get('edit-profile-admin', [DashboardAdminController::class, 'profile']);
Route::post('edit-profile-admin/{id}', [DashboardAdminController::class, 'update']);
Route::get('data-mitra', [DataMitraController::class, 'index']);
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard']);
});
Route::post('/loginn', [ApiAuthController::class, 'login']);

Route::get('/presensi-harian', [PresensiController::class, 'index']);
Route::get('/divisi', [DivisiController::class, 'index'])->name('jumlah-mahasiswa');

