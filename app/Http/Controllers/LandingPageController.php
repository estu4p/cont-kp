<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\login;
use App\Models\paket;
use App\Models\Daftar;
use App\Models\Sekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class LandingPageController extends Controller
{
    public function index()
    {
        return view('landing-page.daftar', [
            'title' => "Landing Page - Register"] );
    }
    public function lpdaftar(Request $request)
    {
        $user= new Sekolah();
        $user->nama_lengkap= $request->input('nama_lengkap');
        $user->nama_sekolah= $request->input('nama_sekolah');
        $user->no_hp=$request->input('no_hp');
        $user->email=$request->input('email');
        $user->password=Hash::make ($request->input('password'));
        $user->save();

        if ($request->is('api/*') || $request->wantsJson()) {
            return response()->json([ 'pesan'=>'Anda Berhasil Melakukan Pendaftaran', 'data' => $user]);
        } else {
             return redirect('/loginpage');
            }
    }
    public function viewlogin()
    {
        $title = 'login';
        return view("landing-page.login")->with('title', $title);
    }
    public function loginpage(Request $request)
    {
        $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);
        $email = $request->input('email');
        $pass = $request->input('password');

        $useremail = Sekolah::where('email', $email)->first();
        if (!$useremail && Hash::check( $pass, $useremail->password)) {
             return back()->withErrors(['email' => 'Email atau password salah']);
        }
        auth()->login($useremail);
        // return response()->json([
        //     'pesan' => 'Anda Berhasil login',
        //     'data' => $useremail
        // ]);
            return redirect('/AdminUniv-dashboardBeforePayment')->with('success', 'login success');

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
