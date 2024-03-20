<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
                return response()->json([
                    'message' => 'Login berhasil sebagai Super Admin',
                    'redirect' => 'SuperAdmin/dashboard'
                ], 200);
            } else if ($user->role == 2) {
                return response()->json([
                    'message' => 'Login berhasil sebagai Admin',
                    'redirect' => 'Admin/dashboard'
                ], 200);
            } else if ($user->role == 3) {
                return response()->json([
                    'message' => 'Login berhasil sebagai Mahasiswa  Siswa',
                    'redirect' => 'pemagang/home'
                ], 200);
            } else if ($user->role == 4) {
                return response()->json([
                    'message' => 'Login berhasil sebagai Dosen',
                    'redirect' => 'Dosen/dashboard'
                ], 200);
            } else {
                return redirect('/AdminUniv-Dashboard');
            }
        } else {
            return response()->json([
                'error' => 'Email atau Password yang anda masukan salah'
            ], 422);
        }
    }
}
