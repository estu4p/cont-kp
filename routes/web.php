<?php

use App\Models\Mitra;

use App\Models\Divisi;
use App\Models\Quotes;
use App\Models\Sekolah;

use App\Models\Presensi;
use function Laravel\Prompts\alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use  App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\PresensiCobaController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\BEController\SchoolController;
use App\Http\Controllers\AdminUnivAfterPaymentController;
use App\Http\Controllers\BEController\ContributorForMitra;
use App\Http\Controllers\BEController\DataMitraController;
use App\Http\Controllers\BEController\HomeMitraController;
use App\Http\Controllers\Auth\ResetPasswordAdminController;
use App\Http\Controllers\Auth\ResetPasswordAdminSistemController;
use App\Http\Controllers\BEController\PresensiMitraController;
use App\Http\Controllers\BEController\MitraDashboardController;
use App\Http\Controllers\BEController\MitraTeamAktifController;
use App\Http\Controllers\Auth\ResetPasswordSuperAdminController;
use App\Http\Controllers\BEController\ContributorUnivController;
use App\Http\Controllers\BEController\UserAdminSistemController;
use App\Http\Controllers\BEController\SuperadminSistemController;
use App\Http\Controllers\BEController\AdminSistemDashboardController;
use App\Http\Controllers\BEController\AdminSettingJamQuotesController;
use App\Http\Controllers\BEController\CheckoutAdminUniv\CheckoutController;
use App\Http\Controllers\BEController\AdminUnivAfterPaymentController as BEControllerAdminUnivAfterPaymentController;
use App\Http\Controllers\BEController\PenilaianMitraController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});
//login user
Route::get('/user/login', function () {
    return view('user.login', [
        'title' => "Login",
        'email' => "raihan@gmail.com"
    ]);
});

Route::post('/user/login', [LoginController::class, 'ValidateLogin'])->name('user.login');
Route::post('/user/register', [RegisterController::class, 'register_user'])->name('register');
Route::post('/user/reset-password', [ResetPasswordController::class, 'resetPassword'])->name('password.reset');
Route::post('/user/reset-password/otp', [ResetPasswordController::class, 'verifyOTP'])->name('otp.verify');
Route::post('/user/reset-password/new-password', [ResetPasswordController::class, 'newPassword'])->name('password.new');


Route::middleware('user')->group(function () {

    Route::get('/presensi', function () {
        $title = "Presensi";
        return view('presensi.presensiharian', compact('title'));
    });
    Route::get('/adminbeforepayment', function () {
        return view('adminbeforepayment');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
});

// === Super Admin ===
Route::get('/superAdmin/login', [LoginController::class, 'loginsuperadmin'])->name('login.superadmin');
// function () {
//     return view('superAdmin.Login');
// })->name('login.superadmin');
Route::post('/superAdmin/login', [LoginController::class, 'ValidateLogin'])->name('login.superadmin');

Route::get('/superAdmin/login/reset', function () {
    return view('superAdmin.ResetPassword');
});
Route::get('/superAdmin/login/OTP', function () {
    return view('superAdmin.InputOTP');
});
Route::get('/superAdmin/login/newPass', function () {
    return view('superAdmin.NewPassword');
});

Route::post('/superAdmin/login/reset', [ResetPasswordSuperAdminController::class, 'resetPassword'])->name('password.resetSuperAdmin');
Route::post('/superAdmin/login/OTP', [ResetPasswordSuperAdminController::class, 'verifyOTP'])->name('otp.verifySuperAdmin');
Route::post('/superAdmin/login/newPass', [ResetPasswordSuperAdminController::class, 'newPassword'])->name('password.newSuperAdmin');

Route::get('/superAdmin', [SuperadminSistemController::class, 'dashboard'])->name('superAdmin.dashboard');
Route::get('/superAdmin/editProfil', [SuperadminSistemController::class, 'editProfile'])->name('superAdmin.editProfile');
Route::patch('/superAdmin/editProfil/{username}', [SuperadminSistemController::class, 'updateProfile'])->name('superAdmin.updateProfile');
Route::patch('/superAdmin/editFoto/{username}', [SuperadminSistemController::class, 'updateFoto'])->name('superAdmin.updateFoto');
Route::delete('/superAdmin/langganan/fotoProfil/{username}', [SuperadminSistemController::class, 'deleteFoto'])->name('superAdmin.deleteFoto');
Route::get('/superAdmin/dataAdmin', [SuperadminSistemController::class, 'dataAdmin'])->name('superAdmin.dataAdmin');
Route::post('/superAdmin/dataAdmin/add', [SuperadminSistemController::class, 'addAdmin'])->name('superAdmin.addAdmin');
Route::get('/superAdmin/dataAdmin/showAlertEdit/{adminId}', [SuperadminSistemController::class, 'showAlertEditAdmin'])->name('superAdmin.showAlertEdit');
Route::patch('/superAdmin/dataAdmin/update/{username}', [SuperadminSistemController::class, 'updateAdmin'])->name('superAdmin.updateAdmin');
Route::delete('/superAdmin/dataAdmin/delete/{username}', [SuperadminSistemController::class, 'deleteAdmin'])->name('superAdmin.deleteAdmin');
Route::get('/superAdmin/langganan', [SuperadminSistemController::class, 'langganan'])->name('superAdmin.langganan');
Route::get('/superAdmin/langganan/showAlertEdit/{id}', [SuperadminSistemController::class, 'showAlertEditLangganan'])->name('superAdmin.showAlertEditLangganan');
Route::patch('/superAdmin/langganan/update/{id}', [SuperadminSistemController::class, 'updateLangganan'])->name('superAdmin.updateLangganan');
Route::delete('/superAdmin/langganan/delete/{id}', [SuperadminSistemController::class, 'deleteLangganan'])->name('superAdmin.deleteLangganan');

// Mitra Team Aktif
Route::get('/mitra-teamAktif', [MitraTeamAktifController::class, 'teamAktif'])->name('mitra-teamAktif');
Route::get('/mitra-seeAllTeam', [MitraTeamAktifController::class, 'seeAllTeam'])->name('mitra-seeAllTeam');
Route::get('/mitra-profileTeam/{username}', [MitraTeamAktifController::class, 'profileMahasiswa'])->name('mitra-profileMahasiswa');
Route::get('/mitra-anggotaTeam/{divisi}', [MitraTeamAktifController::class, 'anggotaTeam'])->name('mitra-anggotaTeam');


//Landing Page
// -Daftar Sekolah-
Route::get('/register', [LandingPageController::class, 'index'])->name('register-landingpage');
Route::post('/register', [LandingPageController::class, 'lpdaftar'])->name('register-landingpage');

// -Login-
Route::get('/loginpage', [LandingPageController::class, 'viewlogin'])->name('login');
Route::post('/loginpage', [LandingPageController::class, 'loginpage'])->name('login');

// Route::get('/loginpage', [AuthController::class, 'index'])->name('login');
// Route::post('/loginpage', [AuthController::class, 'login'])->name('login');

//login as contributor univ
Route::get('/logincontributor', [AuthController::class, 'index'])->name('login');
Route::post('/logincontributor', [AuthController::class, 'login'])->name('login');
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard']);
});

