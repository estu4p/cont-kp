<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\BEController\DataMitraController;
use App\Http\Controllers\BEController\HomeMitraController;
use App\Http\Controllers\BEController\DashboardAdminController;

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

Route::post('/mitra', [HomeMitraController::class, 'pilihMitra'])->name('pilih_mitra');
Route::post('/jamMasuk', [HomeMitraController::class, 'jamMasuk']);
Route::post('/jamPulang', [HomeMitraController::class, 'jamPulang']);
Route::post('/jamMulaiIstirahat', [HomeMitraController::class, 'jamMulaiIstirahat']);
Route::post('/jamSelesaiIstirahat', [HomeMitraController::class, 'jamSelesaiIstirahat']);
Route::post('/totalJamKerja', [HomeMitraController::class, 'totalJamKerja']);
Route::post('/catatLogAktivitas', [HomeMitraController::class, 'catatLogAktivitas']);

Route::get('dashboard-admin', [DashboardAdminController::class, 'index']);
Route::get('dashboard/{id}', [DashboardAdminController::class, 'detailProfile']);
Route::get('edit-profile-admin', [DashboardAdminController::class, 'profile']);
Route::post('edit-profile-admin/{id}', [DashboardAdminController::class, 'update']);
Route::get('admin/data-mitra', [DataMitraController::class, 'index']);
Route::get('admin/data-mitra/presensi/{id}', [DataMitraController::class, 'presensi']);
Route::get('admin/data-mitra/presensi/detail-profile/{id}', [DataMitraController::class, 'presensiDetailProfile']);
