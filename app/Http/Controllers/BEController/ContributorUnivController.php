<?php

namespace App\Http\Controllers\BEController;

use App\Http\Controllers\Controller;
use App\Models\Presensi;
use Illuminate\Http\Request;
use App\Models\User;

class ContributorUnivController extends Controller
{
    public function DataPresensiSiswa($id)
    {
        // Mengambil data siswa berdasarkan ID
       
        $datasiswa = Presensi::with('user')->where('nama_lengkap', $id)->first();
        $presensi = Presensi::where('nama_lengkap', $id)->get();

  

    // Menangani kasus di mana siswa tidak ditemukan
    if (!$datasiswa) {
        abort(404); // Tampilkan halaman 404 jika siswa tidak ditemukan
    }

    // Mengambil data presensi siswa menggunakan relasi antara User dan Presensi
    // $presensi_siswa = $datasiswa->presensi;

    // Mengirim data siswa dan presensi ke view
    return view('presensi.datapresensisiswa', compact('datasiswa', 'presensi'));
}

    public function DataPresensi()
    {
        // Ambil data presensi dari database
        $presensiharian = Presensi::all(); // Anda mungkin perlu mengatur query sesuai dengan kebutuhan aplikasi Anda

        // Kirim data presensi ke halaman view
        return view('presensi.presensiharian', compact('presensiharian'));
    }
}