//login contributor mitra
Route::get('/loginmitra', [LoginController::class, 'loginmitra']);
Route::post('/loginmitra', [LoginController::class, 'ValidateLogin']);
Route::get('/contributorformitra-dashboard', [ContributorForMitra::class, 'filterMahasiswa']);

//login afterpayment
Route::get('/AdminUniv-Login', function () {
    return view('adminUniv-afterPayment.AdminUniv-Login');
})->name('login.admin');
Route::post('/AdminUniv-Login', [LoginController::class, 'ValidateLogin'])->name('login.admin');
Route::get('/AdminUniv-Logout', [LoginController::class, 'logoutAdminUniv'])->name('logout.admin');



Route::get('/reset-password', [ResetPasswordController::class, 'index'])->name('reset');



// Route::get('/dashboard-admin', function () {
//     return view('dashboard.dashboard-admin', ['title' => 'Admin']);
// });
// Route::get('/dashboard-admin', [DashboardController::class, 'dashboardAdmin'])->name('dashboard-admin');


Route::get('/checkout/bronze', [CheckoutController::class, 'userCheckoutBronze']);
Route::get('/checkout/silver', [CheckoutController::class, 'userCheckoutSilver']);
Route::get('/checkout/gold', [CheckoutController::class, 'userCheckoutGold']);
Route::get('/checkout/platinum', [CheckoutController::class, 'userCheckoutPlatinum']);

Route::get('/after-checkout', function () {
    return view('checkout.after-checkout', ['title' => "After Checkout"]);
});
Route::get('/invoice', function () {
    return view('checkout.invoice', ['title' => "Invoice"]);
});
Route::get('/slip', function () {
    return view('checkout.slip-pembayaran', ['title' => "Slip Pembayaran"]);
});

Route::get('/adminbeforepayment', function () {
    return view('adminbeforepayment');
});
Route::get('/adminafterpayment', function () {
    return view('mitra.adminafterpayment');
});

//user

Route::get('/user/register', function () {
    return view('user.register', ['title' => "Register"]);
});
Route::get('/user/resetPassword', function () {
    return view('user.reset', ['title' => "Reset Password"]);
});
Route::get('/user/reset-password/otp', function () {
    return view('user.otp', ['title' => "Reset Password - OTP"]);
});
Route::get('/user/reset-password/new-password', function () {
    return view('user.newPassword', ['title' => "Reset Password - New Password"]);
});
Route::get('/user/reset-password/confirm', function () {
    return view('user.confirm', ['title' => "Reset Password - Confirm"]);
});


Route::get('/user/home', function () {
    return view('user.home', ['title' => "Home"]);
});

Route::get('/user', function () {
    return view('user.home', [
        'title' => "Home",
        'nama' => "Syalita Widyandini",
        'divisi' =>  "MJ/UIUX/POLINES/AGST 2023/06"
    ]);
});
Route::get('/user/barcode', function () {
    return view('user.barcode', [
        'title' => "Barcode Pemagang",
        'nama' => "Syalita"
    ]);
});


//user
// Route::get('/pemagang/home', function () {
//     return view('pemagang.home', [
//         'title' => "Home"
//     ]);
// });

Route::get('/user/barcode', function () {
    return view('user.barcode', [
        'title' => "Barcode Pemagang",
        'nama' => "Syalita"
    ]);
});


//user
Route::get('/pemagang/home', function () {
    return view('pemagang.home', ['title' => "Home"]);
});

Route::get('/pemagang/MyQR', function () {
    return view('pemagang.myqr', ['title' => "MyQR"]);
});


//contributor for univ
Route::get('/dashboard', [SchoolController::class, 'index'])->name('dashboard.mahasiswa');
Route::get('/jumlah-mahasiswa', [SchoolController::class, 'jumlahMahasiswa'])->name('jml_mahasiswa');
Route::get('/profil-siswa/{id}', [SchoolController::class, 'Lihatprofil'])->name('detail-profil-siswa');

