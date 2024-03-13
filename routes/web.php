<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BEController\DataMitraController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\MahasiswaController;

use function Laravel\Prompts\alert;

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

Route::post('/login', [LoginController::class, 'ValidateLogin'])->name('login');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/resetpw', [ResetPasswordController::class, 'resetPassword'])->name('password.reset');
Route::post('/otp', [ResetPasswordController::class, 'verifyOTP'])->name('otp.verify');
Route::post('/new', [ResetPasswordController::class, 'newPassword'])->name('password.new');


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
    return view('landing-page.daftar', ['title' => "Daftar"]);
});

Route::get('/loginpage', [AuthController::class, 'index'])->name('login');
Route::post("/loginpage", [AuthController::class, 'login'])->name('login');
Route::get('/reset-password', [ResetPasswordController::class, 'index'])->name('reset');
Route::get('/data-mitra', [DataMitraController::class, 'index'])->name('dataMitra');
Route::get('data-mitra/presensi/{id}', [DataMitraController::class, 'presensi'])->name('dataMitra.presensi'); // menggunakan id mitra

Route::get('/', function () {
    return view('landing-page.index', ['title' => "Controlling Magang - Landing Page"]);
});
Route::get('/dashboard-admin', function () {
    return view('dashboard.dashboard-admin', ['title' => 'Admin']);
});
Route::get('/dashboard-admin', [DashboardController::class, 'dashboardAdmin'])->name('dashboard-admin');

Route::get('/login', function () {
    return view('login');
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
});


Route::get('/adminbeforepayment', function () {
    return view('adminbeforepayment');
});



Route::get('/contributingforuniv', [MahasiswaController::class, 'show']);




// Route::get('/contributingforuniv', function () {
//     return view('template.contributingforunivschool.penilaianmahasiswa');
// });







Route::get('/contributingforunivlihat', function () {
    return view('template.contributingforunivschool.lihat');
});
Route::get('/user/login', function () {
    return view('user.login', ['title' => "Login"]);
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

Route::get('/profil-siswa', function () {
    return view('jumlah-mahasiswa.profil-siswa');
});

Route::get('/penilaianMahasiswa', [MahasiswaController::class, 'show'])->name('penilaian-siswa.penilaianMahasiswa');

Route::get('/penilaian-mahasiswa', [MahasiswaController::class, 'penilaian_siswa'])->name('penilaian-siswa.penilaian-mahasiswa');

Route::get('/input-nilai', function () {
    return view('penilaian-siswa.input-nilai');
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
Route::get('/pengaturan', function () {
    return view('pengaturan.margepenilaiandivisi');
});
Route::get('/kategoripenilaian', function () {
    return view('pengaturan.kategoripenilaian');
});



