<?php

namespace App\Http\Controllers\BEController;

use App\Http\Controllers\Controller;
use App\Models\Presensi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PresensiMitraController extends Controller
{
    // public function getAllPresensi()
    // {

    //         $presensi = Presensi::select('nama_lengkap', 'hari', 'jam_masuk', 'jam_pulang', 'jam_mulai_istirahat', 'jam_selesai_istirahat', 'total_jam_kerja', 'log_aktivitas', 'aksi', 'status_kehadiran', 'kebaikan')
    //                             ->get();

    //         // Periksa apakah ada data yang ditemukan
    //         if ($presensi->isEmpty()) {
    //             return "Tidak ada data presensi yang ditemukan";
    //         }

    //         // Jika ada data, kembalikan data sebagai array
    //         return $presensi;

    // }
    public function getAllPresensi()
    {
        $presensi = Presensi::all();

        // Periksa apakah ada data yang ditemukan
        if ($presensi->isEmpty()) {
            return "Tidak ada data presensi yang ditemukan";
        }
        // Jam default masuk dan pulang
        $defaultMasuk = Carbon::createFromFormat('H:i:s', '06:30:00');
        $defaultPulang = Carbon::createFromFormat('H:i:s', '13:00:00');

        // Looping untuk menghitung selisih waktu dan menyimpannya kembali dalam array
        foreach ($presensi as $data) {
            $jamMasuk = Carbon::createFromFormat('H:i:s', $data->jam_masuk);
            $jamPulang = Carbon::createFromFormat('H:i:s', $data->jam_pulang);

            // Hitung selisih waktu antara default masuk-pulang dan masuk-pulang dari data presensi
            $selisihDefault = $defaultPulang->diff($defaultMasuk)->format('%H:%I:%S');
            $selisihPresensi = $jamPulang->diff($jamMasuk)->format('%H:%I:%S');

            // Hitung selisih antara kedua selisih waktu
            $selisih_jam = Carbon::createFromFormat('H:i:s', $selisihPresensi)->diff(Carbon::createFromFormat('H:i:s', $selisihDefault))->format('%H:%I:%S');

            // Simpan selisih total ke dalam array data presensi
            $data->selisih_jam = $selisih_jam;
        }
        // Jika ada data, kembalikan view blade dengan data presensi
        return view('user.ContributorForMitra.MitraPresensi', ['presensi' => $presensi]);
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
        return view('user.ContributorForMitra.datapresensi', ['presensi' => $presensi]);
    }

    public function presensiAccept(Request $request)
    {
        $id = $request->id;
        // Cari presensi berdasarkan ID
        $presensi = Presensi::find($id);

        // Jika tidak ada presensi dengan ID yang diberikan
        if (!$presensi) {
            return response()->json(["message" => "Presensi dengan ID '$id' tidak ditemukan"], 404);
        }

        // Jika belum diceklist, lakukan pembaruan
        $presensi->aksi = 1;
        $presensi->save();
        return redirect()->route('daftar-presensi')->with('success', "Log aktivitas pada presensi dengan ID '$id' berhasil diperbarui menjadi ceklist");
    }


    public function presensiReject(Request $request)
    {
        // Validasi input
        $request->validate([
            'id' => 'required',
            'log_activitas' => 'required',
        ]);

        // Ambil data dari formulir
        $id = $request->id;
        $logActivitas = $request->log_activitas;

        // Temukan presensi berdasarkan user ID
        $presensi = Presensi::find($id);

        // Periksa apakah presensi ditemukan
        if (!$presensi) {
            return response()->json(["message" => "Presensi dengan  ID '$id' tidak ditemukan"], 404);
        }

        // Update log aktivitas
        $presensi->update(['log_aktivitas' => $logActivitas]);
        return redirect()->route('daftar-presensi')->with('success', "Log aktivitas pada presensi dengan user ID '$id' berhasil diperbarui");
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