Route::get('/laporandatapresensi', function () {
    return view('presensi.laporandatapresensi');
});

Route::get('/datapresensisiswa/{id}', [ContributorUnivController::class, 'DataPresensiSiswa'])->name('contributor.datapresensi');

Route::get('/presensi-contributor-univ', [ContributorUnivController::class, 'DataPresensi']);
// return view('presensi.presensiharian')->name('presensi.con');

//penilaian mahasiswa-contributor for univ
Route::get('/penilaianMahasiswa', [SchoolController::class, 'datamhs'])->name('penilaian-siswa.penilaianMahasiswa');
Route::get('/lihat/{id}', [SchoolController::class, 'lihatPenilaian'])->name('penilaian');
// function () {
//     return view('template.contributingforunivschool.lihat');
// });

//penilaian mahasiswa-contributor mitra
Route::delete('/delete-division/{id}',[BEControllerAdminUnivAfterPaymentController::class,'hapusDivisi']);
Route::get('/kategoripenilaian/{id}', [BEControllerAdminUnivAfterPaymentController::class,'showKategoriPenilaian']);
Route::post('/kategoripenilaian/{divisi_id}/tambah',[BEControllerAdminUnivAfterPaymentController::class, 'addKategoriPenilaian'])->name('tambahKategori');
Route::post('/kategoripenilaian/{divisi_id}/{kategori_id}/tambah-sub', [BEControllerAdminUnivAfterPaymentController::class, 'addSubKategoriPenilaian'])->name('tambahSubKategori');

Route::get('/penilaian-mahasiswa', [PenilaianMitraController::class, 'showPenilaianSiswa'])->name('penilaian-mahasiswa');

Route::get('/input-nilai', function () {
    return view('penilaian-siswa.input-nilai');
});
Route::get('/pengaturan-contri', function () {
    return view('pengaturan.margepenilaiandivisi');
});
Route::post('/kategoripenilaian', function () {
    return view('pengaturan.kategoripenilaian');
});

Route::get('/input-nilai', function () {
    return view('penilaian-siswa.input-nilai');
})->name('input-nilaimhs');


Route::get('/MitraPresensiDetailHadir', function () {
    return view('user.ContributorForMitra.MitraPresensiDetailHadir');
});


Route::get('/manage-devisi', function () {
    $title = "Pengaturan";
    return view('manage_devisi', compact('title'));
});

Route::get('/manage-shift', function () {
    $title = "Pengaturan";
    return view('mitra-pengaturan.manage-shift', compact('title'));
});

Route::get('/Kategori-penilaian', function () {
    return view('mitra-pengaturan.Kategori-penilaian', ['title' => 'penilaian']);
});




Route::get('/MitraPresensiDetailIzin', function () {
    return view('user.ContributorForMitra.MitraPresensiDetailIzin');
});
Route::get('/MitraPresensiDetailTidakHadir', function () {
    return view('user.ContributorForMitra.MitraPresensiDetailTidakHadir');
});


Route::get('/manage-devisi', function () {
    return view('mitra-pengaturan.manage-devisi');
});

// Route::get('/manage-shift', function () {
//     return view('mitra-pengaturan.manage-shift');
// });

Route::get('/pengaturan', function () {
    return view('pengaturan.margepenilaiandivisi');
});

Route::get('/pemagang/MyQR', function () {
    return view('pemagang.myqr', ['title' => "MyQR"]);
});
Route::get('/pemagang/detail', function () {
    return view('pemagang.gantiJam', ['title' => "MyQR"]);
});

Route::get('/laporandatapresensi', function () {
    return view('presensi.laporandatapresensi');
});
Route::get('/datapresensisiswa', function () {
    return view('presensi.datapresensisiswa');
});


Route::get('/presensi', function () {
    return view('presensi.presensiharian');
});
Route::get('/presensihadir', function () {
    return view('presensi.presensihadir');
});
Route::get('/presensiizin', function () {
    return view('presensi.presensiizin');
});
Route::get('/presensitidakhadir', function () {
    return view('presensi.presensitidakhadir');
});



Route::get('/MitraPresensiDetailHadir', function () {
    return view('user.ContributorForMitra.MitraPresensiDetailHadir');
});


Route::get('/manage-devisi', function () {
    return view('mitra-pengaturan.manage-devisi');
});

Route::get('/manage-shift', function () {
    return view('mitra-pengaturan.manage-shift');
});

Route::get('/Kategori-penilaian', function () {
    return view('mitra-pengaturan.Kategori-penilaian');
});




Route::get('/MitraPresensiDetailIzin', function () {
    return view('user.ContributorForMitra.MitraPresensiDetailIzin');
});
Route::get('/MitraPresensiDetailTidakHadir', function () {
    return view('user.ContributorForMitra.MitraPresensiDetailTidakHadir');
});




Route::get('/manage-devisi', function () {
    return view('mitra-pengaturan.manage-devisi');
});

Route::get('/manage-shift', function () {
    return view('mitra-pengaturan.manage-shift');
});

Route::get('/pengaturan', function () {
    return view('pengaturan.margepenilaiandivisi');
});




// adminUniv-beforePayment
Route::get('/AdminUniv-dashboardBeforePayment', function () {
    return view('user.AdminUnivBeforePayment.AdminPaket');
});

// adminUniv-afterPayment

Route::get('/AdminUniv-ResetPassword', function () {
    return view('adminUniv-afterPayment.AdminUniv-ResetPassword');
});

Route::get('/AdminUniv-InputOTP', function () {
    return view('adminUniv-afterPayment.AdminUniv-InputOTP');
});

