<?php

namespace App\Http\Controllers\BEController;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PenilaianMitraController extends Controller
{
    public function showPenilaianSiswa()
    {
        $mahasiswa = User::with('divisi')->where('role_id', 3)->get();
        return view('penilaian-siswa.penilaian-mahasiswa', compact('mahasiswa'));
    }


    public function input_nilai(Request $request, $nama_lengkap)
    {
        $user = User::where('nama_lengkap', urldecode($nama_lengkap))->first();
        $mahasiswa = User::where('nama_lengkap', $user->id)->get();
        return view('penilaian-siswa.input-nilai', compact(['nama_lengkap','mahasiswa','user']));

    }

}




