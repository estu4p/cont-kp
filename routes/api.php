<?php

use Illuminate\Http\Request;
use BaconQrCode\Encoder\QrCode;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BEController\MhsController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\BEController\SchoolController;
use App\Http\Controllers\BEController\ContributorForMitra;
use App\Http\Controllers\BEController\DataMitraController;
use App\Http\Controllers\BEController\HomeMitraController;
use App\Http\Controllers\BEController\DashboardAdminController;
use App\Http\Controllers\BEController\ContributorUnivController;
use App\Http\Controllers\BEController\AdminUnivAfterPaymentController;
use App\Http\Controllers\BEController\PresensiMitraController;
use App\Http\Controllers\BEController\AdminUserOrganizations;
use App\Http\Controllers\BEController\AdminSistemDashboardController;
use App\Http\Controllers\BEController\CheckoutAdminUniv\CheckoutController;
use App\Http\Controllers\BEController\UserAdminSistemController;



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

Route::post('/pilihMitra/{id}', [HomeMitraController::class, 'pilihMitra']);
Route::post('/jamMasuk', [HomeMitraController::class, 'jamMasuk']);
Route::post('/jamPulang/{id}', [HomeMitraController::class, 'jamPulang']);
Route::post('/jamMulaiIstirahat/{id}', [HomeMitraController::class, 'jamMulaiIstirahat']);
Route::post('/jamSelesaiIstirahat/{id}', [HomeMitraController::class, 'jamSelesaiIstirahat']);
Route::post('/totalJamKerja/{id}', [HomeMitraController::class, 'totalJamKerja']);
Route::post('/catatLogAktivitas/{id}', [HomeMitraController::class, 'catatLogAktivitas']);
Route::post('/catatIzin/{id}', [HomeMitraController::class, 'catatIzin']);
Route::post('/barcode/{id}', [HomeMitraController::class, 'generateQRCode']);
Route::get('/detailGantiJam/{id}', [HomeMitraController::class, 'detailGantiJam']);

// admin univ after payment
Route::get('dashboard-admin', [AdminUnivAfterPaymentController::class, 'index']);
Route::get('dashboard/admin/{id}', [AdminUnivAfterPaymentController::class, 'detailAdminProfile']);
Route::get('edit-profile-admin', [AdminUnivAfterPaymentController::class, 'profileAdmin']);
Route::post('edit-profile-admin/{id}', [AdminUnivAfterPaymentController::class, 'updateAdminProfile']);
Route::get('admin/data-mitra', [AdminUnivAfterPaymentController::class, 'adminUnivMitra']);
Route::get('admin/data-mitra/divisi/{id}', [AdminUnivAfterPaymentController::class, 'adminUnivDivisiMitra']);
Route::get('admin/data-mitra/presensi', [AdminUnivAfterPaymentController::class, 'adminUnivPresensi']);
Route::get('admin/daftar-mitra/presensi/pengaturan-presensi/{id}', [AdminUnivAfterPaymentController::class, 'adminUnivPengaturanPresensi']);
Route::post('admin/daftar-mitra/presensi/update/pengaturan-presensi/{id}', [AdminUnivAfterPaymentController::class, 'updateAdminUnivPengaturanPresensi']);
Route::get('admin/data-mitra/presensi/detail-profile/{id}', [AdminUnivAfterPaymentController::class, 'adminUnivPresensiDetailProfile']);
Route::get('admin/daftar-mitra/team-aktif/{id}', [AdminUnivAfterPaymentController::class, 'daftarMitraTeamAktif']);

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
Route::get('admin/daftar-mitra/laporan-data-presensi', [AdminUnivAfterPaymentController::class, 'laporanDataPresensi']);
Route::get('admin/daftar-mitra/detail-hadir/{id}', [AdminUnivAfterPaymentController::class, 'teamAktifDetailHadir']);
Route::get('admin/daftar-mitra/detail-izin/{id}', [AdminUnivAfterPaymentController::class, 'teamAktifDetailIzin']);
Route::get('admin/daftar-mitra/detail-tidak-hadir/{id}', [AdminUnivAfterPaymentController::class, 'teamAktifDetailTidakHadir']);
Route::get('riwayatpembelian', [AdminUnivAfterPaymentController::class, 'RiwayatPembelian']);
Route::get('jangkawaktu', [AdminUnivAfterPaymentController::class, 'JangkaWaktu']);
Route::get('jangkawaktubydate', [AdminUnivAfterPaymentController::class, 'JangkaWaktuByDate']);
Route::get('checkoutpesanan', [AdminUnivAfterPaymentController::class, 'checkoutpesanan']);
Route::post('/checkoutBronze', [CheckoutController::class, 'checkoutBronzePost']);
Route::get('/mitra-optionpresensi', [AdminUnivAfterPaymentController::class, 'OptionPresensi'])->name('adminunivpayment.optionpresensi');
Route::post('/mitra-pengaturpersensi', [AdminUnivAfterPaymentController::class, 'Pengaturpersensi'])->name('adminunivafterpayment.Pengaturpersensi');


//Admin Pengaturan User & Organizations
Route::get('/bagianmitra', [AdminUnivAfterPaymentController::class, 'bagianMitra']);
Route::post('/editUsermitra/{id}', [AdminUnivAfterPaymentController::class, 'editUsermitra'])->name('editmitra');