Route::get('/AdminUniv-InputNewPassword', function () {
    return view('adminUniv-afterPayment.AdminUniv-InputNewPassword');
});
Route::post('/AdminUniv-ResetPassword', [ResetPasswordAdminController::class, 'resetPassword'])->name('password.resetAdmin');
Route::post('/AdminUniv-InputOTP', [ResetPasswordAdminController::class, 'verifyOTP'])->name('otp.verifyAdmin');
Route::post('/AdminUniv-InputNewPassword', [ResetPasswordAdminController::class, 'newPassword'])->name('password.newAdmin');


Route::get('/AdminUniv-Dashboard', [BEControllerAdminUnivAfterPaymentController::class, 'index'])->name('adminUniv.dashboard');

Route::get('/mitra-adminunivmitra', [BEControllerAdminUnivAfterPaymentController::class, 'adminUnivMitra'])->name('adminUniv.mitra');

Route::get('/AdminUniv-EditProfile', [BEControllerAdminUnivAfterPaymentController::class, 'detailAdminProfile'])->name('adminUniv.editProfile');

Route::post('/AdminUniv-EditProfile', [BEControllerAdminUnivAfterPaymentController::class, 'updateAdminProfile'])->name('adminUniv.updateProfile');

Route::get('/mitra-laporanpresensi', function () {
    return view('adminUniv-afterPayment.mitra.laporanpresensi');
});
Route::get('/AdminUniv-mitra-laporanpresensi', [BEControllerAdminUnivAfterPaymentController::class, 'laporanDataPresensi']);
Route::get('/AdminUniv-mitra-laporanpresensi-detaihadir/{id}', [BEControllerAdminUnivAfterPaymentController::class, 'teamAktifDetailHadir'])->name('adminUniv.detailHadir');

Route::get('/AdminUniv-mitra-laporanpresensi-detailizin/{id}', [BEControllerAdminUnivAfterPaymentController::class, 'teamAktifDetailIzin'])->name('adminUniv.detailIzin');
Route::get('/AdminUniv-mitra-laporanpresensi-detailtidakhadir', function () {
    return view('adminUniv-afterPayment.mitra.laporandetailtidakhadir');
});
Route::get('/AdminUniv-mitra-laporanpresensi-detailtidakhadir/{id}', [BEControllerAdminUnivAfterPaymentController::class, 'teamAktifDetailTidakHadir'])->name('adminUniv.detailTidakHadir');

Route::get('/AdminUniv/Option-TeamAktif/{id}', [BEControllerAdminUnivAfterPaymentController::class, 'daftarMitraTeamAktif'])->name('adminUniv.Divisi');

Route::get('AdminUniv/Option-TeamAktif-pengaturanDivisi/{id}', [BEControllerAdminUnivAfterPaymentController::class, 'daftarMitraPengaturanDivisi'])->name('adminUniv.pengaturanDivisi');
Route::post('AdminUniv/Option-TeamAktif-pengaturanDivisi', [BEControllerAdminUnivAfterPaymentController::class, 'addDivisi'])->name('adminUniv.addDivisi');
Route::post('AdminUniv/Option-TeamAktif-pengaturanDivisi/{id}', [BEControllerAdminUnivAfterPaymentController::class, 'updateDivisi'])->name('adminUniv.updateDivisi');
Route::delete('AdminUniv/Option-TeamAktif-pengaturanDivisi/{id}', [BEControllerAdminUnivAfterPaymentController::class, 'destroyDivisi'])->name('adminUniv.destroyDivisi');

Route::get('/TeamAktif-kategoripenilaian-UiuX', function () {
    return view('adminUniv-afterPayment.mitra.TeamAktif-kategoripenilaian-UiuX');
});
Route::get('/AdminUniv/OptionTeamAktif-detail/{id}', [BEControllerAdminUnivAfterPaymentController::class, 'teamAktifKlik'])->name('adminUniv.option.teamAktif'); // jangan dihapus lah ini, ngapain kau hapus
Route::get('/AdminUniv/editProfil/{id}', [BEControllerAdminUnivAfterPaymentController::class, 'teamAktifEdit'])->name('adminUniv.editUser');
Route::post('/AdminUniv/editProfil/{id}', [BEControllerAdminUnivAfterPaymentController::class, 'teamAktifEditPost'])->name('adminUniv.editUserPost');

Route::get('/AdminUniv/setting/user', function () {
    $users = [
        ['id' => 1, 'nama' => "Guru1", 'username' => 'usernameguru1', "privilege" => ["Manage Kategori Penilaian", "Lihat Penilaian"], 'role' => "Guru"],
        ['id' => 2, 'nama' => "Mitra1", 'username' => 'usernamemitra1', "privilege" => ["Input Nilai", "Accept/Reject Log Activity", "Manage Devisi"], 'role' => "Mitra"],
        ['id' => 3, 'nama' => "Guru2", 'username' => 'usernameguru2', "privilege" => ["Manage Kategori Penilaian", "Lihat Penilaian"], 'role' => "Guru"],
        ['id' => 4, 'nama' => "Mitra2", 'username' => 'usernamemitra2', "privilege" => ["Input Nilai", "Accept/Reject Log Activity"], 'role' => "Mitra"],
        ['id' => 5, 'nama' => "Guru3", 'username' => 'usernameguru3', "privilege" => ["Manage Kategori Penilaian"], 'role' => "Guru"],
        ['id' => 6, 'nama' => "Mitra3", 'username' => 'usernamemitra3', "privilege" => ["Input Nilai", "Manage Devisi"], 'role' => "Mitra"],
    ];

    $mhs = [
        ['nim' => '647825343329', 'nama' => 'Rudi', 'prodi' => 'TI'],
        ['nim' => '647825343330', 'nama' => 'Almi', 'prodi' => 'TI'],
        ['nim' => '647825343331', 'nama' => 'Jaka', 'prodi' => 'TI'],
        ['nim' => '647825343332', 'nama' => 'Yessa Khoirunissa', 'prodi' => 'TI'],
        ['nim' => '647825343333', 'nama' => 'Febrian Adipurnowo', 'prodi' => 'TI'],
    ];
    return view('AdminUniv-afterPayment.AdminUniv-User', [
        'title' => "Admin - User & Organization",
        'users' => $users,
    ]);
});


