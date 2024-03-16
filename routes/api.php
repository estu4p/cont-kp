<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\BEController\AdminUnivAfterPaymentController;
use App\Http\Controllers\BEController\HomeMitraController;

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

Route::post('/daftar', [LandingPageController::class, 'lpdaftar'])->name('daftar');
Route::post('/loginpage', [LandingPageController::class, 'login'])->name('login');
Route::post('/ChekoutPaket', [LandingPageController::class, 'ChekoutPaket'])->name('paket');
Route::post('login', [LoginController::class, 'validateLogin'])->name('login');
Route::post('register', [RegisterController::class, 'register'])->name('register');
Route::post('/resetPassword', [ResetPasswordController::class, 'resetPassword'])->name('password.reset');
Route::post('/sentOTP', [ResetPasswordController::class, 'verifyOTP'])->name('otp.verify');
Route::post('/createPassword', [ResetPasswordController::class, 'newPassword'])->name('password.new');

Route::post('/pilihmitra', [HomeMitraController::class, 'pilihMitra']);
Route::post('/jamMasuk', [HomeMitraController::class, 'jamMasuk']);
Route::post('/jamPulang', [HomeMitraController::class, 'jamPulang']);
Route::post('/jamMulaiIstirahat', [HomeMitraController::class, 'jamMulaiIstirahat']);
Route::post('/jamSelesaiIstirahat', [HomeMitraController::class, 'jamSelesaiIstirahat']);
Route::post('/totalJamKerja', [HomeMitraController::class, 'totalJamKerja']);
Route::post('/catatLogAktivitas', [HomeMitraController::class, 'catatLogAktivitas']);
Route::post('/catatIzin', [HomeMitraController::class, 'catatIzin']);
Route::post('/barcode', [HomeMitraController::class, 'barcode']);
Route::get('/detailGantiJam', [HomeMitraController::class, 'detailGantiJam']);

// admin univ after payment
Route::get('dashboard-admin', [AdminUnivAfterPaymentController::class, 'index']);
Route::get('dashboard/admin/{id}', [AdminUnivAfterPaymentController::class, 'detailAdminProfile']);
Route::get('edit-profile-admin', [AdminUnivAfterPaymentController::class, 'profileAdmin']);
Route::post('edit-profile-admin/{id}', [AdminUnivAfterPaymentController::class, 'updateAdminProfile']);
Route::get('admin/data-mitra', [AdminUnivAfterPaymentController::class, 'adminUnivMitra']);
Route::get('admin/data-mitra/presensi/{id}', [AdminUnivAfterPaymentController::class, 'adminUnivPresensi']);
Route::get('admin/daftar-mitra/presensi/pengaturan-presensi', [AdminUnivAfterPaymentController::class, 'adminUnivPengaturanPresensi']);
Route::get('admin/data-mitra/presensi/detail-profile/{id}', [AdminUnivAfterPaymentController::class, 'adminUnivPresensiDetailProfile']);
Route::get('admin/daftar-mitra/team-aktif', [AdminUnivAfterPaymentController::class, 'daftarMitraTeamAktif']);

Route::get('admin/daftar-mitra/pengaturan-divisi', [AdminUnivAfterPaymentController::class, 'daftarMitraPengaturanDivisi']); //daftar divisi
Route::post('admin/daftar-mitra/add-divisi', [AdminUnivAfterPaymentController::class, 'addDivisi']);
Route::post('admin/daftar-mitra/update-divisi/{id}', [AdminUnivAfterPaymentController::class, 'updateDivisi']);
Route::delete('admin/daftar-mitra/destroy-divisi/{id}', [AdminUnivAfterPaymentController::class, 'destroyDivisi']);