//Contributor for univ
Route::get('/dashboard-univ', [SchoolController::class, 'index']);
Route::get('/jumlahmahasiswa', [SchoolController::class, 'jumlahMahasiswa']);
Route::get('/lihatprofil/{id}', [SchoolController::class, 'Lihatprofil']);
Route::get('datapresensi', [ContributorUnivController::class, 'DataPresensi']);
Route::get('datapresensisiswa/{id}', [ContributorUnivController::class, 'DataPresensiSiswa']);
Route::get('/datapenilaianmhs', [SchoolController::class, 'datamhs']);
Route::get('/lihatpenilaian/{id}', [SchoolController::class, 'lihatPenilaian'])->name('penilaian');


//Contributor for Mitra

Route::get('daftar-divisi/{id}', [ContributorForMitra::class, 'showDaftarDivisi']);
Route::post('add-divisi', [ContributorForMitra::class, 'addDivisi']);

Route::get('show-divisi', [ContributorForMitra::class, 'showDivisi'])->name('mitra.showdivisi');
Route::post('add-divisi', [ContributorForMitra::class, 'addDivisi'])->name('mitra.adddivisi');

Route::put('update-divisi/{id}', [ContributorForMitra::class, 'updateDivisi']);
Route::delete('delete-divisi/{id}', [ContributorForMitra::class, 'deleteDivisi'])->name('mitra.deletedivisi');

Route::get('/show-data-mahasiswa/{id}', [ContributorForMitra::class, 'showDataMahasiswa']);
Route::get('kategori-penilaian', [ContributorForMitra::class, 'showKategoriPenilaian']);
Route::post('add-kategori-penilaian', [ContributorForMitra::class, 'addKategoriPenilaian']);
Route::post('add-sub-kategori-penilaian', [ContributorForMitra::class, 'addSubKategoriPenilaian']);

Route::get('data-shift', [ContributorForMitra::class, 'showDataShift']);
Route::post('add-shift', [ContributorForMitra::class, 'addShift']);
Route::put('update-shift/{id}', [ContributorForMitra::class, 'updateShift']);
Route::delete('destroy-shift/{id}', [ContributorForMitra::class, 'destroyShift']);

Route::get('/contributorformitra-editprofile', [ContributorForMitra::class, 'edit'])->name('contributorformitra.editprofile');
Route::put('/contributorformitra-update/{$username}', [ContributorForMitra::class, 'update'])->name('contributorformitra.update');
Route::put('/contributorformitra-delete/{$username}', [ContributorForMitra::class, 'delete'])->name('contributorformitra.deleteFoto');
Route::get('/mitra-penilaian', [ContributorForMitra::class, 'InputNilai']);
Route::post('/penilaian-mitra/{id}', [ContributorForMitra::class, 'inputNilaiPost']);

//Contributor for Mitra - Presensi
Route::get('daftar-presensi', [PresensiMitraController::class, 'getAllPresensi']);
Route::get('presensi/by-name', [PresensiMitraController::class, 'getPresensiByNama']);
Route::post('/presensi/accept/{id}', [PresensiMitraController::class, 'presensiAccept']);
Route::post('/presensi/reject', [PresensiMitraController::class, 'presensiReject']);
Route::put('/presensi/accept-all', [PresensiMitraController::class, 'presensiAcceptAll']);



//Admin Pengaturan User & Organizations
Route::post('addGuru', [AdminUserOrganizations::class, 'addGuru']);
Route::post('addMentor', [AdminUserOrganizations::class, 'addMentor']);
Route::get('searchNIM', [AdminUserOrganizations::class, 'searchNIM']);
Route::post('addMahasiswaToGuru', [AdminUserOrganizations::class, 'addMahasiswa']);
Route::post('deleteMahasiswa', [AdminUserOrganizations::class, 'deleteMahasiswa']);
Route::put('editMahasiswa/{id}', [AdminUserOrganizations::class, 'editMahasiswa']);

Route::get('presensi-detail-hadir/{nama_lengkap}', [ContributorForMitra::class, 'laporanPresensiDetailHadir']);
Route::get('/laporan-presensi/{nama_lengkap}/izin', [ContributorForMitra::class, 'laporanPresensiDetailIzin']);
Route::get('/laporan-presensi/{nama_lengkap}/tidak-hadir', [ContributorForMitra::class, 'laporanPresensiDetailTidakHadir']);

//Admin sistem dashboard & edit profile
Route::get('/adminsistem/dashboard', [AdminSistemDashboardController::class, 'dashboard']);

Route::get('/adminsistem/profile/edit', [AdminSistemDashboardController::class, 'editProfile'])->name('userAdmin.editProfile');
Route::put('/adminsistem/updateprofile/{id}', [AdminSistemDashboardController::class, 'updateProfile'])->name('userAdmin.updateProfile');
Route::post('/AdminSistem/updateFoto/{id}', [AdminSistemDashboardController::class, 'updateFoto'])->name('userAdmin.updateProfile');
Route::delete('/AdminSistem/deletefoto/{id}', [AdminSistemDashboardController::class, 'deleteFoto'])->name('userAdmin.deleteFoto');
//Subscription
Route::get('/subscriptions', [UserAdminSistemController::class, 'IndexSubscription'])->name('subscriptions.index');
Route::post('/subscriptions-store', [UserAdminSistemController::class, 'storeSubs'])->name('subscriptions.store');
Route::put('/subscriptions/{id}/update', [UserAdminSistemController::class, 'updateSubs'])->name('subscriptions.updateSubs');
Route::delete('/subscriptions/{id}/delete', [UserAdminSistemController::class, 'deleteSubs'])->name('subscriptions.deleteSubs');

Route::get('adminSistem-login', [LoginController::class, 'loginadminSistem'])->name('login.adminsistem');
Route::get('adminsistem/logout-sistemlokasi', [LoginController::class, 'logoutSistemLokasi'])->name('logout.sistemlokasi');
