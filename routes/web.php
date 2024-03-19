<?php

use function Laravel\Prompts\alert;

use App\Http\Controllers\AdminUnivAfterPaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use  App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\BEController\AdminUnivAfterPaymentController as BEControllerAdminUnivAfterPaymentController;
use App\Http\Controllers\BEController\DataMitraController;
use App\Http\Controllers\BEController\HomeMitraController;
use App\Http\Controllers\MitraTeamAktifController;
use App\Http\Controllers\SuperadminSistemController;

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
Route::post('/barcode', [HomeMitraController::class, 'barcode']);

// Mitra Team Aktif
Route::get('/mitra-teamAktif', [MitraTeamAktifController::class, 'teamAktif'])->name('mitra-teamAktif');
Route::get('/mitra-seeAllTeam', [MitraTeamAktifController::class, 'seeAllTeam'])->name('mitra-seeAllTeam');
Route::get('/mitra-profileTeam/{username}', [MitraTeamAktifController::class, 'profileMahasiswa'])->name('mitra-profileMahasiswa');
Route::get('/mitra-anggotaTeam/{divisi}', [MitraTeamAktifController::class, 'anggotaTeam'])->name('mitra-anggotaTeam');

Route::middleware('user')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.dashboard');
    });
    Route::get('/jumlah-mahasiswa', [MahasiswaController::class, 'index']);
    Route::get('/presensi', function () {
        return view('presensi.presensiharian');
    });
    Route::get('/adminbeforepayment', function () {
        return view('adminbeforepayment');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
});
Route::get('/register', function () {
    return view('landingPage.daftar', ['title' => "Daftar"]);
});

Route::get('/loginpage', [AuthController::class, 'index'])->name('login');
Route::post("/loginpage", [AuthController::class, 'login'])->name('login');
Route::get('/reset-password', [ResetPasswordController::class, 'index'])->name('reset');


Route::get('/', function () {
    return view('landingPage.index', ['title' => "Controlling Magang - Landing Page"]);
});
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
    return view('adminafterpayment');
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
Route::get('/user/resetPassword', function () {
    return view('user.reset', ['title' => "Reset Password"]);
});
Route::get('/user/resetPassword/otp', function () {
    return view('user.otp', ['title' => "Reset Password - OTP"]);
});
Route::get('/user/resetPassword/newPassword', function () {
    return view('user.newPassword', ['title' => "Reset Password - New Password"]);
});
Route::get('/user/resetPassword/confirm', function () {
    return view('user.confirm', ['title' => "Reset Password - Confirm"]);
});
Route::get('/user', function () {
    return view('user.home', [
        'title' => "Home",
        'nama' => "Syalita Widyandini",
        'divisi' =>  "MJ/UIUX/POLINES/AGST 2023/06"
    ]);
});
});
Route::get('/user/barcode', function () {
    return view('user.barcode', [
        'title' => "Barcode Pemagang",
        'nama' => "Syalita"
    ]);
});

// Mitra Team Aktif
Route::get('/mitra-teamAktif', [MitraTeamAktifController::class, 'teamAktif'])->name('mitra-teamAktif');
Route::get('/mitra-seeAllTeam', [MitraTeamAktifController::class, 'seeAllTeam'])->name('mitra-seeAllTeam');
Route::get('/mitra-profileTeam/{username}', [MitraTeamAktifController::class, 'profileMahasiswa'])->name('mitra-profileMahasiswa');
Route::get('/mitra-anggotaTeam/{divisi}', [MitraTeamAktifController::class, 'anggotaTeam'])->name('mitra-anggotaTeam');

Route::get('/user/home', function () {
    return view('user.home', ['title' => "Home"]);

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





    Route::get('/profil-siswa', function () {
        return view('jumlah-mahasiswa.profil-siswa');
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


    // adminUniv-afterPayment
    Route::get('/AdminUniv-Login', function () {
        return view('adminUniv-afterPayment.AdminUniv-Login');
    })->name('login.admin');
    Route::get('/AdminUniv-ResetPassword', function () {
        return view('adminUniv-afterPayment.AdminUniv-ResetPassword');
    });
    Route::get('/mitra-laporanpresensi', function () {
        return view('adminUniv-afterPayment.mitra.laporanpresensi');
    });

    Route::get('/mitra-laporanpresensi-detaihadir', function () {
        return view('adminUniv-afterPayment.mitra.laporandetailhadir');
    });
    Route::get('/mitra-laporanpresensi-detailizin', function () {
        return view('adminUniv-afterPayment.mitra.laporandetailizin');
    });
    Route::get('/mitra-laporanpresensi-detailtidakhadir', function () {
        return view('adminUniv-afterPayment.mitra.laporandetailtidakhadir');
    });


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





    Route::get('/pengaturan', function () {
        return view('pengaturan.margepenilaiandivisi');
    });
    Route::get('/kategoripenilaian', function () {
        return view('pengaturan.kategoripenilaian');
    });
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





Route::get('/profil-siswa', function () {
    return view('jumlah-mahasiswa.profil-siswa');
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


// adminUniv-afterPayment
Route::get('/AdminUniv-Login', function () {
    return view('adminUniv-afterPayment.AdminUniv-Login');
})->name('login.admin');
Route::get('/AdminUniv-ResetPassword', function () {
    return view('adminUniv-afterPayment.AdminUniv-ResetPassword');
});
Route::get('/mitra-laporanpresensi', function () {
    return view('adminUniv-afterPayment.mitra.laporanpresensi');
});

Route::get('/mitra-laporanpresensi-detaihadir', function () {
    return view('adminUniv-afterPayment.mitra.laporandetailhadir');
});
Route::get('/mitra-laporanpresensi-detailizin', function () {
    return view('adminUniv-afterPayment.mitra.laporandetailizin');
});
Route::get('/mitra-laporanpresensi-detailtidakhadir', function () {
    return view('adminUniv-afterPayment.mitra.laporandetailtidakhadir');
});


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





Route::get('/pengaturan', function () {
    return view('pengaturan.margepenilaiandivisi');
});
Route::get('/kategoripenilaian', function () {
    return view('pengaturan.kategoripenilaian');
});

Route::get('/super-admin', [SuperadminSistemController::class, 'dashboard'])->name('super-admin.dashboard');
Route::get('/super-admin/ubah-profil', [SuperadminSistemController::class, 'editProfile'])->name('super-admin.edit-profile');
Route::patch('/super-admin/ubah-profil/{username}', [SuperadminSistemController::class, 'updateProfile'])->name('super-admin.update-profile');
Route::get('/super-admin/data-admin', [SuperadminSistemController::class, 'dataAdmin'])->name('super-admin.data-admin');
Route::get('/super-admin/data-admin/showAlertEdit/{id}', [SuperadminSistemController::class, 'showAlertEditAdmin']);
Route::patch('/super-admin/data-admin/update/{username}', [SuperadminSistemController::class, 'updateAdmin'])->name('super-admin.update-admin');
Route::delete('/super-admin/data-admin/delete/{username}', [SuperadminSistemController::class, 'deleteAdmin'])->name('super-admin.delete-admin');
Route::post('/super-admin/data-admin/add', [SuperadminSistemController::class, 'addAdmin'])->name('super-admin.add-admin');
Route::get('/super-admin/langganan', function () {
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
    return view('superAdmin.langganan', [
        'title' => "Langganan",
        'members' => $members,
    ]);
});
Route::get('/UserScanQRDefault', function () {
    return view('user.UserScanQR.Home-Default');
});

