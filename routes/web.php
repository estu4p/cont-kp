<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\MahasiswaController;

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
<<<<<<< HEAD
Route::view('/login', 'login');
Route::view('/register', 'register');
Route::view('/resetpw', 'resetpw');
Route::view('/otp', 'otp');
Route::view('/new', 'newpw');


Route::post('/login', [LoginController::class, 'ValidateLogin'])->name('login');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/resetpw', [ResetPasswordController::class, 'resetPassword'])->name('password.reset');
Route::post('/otp', [ResetPasswordController::class, 'verifyOTP'])->name('otp.verify');
Route::post('/new', [ResetPasswordController::class, 'newPassword'])->name('password.new');


Route::middleware('user')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.dashboard');
    });
=======

Route::get('/login', function () {
    return view('login');
>>>>>>> ebbc049035918be06271af20e9c8259be697b3e5
});

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


