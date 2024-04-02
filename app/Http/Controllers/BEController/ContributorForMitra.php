<?php

namespace App\Http\Controllers\BEController;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
use Illuminate\Http\Request;
use App\Models\Shift;
use App\Models\KategoriPenilaian;
use App\Models\SubKategoriPenilaian;
use App\Models\User;
use App\Models\Presensi;
use DateTime;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;



class ContributorForMitra extends Controller
{
    public function showDaftarDivisi(Request $request)
    {
        $divisi = Divisi::all();

        if ($request->is('api/*') || $request->wantsJson()) {
            return response()->json(['message' => 'Daftar Divisi', 'Divisi' => $divisi]);
        } else {
            return view('manage.margepenilaiandivisi', ['divisi' => $divisi]);
        }
    }

    public function addDivisi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_divisi' => 'required',
            'deskripsi_divisi' => '',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = new Divisi([
            'nama_divisi' => $request->input('nama_divisi'), // Sesuaikan dengan data yang sudah ada
            'deskripsi_divisi' => $request->input('deskripsi_divisi'),
        ]);

        $data->save();

        return response()->json(['success' => true, 'message' => 'Berhasil menambahkan divisi'], 200);
    }
    public function updateDivisi(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_divisi' => 'required',
            'deskripsi_divisi' => '',
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'Gagal update divisi',], 404);
        }
        $data = Divisi::find($id);
        $data->fill([
            'nama_divisi' => $request->nama_divisi,
            'deskripsi_divisi' => $request->deskripsi_divisi
        ]);
        $data->save();
        return response()->json(['success' => true, 'message' => 'Berhasil update divisi', 'data' => $data], 200);
    }
    public function destroyDivisi($id)
    {
        $data = Divisi::find($id);
        if ($data) {
            $deletedId = $data->id; // Mendapatkan ID shift yang akan dihapus
            $data->delete();
            return response()->json(['success' => true, 'message' => "Berhasil menghapus divisi dengan id $deletedId"], 200);
        } else {
            return response()->json(['success' => false, 'message' => "Data dengan id $id tidak ditemukan"], 404);
        }
    }

    public function showKategoriPenilaian(Request $request)
    {
        $kategori = KategoriPenilaian::with('kategori')->get();
        if ($request->is('api/*') || $request->wantsJson()) {
            return response()->json(['success' => true, 'nilai' => $kategori], 200);
        } else {
            return view('manage.kategoripenilaian', ['kategori' => $kategori]);
        }
    }

    public function addKategoriPenilaian(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'divisi_id' => 'required',
            'nama_kategori' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'Gagal menambahkan kategori penilaian',], 400);
        }
        $data = new KategoriPenilaian([
            'divisi_id' => $request->input('divisi_id'),
            'nama_kategori' => $request->input('nama_kategori')
        ]);
        $data->save();

        return response()->json([
            'success' => true,
            'message' => 'Berhasil menambahkan kategori penilaian'
        ]);
    }

    public function addSubKategoriPenilaian(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kategori_id' => 'required',
            'nama_sub_kategori' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'Gagal menambahkan sub kategori penilaian',], 400);
        }

        $data = new SubKategoriPenilaian([
            'kategori_id' => $request->input('kategori_id'),
            'nama_sub_kategori' => $request->input('nama_sub_kategori')
        ]);

        $data->save();

        return response()->json([
            'message' => 'Berhasil menambahkan sub kategori penilaian'
        ]);
    }

    public function showDataShift(Request $request)
    {
        $shift = Shift::all();
        if ($request->is('api/*') || $request->wantsJson()) {
            return response()->json(['success' => true, 'nilai' => $shift], 200);
        } else {
            return view('manage.datashift', ['shift' => $shift]);
        }
    }

    public function addShift(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_shift' => 'required',
            'jml_jam_kerja' => 'required',
            'jam_masuk' => 'required',
            'jam_pulang' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = new Shift([
            'nama_shift' => $request->input('nama_shift'),
            'jml_jam_kerja' => $request->input('jml_jam_kerja'),
            'jam_masuk' => $request->input('jam_masuk'),
            'jam_pulang' => $request->input('jam_pulang'),
        ]);

        $data->save();

        return response()->json(['success' => true, 'message' => 'Berhasil menambahkan data shift'], 200);
    }

    public function updateShift($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_shift' => 'required',
            'jml_jam_kerja' => 'required',
            'jam_masuk' => 'required',
            'jam_pulang' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Gagal update data shift',], 404);
        }
        $data = Shift::find($id);
        if (!$data) {
            return response()->json(['message' => 'Data shift tidak ditemukan'], 404);
        }

        $data->fill([
            'nama_shift' => $request->input('nama_shift'),
            'jml_jam_kerja' => $request->input('jml_jam_kerja'),
            'jam_masuk' => $request->input('jam_masuk'),
            'jam_pulang' => $request->input('jam_pulang'),
        ]);

        $data->save();

        return response()->json(['success' => true, 'message' => 'Berhasil update data shift'], 200);
    }

    public function destroyShift($id)
    {
        $data = Shift::find($id);
        if ($data) {
            $deletedId = $data->id; // Mendapatkan ID shift yang akan dihapus
            $data->delete();
            return response()->json(['success' => true, 'message' => "Berhasil menghapus data shift dengan id $deletedId"], 200);
        } else {
            return response()->json(['success' => false, 'message' => "Data shift dengan id $id tidak ditemukan"], 404);
        }
    }

    public function laporanPresensi(Request $request)
    {
        $presensi = User::where('role_id', 3)->get();

        // Hitung total kehadiran, izin, dan ketidakhadiran pernama
        $kehadiranPerNama = Presensi::select('nama_lengkap')
            ->groupBy('nama_lengkap')->with('user')
            ->get()
            ->map(function ($item) {
                $item['total_kehadiran'] = Presensi::where('nama_lengkap', $item->nama_lengkap)
                    ->where('status_kehadiran', 'hadir')
                    ->count();
                $item['total_izin'] = Presensi::where('nama_lengkap', $item->nama_lengkap)
                    ->whereIn('status_kehadiran', ['izin', 'sakit'])
                    ->count();
                $item['total_ketidakhadiran'] = Presensi::where('nama_lengkap', $item->nama_lengkap)
                    ->where('status_kehadiran', 'Tidak Hadir')
                    ->count();
                return $item;
            });

        // Kirim data ke tampilan
        if ($request->is('api/*') || $request->wantsJson()) {
            return response()->json([
                'message' => 'Berhasil mendapat data'], 200);
        } else {
            return view('user.ContributorForMitra.laporanpresensi')->with([
                'presensi' => $presensi,
                'kehadiran' => $kehadiranPerNama,
            ]);
        }
    }



    public function laporanPresensiDetailHadir(Request $request,$nama_lengkap)
    {
        //validasi nama lengkap
        $user = User::findOrFail($nama_lengkap);

        // Menampilkan Divisi
        $divisi_user = $user->divisi_id;
        $divisi = Divisi::find($divisi_user);

        // // Menampilkan Sekolah
        // $sekolah_user = $user->sekolah;
        // $sekolah = Sekolah::find($sekolah_user);

        // Mengambil data presensi dengan status Hadir
        $presensi = Presensi::where('nama_lengkap', $nama_lengkap)->where('status_kehadiran', 'Hadir')->get();

        // $jam_default = Presensi::where('nama_lengkap', $nama_lengkap)
        //     ->whereNotNull('jam_default_masuk')
        //     ->whereNotNull('jam_default_pulang')
        //     ->select('jam_default_masuk', 'jam_default_pulang')
        //     ->first();

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

        // Hitung total masuk dalam jam
        $totalMasukJam = floor($jamMasukDetik / 3600);

        // Hitung total masuk dalam hari
        $totalMasukHari = $presensi->count();

        $target = 1100;

        // sisa
        $sisa = $target - $totalMasukJam;
        // Konversi sisa jam ke format jam:menit:detik
        $sisaFormatted = gmdate("H:i:s", $sisa * 3600);

        $kehadiranPerNama = Presensi::select('nama_lengkap')
            ->groupBy('nama_lengkap')->with('user')
            ->get()
            ->map(function ($item, $key) {
                $item['total_kehadiran'] = Presensi::where('nama_lengkap', $item->nama_lengkap)
                    ->where('status_kehadiran', 'hadir')
                    ->count();
                $item['total_izin'] = Presensi::where('nama_lengkap', $item->nama_lengkap)
                    ->where('status_kehadiran', 'izin')
                    ->count();
                $item['total_ketidakhadiran'] = Presensi::where('nama_lengkap', $item->nama_lengkap)
                    ->where('status_kehadiran', 'Tidak Hadir')
                    ->count();
                return $item;
            });

        // Kirim data ke tampilan
        if ($request->is('api/*') || $request->wantsJson()) {
            return response()->json([
                'message' => 'Berhasil mendapat data',
                'presensi' => $presensi,
                'totalJamMasuk' => $totalJamMasuk,
                'totalMasuk' => $totalMasukHari,
                'target lulus' => $target,
                'sisa' => $sisa
            ], 200);
        } else {
            return view('user.ContributorForMitra.MitraPresensiDetailHadir', compact(['presensi', 'divisi', 'user', 'totalJamMasuk', 'totalMasukHari', 'target', 'sisaFormatted']));
        }
    }

    public function laporanPresensiDetailIzin($nama_lengkap, Request $request)
    {
        $user = User::findOrFail($nama_lengkap);

        // Menampilkan Divisi
        $divisi_user = $user->divisi_id;
        $divisi = Divisi::find($divisi_user);

        $presensi = Presensi::where('nama_lengkap', $nama_lengkap)
                        ->where(function ($query) {
                            $query->where('status_kehadiran', 'izin')
                                  ->orWhere('status_kehadiran', 'sakit');
                        })->get();

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


        if ($request->is('api/*') || $request->wantsJson()) {

                return response()->json([
                    'message' => 'Berhasil mendapat data',
                    'Detail Izin' => $presensi,
                    'kehadiran' => $kehadiranPerNama,
                    'totalJamMasuk' => $totalJamMasukFormatted,
                    'totalMasuk' => $totalMasukHari,
                    'target' => $target,
                    'sisa' => $sisa
                ], 200);
        } else {
                return view('user.ContributorForMitra.MitraPresensiDetailIzin', compact(['presensi', 'user', 'totalJamMasukFormatted', 'totalMasukHari', 'target', 'sisa']));

        }
    }

        // Hitung total masuk dalam jam
        $totalMasukJam = floor($jamMasukDetik / 3600);

        // Hitung total masuk dalam hari
        $totalMasukHari = $presensi->count();

        $target = 1100;

        // sisa
        $sisa = $target - $totalMasukJam;
        // Konversi sisa jam ke format jam:menit:detik
        $sisaFormatted = gmdate("H:i:s", $sisa * 3600);


        // Hitung total kehadiran, izin, dan ketidakhadiran pernama
        $kehadiranPerNama = Presensi::select('nama_lengkap')
            ->groupBy('nama_lengkap')->with('user')
            ->get()
            ->map(function ($item) {
                $item['total_kehadiran'] = Presensi::where('nama_lengkap', $item->nama_lengkap)
                    ->where('status_kehadiran', 'hadir')
                    ->count();
                $item['total_izin'] = Presensi::where('nama_lengkap', $item->nama_lengkap)
                    ->whereIn('status_kehadiran', ['izin', 'sakit'])
                    ->count();
                $item['total_ketidakhadiran'] = Presensi::where('nama_lengkap', $item->nama_lengkap)
                    ->where('status_kehadiran', 'Tidak Hadir')
                    ->count();
            return $item;
        });

        if ($request->is('api/*') || $request->wantsJson()) {
                return response()->json([
                    'message' => 'Berhasil mendapat data',
                    'Detail Izin' => $presensi,
                    'kehadiran' => $kehadiranPerNama,
                    'totalJamMasuk' => $totalJamMasuk,
                    'totalMasuk' => $totalMasukHari,
                    'target' => $target,
                    'sisa' => $sisa
                ], 200);
        } else {
                return view('user.ContributorForMitra.MitraPresensiDetailIzin', compact(['presensi', 'divisi', 'user', 'totalJamMasuk', 'totalMasukHari', 'target', 'sisaFormatted']));
        }
    }

    public function laporanPresensiDetailTidakHadir($nama_lengkap, Request $request)
    {
        $user = User::findOrFail($nama_lengkap);

        // Menampilkan Divisi
        $divisi_user = $user->divisi_id;
        $divisi = Divisi::find($divisi_user);

        $presensi = Presensi::where('nama_lengkap', $nama_lengkap)->where('status_kehadiran', 'tidak hadir')->get();

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

        // Hitung total masuk dalam jam
        $totalMasukJam = floor($jamMasukDetik / 3600);

        // Hitung total masuk dalam hari
        $totalMasukHari = $presensi->count();

        $target = 1100;

        // sisa
        $sisa = $target - $totalMasukJam;
        // Konversi sisa jam ke format jam:menit:detik
        $sisaFormatted = gmdate("H:i:s", $sisa * 3600);

        // Hitung total kehadiran, izin, dan ketidakhadiran pernama
        $kehadiranPerNama = Presensi::select('nama_lengkap')
            ->groupBy('nama_lengkap')->with('user')
            ->get()
            ->map(function ($item) {
                $item['total_kehadiran'] = Presensi::where('nama_lengkap', $item->nama_lengkap)
                    ->where('status_kehadiran', 'hadir')
                    ->count();
                $item['total_izin'] = Presensi::where('nama_lengkap', $item->nama_lengkap)
                    ->whereIn('status_kehadiran', ['izin', 'sakit'])
                    ->count();
                $item['total_ketidakhadiran'] = Presensi::where('nama_lengkap', $item->nama_lengkap)
                    ->where('status_kehadiran', 'Tidak Hadir')
                    ->count();
            return $item;
        });
        
        //return ke tampilan
        if ($request->is('api/*') || $request->wantsJson()) {
                return response()->json([
                    'message' => 'Berhasil mendapat data', 
                    'Detail Izin' => $presensi,
                    'kehadiran' => $kehadiranPerNama,
                    'totalJamMasuk' => $totalJamMasuk,
                    'totalMasuk' => $totalMasukHari,
                    'target' => $target,
                    'sisa' => $sisa
                ], 200);

        } else {
                return view('user.ContributorForMitra.MitraPresensiDetailTidakHadir', compact(['presensi', 'divisi', 'user', 'totalJamMasuk', 'totalMasukHari', 'target', 'sisaFormatted']));
        }
    }

    public function scan(Request $request)
    {
        // dd($request);
        return view('User.ContributorForMitra.barcode', [
            'title' => "Barcode Pemagang",
            'nama' => "Syalita"
        ]);
    }

    public function jam_masuk(Request $request)
    {
        $waktu_sekarang = date('Y-m-d H:i:s');
        $jam_masuk = date('H:i:s', strtotime($waktu_sekarang));

        Presensi::create([
            'nama_lengkap' => $request->nama_lengkap,
            'hari' => date('Y-m-d'),
            'jam_masuk' => $jam_masuk
        ]);

        return redirect('mitra-presensi-barcode/istirahat')->with('success', 'silahkan masuk');
    }
    public function jam_mulai_istirahat(Request $request)
    {
        $presensi = Presensi::all()->first();
        $waktu_sekarang = date('Y-m-d H:i:s');
        $presensi_terakhir = Presensi::latest()->first();

        // Menyimpan waktu masuk dari data Presensi terakhir
        $waktu_masuk_terakhir = $presensi_terakhir->jam_masuk;

        Presensi::create([
            'nama_lengkap' => $request->nama_lengkap,
            'hari' => date('Y-m-d'),
            'jam_masuk' => $waktu_masuk_terakhir,
            'jam_mulai_istirahat' => $waktu_sekarang
        ]);

        return redirect('mitra-presensi-barcode/selesai-istirahat')->with('success', 'silahkan masuk')->with('presensi', $presensi);
    }

    public function jam_selesai_istirahat(Request $request)
    {
        $waktu_sekarang = date('Y-m-d H:i:s');
        $presensi_terakhir = Presensi::latest()->first();

        // Menyimpan waktu masuk dan waktu mulai istirahat dari data Presensi terakhir
        $waktu_masuk_terakhir = $presensi_terakhir->jam_masuk;
        $waktu_istirahat_terakhir = $presensi_terakhir->jam_mulai_istirahat;

        Presensi::create([
            'nama_lengkap' => $request->nama_lengkap,
            'hari' => date('Y-m-d'),
            'jam_masuk' => $waktu_masuk_terakhir,
            'jam_mulai_istirahat' => $waktu_istirahat_terakhir,
            'jam_selesai_istirahat' => $waktu_sekarang
        ]);


        return redirect('mitra-presensi-barcode/pulang')->with('success', 'silahkan masuk');
    }
    public function jam_pulang(Request $request)
    {
        $waktu_sekarang = date('Y-m-d H:i:s');
        $presensi_terakhir = Presensi::latest()->first();

        // Menyimpan waktu masuk dan waktu mulai istirahat dari data Presensi terakhir
        $waktu_masuk_terakhir = $presensi_terakhir->jam_masuk;
        $waktu_istirahat_terakhir = $presensi_terakhir->jam_mulai_istirahat;
        $waktu_selesai_istirahat = $presensi_terakhir->jam_selesai_istirahat;

        Presensi::create([
            'nama_lengkap' => $request->nama_lengkap,
            'hari' => date('Y-m-d'),
            'jam_masuk' => $waktu_masuk_terakhir,
            'jam_mulai_istirahat' => $waktu_istirahat_terakhir,
            'jam_selesai_istirahat' => $waktu_selesai_istirahat,
            'jam_pulang' => $waktu_sekarang,
        ]);
        return redirect('mitra-presensi-barcode/pulang')->with('success', 'silahkan masuk');
    }
}
