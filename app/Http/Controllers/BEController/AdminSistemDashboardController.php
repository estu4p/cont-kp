<?php

namespace App\Http\Controllers\BEController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminSistemDashboardController extends Controller
{
    public function filterDashboard(Request $request)
    {
        // Menghitung total subscription
        $totalSubscription = User::count();

        // Menghitung total aktif dan tidak aktif
        $totalAktif = User::where('status_akun', 'aktif')->count();
        $totalTidakAktif = User::where('status_akun', 'alumni')->count(); // Ubah sesuai dengan nilai yang menunjukkan status tidak aktif

        //return ke tampilan
        if ($request->is('api/*') || $request->wantsJson()) {
            return response()->json([
                'total_subscription' => $totalSubscription,
                'total_aktif' => $totalAktif,
                'total_alumni' => $totalTidakAktif,
            ], 200);
        } else {
            return view('SistemLokasi.AdminSistem-Dashboard', compact(['totalSubscription', 'totalAktif', 'totalTidakAktif']));
        }
    }
}
