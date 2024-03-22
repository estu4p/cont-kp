<?php

use Illuminate\Http\Request;
use BEController\SchoolController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\BEController\DataMitraController;
use App\Http\Controllers\BEController\HomeMitraController;
use App\Http\Controllers\BEController\DashboardAdminController;
use App\Http\Controllers\BEController\ContributorUnivController;
use App\Http\Controllers\BEController\SchoolControlller;
use App\Http\Controllers\BEController\AdminUnivAfterPaymentController;
// use App\Http\Controllers\BEController\HomeMitraController;
use App\Http\Controllers\BEController\ContributorForMitra;

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


Route::post('/loginn', [ApiAuthController::class, 'login']);

Route::post('/daftar', [LandingPageController::class, 'lpdaftar']);
Route::post('/loginpage', [LandingPageController::class, 'login'])->name('login');
Route::post('/ChekoutPaket', [LandingPageController::class, 'ChekoutPaket'])->name('paket');
Route::post('/user/login', [LoginController::class, 'validateLogin'])->name('user.login');
Route::post('/user/register', [RegisterController::class, 'register'])->name('register');
Route::post('/user/register/showRegisterForm', [RegisterController::class, 'showRegisterForm']);
Route::post('/user/register/barcode', [RegisterController::class, 'registerWithBarcode']);
Route::post('/user/reset-password', [ResetPasswordController::class, 'resetPassword'])->name('password.reset');
Route::post('/user/reset-password/otp', [ResetPasswordController::class, 'verifyOTP'])->name('otp.verify');
Route::post('/user/reset-password/new-password', [ResetPasswordController::class, 'newPassword'])->name('password.new');

Route::post('/pilihmitra', [HomeMitraController::class, 'pilihMitra']);
Route::post('/jamMasuk', [HomeMitraController::class, 'jamMasuk']);
Route::post('/jamPulang/{id}', [HomeMitraController::class, 'jamPulang']);
Route::post('/jamMulaiIstirahat/{id}', [HomeMitraController::class, 'jamMulaiIstirahat']);
Route::post('/jamSelesaiIstirahat/{id}', [HomeMitraController::class, 'jamSelesaiIstirahat']);
Route::post('/totalJamKerja/{id}', [HomeMitraController::class, 'totalJamKerja']);
Route::post('/catatLogAktivitas/{id}', [HomeMitraController::class, 'catatLogAktivitas']);
Route::post('/catatIzin/{id}', [HomeMitraController::class, 'catatIzin']);
Route::post('/barcode/{id}', [HomeMitraController::class, 'barcode']);
Route::get('/detailGantiJam/{id}', [HomeMitraController::class, 'detailGantiJam']);

// admin univ after payment
Route::get('dashboard-admin', [AdminUnivAfterPaymentController::class, 'index']);
Route::get('dashboard/admin/{id}', [AdminUnivAfterPaymentController::class, 'detailAdminProfile']);
Route::get('edit-profile-admin', [AdminUnivAfterPaymentController::class, 'profileAdmin']);
Route::post('edit-profile-admin/{id}', [AdminUnivAfterPaymentController::class, 'updateAdminProfile']);
Route::get('admin/data-mitra', [AdminUnivAfterPaymentController::class, 'adminUnivMitra']);
Route::get('admin/data-mitra/presensi', [AdminUnivAfterPaymentController::class, 'adminUnivPresensi']);
Route::get('admin/daftar-mitra/presensi/pengaturan-presensi', [AdminUnivAfterPaymentController::class, 'adminUnivPengaturanPresensi']);
Route::get('admin/data-mitra/presensi/detail-profile/{id}', [AdminUnivAfterPaymentController::class, 'adminUnivPresensiDetailProfile']);
Route::get('admin/daftar-mitra/team-aktif', [AdminUnivAfterPaymentController::class, 'daftarMitraTeamAktif']);

Route::get('admin/daftar-mitra/pengaturan-divisi', [AdminUnivAfterPaymentController::class, 'daftarMitraPengaturanDivisi']); //daftar divisi
Route::get('admin/daftar-mitra/showPenilaian', [AdminUnivAfterPaymentController::class, 'showKategoriPenilaian']);
Route::post('admin/daftar-mitra/add-divisi', [AdminUnivAfterPaymentController::class, 'addDivisi']);
Route::post('admin/daftar-mitra/update-divisi/{id}', [AdminUnivAfterPaymentController::class, 'updateDivisi']);
Route::delete('admin/daftar-mitra/destroy-divisi/{id}', [AdminUnivAfterPaymentController::class, 'destroyDivisi']);
Route::post('admin/daftar-mitra/pengaturan-divisi/kategori-penilaian', [AdminUnivAfterPaymentController::class, 'addKategoriPenilaian']);
Route::post('admin/daftar-mitra/pengaturan-divisi/sub-kategori-penilaian', [AdminUnivAfterPaymentController::class, 'addSubKategoriPenilaian']);

Route::get('admin/daftar-mitra/team-aktif/klik/{id}', [AdminUnivAfterPaymentController::class, 'teamAktifKlik']);
Route::get('admin/daftar-mitra/see-all-team/{id}', [AdminUnivAfterPaymentController::class, 'teamAktifSeeAllTeam']);
Route::post('admin/daftar-mitra/sunting/{id}', [AdminUnivAfterPaymentController::class, 'teamAktifSuntingTeam']);
Route::get('admin/daftar-mitra/detail-hadir/{id}', [AdminUnivAfterPaymentController::class, 'teamAktifDetailHadir']);
Route::get('admin/daftar-mitra/laporan-data-presensi', [AdminUnivAfterPaymentController::class, 'laporanDataPresensi']);

//Contributor for univ
Route::get('/dashboard-univ', [\App\Http\Controllers\BEController\SchoolController::class, 'index']);

//Contributor for Mitra
Route::get('daftar-divisi', [ContributorForMitra::class,'daftarDivisi']);
Route::post('add-divisi', [ContributorForMitra::class,'addDivisi']);
Route::put('update-divisi/{id?}', [ContributorForMitra::class,'updateDivisi']);
Route::delete('destroy-divisi/{id}', [ContributorForMitra::class, 'destroyDivisi']);

Route::get('', [ContributorForMitra::class,'']);
