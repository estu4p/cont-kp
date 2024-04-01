<?php

use function Laravel\Prompts\alert;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use  App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\BEController\SchoolController;
use App\Http\Controllers\AdminUnivAfterPaymentController;
use App\Http\Controllers\BEController\DataMitraController;
use App\Http\Controllers\BEController\HomeMitraController;
use App\Http\Controllers\BEController\ContributorForMitra;
use App\Http\Controllers\BEController\MitraDashboardController;
use App\Http\Controllers\BEController\AdminUnivAfterPaymentController as BEControllerAdminUnivAfterPaymentController;


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

Route::post('/user/login', [LoginController::class, 'ValidateLogin'])->name('user.login');
Route::post('/user/register', [RegisterController::class, 'register'])->name('register');
Route::post('/user/reset-password', [ResetPasswordController::class, 'resetPassword'])->name('password.reset');
Route::post('/user/reset-password/otp', [ResetPasswordController::class, 'verifyOTP'])->name('otp.verify');
Route::post('/user/reset-password/new-password', [ResetPasswordController::class, 'newPassword'])->name('password.new');
Route::post('/mitra', [HomeMitraController::class, 'pilihMitra'])->name('proses_pemilihan');
Route::post('/barcode/{id}', [HomeMitraController::class, 'barcode']);

Route::middleware('user')->group(function () {

    Route::get('/presensi', function () {
        return view('presensi.presensiharian');
    });
    Route::post('/loginpage', [LandingPageController::class, 'login']);
    Route::get('/adminbeforepayment', function () {
        return view('adminbeforepayment');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
});


Route::get('/loginpage', [AuthController::class, 'index'])->name('login');
Route::post("/loginpage", [AuthController::class, 'login'])->name('login');
Route::get('/reset-password', [ResetPasswordController::class, 'index'])->name('reset');
Route::get('/register', function() {
    return view('landing-page.daftar', [
        'title' => "Landing Page - Register"
    ]);
});


Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard']);
});



Route::get('/jumlah-mahasiswa', [MahasiswaController::class, 'index']);

Route::get('/dashboard-admin', function () {
    return view('dashboard.dashboard-admin', ['title' => 'Admin']);
});
Route::get('/dashboard-admin', [DashboardController::class, 'dashboardAdmin'])->name('dashboard-admin');

Route::get('/login', function () {
    return view('login');
});
Route::get('/checkout/bronze', function () {
    return view('checkout.bronze', ['title' => "Checkout - Bronze"]);
});
Route::get('/checkout/silver', function () {
    return view('checkout.silver', ['title' => "Checkout - Silver"]);
});
Route::get('/checkout/gold', function () {
    return view('checkout.gold', ['title' => "Checkout - Gold"]);
});
Route::get('/checkout/platinum', function () {
    return view('checkout.platinum', ['title' => "Checkout - Platinum"]);
});
Route::get('/after-checkout', function () {
    return view('checkout.after-checkout', ['title' => "After Checkout"]);
});
Route::get('/invoice', function () {
    return view('checkout.invoice', ['title' => "Invoice"]);
});
Route::get('/slip', function () {
    return view('checkout.slip-pembayaran', ['title' => "Slip Pembayaran"]);
});
Route::post('/loginpage', [LandingPageController::class, 'login']);

Route::get('/adminbeforepayment', function () {
    return view('adminbeforepayment');
});
Route::get('/adminafterpayment', function () {
    return view('mitra.adminafterpayment');
});



Route::get('/contributingforuniv', [MahasiswaController::class, 'show']);




// Route::get('/contributingforuniv', function () {
//     return view('template.contributingforunivschool.penilaianmahasiswa');
// });

Route::get('/contributingforunivlihat', function () {
    return view('template.contributingforunivschool.lihat');
});


