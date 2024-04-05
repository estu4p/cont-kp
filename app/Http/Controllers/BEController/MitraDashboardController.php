<?php

namespace App\Http\Controllers\BEController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Presensi; // Ubah ini menjadi model yang sesuai dengan nama model Presensi Anda

class MitraDashboardController extends Controller
{
    public function filterMahasiswa()
    {
        $totalMahasiswa = Presensi::count();
        $totalHadir = Presensi::where('status_kehadiran', 'Hadir')->count();
        $totalIzin = Presensi::where('status_kehadiran', 'Izin')->count();

        return response()->json([
            'total_mahasiswa' => $totalMahasiswa,
            'total_hadir' => $totalHadir,
            'total_izin' => $totalIzin,
        ]);
    }
}
