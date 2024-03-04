<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
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

Route::post('/login', [LoginController::class, 'ValidateLogin'])->name('login');
Route::post('/register', [RegisterController::class, 'register']);

Route::middleware('SuperAdmin')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.dashboard');
    });
});


Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
});
