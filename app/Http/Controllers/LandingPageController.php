<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\login;
use App\Models\Daftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class LandingPageController extends Controller
{

    public function lpdaftar(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:100',
            'sekolah' => 'required|string',
            'email' => 'email|required|unique:daftar,email',
            'telephone' => 'required|regex:/^\d+$/',
            'password' => 'min:8|required'
        ]);

            $data = Daftar::create([
                'name' => $request->fullname,
                'sekolah' => $request->sekolah,
                'email' => $request->email,
                'telephone' => $request->telephone,
                'password' => Hash::make($request->password),
            ]);

            return response()->json(['data' => $data]);
    }
    public function login(Request $request)
    {
        $email = $request->input('email');
        $pass = $request->input('password');

        $useremail = login::where('email', $email)->first();
        $userpass = login::where('password', $pass)->first();
        
        if ($useremail && $userpass) {
            // Login berhasil
            // return redirect()->intended('/dashboard');
            return response($useremail);
        } else {
            // Kredensial tidak valid, tampilkan pesan kesalahan
            // return back()->withErrors(['email' => 'Email atau password tidak valid']);
            return response([
                'status' => false,
                'pesan' => 'data tidak ditemukan'
            ]);
        }
    }
}
