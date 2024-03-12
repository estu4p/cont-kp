<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MitraDashboardController;
use App\Http\Controllers\MitraEditProfilController;
use App\Http\Controllers\Auth\LoginController;

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

Route::get('/login', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
});
// routes/web.php


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::middleware(['auth'])->group(function () {
    Route::get('profile', [MitraDashboardController::class, 'showProfile'])->name('mitra.dashboard.profile');

    // Tampilkan halaman edit profil
    Route::get('edit-profile', [MitraEditProfilController::class, 'editProfile'])->name('mitra.dashboard.edit-profile');

    // Proses update profil
    Route::post('update-profile', [MitraEditProfilController::class, 'updateProfile'])->name('mitra.dashboard.update-profile');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    
});
Route::get('/jumlah-mahasiswa', [MahasiswaController::class, 'index']);

Route::get('/presensi', function () {
    return view('presensi.presensiharian');
});

Route::get('/adminbeforepayment', function () {
    return view('adminbeforepayment');
});


