<?php

namespace App\Http\Controllers\BEController;

use App\Http\Controllers\Controller;
use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PresensiMitraController extends Controller
{
    public function getAllPresensi()
    {

            $presensi = Presensi::select('nama_lengkap', 'hari', 'jam_masuk', 'jam_pulang', 'jam_mulai_istirahat', 'jam_selesai_istirahat', 'total_jam_kerja', 'log_aktivitas', 'aksi', 'status_kehadiran', 'kebaikan')
                                ->get();

            // Periksa apakah ada data yang ditemukan
            if ($presensi->isEmpty()) {
                return "Tidak ada data presensi yang ditemukan";
            }

            // Jika ada data, kembalikan data sebagai array
            return $presensi;
        
    }


    public function getPresensiById($id)
    {
        try {
            // Ambil data presensi berdasarkan ID nama
            $presensi = Presensi::where('nama_lengkap', $id)
                                ->select('nama_lengkap', 'hari', 'jam_masuk', 'jam_pulang', 'jam_mulai_istirahat', 'jam_selesai_istirahat', 'total_jam_kerja', 'log_aktivitas', 'aksi', 'status_kehadiran', 'kebaikan')
                                ->get();

            // Periksa apakah ada data yang ditemukan
            if ($presensi->isEmpty()) {
                return "Tidak ada data presensi untuk ID nama '$id'";
            }

            // Jika ada data, kembalikan data sebagai array
            return $presensi;
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            return "Terjadi kesalahan: " . $e->getMessage();
        }
    }




}




