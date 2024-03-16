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
            'nama_lengkap' => 'required|string|max:100',
            'sekolah' => 'required|string',
            'no_hp' => 'required|regex:/^\d+$/',
            'email' => 'email|required|unique:daftar',
            'password' => 'min:8|required'
        ]);

            $data = User::create([
                'nama_lengkap' => $request->nama_lengkap,
                'sekolah' => $request->sekolah,
                'no_hp' => $request->no_hp,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            // dd($data);

            $login= [
                'email' => $request->email,
                'password' =>$request->password,
            ];


            return response()->json(['data' => $data,'login'=> $login]);
    }
    public function index()
    {
        return view("landing-page.login");
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);
        $email = $request->input('email');
        $pass = $request->input('password');

        $useremail = User::where('email', $email)->first();
        // dd(Hash::make($pass));
        // $userpass = Daftar::where('password', $pass)->first();
        if (!$useremail && Hash::check( $pass, $useremail->password)) {
             return back()->withErrors(['email' => 'Email atau password salah']);
        }
        auth()->login($useremail);

        // Redirect ke halaman yang sesuai
        // return redirect()->intended('/dashboard');
        return response()->json([
            'pesan' => 'Anda Berhasil login',
            'data' => $useremail
        ]);
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