//user
Route::get('/user/login', function () {
    return view('user.login', [
        'title' => "Login",
        'email' => "raihan@gmail.com"
    ]);
});
Route::get('/user/register', function () {
    return view('user.register', ['title' => "Register"]);
});
Route::get('/user/reset-password', function () {
    return view('user.reset', ['title' => "Reset Password"]);
});
Route::get('/user/reset-password/otp', function () {
    return view('user.otp', ['title' => "Reset Password - OTP"]);
});
Route::get('/user/reset-password/new-password', function () {
    return view('user.new-password', ['title' => "Reset Password - New Password"]);
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
Route::get('/pemagang/home', function () {
    return view('pemagang.home', ['title' => "Home"]);
});

Route::get('/pemagang/MyQR', function () {
    return view('pemagang.myqr', ['title' => "MyQR"]);
});
Route::get('/pemagang/detail', function () {
    return view('pemagang.gantiJam', ['title' => "MyQR"]);
});


//lihat profil contributor for univ
// Route::get('/profil-siswa', [SchoolController::class, 'jumlahMahasiswa'])->name('jumlahMahasiswa');


//contributor for univ
Route::get('/dashboard', [SchoolController::class, 'index'])->name('dashboard.mahasiswa');
Route::get('/jumlah-mahasiswa', [SchoolController::class, 'jumlahMahasiswa'])->name('jml_mahasiswa');
Route::get('/profil-siswa/{id}', [SchoolController::class, 'Lihatprofil'])->name('detail-profil-siswa');

Route::get('/laporandatapresensi', function () {
    return view('presensi.laporandatapresensi');
});
Route::get('/datapresensisiswa', function () {
    return view('presensi.datapresensisiswa');
});

Route::get('/presensi-contributor-univ', function () {
    return view('presensi.presensiharian');
    // return view('presensi.presensiharian')->name('presensi.con');
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

Route::get('/pengaturan', function () {
    return view('pengaturan.margepenilaiandivisi');
});
Route::get('/kategoripenilaian', function () {
    return view('pengaturan.kategoripenilaian');
});


Route::get('/penilaianMahasiswa', [MahasiswaController::class, 'show'])->name('penilaian-siswa.penilaianMahasiswa');

Route::get('/penilaian-mahasiswa', [MahasiswaController::class, 'penilaian_siswa'])->name('penilaian-siswa.penilaian-mahasiswa');

Route::get('/input-nilai', function () {
    return view('penilaian-siswa.input-nilai');
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
Route::get('/kategoripenilaian', function () {
    return view('pengaturan.kategoripenilaian');
});





// adminUniv-afterPayment
Route::get('/AdminUniv-Login', function () {
    return view('adminUniv-afterPayment.AdminUniv-Login');
})->name('login.admin');
Route::post('/AdminUniv-Login', [LoginController::class, 'ValidateLogin'])->name('login.admin');


Route::get('/AdminUniv-ResetPassword', [ResetPasswordController::class, 'indexAdminUniv'])->name('login.admin.reset');
Route::post('/AdminUniv-ResetPassword', [ResetPasswordController::class, 'adminUnivResetPassword'])->name('adminUniv.reset');

Route::get('/AdminUniv-InputOTP', function () {
    return view('adminUniv-afterPayment.AdminUniv-InputOTP');
});

Route::get('/AdminUniv-InputNewPassword', function () {
    return view('adminUniv-afterPayment.AdminUniv-InputNewPassword');
});

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

Route::get('/Option-TeamAktif', function () {
    return view('adminUniv-afterPayment.mitra.Option-TeamAktif');
});
Route::get('/Option-TeamAktif-pengaturanDivisi', function () {
    return view('adminUniv-afterPayment.mitra.Option-TeamAktif-pengaturanDivisi');
});
Route::get('/TeamAktif-kategoripenilaian-UiuX', function () {
    return view('adminUniv-afterPayment.mitra.TeamAktif-kategoripenilaian-UiuX');
});
Route::get('/OptionTeamAktifKlikUiUx', function () {
    return view('adminUniv-afterPayment.mitra.OptionTeamAktifKlikUiUx');

});
Route::get('/pengaturan', function () {
    return view('pengaturan.margepenilaiandivisi');
});

Route::get('/Option-TeamAktif-SeeAllTeams', function () {
    return view('adminUniv-afterPayment.mitra.Option-TeamAktif-SeeAllTeams');
});
Route::get('/profilSiswa', function () {
    return view('adminUniv-afterPayment.mitra.profilSiswa');
});

Route::get('/kategoripenilaian', function () {
    return view('pengaturan.kategoripenilaian');
});

Route::get('/datasiswa', function () {
    return view('adminUniv-afterPayment.dataSiswa');
});
Route::get('/profilsiswa', function () {
    return view('adminUniv-afterPayment.profilSiswa');
});





//USER ADMIN SISTEM/LOKASI (SEVEN INC)
Route::get('/AdminSistem-Dashboard', function () {
    return view('SistemLokasi.AdminSistem-Dashboard');
});
Route::get('/AdminSistem-Editprofile', function () {
    return view('SistemLokasi.AdminSistem-Editprofile');
});
Route::get('/AdminSistem-Subcription', function () {
    return view('SistemLokasi.AdminSistem-Subcription');
});


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





// Route::get('/profil-siswa', function () {
//     return view('jumlah-mahasiswa.profil-siswa');
// });
// Route::get('/laporandatapresensi', function () {
//     return view('presensi.laporandatapresensi');
// });
// Route::get('/datapresensisiswa', function () {
//     return view('presensi.datapresensisiswa');
// });

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

Route::get('/penilaianMahasiswa', [MahasiswaController::class, 'show'])->name('penilaian-siswa.penilaianMahasiswa');

Route::get('/penilaian-mahasiswa', [MahasiswaController::class, 'penilaian_siswa'])->name('penilaian-siswa.penilaian-mahasiswa');

Route::get('/input-nilai', function () {
    return view('penilaian-siswa.input-nilai');
});

Route::get('/MitraPresensiDetailHadir', function () {
    return view('user.ContributorForMitra.MitraPresensiDetailHadir');
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

// CONTRIBUTOR FOR MITRA PRSENSI
Route::get('/mitra/laporanpresensi', [ContributorForMitra::class, 'laporanPresensi']);
Route::get('/mitra-laporanpresensi-detailhadir', function () {
    return view('user.ContributorForMitra.MitraPresensiDetailHadir');
});

Route::get('/mitra-laporanpresensi-detailhadir/{id}',[ContributorForMitra::class,'laporanPresensiDetailHadir'])->name('cont.mitrapresensi');
Route::get('/mitra-laporanpresensi-detailizin/{nama_lengkap}', [ContributorForMitra::class,'laporanPresensiDetailIzin'])->name('cont.mitrapresensi.detailizin');
Route::get('/mitra-laporanpresensi-detailtidakhadir/{nama_lengkap}', [ContributorForMitra::class,'laporanPresensiDetailTidakHadir'])->name('cont.mitrapresensi.detailtidakhadir');


Route::get('/AdminUniv-InputOTP', function () {
    return view('adminUniv-afterPayment.AdminUniv-InputOTP');
});

Route::get('/AdminUniv-InputNewPassword', function () {
    return view('adminUniv-afterPayment.AdminUniv-InputNewPassword');
});


Route::get('/AdminUniv-Dashboard', function () {
    return view('adminUniv-afterPayment.AdminUniv-Dashboard');
});
Route::get('/AdminUniv-EditProfile', function () {
    return view('adminUniv-afterPayment.AdminUniv-EditProfile');
});

// Route::get('/AdminUniv-Dashboard', function () {
//     return view('adminUniv-afterPayment.AdminUniv-Dashboard');
// });
// Route::get('/AdminUniv-EditProfile', function () {
//     return view('adminUniv-afterPayment.AdminUniv-EditProfile');
// });
// Note : Jangan pake admin univ lagi dong, duplikat nih







Route::get('/pengaturan', function () {
    return view('pengaturan.margepenilaiandivisi');
});


Route::get('/kategoripenilaian', function () {
    return view('pengaturan.kategoripenilaian');
});
Route::get('/pengaturan', [BEControllerAdminUnivAfterPaymentController::class, 'daftarMitraPengaturanDivisi'])->name('adminUniv.kategoriPenilaian');
Route::get('/kategoripenilaian', [BEControllerAdminUnivAfterPaymentController::class, 'showKategoriPenilaian'])->name('adminUniv.kategoriPenilaian');

Route::get('/superAdmin', function () {
    return view('super-admin.dashboard', [
        'title' => "Super Admin - Dashboard",
        'subscription' => 300,
        'admin_sistem' => 200
    ]);
});
Route::get('/superAdmin/ubahProfil', function () {
    return view('superAdmin.edit', [
        'title' => "Super Admin - Ubah Profil",
        'nama' => "Jay Antonio",
        'email' => 'antoniojay@gmail.com',
        'hp' => "081326273187",
        'alamat' => "Jateng",
        'about' => "Mengatur pelaksanaan sistem kerja perusahaan, mulai dari meng-input, memproses, mengelola hingga mengevaluasi data"
    ]);
});
Route::get('/superAdmin/data-admin', function () {
    // $admins = App\Models\Admin::paginate(4);
    $admins = [
        ['id' => 1, 'nama' => 'Joy', 'lokasi' => 'Yogyakarta'],
        ['id' => 2, 'nama' => 'Vior', 'lokasi' => 'Jawa Tengah'],
        ['id' => 3, 'nama' => 'Ilham', 'lokasi' => 'Yogyakarta'],
        ['id' => 4, 'nama' => 'Blue', 'lokasi' => 'Jawa Tengah'],
        ['id' => 5, 'nama' => 'Green', 'lokasi' => 'Yogyakarta'],
        ['id' => 6, 'nama' => 'Black', 'lokasi' => 'Jawa Tengah'],
        ['id' => 7, 'nama' => 'Purple', 'lokasi' => 'Yogyakarta'],
        ['id' => 8, 'nama' => 'Emerald', 'lokasi' => 'Jawa Tengah'],
        ['id' => 9, 'nama' => 'Sage', 'lokasi' => 'Yogyakarta'],
        ['id' => 10, 'nama' => 'Sky', 'lokasi' => 'Jawa Tengah'],
    ];
    return view('super-admin.data-admin', [
        'title' => "Data Admin",
        'admins' => $admins,
    ]);
});


Route::get('/UserScanQRDefault', function () {
    return view('user.UserScanQR.Home-Default');
});


Route::get('/superAdmin/langganan', function () {
    $members = [
        ['id' => 1, 'nama' => 'Raihan Hafidz', 'email' => 'raihanhafidz@gmail.com', 'pt' => 'Universitas Ahmad Dahlan', 'paket' => 'Bronze', 'lokasi' => 'Yogyakarta', 'status' => 'Aktif'],
        ['id' => 2, 'nama' => 'Syalita Widyandini', 'email' => 'syalitawyda@gmail.com', 'pt' => 'Politeknik Negeri Semarang', 'paket' => 'Silver', 'lokasi' => 'Semarang', 'status' => 'Aktif'],
        ['id' => 3, 'nama' => 'Danni Hernando', 'email' => 'dannihernando17@gmail.com', 'pt' => 'Universitas Semarang', 'paket' => 'Bronze', 'lokasi' => 'Semarang', 'status' => 'Tidak Aktif'],
        ['id' => 4, 'nama' => 'Febrian Adipurnowo', 'email' => 'febrianadip@gmail.com', 'pt' => 'Universitas Gadjah Mada', 'paket' => 'Gold', 'lokasi' => 'Yogyakarta', 'status' => 'Aktif'],
        ['id' => 5, 'nama' => 'Yessa Khoirunnisa', 'email' => 'yessaakhh@gmail.com', 'pt' => 'Universitas Indonesia', 'paket' => 'Platinum', 'lokasi' => 'Depok', 'status' => 'Tidak Aktif'],
        ['id' => 6, 'nama' => 'Raihan Hafidz', 'email' => 'raihanhafidz1@gmail.com', 'pt' => 'Universitas Ahmad Dahlan', 'paket' => 'Bronze', 'lokasi' => 'Yogyakarta', 'status' => 'Aktif'],
        ['id' => 7, 'nama' => 'Syalita Widyandini', 'email' => 'syalitawyda1@gmail.com', 'pt' => 'Politeknik Negeri Semarang', 'paket' => 'Silver', 'lokasi' => 'Semarang', 'status' => 'Aktif'],
        ['id' => 8, 'nama' => 'Danni Hernando', 'email' => 'dannihernando171@gmail.com', 'pt' => 'Universitas Semarang', 'paket' => 'Bronze', 'lokasi' => 'Semarang', 'status' => 'Tidak Aktif'],
        ['id' => 9, 'nama' => 'Febrian Adipurnowo', 'email' => 'febrianadip1@gmail.com', 'pt' => 'Universitas Gadjah Mada', 'paket' => 'Gold', 'lokasi' => 'Yogyakarta', 'status' => 'Aktif'],
        ['id' => 10, 'nama' => 'Yessa Khoirunnisa', 'email' => 'yessaakhh1@gmail.com', 'pt' => 'Universitas Indonesia', 'paket' => 'Platinum', 'lokasi' => 'Depok', 'status' => 'Tidak Aktif'],
    ];
    return view('super-admin.langganan', [
        'title' => "Langganan",
        'members' => $members,
    ]);
});

Route::get('/admin/setting/quotes', function () {
    $quotes = [
        ['id' => 1, 'quotes' => "Change your life now for better future"],
        ['id' => 2, 'quotes' => "Jujur terlalu tertanam di dalam hati"],
        ['id' => 3, 'quotes' => "Aku jujur dan disiplin"],
        ['id' => 4, 'quotes' => "Aku selalu mengembangkan potensiku"],
        ['id' => 5, 'quotes' => "Aku selalu melakukan yang terbaik"],
        ['id' => 6, 'quotes' => "Rasa malas adalah musuhku"],
        ['id' => 7, 'quotes' => "Hari ini harus lebih baik dari kemarin"],
        ['id' => 8, 'quotes' => "Tidak ada kata menyerah dalam hidupku"]
    ];
    return view('admin.setting.quotes', [
        'title' => "Admin - Setting Jam & Quotes",
        'quotes' => $quotes
    ]);
});
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
        'mhs' => $mhs,
    ]);
});

Route::get('/', function () {
    return view('landing-page.index', ['title' => 'Controlling Magang']);
});

Route::get('/superAdmin/langganan', function () {
    $members = [
        ['id' => 1, 'nama' => 'Raihan Hafidz', 'email' => 'raihanhafidz@gmail.com', 'pt' => 'Universitas Ahmad Dahlan', 'paket' => 'Bronze', 'lokasi' => 'Yogyakarta', 'status' => 'Aktif'],
        ['id' => 2, 'nama' => 'Syalita Widyandini', 'email' => 'syalitawyda@gmail.com', 'pt' => 'Politeknik Negeri Semarang', 'paket' => 'Silver', 'lokasi' => 'Semarang', 'status' => 'Aktif'],
        ['id' => 3, 'nama' => 'Danni Hernando', 'email' => 'dannihernando17@gmail.com', 'pt' => 'Universitas Semarang', 'paket' => 'Bronze', 'lokasi' => 'Semarang', 'status' => 'Tidak Aktif'],
        ['id' => 4, 'nama' => 'Febrian Adipurnowo', 'email' => 'febrianadip@gmail.com', 'pt' => 'Universitas Gadjah Mada', 'paket' => 'Gold', 'lokasi' => 'Yogyakarta', 'status' => 'Aktif'],
        ['id' => 5, 'nama' => 'Yessa Khoirunnisa', 'email' => 'yessaakhh@gmail.com', 'pt' => 'Universitas Indonesia', 'paket' => 'Platinum', 'lokasi' => 'Depok', 'status' => 'Tidak Aktif'],
        ['id' => 6, 'nama' => 'Raihan Hafidz', 'email' => 'raihanhafidz1@gmail.com', 'pt' => 'Universitas Ahmad Dahlan', 'paket' => 'Bronze', 'lokasi' => 'Yogyakarta', 'status' => 'Aktif'],
        ['id' => 7, 'nama' => 'Syalita Widyandini', 'email' => 'syalitawyda1@gmail.com', 'pt' => 'Politeknik Negeri Semarang', 'paket' => 'Silver', 'lokasi' => 'Semarang', 'status' => 'Aktif'],
        ['id' => 8, 'nama' => 'Danni Hernando', 'email' => 'dannihernando171@gmail.com', 'pt' => 'Universitas Semarang', 'paket' => 'Bronze', 'lokasi' => 'Semarang', 'status' => 'Tidak Aktif'],
        ['id' => 9, 'nama' => 'Febrian Adipurnowo', 'email' => 'febrianadip1@gmail.com', 'pt' => 'Universitas Gadjah Mada', 'paket' => 'Gold', 'lokasi' => 'Yogyakarta', 'status' => 'Aktif'],
        ['id' => 10, 'nama' => 'Yessa Khoirunnisa', 'email' => 'yessaakhh1@gmail.com', 'pt' => 'Universitas Indonesia', 'paket' => 'Platinum', 'lokasi' => 'Depok', 'status' => 'Tidak Aktif'],
    ];
    return view('super-admin.langganan', [
        'title' => "Langganan",
        'members' => $members,
    ]);
});



Route::get('/admin/setting/quotes', function () {
    $quotes = [
        ['id' => 1, 'quotes' => "Change your life now for better future"],
        ['id' => 2, 'quotes' => "Jujur terlalu tertanam di dalam hati"],
        ['id' => 3, 'quotes' => "Aku jujur dan disiplin"],
        ['id' => 4, 'quotes' => "Aku selalu mengembangkan potensiku"],
        ['id' => 5, 'quotes' => "Aku selalu melakukan yang terbaik"],
        ['id' => 6, 'quotes' => "Rasa malas adalah musuhku"],
        ['id' => 7, 'quotes' => "Hari ini harus lebih baik dari kemarin"],
        ['id' => 8, 'quotes' => "Tidak ada kata menyerah dalam hidupku"]
    ];
    return view('admin.setting.quotes', [
        'title' => "Admin - Setting Jam & Quotes",
        'quotes' => $quotes
    ]);
});
Route::get('/admin/setting/user', function () {
    $users = [
        ['id' => 1, 'nama' => "Guru1", 'username' => 'usernameguru1', "privilege" => ["Manage Kategori Penilaian", "Lihat Penilaian"], 'role' => "Guru"],
        ['id' => 2, 'nama' => "Mitra1", 'username' => 'usernamemitra1', "privilege" => ["Input Nilai", "Accept/Reject Log Activity", "Manage Devisi"], 'role' => "Mitra"],
        ['id' => 3, 'nama' => "Guru2", 'username' => 'usernameguru2', "privilege" => ["Manage Kategori Penilaian", "Lihat Penilaian"], 'role' => "Guru"],
        ['id' => 4, 'nama' => "Mitra2", 'username' => 'usernamemitra2', "privilege" => ["Input Nilai", "Accept/Reject Log Activity"], 'role' => "Mitra"],
        ['id' => 5, 'nama' => "Guru3", 'username' => 'usernameguru3', "privilege" => ["Manage Kategori Penilaian"], 'role' => "Guru"],
        ['id' => 6, 'nama' => "Mitra3", 'username' => 'usernamemitra3', "privilege" => ["Input Nilai", "Manage Devisi"], 'role' => "Mitra"],
    ];
    return view('admin.setting.user', [
        'title' => "Admin - User & Organization",
        'users' => $users
    ]);
});

Route::get('/', function () {
    return view('landing-page.index', ['title' => 'Controlling Magang']);
});


Route::get('/mitrapresensi-ScanBarcode', function () {
    return view('mitra-presensi.scanbarcode');
});

Route::get('/mitrapresensi-ScanPresensiharian', function () {
    return view('mitra-presensi.scanpresensiharian');
});











































Route::get('/contributorformitra-dashboard', function () {
    return view('contributorformitra.dashboard');
});
Route::get('/contributorformitra-editprofile', function () {
    return view('contributorformitra.editprofile');
});
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
