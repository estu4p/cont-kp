<?php

namespace App\Http\Controllers\BEController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MitraMahasiswa;

class AS_DashboardController extends Controller
{
    public function filterDashboard()
    {
        // Menghitung total subscription
        $totalSubscription = MitraMahasiswa::count();
        
        // Menghitung total aktif dan tidak aktif
        $totalAktif = MitraMahasiswa::where('jumlah_subcription', 'aktif')->count();
        $totalTidakAktif = MitraMahasiswa::where('jumlah_subcription', 'tidak aktif')->count();

        return response()->json([
            'total_subscription' => $totalSubscription,
            'total_aktif' => $totalAktif,
            'total_tidak_aktif' => $totalTidakAktif,
        ]);
    }
}
