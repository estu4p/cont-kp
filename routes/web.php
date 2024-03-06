<?php

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

Route::get('/login', function () {
    return view('login');
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

