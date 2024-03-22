<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


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
        if ($user) {
            return response([
                'pesan' => 'user berhasil',
                'user$user' => $user,
            ], 200);
        } else {
            return response([
                'pesan' => 'Gagal',
            ], 404);
        }

        // return redirect()->route('user.login')->with('success', 'User registered successfully!');
        return view('user.login', ['title' => "Login"]);
    }

    public function generateQRCode($userData)
    {
        $qrCodeString = QrCode::size(300)->generate($userData);
        $qrCodeDataUri = 'data:image/png;base64,' . base64_encode($qrCodeString);
        return $qrCodeDataUri;
    }

    public function showRegisterForm(Request $request)
    {
        $userData = "data pengguna";
        $qrCode = $this->generateQRCode($userData);
        
        $register = $this->register($request);

        return view('user.register', ['QRcode' => $qrCode, 'register' => $register]);
    }
}