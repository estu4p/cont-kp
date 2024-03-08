<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;


class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $nama_lengkap = $request->input('nama_lengkap');
        $nomor_induk_mahasiswa = $request->input('nomor_induk_mahasiswa');
        $jurusan = $request->input('jurusan');
        $email = $request->input('email');
        $username = $request->input('username');
        $no_hp = $request->input('no_hp');
        $role = $request->input('role');
        $barcode = $request->input('barcode');
        $password = $request->input('password');

        $user = new User();

        $user->nama_lengkap = $nama_lengkap;
        $user->nomor_induk_mahasiswa = $nomor_induk_mahasiswa;
        $user->jurusan = $jurusan;
        $user->email = $email;
        $user->username = $username;
        $user->no_hp = $no_hp;
        $user->role = $role;
        $user->barcode = $barcode;
        $user->password = $password;

        $user->save();

        return redirect()->route('login')->with('success', 'User registered successfully!');
    }
}