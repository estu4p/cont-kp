<?php

namespace App\Http\Controllers\BEController;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
use App\Models\Presensi;
use App\Models\Sekolah;
use App\Models\User;
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


    public function getPresensiByNama(Request $request, $nama_lengkap)
    {
        $query = Presensi::query();

        // Ambil data presensi berdasarkan nama lengkap yang di-klik
        $presensi = Presensi::where('nama_lengkap', 'like', '%' . $nama_lengkap. '%')->get();

        // Ambil data presensi
        $presensi = $query->select('id','nama_lengkap', 'hari', 'jam_masuk', 'jam_pulang', 'jam_mulai_istirahat', 'jam_selesai_istirahat', 'total_jam_kerja', 'log_aktivitas', 'aksi', 'status_kehadiran', 'kebaikan')
                        ->get();

        // Periksa apakah ada data yang ditemukan
        if ($presensi->isEmpty()) {
            return response()->json(["message" => "Tidak ada data presensi untuk nama '$nama_lengkap'"], 404);
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

        // Jika ada data, kembalikan data sebagai JSON atau view
        if ($request->is('api/*') || $request->wantsJson()) {
            return response()->json($presensi, 200);
        } else {
            return view('user.ContributorForMitra.datapresensi', ['presensi' => $presensi]);
        }
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
        $presensi->aksi = 0;
        $presensi->save();
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

    // public function dataPresensi(Request $request)
    // {
    //     $nama_lengkap = $request->nama_lengkap;
    //     //validasi nama lengkap
    //     $user = User::where('nama_lengkap', $nama_lengkap)->firstOrFail();

    //     // Menampilkan Divisi
    //     $divisi_user = $user->divisi_id;
    //     $divisi = Divisi::find($divisi_user);

    //     // Menampilkan Sekolah
    //     $sekolah_user = $user->sekolah;
    //     $sekolah = Sekolah::find($sekolah_user);

    //     // Mengambil data presensi
    //     $presensi = Presensi::where('nama_lengkap', $nama_lengkap)->get();

    //     // Hitung total jam masuk dalam format waktu
    //     $totalJamMasuk = $presensi->sum(function ($item) {
    //     // Ubah format jam masuk menjadi array jam, menit, dan detik
    //     $jam_masuk_parts = explode(':', $item->jam_masuk);


    //     // Pastikan format jam masuk sesuai (HH:MM:SS)
    //     if (count($jam_masuk_parts) == 3) {
    //         // Ambil jam, menit, dan detik dari jam masuk
    //         $jam = intval($jam_masuk_parts[0]);
    //         $menit = intval($jam_masuk_parts[1]);
    //         $detik = intval($jam_masuk_parts[2]);

    //         // Hitung total detik dari jam masuk
    //         $totalDetik = $jam * 3600 + $menit * 60 + $detik;

    //         // Kembalikan total detik
    //         return $totalDetik;
    //     } else {
    //         // Jika format jam masuk tidak sesuai, kembalikan nilai 0
    //         return 0;
    //     }
    // });

    //     // Konversi total jam masuk dari detik ke format jam:menit:detik
    //     $jam = floor($totalJamMasuk / 3600);
    //     $menit = floor(($totalJamMasuk % 3600) / 60);
    //     $detik = $totalJamMasuk % 60;

    //     $totalJamMasukFormatted = sprintf('%02d:%02d:%02d', $jam, $menit, $detik);

    //     // Hitung total masuk (dalam jam)
    //     $totalMasukJam = floor($totalJamMasuk / 3600);

    //     $tjammasuk = Presensi::where('nama_lengkap', $nama_lengkap)
    //     ->whereNotNull('jam_masuk')
    //     ->whereNotNull('jam_pulang')
    //     ->where('status_kehadiran', 'Hadir')
    //     ->selectRaw('IFNULL(SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(jam_pulang, jam_masuk)))), "00:00:00") AS total_jam_masuk')
    //     ->first();

    //     // total jam masuk format integer
    //     $totalJamMasuk = $tjammasuk->total_jam_masuk;

    //     // total masuk dalam detik
    //     $jamMasukDetik = Carbon::parse($totalJamMasuk)->diffInSeconds(Carbon::today());

    //     // Hitung total masuk dalam hari
    //     $totalMasukHari = $presensi->count();

    //     $target = 1092; //dalam jam

    //     $sisa = $target - $totalMasukJam;

    //     $kehadiranPerNama = Presensi::select('nama_lengkap')
    //         ->groupBy('nama_lengkap')->with('user')
    //         ->get()
    //         ->map(function ($item, $key) {
    //             $item['total_kehadiran'] = Presensi::where('nama_lengkap', $item->nama_lengkap)
    //                 ->where('status_kehadiran', 'hadir')
    //                 ->count();
    //             $item['total_izin'] = Presensi::where('nama_lengkap', $item->nama_lengkap)
    //                 ->where('status_kehadiran', 'izin')
    //                 ->count();
    //             $item['total_ketidakhadiran'] = Presensi::where('nama_lengkap', $item->nama_lengkap)
    //                 ->where('status_kehadiran', 'Tidak Hadir')
    //                 ->count();

    //             return $item;
    //         });

    //     //return ke tampilan
    //     if ($request->is('api/*') || $request->wantsJson()) {
    //         return response()->json([
    //             'message' => 'Berhasil mendapat data',
    //             'presensi' => $presensi,
    //             'totalJamMasuk' => $totalJamMasuk,
    //             'totalMasuk' => $totalMasukHari,
    //             'target lulus' => $target,
    //             'sisa' => $sisa
    //         ], 200);
    //     } else {
    //         return view('user.ContributorForMitra.datapresensi', compact(['presensi', 'sekolah', 'divisi', 'user', 'totalJamMasuk', 'totalMasukHari', 'target', 'sisa']));
    //     }
    // }


}
