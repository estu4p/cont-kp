<?php

namespace App\Http\Controllers;

use App\Models\Presensi;
use Illuminate\Http\Request;

class PresensiCobaController extends Controller
{
    public function index()
    {
        $presensi = Presensi::all();
        return view('PresensiCoba', compact('presensi'));
    }
    public function jamMasuk(Request $request)
    {
        $Presensi = new Presensi();
        $Presensi->nama_lengkap = $request->user()->id; // Mengasumsikan user telah login
        $Presensi->hari = date('Y-m-d');
        $Presensi->jam_masuk = now();
        $Presensi->save();
        return redirect('/presensi/keluar');
    }
    public function keluar()
    {
        $presensi = Presensi::all();
        return view('PresensiCobaKeluar', compact('presensi'));
    }
    public function jamKeluar(Request $request)
    {
        $lastPresensi = Presensi::where('nama_lengkap', $request->user()->id)
            ->whereDate('hari', date('Y-m-d')) // Ambil data presensi untuk hari ini
            ->latest()
            ->first();
        if ($lastPresensi) {
            $lastPresensi->jam_pulang = now(); // Simpan waktu presensi keluar
            $lastPresensi->save();
            return redirect()->back()->with('success', 'Presensi keluar berhasil')->with('lastPresensi', $lastPresensi);
        } else {
            return redirect()->back()->with('error', 'Anda belum melakukan presensi masuk hari ini')->with('lastPresensi', $lastPresensi);
        }
    }
}
