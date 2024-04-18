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
    $siswa = Presensi::findOrFail($id);
    // Mengirim data siswa ke view
    return view('presensi.datapresensisiswa', compact('siswa'));
}
    public function DataPresensi()
    {
        // Ambil data presensi dari database
        $presensiharian = Presensi::all(); // Anda mungkin perlu mengatur query sesuai dengan kebutuhan aplikasi Anda

        // Kirim data presensi ke halaman view
        return view('presensi.presensiharian', compact('presensiharian'));
    }
}
