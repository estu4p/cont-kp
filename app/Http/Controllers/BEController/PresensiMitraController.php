<?php

namespace App\Http\Controllers\BEController;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
use App\Models\Presensi;
use App\Models\Sekolah;
use App\Models\Shift;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Dompdf\Dompdf;


class PresensiMitraController extends Controller
{
    public function getAllPresensi()
    {
        $presensi = Presensi::all();
        return view('user.ContributorForMitra.MitraPresensi', ['presensi' => $presensi]);
    }


    public function getPresensiByNama(Request $request, $nama_lengkap)
    {
        // Cari pengguna berdasarkan nama lengkap
        $user = User::where('nama_lengkap', urldecode($nama_lengkap))->first();

        // Periksa apakah pengguna dengan nama yang diberikan ditemukan
        if (!$user) {
            return redirect()->back()->with('error', "Pengguna dengan nama '$nama_lengkap' tidak ditemukan");
        }

        // Ambil data presensi berdasarkan nama lengkap yang di-klik
        $presensi = Presensi::where('nama_lengkap', $user->id)->get();
        // Periksa apakah ada data yang ditemukan
        if ($presensi->isEmpty()) {
            return redirect()->back()->with('error', "Tidak ada data presensi untuk nama '$nama_lengkap'");
        }

        // Mengambil data shift berdasarkan user
        $shift = $user->shift;
        // Pastikan shift ditemukan
        if ($shift) {
            // Mengambil jam default masuk dan pulang dari shift
            $jam_default_masuk = $shift->jam_masuk;
            $jam_default_pulang = $shift->jam_pulang;
        } else {
            // Jika shift tidak ditemukan, atur nilai default
            $jam_default_masuk = 'Belum Ditentukan';
            $jam_default_pulang = 'Belum Ditentukan';
        }

        // Menginisialisasi total terlambat masuk dan pulang,istirahat,izin
        $total_terlambat_masuk = 0;
        $total_terlambat_pulang = 0;
        $total_terlambat_istirahat_keluar = 0;
        $total_terlambat_istirahat_kembali = 0;
        $total_terlambat_ijin_keluar = 0;
        $total_terlambat_ijin_kembali = 0;

        // Menghitung total terlambat masuk dan pulang
        foreach ($presensi as $item) {
            // Menghitung total terlambat masuk
            if ($item->jam_masuk > $jam_default_masuk) {
                $total_terlambat_masuk++;
            }

            // Menghitung total terlambat pulang
            if ($item->jam_pulang > $jam_default_pulang) {
                $total_terlambat_pulang++;
            }
            if ($item->terlambat_istirahat_keluar > 0) {
                $total_terlambat_istirahat_keluar++;
            }

            if ($item->terlambat_istirahat_kembali > 0) {
                $total_terlambat_istirahat_kembali++;
            }

            if ($item->terlambat_ijin_keluar > 0) {
                $total_terlambat_ijin_keluar++;
            }

            if ($item->terlambat_ijin_kembali > 0) {
                $total_terlambat_ijin_kembali++;
            }
        }

        // Hitung total jam masuk dalam format waktu
        $totalJamMasuk = $presensi->sum(function ($item) {
            // Ubah format jam masuk menjadi array jam, menit, dan detik
            $jam_masuk_parts = explode(':', $item->jam_masuk);

            // Pastikan format jam masuk sesuai (HH:MM:SS)
            if (count($jam_masuk_parts) == 3) {
                // Ambil jam, menit, dan detik dari jam masuk
                $jam = intval($jam_masuk_parts[0]);
                $menit = intval($jam_masuk_parts[1]);
                $detik = intval($jam_masuk_parts[2]);

                // Hitung total detik dari jam masuk
                $totalDetik = $jam * 3600 + $menit * 60 + $detik;

                // Kembalikan total detik
                return $totalDetik;
            } else {
                // Jika format jam masuk tidak sesuai, kembalikan nilai 0
                return 0;
            }
        });

         // Konversi total jam masuk dari detik ke format jam:menit:detik
         $jam = floor($totalJamMasuk / 3600);
         $menit = floor(($totalJamMasuk % 3600) / 60);
         $detik = $totalJamMasuk % 60;

         $totalJamMasukFormatted = sprintf('%02d:%02d:%02d', $jam, $menit, $detik);

         // Hitung total masuk (dalam jam)
         $totalMasukJam = floor($totalJamMasuk / 3600);

         $tjammasuk = Presensi::where('nama_lengkap', $nama_lengkap)
         ->whereNotNull('jam_masuk')
         ->whereNotNull('jam_pulang')
         ->where('status_kehadiran', 'Hadir')
         ->selectRaw('IFNULL(SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(jam_pulang, jam_masuk)))), "00:00:00") AS total_jam_masuk')
         ->first();

         // total jam masuk format integer
         $totalJamMasuk = $tjammasuk->total_jam_masuk;

         // total masuk dalam detik
         $jamMasukDetik = Carbon::parse($totalJamMasuk)->diffInSeconds(Carbon::today());

         // Hitung total masuk dalam hari
         $totalMasukHari = $presensi->count();

         $target = 1440; //dalam jam

         $sisa = $target - $totalMasukJam; //dalam jam

        // Jika ada data, kembalikan data sebagai JSON atau view
        if ($request->is('api/*') || $request->wantsJson()) {
            return response()->json($presensi, 200);
        } else {
            return view('user.ContributorForMitra.datapresensi', compact([
                'presensi',
                'nama_lengkap',
                'user',
                'jam_default_masuk',
                'jam_default_pulang',
                'totalJamMasukFormatted',
                'totalMasukHari',
                'target',
                'sisa',
                'total_terlambat_masuk',
                'total_terlambat_pulang',
                'total_terlambat_istirahat_keluar',
                'total_terlambat_istirahat_kembali',
                'total_terlambat_ijin_keluar',
                'total_terlambat_ijin_kembali']));
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

        return redirect()->route('daftar-presensi')->with('success', "Seluruh presensi berhasil diperbarui menjadi accept all");
    }

    public function getPresensiPDF(Request $request, $nama_lengkap)
    {
        $user = User::where('nama_lengkap', urldecode($nama_lengkap))->first();
        // Ambil data presensi berdasarkan nama lengkap yang di-klik
        $presensi = Presensi::where('nama_lengkap', $user->id)->get();
        // Render tampilan HTML tabel
        $data = view('user.ContributorForMitra.presensipdf', compact('presensi', 'nama_lengkap', 'user'))->render();
        $dompdf = new Dompdf();
        // Load HTML ke Dompdf
        $dompdf->loadHtml($data);
        // Render PDF
        $dompdf->render();
        // Unduh PDF
        return $dompdf->stream('presensi_'.$nama_lengkap.'.pdf');
    }




}
