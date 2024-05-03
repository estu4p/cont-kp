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
    public function loginadminSistem()
    {
        return view('SistemLokasi.AdminSistem-login');
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
        ], [
            'email.required' => 'email harus diisi!',
            'email.email' => 'format email salah',
            'password.required' => 'password harus diisi!',
        ]);

        $login = $request->only('email', 'password');
        $remember = $request->filled('remember');

        if (Auth::attempt($login, $remember)) {
            $user = Auth::user();
            if ($user->role_id == 3) {
                if (!$user->mitra_id || !$user->divisi_id || !$user->sekolah) {
                    Auth::logout();
                    return redirect()->to('/user/login')->with('mitra_error', 'Mitra atau Devisi belum di isi Admin.');
                }
            }

            $role_id = $user->role->id;

            if ($role_id == 1) { //super admin
                return redirect()->to('/AdminSistem-Dashboard');
            } else if ($role_id == 2) { //admin
                return redirect()->to('/AdminUniv-Dashboard');
            } else if ($role_id == 3) { //mahasiawa /pemagang
                return redirect()->to('/user');
            } else if ($role_id == 4) { //dosen-contributoruniv
                return redirect()->to('/dashboard');
            } else if ($role_id == 6) {
                return redirect('/AdminSistem-Dashboard');
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

    public function logoutSistemLokasi(Request $request)
    {
        Auth::Logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login.adminsistem');
    }
}
