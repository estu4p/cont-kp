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


class HomeMitraController extends Controller
{
    public function pilihMitra(Request $request)
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
        $nama_lengkap = $request->input('id');
        $hari = $request->input('hari');
        $jam_masuk = $request->input('jam_masuk');
        $status_kehadiran = $request->input('status_kehadiran');
        $keterangan_status = $request->input('keterangan_status');
        $kebaikan = $request->input('kebaikan');
        $status_absensi = $request->input('status_absensi');

        $data = new Presensi;

        $data->nama_lengkap = $nama_lengkap;
        $data->hari = $hari;
        $data->keterangan_status = $keterangan_status;
        $data->kebaikan = $kebaikan;
        $data->status_absensi = $status_absensi;
        $data->jam_masuk = $jam_masuk;
        $data->status_kehadiran = $status_kehadiran;
        $data->save();

        if ($data) {
            return response([
                'pesan' => 'data berhasil',
                'data' => $data,
            ], 200);
        } else {
            return response([
                'pesan' => 'data tidak ada',
            ], 404);
        }
    }

    public function jamPulang(Request $request, string $id)
    {
        $data = Presensi::where('id', $id)->first();

        if ($data) {
            $jam_pulang = $request->input('jam_pulang');
            $data->jam_pulang = $jam_pulang;
            $data->save();

            return response()->json([
                'status' => 'success',
                'data' => $data,
            ], 200);
        } else {
            return response()->json([
                'status' => 'Data tidak ditemukan',
            ], 404);
        }
    }
    

    public function jamMulaiIstirahat(Request $request,string $id)
    {
        $data = Presensi::where('id', $id)->first();

        if ($data) {
            $jam_mulai_istirahat = $request->input('jam_mulai_istirahat');
            $data->jam_mulai_istirahat = $jam_mulai_istirahat;
            $data->save();

            return response()->json([
                'status' => 'success',
                'data' => $data,
            ], 200);
        } else {
            return response()->json([
                'status' => 'Data tidak ditemukan',
            ], 404);
        }
    }

    public function jamSelesaiIstirahat(Request $request, string $id)
    {
        $data = Presensi::where('id', $id)->first();

        if ($data) {
            $jam_selesai_istirahat = $request->input('jam_selesai_istirahat');
            $data->jam_selesai_istirahat = $jam_selesai_istirahat;
            $data->save();

            return response()->json([
                'status' => 'success',
                'data' => $data,
            ], 200);
        } else {
            return response()->json([
                'status' => 'Data tidak ditemukan',
            ], 404);
        }
    }

    public function totalJamKerja(Request $request, $id)
    {
        $data = Presensi::where('id', $id)->first();

        if ($data) {
            $jam_masuk = Carbon::parse($data->jam_masuk); // Pastikan ini adalah objek Carbon
            $jam_pulang = Carbon::parse($data->jam_pulang);

            if ($jam_masuk && $jam_pulang) {
                $total_jam_kerja = $jam_masuk->diffInHours($jam_pulang);
                $data->total_jam_kerja = $total_jam_kerja;
                $data->save();

                return response()->json([
                    'status' => 'success',
                    'data' => $data,
                ], 200);
            } else {
                return response()->json([
                    'status' => 'Jam masuk atau jam pulang belum diisi',
                ], 400);
            }
        } else {
            return response()->json([
                'status' => 'Data tidak ditemukan',
            ], 404);
        }
    }

    public function catatLogAktivitas(Request $request, $id)
    {
        $data = Presensi::where('id', $id)->first();

        if ($data) {
            $log_aktivitas = $request->input('log_aktivitas');
            $data->log_aktivitas = $log_aktivitas;
            $data->save();

            return response()->json([
                'status' => 'success',
                'data' => $data,
            ], 200);
        } else {
            return response()->json([
                'status' => 'Data tidak ditemukan',
            ], 404);
        }
    }

    public function catatIzin(Request $request, $id)
    {
        $data = Presensi::where('id', $id)->first();

        if ($data) {
            $status_kehadiran = $request->input('status_kehadiran');
            $data->status_kehadiran = $status_kehadiran;
            $data->save();

            return response()->json([
                'status' => 'Izin magang berhasil dicatat',
                'data' => $data,
            ], 200);
        } else {
            return response()->json([
                'status' => 'Data presensi tidak ditemukan',
            ], 404);
        }
    }

    public function barcode(Request $request, $id)
    {
        $data = Presensi::where('id', $id)->first();

        if ($data) {
            $barcode = $request->input('barcode');
            $data->barcode = $barcode;
            $data->save();

            return response()->json([
                'status' => 'Presensi berhasil dicatat',
                'data' => $data,
            ], 200);
        } else {
            return response()->json([
                'status' => 'Barcode tidak valid',
            ], 404);
        }
    }

    public function detailGantiJam(Request $request, $id)
    {
        $data = Presensi::select('hari', 'keterangan_status', 'status_kehadiran')->find($id);   
        if ($data) {
            return response([
                'pesan' => 'data berhasil di tampilkan',
                'data' => $data,
            ], 200);
        } else {
            return response([
                'pesan' => 'data tidak ada',
            ], 404);
        }
    }
}