Route::get('/pengaturan', function () {
    return view('pengaturan.margepenilaiandivisi');
});


Route::get('/Option-TeamAktif-SeeAllTeams', [BEControllerAdminUnivAfterPaymentController::class, 'teamAktifSeeAllTeam'])->name('adminUniv.option.seeAllTeams');

Route::get('/profilSiswa', function () {
    return view('adminUniv-afterPayment.mitra.profilSiswa');
});


Route::get('/datasiswa', function () {
    return view('adminUniv-afterPayment.dataSiswa');
});
Route::get('/profilsiswa', function () {
    return view('adminUniv-afterPayment.profilSiswa');
});
Route::get('/profilsiswa/{id}', [BEControllerAdminUnivAfterPaymentController::class, 'teamAktifSuntingTeam'])->name('adminUniv.profilSiswa');

Route::get('/pengaturan', function () {
    return view('pengaturan.margepenilaiandivisi');
});

Route::get('/AdminUniv/CheckoutBronze', [CheckoutController::class, 'CheckoutBronze'])->name('checkout.bronze.adminUniv');
Route::post('/checkoutBronze', [CheckoutController::class, 'checkoutBronzePost'])->name('checkout.bronze.adminUnivPost');


//USER ADMIN SISTEM/LOKASI (SEVEN INC)
Route::get('/AdminSistem-Dashboard', [AdminSistemDashboardController::class, 'dashboard']);

Route::get('/AdminSistem-Editprofile', [AdminSistemDashboardController::class, 'editProfile'])->name('userAdmin.editProfile');
Route::put('/AdminSistem/updateProfile', [AdminSistemDashboardController::class, 'updateProfile'])->name('userAdmin.updateProfile');
Route::post('/AdminSistem/updateFoto/{id}', [AdminSistemDashboardController::class, 'updateFoto'])->name('userAdmin.updateFoto')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::delete('/AdminSistem/deleteFoto/{id}', [AdminSistemDashboardController::class, 'deleteFoto'])->name('userAdmin.deleteFoto');

Route::get('/AdminSistem-Subcription', [UserAdminSistemController::class, 'IndexSubscription'])->name('subscriptions.index');
Route::put('/AdminSistem-Subcription/{id}/update', [UserAdminSistemController::class, 'updateSubs'])->name('subscriptions.updateSubs');
Route::delete('/AdminSistem-Subcription/{id}/delete', [UserAdminSistemController::class, 'deleteSubs'])->name('subscriptions.deleteSubs');

Route::get('/AdminSistem-login', [LoginController::class, 'loginadminSistem'])->name('login.adminsistem');
Route::get('/AdminSistem/logout-sistemlokasi', [LoginController::class, 'logoutSistemLokasi'])->name('logout.sistemlokasi');


Route::get('/user/barcode', function () {
    return view('user.barcode', [
        'title' => "Barcode Pemagang",
        'nama' => "Syalita"
    ]);
});



//user
Route::middleware('auth')->group(function () {
    Route::get('/user', function () {
        $mitra = Mitra::pluck('nama_mitra', 'id');
        $divisi = Divisi::pluck('nama_divisi', 'id');
        $user = Auth::user();
        $nama_divisi = Divisi::where('id', $user->divisi_id)->first();
        $nama_sekolah = Sekolah::where('id', $user->sekolah)->first();
        $quote = Quotes::inRandomOrder()->first();
        $today = date('F Y/d');
        return view('user.home', [
            'title' => "Home",
            'mitra' => $mitra,
            'divisi' => $divisi,
            'today' => $today,
            'user' => $user,
            'nama_divisi' => $nama_divisi,
            'nama_sekolah' => $nama_sekolah,
            'quote' => $quote,
        ]);
    });
    Route::get('/pemagang/home/{id}', [HomeMitraController::class, 'profil']);
    // Home Mitra User
    Route::get('/profil/{id}', [HomeMitraController::class, 'profil'])->name('profil');
    Route::post('/mitra/{id}', [HomeMitraController::class, 'pilihMitra'])->name('pilihMitra');
    Route::get('/pemagang/MyQR/{id}', [HomeMitraController::class, 'generateQRCode'])->name('scan-barcode');
    Route::post('/jamMasuk/{id}', [HomeMitraController::class, 'jamMasuk'])->name('jamMasuk');
    Route::post('/jamMulaiIstirahat/{id}', [HomeMitraController::class, 'jamMulaiIstirahat'])->name('jamMulaiIstirahat');
    Route::post('/jamSelesaiIstirahat/{id}', [HomeMitraController::class, 'jamSelesaiIstirahat'])->name('jamSelesaiIstirahat');
    Route::post('/jamPulang/{id}', [HomeMitraController::class, 'jamPulang'])->name('jamPulang');
    Route::post('/catatIzin/{id}', [HomeMitraController::class, 'catatIzin'])->name('catatIzin');
    Route::get('/pemagang/detail/{id}', [HomeMitraController::class, 'ijin']);
    Route::post('/kebaikan/{id}', [HomeMitraController::class, 'kebaikan'])->name('kebaikan');
    Route::post('/catatLogAktivity/{id}', [HomeMitraController::class, 'catatLogAktivity'])->name('catatLogAktivity');
});

