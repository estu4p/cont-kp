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
    public function loginsuperadmin()
    {
        $title = 'loginsuperadmin';
        return view('superAdmin.Login')->with('title', $title);
    }
    public function loginmitra()
    {
        $title = 'loginmitra';
        return view('loginmitra')->with('title', $title);
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

            $role_id = $user->role->id;

            if ($role_id == 1) { //super admin
                return redirect()->to('/AdminSistem-Dashboard');
            } else if ($role_id == 2) { //admin
                return redirect()->to('/AdminUniv-Dashboard');
            } else if ($role_id == 3) { //mahasiawa /pemagang
                return redirect()->to('/user');
            } else if ($role_id == 4) { //dosen-contributoruniv
                return redirect()->to('/dashboard');
            } else { // mitra
                return redirect()->to('/contributorformitra-dashboard');

                // return redirect('/AdminUniv-Dashboard');
            }
        } else {
            return redirect()->back()->withInput()->withErrors(['email' => 'Email atau password salah.']);
        }
    }

    public function logoutAdminUniv(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/AdminUniv-Login');
    }
}
