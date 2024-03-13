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
    public function ChekoutPaket(Request $request)
    {
    //     $paket=$request->input('paket');
    //     $metodeBayar=$request->input('MetodeBayar');
    //     $kota=$request->input('kota');
    //     // $harga=$request->input('price');
    //     return response()->json(['message' => 'Paket berhasil dicheckout', 'paket' => $paket, 'metodeBayar' => $metodeBayar, 'kota' => $kota]);
    // }

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
        return response()->json(['message' => 'Checkout berhasil']);
    }

        // $beli = paket ::create([
        //     'paket' => $request->paket,
        //     'metodeBayar' => $request->metodeBayar,
        //     'kota'=>$request->kota]);

    //     return response()->json(['paket berhasil dibeli']);
    // }
}
