<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class RegisterController extends Controller
{
    public function index()
    {
        return view('user.register');
    }
    public function register_user(Request $request)
    {
        $existingUser = User::where('email', $request->email)->orWhere('username', $request->username)->latest();
        if ($existingUser) {
            return redirect()->route('register')->with('error', 'Email anda sudah terdaftar, Silahkan Login!');
        }
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nomor_induk' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|string|unique:users,username',
            'no_hp' => 'required|string',
            'password' => 'required|string|confirmed|min:8',
        ]);
        
        $user = User::create([
            'nama_lengkap' => $request->nama_lengkap,
            'nomor_induk' => $request->nomor_induk,
            'jurusan' => $request->jurusan,
            'email' => $request->email,
            'username' => $request->username,
            'no_hp' => $request->no_hp,
            'role_id' => 3,
            'password' => Hash::make($request->password)
        ]);

        if ($user) {
            $userId = $user->id;
            $user->barcode = $userId;
            $user->save();
            return redirect()->route('user.login')->with('success', 'User registered successfully!');
        } else {
            return response([
                'pesan' => 'Gagal',
            ], 404);
        }
    }

    // public function generateQRCode($userData)
    // {
    //     $qrCodeString = QrCode::size(300)->generate($userData);
    //     $qrCodeDataUri = 'data:image/png;base64,' . base64_encode($qrCodeString);
    //     return $qrCodeDataUri;
    // }

    // public function showRegisterForm(Request $request)
    // {
    //     $userData = "data pengguna";
    //     $qrCode = $this->generateQRCode($userData);

    //     $register = $this->register($request);

    //     return view('user.register', ['QRcode' => $qrCode, 'register' => $register]);
    // }
}
