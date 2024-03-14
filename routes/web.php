<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;


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
Route::post('/loginpage', [LandingPageController::class, 'login']);

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
});
Route::get('/login', function () {
    return view('login');
    Route::get('/checkout/bronze', function () {
        return view('checkout.bronze', ['title' => "Checkout - Bronze"]);
    });
});
//     Route::get('/checkout/silver', function () {
//         return view('checkout.silver', ['title' => "Checkout - Silver"]);
//     });
//     Route::get('/checkout/gold', function () {
//         return view('checkout.gold', ['title' => "Checkout - Gold"]);
//     });
//     Route::get('/checkout/platinum', function () {
//         return view('checkout.platinum', ['title' => "Checkout - Platinum"]);
//     });
//     Route::get('/after-checkout', function () {
//         return view('checkout.after-checkout', ['title' => "After Checkout"]);
//     });
//     Route::get('/invoice', function () {
//         return view('checkout.invoice', ['title' => "Invoice"]);
//     });
//     Route::get('/slip', function () {
//         return view('checkout.slip-pembayaran', ['title' => "Slip Pembayaran"]);
//     });
// });


// });

