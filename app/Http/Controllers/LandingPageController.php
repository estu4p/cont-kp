<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\login;
use App\Models\paket;
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
            'email' => 'email|required|unique:daftar',
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

            $login= [
                'email' => $request->email,
                'password' =>$request->password,
            ];

            return response()->json(['data' => $data,'login'=> $login]);
    }
    public function login(Request $request)
    {
        // $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required'
        // ],[
        //     'email.required'=>'email wajib isi',
        //     'password.required'=>'password wajib isi'
        // ]);
        // $login = [
        //     'email' => $request->email,
        //     'password' => $request->password
        // ];
        // if (Auth::attempt($login)) {
        //     return redirect(' ')->with('success', 'Berhasil login');
        // } else {
        //     return redirect(' ')->withErrors('Username dan password yang dimasukkan tidak sesuai');
        // }

        // $login = $request->only('email', 'password');
        //  if (Auth::attempt([$login])) {
        // // Autentikasi berhasil, dapatkan data pengguna yang diautentikasi
        // $daftar = Auth::daftar();
        // return response()->json(['message' => 'Login successful', 'daftar'=>$daftar]);
        // } else {
        // // Autentikasi gagal
        // return response()->json(['message' => 'Invalid credentials'],401);
        // }


        // $login= [
        //     'email' => $request->input ('email'),
        //     'password' =>$request->input('password'),
        // ];
        // if ($login) {
        //     // Login berhasil
        //     return response('Berhasil login');
        // } else {
        //     //Jika data tidak ditemukan/ belum melakukan pendaftaran
        //     return response([
        //         'status' => false,
        //         'pesan' => 'data tidak ditemukan'
        //     ]);
        // }
        // // }
        $email = $request->input('email');
        $pass = $request->input('password');

        $useremail = login::where('email', $email)->first();
        // $userpass = login::where('password', $pass)->first();
        if ($useremail) {
            // Verifikasi password
            if ($useremail->password == $pass) {
                // Login berhasil
                return response($useremail);
            } else {
                // Password salah
                return response([
                    'status' => false,
                    'pesan' => 'Password salah'
                ]);
            }
            } else {
            // Jika data tidak ditemukan/ belum melakukan pendaftaran
            return response([
                'status' => false,
                'pesan' => 'Data tidak ditemukan'
            ]);

        // if ($useremail && $userpass) {
        //     // Login berhasil
        //     return response($useremail);
        // } else {
        //     //Jika data tidak ditemukan/ belum melakukan pendaftaran
        //     return response([
        //         'status' => false,
        //         'pesan' => 'data tidak ditemukan'
        //     ]);
        }
    }
    public function ChekoutPaket(Request $request)
    {
        $request->validate([
            'paket'=> 'required|in:Bronze,Silver,Gold,Premium',
            'metode_bayar' => 'required|string',
            'kota'=> 'required|string'
        ]);

        $transaksi = new paket([
            'paket' => $request->input('paket'),
            'metode_bayar' => $request->input('metode_bayar'),
            'kota' => $request->input('kota'),
        ]);

        $transaksi->save();
            return response()->json(['message' => 'Checkout berhasil',
                'Jenis Paket' => $request->paket,
                'Metode Bayar' => $request->metode_bayar,
                'Kota' => $request->kota,
            ]);
    }
}
