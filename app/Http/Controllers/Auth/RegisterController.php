<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Picqer\Barcode\BarcodeGeneratorPNG;



class RegisterController extends Controller
{
    public function index()
    {
        return view('user.register');
    }

    public function register(Request $request)
    {
        $nama_lengkap = $request->input('nama_lengkap');
        $nomor_induk = $request->input('nomor_induk');
        $jurusan = $request->input('jurusan');
        $email = $request->input('email');
        $username = $request->input('username');
        $no_hp = $request->input('no_hp');
        $barcode = $request->input('barcode');
        $password = $request->input('password');

        $user = new User();

        $user->nama_lengkap = $nama_lengkap;
        $user->nomor_induk = $nomor_induk;
        $user->jurusan = $jurusan;
        $user->email = $email;
        $user->username = $username;
        $user->no_hp = $no_hp;
        $user->barcode = $barcode;
        $user->password = $password;

        $user->save();

        // return redirect()->route('user.login')->with('success', 'User registered successfully!');
        return view('user.login', ['title' => "Login"]);
    }

    public function generateBarcode($userData)
    {
        $generator = new BarcodeGeneratorPNG();
        $barcode = 'data:image/png;base64,' . base64_encode($generator->getBarcode($userData, $generator::TYPE_CODE_128));
        return $barcode;
    }

    public function showRegisterForm()
    {
        $barcodeData = 'unique_data_for_each_user'; // Data unik untuk setiap pengguna (misalnya ID pengguna)
        $barcode = $this->generateBarcode($barcodeData);

        return view('register', ['barcode' => $barcode]);
    }

    public function registerWithBarcode(Request $request)
    {
        // Menerima data yang dikirim dari aplikasi mobile (seperti barcode)
        $barcode = $request->input('barcode');

        // Mencari pengguna berdasarkan barcode
        $user = User::where('barcode', $barcode)->first();

        // Jika pengguna tidak ditemukan berdasarkan barcode, kembalikan respons error
        if (!$user) {
            return response()->json(['error' => 'Barcode tidak valid'], 400);
        }
        $user->nama_lengkap = $request->input('nama_lengkap');
        $user->nomor_induk = $request->input('nomor_induk');
        $user->jurusan = $request->input('jurusan');
        $user->email = $request->input('email');
        $user->username = $request->input('username');
        $user->no_hp = $request->input('no_hp');
        $user->password = bcrypt($request->input('password')); // Anda juga bisa menggunakan Hash::make untuk mengenkripsi password

        $user->save();

        // return response()->json(['success' => true, 'message' => 'Registrasi berhasil'], 200);
        return view('user.login', ['title' => "Login"]);
    }
}