Route::get('/presensi', function () {
    return view('presensi.presensiharian');
});
Route::get('/presensihadir', function () {
    return view('presensi.presensihadir');
});
Route::get('/presensiizin', function () {
    return view('presensi.presensiizin');
});
Route::get('/presensitidakhadir', function () {
    return view('presensi.presensitidakhadir');
});


// Route::get('/penilaianMahasiswa', [MahasiswaController::class, 'show'])->name('penilaian-siswa.penilaianMahasiswa');

// Route::get('/penilaian-mahasiswa', [MahasiswaController::class, 'penilaian_siswa'])->name('penilaian-siswa.penilaian-mahasiswa');

Route::get('/input-nilai/{id}', [ContributorForMitra::class, 'InputNilai'])->name('contributorformitra.input-nilai');
Route::post('/input-nilai/{id}', [ContributorForMitra::class, 'inputNilaiPost'])->name('mitra.inputNilai');



// contributor for mitra
Route::get('/MitraPresensiDetailHadir', function () {
    return view('user.ContributorForMitra.MitraPresensiDetailHadir');
});

Route::get('/MitraPresensiDetailIzin', function () {
    return view('user.ContributorForMitra.MitraPresensiDetailIzin');
});
Route::get('/MitraPresensiDetailTidakHadir', function () {
    return view('user.ContributorForMitra.MitraPresensiDetailTidakHadir');
});

Route::get('/MitraPresensi', function () {
    return view('user.ContributorForMitra.MitraPresensi');
});

Route::get('/datapresensi', function () {
    return view('user.ContributorForMitra.datapresensi');
});


Route::get('/laporanpresensi', function () {
    return view('user.ContributorForMitra.laporanpresensi');
});


// Contributor for Mitra - Presensi
Route::get('/daftar-presensi', [PresensiMitraController::class, 'getAllPresensi'])->name('daftar-presensi');
Route::get('/datapresensi/{nama_lengkap}', [PresensiMitraController::class, 'getPresensiByNama'])->name('presensi-by-name');
Route::post('/presensi/accept', [PresensiMitraController::class, 'presensiAccept'])->name('presensi-accept');
Route::put('/presensi/reject', [PresensiMitraController::class, 'presensiReject'])->name('presensi-reject');
Route::put('/presensi/accept-all', [PresensiMitraController::class, 'presensiAcceptAll'])->name('presensi-accept-all');
Route::get('/cetak-presensi-pdf/{nama_lengkap}', [PresensiMitraController::class, 'getPresensiPDF'])->name('cetak.presensi');





Route::get('/manage-devisi', function () {
    return view('mitra-pengaturan.manage-devisi');
});

// Route::get('/manage-shift', function () {
//     return view('mitra-pengaturan.manage-shift');
// });

Route::get('/Kategori-penilaian', function () {
    return view('mitra-pengaturan.Kategori-penilaian');
});



Route::get('/mitra-daftarmitra', function () {
    return view('adminUniv-afterPayment.mitra.daftarmitra');
});

Route::get('/mitra-pengaturpersensi', function () {
    return view('adminUniv-afterPayment.mitra.pengaturpersensi');
});

Route::get('/mitra-optionpresensi', function () {
    return view('adminUniv-afterPayment.mitra.optionpresensi');
});

Route::get('/mitra-detailprofil', function () {
    return view('adminUniv-afterPayment.mitra.detailprofil');
});

// CONTRIBUTOR FOR MITRA PRESENSI
Route::get('/mitra/laporanpresensi', [ContributorForMitra::class, 'laporanPresensi']);
Route::get('/mitra-laporanpresensi-detailhadir', function () {
    return view('user.ContributorForMitra.MitraPresensiDetailHadir');
});

Route::get('/mitra-laporanpresensi-detailhadir/{id}', [ContributorForMitra::class, 'laporanPresensiDetailHadir'])->name('cont.mitrapresensi');
Route::get('/mitra-laporanpresensi-detailizin/{nama_lengkap}', [ContributorForMitra::class, 'laporanPresensiDetailIzin'])->name('cont.mitrapresensi.detailizin');
Route::get('/mitra-laporanpresensi-detailtidakhadir/{nama_lengkap}', [ContributorForMitra::class, 'laporanPresensiDetailTidakHadir'])->name('cont.mitrapresensi.detailtidakhadir');


// barcode presensi
Route::get('/mitra-presensi-barcode/masuk', function () {
    return view('User.ContributorForMitra.barcode_jam-masuk', [
        'title' => "Barcode Pemagang",
        'nama' => "Naufal",
        'presensi' => Presensi::all(),
    ]);
});


Route::post('/mitra-presensi-barcode/jam-masuk', [ContributorForMitra::class, 'jam_masuk'])->name('barcode.store');

Route::get('/mitra-presensi-barcode/istirahat', [ContributorForMitra::class, 'view_jam_mulai_istirahat'])->name('barcode.jamMasuk');
Route::post('/mitra-presensi-barcode/jam-mulai-istirahat', [ContributorForMitra::class, 'jam_mulai_istirahat'])->name('barcode.jam-mulai-istirahat');
Route::get('/mitra-presensi-barcode/selesai-istirahat', [ContributorForMitra::class, 'view_jam_selesai_istirahat']);
Route::post('/mitra-presensi-barcode/jam-selesai-istirahat', [ContributorForMitra::class, 'jam_selesai_istirahat'])->name('barcode.jam-selesai-istirahat');

