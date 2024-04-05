<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\QrCodeServiceProvider;

class LoginController extends Controller
{
    public function index()
    {
        return view('user.login');
    }
    public function adminUnivLogin()
    {
        return view('adminUniv-afterPayment.AdminUniv-Login');
    }

    public function ValidateLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $login = $request->only('email', 'password');
        $remember = $request->filled('remember');

        if (Auth::attempt($login, $remember)) {
            $user = Auth::user();

            if ($user->role == 1) {
                return redirect()->to('/superAdmin');
            } else if ($user->role_id == 2) {
                return redirect()->to('/AdminUniv-Dashboard');
            } else if ($user->role_id == 3) {
                return redirect()->to('/user');
            } else if ($user->role_id == 4) {
                return redirect()->to('/dashboard');
            } else {
                return redirect()->to('/');

                // return redirect('/AdminUniv-Dashboard');
            }
        } else {
            return response()->json([
                'error' => 'Email atau Password yang anda masukan salah'
            ], 422);
        }
    }
}
