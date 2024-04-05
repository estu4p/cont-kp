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


    public function getPresensiByNama(Request $request)
    {
        $nama = $request->input('nama');
        $id = $request->input('id');

        $query = Presensi::query();

        // Filter berdasarkan nama
        if ($nama) {
            $query->where('nama_lengkap', 'like', '%' . $nama . '%');
        }
        // Filter berdasarkan id
        if ($id) {
            $query->where('id', $id);
        }
        // Ambil data presensi
        $presensi = $query->select('id','nama_lengkap', 'hari', 'jam_masuk', 'jam_pulang', 'jam_mulai_istirahat', 'jam_selesai_istirahat', 'total_jam_kerja', 'log_aktivitas', 'aksi', 'status_kehadiran', 'kebaikan')
                            ->get();
        // Periksa apakah ada data yang ditemukan
        if ($presensi->isEmpty()) {
            return response()->json(["message" => "Tidak ada data presensi untuk nama '$nama' dan ID '$id'"], 404);
        }
        // Jika ada data, kembalikan data sebagai JSON
        return response()->json($presensi, 200);
    }

    public function presensiAccept(Request $request, $id)
    {
        // Cari presensi berdasarkan ID
        $presensi = Presensi::find($id);

        // Jika tidak ada presensi dengan ID yang diberikan
        if (!$presensi) {
            return response()->json(["message" => "Presensi dengan ID '$id' tidak ditemukan"], 404);
        }

        // Periksa jika presensi sudah diceklist
        if ($presensi->aksi === 1) {
            return response()->json(["message" => "Log aktivitas pada presensi dengan ID '$id' sudah benar"], 200);
        }

        // Jika belum diceklist, lakukan pembaruan
        $presensi->aksi = 1;
        $presensi->save();

        return response()->json(["message" => "Log aktivitas pada presensi dengan ID '$id' berhasil diperbarui menjadi ceklist"], 200);
    }


    public function presensiReject(Request $request)
    {
        $log_activitas = $request->input('log_activitas');
        $id = $request->input('id');

        // Cari presensi berdasarkan ID
        $presensi = Presensi::find($id);

        // Jika tidak ada presensi dengan ID yang diberikan
        if (!$presensi) {
            return response()->json(["message" => "Presensi dengan ID '$id' tidak ditemukan"], 404);
        }

        // Update log aktivitas button silang
        $presensi->log_aktivitas = $log_activitas;
        $presensi->aksi = 0; // Update aksi menjadi 0 (Silang)
        $presensi->save();

        return response()->json(["message" => "Log aktivitas pada presensi dengan ID '$id' berhasil diperbarui"], 200);
    }



    public function presensiAcceptAll()
    {
        // Mengambil semua presensi yang belum diceklist
        $presensiBelumDiceklist = Presensi::where('aksi', '!=', 1)->get();

        // Jika tidak ada presensi yang belum diceklist
        if ($presensiBelumDiceklist->isEmpty()) {
            return response()->json(["message" => "Tidak ada presensi yang perlu di-update"], 200);
        }

        // Mengubah status aksi menjadi diceklist (1) untuk semua presensi yang belum diceklist
        foreach ($presensiBelumDiceklist as $presensi) {
            $presensi->aksi = 1;
            $presensi->save();
        }

        return response()->json(["message" => "Seluruh presensi berhasil diperbarui menjadi accept all"], 200);
    }


}