Route::get('/mitra-presensi-barcode/pulang', [ContributorForMitra::class, 'view_jam_pulang'])->name('barcode.jam-pulang');
Route::post('/mitra-presensi-barcode/jam-pulang', [ContributorForMitra::class, 'jam_pulang'])->name('barcode.jam-pulang');
Route::get('/mitra-presensi-barcode/selesai', [ContributorForMitra::class, 'view_jam_pulang_selesai']);

// ganti jam
Route::get('/mitra-presensi-barcode/ganti-jam-masuk', function () {
    return view('User.ContributorForMitra.barcode_ganti-jam-masuk', [
        'title' => "Barcode Pemagang",
        'nama' => "Naufal",
        'presensi' => Presensi::all(),
    ]);
});
// Route::get('/mitra-presensi-barcode/pulang', function () {
//     $presensi = Presensi::all();

//     // Ambil data presensi terbaru
//     $latestPresensi = Presensi::latest()->first();
//     $pulang = strtotime($latestPresensi->jam_pulang);
//     $masuk = strtotime($latestPresensi->jam_masuk);

//     // Hitung selisih waktu
//     $diffInSeconds = $pulang - $masuk;

//     // Ubah selisih waktu ke dalam format jam:menit:detik
//     $totalHours = floor($diffInSeconds / 3600);
//     $totalMinutes = floor(($diffInSeconds - ($totalHours * 3600)) / 60);
//     $totalSeconds = $diffInSeconds - ($totalHours * 3600) - ($totalMinutes * 60);

//     $total = sprintf('%02d:%02d:%02d', $totalHours, $totalMinutes, $totalSeconds);

//     return view('User.ContributorForMitra.barcode_jam-pulang', [
//         'title' => "Barcode Pemagang",
//         'nama' => "Naufal",
//         'presensi' => $presensi,
//         'total' => $total
//     ]);
// });











Route::get('/pengaturan', function () {
    return view('pengaturan.margepenilaiandivisi');
});


Route::get('/pengaturan', [BEControllerAdminUnivAfterPaymentController::class, 'daftarMitraPengaturanDivisi'])->name('adminUniv.kategoriPenilaian');
// Route::get('/kategoripenilaian', [BEControllerAdminUnivAfterPaymentController::class, 'showKategoriPenilaian'])->name('adminUniv.kategoriPenilaian');



Route::get('/UserScanQRDefault', function () {
    return view('user.UserScanQR.Home-Default');
});

// Route::get('/AdminUniv/setting/quotes', function () {
//     $quotes = [
//         ['id' => 1, 'quotes' => "Change your life now for better future"],
//         ['id' => 2, 'quotes' => "Jujur terlalu tertanam di dalam hati"],
//         ['id' => 3, 'quotes' => "Aku jujur dan disiplin"],
//         ['id' => 4, 'quotes' => "Aku selalu mengembangkan potensiku"],
//         ['id' => 5, 'quotes' => "Aku selalu melakukan yang terbaik"],
//         ['id' => 6, 'quotes' => "Rasa malas adalah musuhku"],
//         ['id' => 7, 'quotes' => "Hari ini harus lebih baik dari kemarin"],
//         ['id' => 8, 'quotes' => "Tidak ada kata menyerah dalam hidupku"]
//     ];
//     return view('adminUniv-afterPayment.AdminUniv-Quotes', [
//         'title' => "Admin - Setting Jam & Quotes",
//         'quotes' => $quotes
//     ]);
// });

Route::get('/AdminUniv/setting/quotes', [AdminSettingJamQuotesController::class, 'quotes'])->name('admin-setting.quotes');
Route::post('/AdminUniv/setting/quotes/store', [AdminSettingJamQuotesController::class, 'quotesStore'])->name('admin-setting.quotes-store');
Route::delete('/AdminUniv/setting/quotes/delete/{id}', [AdminSettingJamQuotesController::class, 'quotesDelete'])->name('admin-setting.quotes-delete');
Route::patch('/AdminUniv/setting/quotes/update_quotes_ulangtahun/{id}', [AdminSettingJamQuotesController::class, 'quotes_ulangtahun_update'])->name('admin-setting.quotes-ulangtahun-update');

Route::get('/admin/setting/user', function () {
    $users = [
        ['id' => 1, 'nama' => "Guru1", 'username' => 'usernameguru1', "privilege" => ["Manage Kategori Penilaian", "Lihat Penilaian"], 'role' => "Guru"],
        ['id' => 2, 'nama' => "Mitra1", 'username' => 'usernamemitra1', "privilege" => ["Input Nilai", "Accept/Reject Log Activity", "Manage Devisi"], 'role' => "Mitra"],
        ['id' => 3, 'nama' => "Guru2", 'username' => 'usernameguru2', "privilege" => ["Manage Kategori Penilaian", "Lihat Penilaian"], 'role' => "Guru"],
        ['id' => 4, 'nama' => "Mitra2", 'username' => 'usernamemitra2', "privilege" => ["Input Nilai", "Accept/Reject Log Activity"], 'role' => "Mitra"],
        ['id' => 5, 'nama' => "Guru3", 'username' => 'usernameguru3', "privilege" => ["Manage Kategori Penilaian"], 'role' => "Guru"],
        ['id' => 6, 'nama' => "Mitra3", 'username' => 'usernamemitra3', "privilege" => ["Input Nilai", "Manage Devisi"], 'role' => "Mitra"],
    ];

    $mhs = [
        ['nim' => '647825343329', 'nama' => 'Rudi', 'prodi' => 'TI'],
        ['nim' => '647825343330', 'nama' => 'Almi', 'prodi' => 'TI'],
        ['nim' => '647825343331', 'nama' => 'Jaka', 'prodi' => 'TI'],
        ['nim' => '647825343332', 'nama' => 'Yessa Khoirunissa', 'prodi' => 'TI'],
        ['nim' => '647825343333', 'nama' => 'Febrian Adipurnowo', 'prodi' => 'TI'],
    ];
    return view('admin.setting.user', [
        'title' => "Admin - User & Organization",
        'users' => $users,
    ]);
});

