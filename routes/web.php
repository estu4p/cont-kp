<?php

use App\Http\Controllers\Auth\LoginController as AuthLoginController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

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

<<<<<<< HEAD
Route::post('/login', [AuthLoginController::class, 'ValidateLogin']);
=======

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
});
>>>>>>> 845cfeeb232690281aabae3885e00d0b3b865dce
