<?php

use Illuminate\Http\Request;
use BaconQrCode\Encoder\QrCode;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BEController\MhsController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\BEController\QRCodeController;
use App\Http\Controllers\BEController\NilaiMhsController;
use App\Http\Controllers\BEController\DataMitraController;
use App\Http\Controllers\BEController\EditProfileController;
use App\Http\Controllers\BEController\SubscriptionController;
use App\Http\Controllers\BEController\InputNilaiMhsController;
use App\Http\Controllers\BEController\DashboardAdminController;
use App\Http\Controllers\BEController\MitraDashboardController;
use App\Http\Controllers\BEController\AdminSistemDashboardController;

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

Route::get('data-mitra', [DataMitraController::class, 'index']);
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard']);
});
Route::post('/loginn', [ApiAuthController::class, 'login']);
Route::post('/dashboard', [MitraDashboardController::class, 'filterMahasiswa']);
Route::post('/nilaimhs', [NilaiMhsController::class, 'store']);
Route::post('/input-mahasiswa', [InputNilaiMhsController::class, 'store']);
Route::get('/dashbardd', [AdminSistemDashboardController::class, 'filterDashboard']);
// Route untuk mengedit profil mitra
Route::post('profile/mitra/{id}', [EditProfileController::class, 'update']);
// Route untuk mengedit profil admin sistem
Route::post('/profile/adminsistem/{id}', [EditProfileController::class, 'update']);
Route::post('/subscriptions', [SubscriptionController::class, 'store']);
// Rute untuk menghapus data pengguna
Route::delete('/adminsistem/hapus/{id}', [SubscriptionController::class, 'destroy']);
// Rute untuk mengedit data pengguna
Route::put('/adminsistem/edit/{id}', [SubscriptionController::class, 'update']);
//rute untuk men scan ganti jam 
Route::post('/scanner', [QRCodeController::class, 'store']);