Route::get('/', function () {
    return view('landing-page.index', ['title' => 'Controlling Magang']);
});

Route::get('/AdminPaket', [BEControllerAdminUnivAfterPaymentController::class, 'adminPaket']);

// Route::get('/CheckoutBronze', function () {
//     return view('user.AdminUnivAfterPayment.CheckoutBronze');
// });

Route::get('/CheckoutSilver', function () {
    return view('user.AdminUnivAfterPayment.CheckoutSilver');
});

Route::get('/CheckoutGold', function () {
    return view('user.AdminUnivAfterPayment.CheckoutGold');
});

Route::get('/CheckoutPlatinum', function () {
    return view('user.AdminUnivAfterPayment.CheckoutPlatinum');
});


Route::get('/RiwayatJangkaWaktu', [BEControllerAdminUnivAfterPaymentController::class, 'JangkaWaktu']);

Route::get('/RiwayatPembelian', [BEControllerAdminUnivAfterPaymentController::class, 'RiwayatPembelian']);


Route::get('/', function () {
    return view('landing-page.index', ['title' => 'Controlling Magang']);
});

Route::get('/contributorformitra-editprofile', [ContributorForMitra::class, 'editProfile'])->name('contributorformitra.editProfile');
Route::put('/contributorformitra/updateProfile', [ContributorForMitra::class, 'updateProfile'])->name('contributorformitra.updateProfile');
Route::post('/contributorformitra/updateFoto/{id}', [ContributorForMitra::class, 'updateFoto'])->name('contributorformitra.updateFoto')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::delete('/contributorformitra-deleteFoto/{id}', [ContributorForMitra::class, 'deleteFoto'])->name('contributorformitra.deleteFoto');

//Route::get('/contributorformitra-editprofile', [ContributorForMitra::class, 'edit'])->name('contributorformitra.editprofile');
//Route::put('/contributorformitra-update/{$id}', [ContributorForMitra::class, 'update'])->name('contributorformitra.update');
//Route::put('/contributorformitra-profile/{$id}', [ContributorForMitra::class, 'Profile'])->name('contributorformitra.profile');

Route::get('/contributorformitra-devisi', function () {
    return view('contributorformitra.devisi');
});
Route::get('/contributorformitra-devisi-Seeallteams', function () {
    return view('contributorformitra.devisi-Seeallteams');
});

Route::get('/contributorformitra-devisi-LihatProfil', function () {
    return view('contributorformitra.Lihat-Profil-Mahasiswa');
});

Route::get('/contributorformitra-devisi-teamaktif', function () {
    return view('contributorformitra.teamaktifanggota');
});
Route::get('/contributorformitra-penilaian', function () {
    return view('contributorformitra.teamaktifanggota');
});

Route::get('/contributorformitra-penilaian-mahasiswa', [ContributorForMitra::class, 'show_mhs']);

Route::get('/presensiCoba', [PresensiCobaController::class, 'index']);
Route::post('/presensi/masuk', [PresensiCobaController::class, 'jamMasuk'])->name('presensi.jamMasuk');
Route::get('/presensi/keluar', [PresensiCobaController::class, 'keluar'])->name('presensi.keluar');
Route::post('/presensi/keluar', [PresensiCobaController::class, 'jamKeluar'])->name('presensi.keluar');


Route::get('/UserPresensi', function () {
    return view('mitra_presensi.scanpresensiharian');
});

Route::get('/UserScanBarcode', function () {
    return view('mitra_presensi.scanbarcode');
});




Route::get('/Scanqr', function () {
    return view('user.UserScanQR.Scanqr');
});
Route::get('/user-AdminSistem/login', [LoginController::class, 'loginadminSistem']);

Route::post('/login', [LoginController::class, 'ValidateLogin'])->name('login');

Route::get('/user-AdminSistem/resetpassword', function () {
    return view('SistemLokasi.AdminSistem-resetpassword');
});

Route::post('/user-AdminSistem/resetpassword', [ResetPasswordAdminSistemController::class, 'resetPassword'])->name('password.resetAdminSistem');
Route::post('/user-AdminSistem/InputOTP', [ResetPasswordAdminSistemController::class, 'verifyOTP'])->name('otp.verifyAdminSistem');
Route::post('/user-AdminSistem/InputnewPassword', [ResetPasswordAdminSistemController::class, 'newPassword'])->name('password.newAdminSistem');




Route::get('/user-AdminSistem/InputOTP', function () {
    return view('SistemLokasi.AdminSistem-InputOTP');
});
Route::get('/user-AdminSistem/InputnewPassword', function () {
    return view('SistemLokasi.AdminSistem-InputnewPassword');
});

Route::get('/contributingforuniv-lihat', function () {
    return view('template.contributingforunivschool.lihat');
});
