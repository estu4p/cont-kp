<?php

namespace App\Http\Controllers\BEController;

use App\Models\Mitra;
use App\Models\Presensi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class HomeMitraController extends Controller
{
    public function pilihMitra (Request $request)
    {
        $mitra = Mitra::all();
        $divisi = Mitra::all();
        
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'nama_mitra' => 'required|string',
                'divisi_mitra' => 'required|string',
            ]);

            // Ambil ID mitra yang dipilih dari formulir
            $selectedMitraNama = $request->input('nama_mitra');
            $selectedDivisiNama = $request->input('divisi_mitra');

            // Cari ID mitra dan divisi berdasarkan nama
            $selectedMitraId = Mitra::where('nama_mitra', $selectedMitraNama)->value('id');
            $selectedDivisiId = Mitra::where('divisi_mitra', $selectedDivisiNama)->value('id');

            // Simpan ID mitra yang dipilih ke dalam sesi
            Session::put('selected_mitra_id', $selectedMitraId);
            Session::put('selected_divisi_id', $selectedDivisiId);

            return redirect()->route('home_masuk')->with('success', 'Anda telah memilih mitra!');
        }
        return view('pilihmitra', compact('mitra', 'divisi')); 
    }

    public function jamMasuk(Request $request)
    {
        $request->validate([
            'jam_masuk' => 'required|date_format:H:i:s',
        ]);

        $absensi = new Presensi();
        $absensi->id = $request-> id;
        $absensi->jam_masuk = now();
        $absensi->save();

        return response()->json(['message' => 'Jam masuk berhasil dicatat'], 200);
    }

    public function jamPulang(Request $request)
    {
        $request->validate([
            'jam_pulang' => 'required|date_format:H:i:s',
        ]);

        $absensi = Presensi::where('id', $request->id)->latest()->first();
        $absensi->jam_pulang = now(); 
        $absensi->save();

        return response()->json(['message' => 'Jam pulang berhasil dicatat'], 200);
    }

    public function jamMulaiIstirahat(Request $request)
    {
        $request->validate([
            'jam_mulai_istirahat' => 'required|date_format:H:i:s',
        ]);

        $absensi = Presensi::where('id', $request->id)->latest()->first();
        $absensi->jam_mulai_istirahat = now(); 
        $absensi->save();

        return response()->json(['message' => 'Jam mulai istirahat berhasil dicatat'], 200);
    }

    public function jamSelesaiIstirahat(Request $request)
    {
        $request->validate([
            'jam_selesai_istirahat' => 'required|date_format:H:i:s',
        ]);

        $absensi = Presensi::where('id', $request->id)->latest()->first();
        $absensi->jam_selesai_istirahat = now(); 
        $absensi->save();

        return response()->json(['message' => 'Jam selesai istirahat berhasil dicatat'], 200);
    }

    public function totalJamKerja(Request $request)
    {
        $request->validate([
            'total_jam_kerja' => 'required|date_format:H:i:s',
        ]);

        $absensi = Presensi::where('id', $request->id)->latest()->first();
        $total_jam_kerja = $absensi->jam_pulang->diffInHours($absensi->jam_masuk);

        return response()->json(['total_jam_kerja' => $total_jam_kerja], 200);
    }

    public function catatLogAktivitas(Request $request)
    {
        $log_aktivitas = $request->input('log_aktivitas');

        $presensi = new Presensi();

        $presensi->log_aktivitas = $log_aktivitas;
        $presensi->jam_masuk = now();
        $presensi->jam_pulang = now();
        $presensi->jam_mulai_istirahat = now();
        $presensi->jam_selesai_istirahat = now();
        $presensi->status_kehadiran = 'Hadir';
        $presensi->kebaikan = 'Tidak ada';  
        $presensi->save();

        return response()->json([
            'status' => 'success',
            'data' =>
            $presensi->log_aktivitas,
        ], 200);
    }
}
