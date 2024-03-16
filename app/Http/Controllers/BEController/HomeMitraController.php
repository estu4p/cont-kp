<?php

namespace App\Http\Controllers\BEController;

use App\Models\User;
use App\Models\Mitra;
use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


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

        $keterangan_status = $request->keterangan_status;
        $absensi = new Presensi();
        $absensi->id = $request-> id;
        $absensi->jam_masuk = now();
        $absensi->keterangan_status = $keterangan_status;
        $absensi->save();

        return response()->json(['message' => 'Jam masuk berhasil dicatat'], 200);
    }

    public function jamPulang(Request $request)
    {
        $request->validate([
            'jam_pulang' => 'required|date_format:H:i:s',
        ]);

        $keterangan_status = $request->keterangan_status;
        $absensi = Presensi::where('id', $request->id)->latest()->first();
        $absensi->jam_pulang = now();
        $absensi->keterangan_status = $keterangan_status;
        $absensi->save();

        return response()->json(['message' => 'Jam pulang berhasil dicatat'], 200);
    }

    public function jamMulaiIstirahat(Request $request)
    {
        $request->validate([
            'jam_mulai_istirahat' => 'required|date_format:H:i:s',
        ]);

        $keterangan_status = $request->keterangan_status;
        $absensi = Presensi::where('id', $request->id)->latest()->first();
        $absensi->jam_mulai_istirahat = now();
        $absensi->keterangan_status = $keterangan_status; 
        $absensi->save();

        return response()->json(['message' => 'Jam mulai istirahat berhasil dicatat'], 200);
    }

    public function jamSelesaiIstirahat(Request $request)
    {
        $request->validate([
            'jam_selesai_istirahat' => 'required|date_format:H:i:s',
        ]);

        $keterangan_status = $request->keterangan_status;
        $absensi = Presensi::where('id', $request->id)->latest()->first();
        $absensi->jam_selesai_istirahat = now();
        $absensi->keterangan_status = $keterangan_status; 
        $absensi->save();

        return response()->json(['message' => 'Jam selesai istirahat berhasil dicatat'], 200);
    }

    public function totalJamKerja(Request $request)
    {
        $request->validate([
            'total_jam_kerja' => 'required|date_format:H:i:s',
        ]);

        $keterangan_status = $request->keterangan_status;
        $absensi = Presensi::where('id', $request->id)->latest()->first();
        $total_jam_kerja = $absensi->jam_pulang->diffInHours($absensi->jam_masuk);
        $absensi->keterangan_status = $keterangan_status; 
        $total_jam_kerja->save();

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

    public function catatIzin(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:presensi,id',
            'status_kehadiran' => 'required|in:Hadir,Izin,Sakit,Tidak Hadir',
        ]);

        $status_kehadiran = $request->status_kehadiran;
        $id = $request->id;
        $absensi = Presensi::find($request->id);
        if ($absensi) {
            $absensi->status_kehadiran = $status_kehadiran;
            $absensi->save();
            return response()->json(['message' => 'Izin magang berhasil dicatat'], 200);
        } else {
            return response()->json(['message' => 'Data presensi tidak ditemukan'], 404);
        }
    }

    public function barcode(Request $request)
    {     
        $request->validate([
            'barcode' => 'required|string|max:255',
        ]);

        $user = User::where('barcode', $request->barcode)->first();

        if (!$user) {
            return response()->json(['message' => 'Barcode tidak valid'], 404);
        }
        $presensi = new Presensi();
        $presensi->nama_lengkap = $user->id;
        $presensi->jam_masuk = Carbon::now();
        $presensi->status_kehadiran = 'Hadir'; 
        $presensi->save();

        return response()->json(['message' => 'Presensi berhasil dicatat'], 200);
    }

    public function detailGantiJam(Request $request)
    {
        $request->validate([
            'hari' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu|date_format:Y-m-d',
            'keterangan_izin' => 'required|string',
            'status' => 'required|string|in:Ganti jam',
        ]);

        $hari = $request->hari;
        $keterangan_izin = $request->keterangan_izin;
        $status = $request->status;

        $detailGantiJam = Presensi::where('hari', $hari)
            ->where('keterangan_izin', $keterangan_izin)
            ->where('status', $status)
            ->get();

        if ($detailGantiJam->isNotEmpty()) {
            return response()->json(['data' => $detailGantiJam], 200);
        } else {
            return response()->json(['message' => 'Detail ganti jam tidak ditemukan'], 404);
        }
    }
}
