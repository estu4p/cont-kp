<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
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
                    'message' => 'Login berhasil sebagai Mahasiswa / Siswa',
                    'redirect' => 'Mahasiswa/dashboard'
                ], 200);
            } else if ($user->role == 4) {
                return response()->json([
                    'message' => 'Login berhasil sebagai Dosen',
                    'redirect' => 'Dosen/dashboard'
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Login berhasil sebagai Mitra',
                    'redirect' => 'Mitra/dashboard'
                ], 200);
            }
        } else {
            return response()->json([
                'error' => 'Email atau Password yang anda masukan salah'
            ], 422);
        }
    }
}
