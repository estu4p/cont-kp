<?php

namespace App\Http\Controllers\BEController;

use DateTime;
use App\Models\User;
use App\Models\Shift;
use App\Models\Divisi;
use App\Models\Sekolah;
use App\Models\Presensi;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\KategoriPenilaian;
use App\Http\Controllers\Controller;
use App\Models\SubKategoriPenilaian;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


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

        $namaBulan = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];

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
                $item['nama_divisi'] = Divisi::where('id', $item->user->divisi_id)->first();
                $item['nama_sekolah'] = Sekolah::where('id', $item->user->sekolah)->first();

                $item['tanggal_masuk'] = $item->user->tgl_masuk;
                $item['tahun_masuk'] = Carbon::createFromFormat('Y-m-d', $item->tanggal_masuk)->format('Y');
                $item['bulan_masuk'] = Carbon::createFromFormat('Y-m-d', $item->tanggal_masuk)->format('m');
                $item['hari_masuk'] = Carbon::createFromFormat('Y-m-d', $item->tanggal_masuk)->format('d');

                $item['bulan'] = DateTime::createFromFormat('!m', $item->bulan_masuk)->format('F');
                return $item;
            });

        // Kirim data ke tampilan
        if ($request->is('api/*') || $request->wantsJson()) {
            return response()->json([
                'message' => 'Berhasil mendapat data'
            ], 200);
        } else {
            return view('user.ContributorForMitra.laporanpresensi')->with([
                'presensi' => $presensi,
                'kehadiran' => $kehadiranPerNama,
            ]);
        }
    }

    public function laporanPresensiDetailHadir(Request $request, $nama_lengkap)
    {
        //validasi nama lengkap
        $user = User::findOrFail($nama_lengkap);

        // Menampilkan Divisi
        $divisi_user = $user->divisi_id;
        $divisi = Divisi::find($divisi_user);

        // Menampilkan Sekolah
        $sekolah_user = $user->sekolah;
        $sekolah = Sekolah::find($sekolah_user);

        //Menampilkan bulan dan tahun masuk
        $namaBulan = [
            1 => 'January',
            2 => 'February',
            3 => 'March',
            4 => 'April',
            5 => 'May',
            6 => 'June',
            7 => 'July',
            8 => 'August',
            9 => 'September',
            10 => 'October',
            11 => 'November',
            12 => 'December'
        ];

        $tanggal_masuk = Carbon::parse($user->tgl_masuk);
        $bulan_masuk = $tanggal_masuk->format('n'); // Mengambil nomor bulan dari tanggal masuk
        $nama_bulan_masuk = $namaBulan[$bulan_masuk]; // Mengambil nama bulan dari array $namaBulan
        $tahun_masuk = $tanggal_masuk->format('Y');
        $nama_bulan_tahun_masuk = $nama_bulan_masuk . $tahun_masuk;

        $namaBulan['bulan_tahun_masuk'] = $nama_bulan_tahun_masuk;

        // Mengambil data presensi dengan status Hadir
        $presensi = Presensi::where('nama_lengkap', $nama_lengkap)->where('status_kehadiran', 'Hadir')->get();

        // Mengambil data shift berdasarkan user
        $shift = Shift::where('id', $nama_lengkap)->first();

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


        // Menginisialisasi total terlambat masuk dan pulang
        $total_terlambat_masuk = 0;
        $total_terlambat_pulang = 0;

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

        //return ke tampilan
        if ($request->is('api/*') || $request->wantsJson()) {
            return response()->json([
                'message' => 'Berhasil mendapat data',
                'presensi' => $presensi,
                'jam_default_masuk' => $jam_default_masuk,
                'jam_default_pulang' => $jam_default_pulang,
                'totalJamMasuk' => $totalJamMasuk,
                'totalMasuk' => $totalMasukHari,
                'target lulus' => $target,
                'sisa' => $sisa,
                'namaBulan' => $namaBulan,
                'total_terlambat_masuk' => $total_terlambat_masuk,
                'total_terlambat_pulang' => $total_terlambat_pulang,
            ], 200);
        } else {
            return view('user.ContributorForMitra.MitraPresensiDetailHadir', compact(['presensi', 'sekolah', 'divisi', 'user', 'jam_default_masuk', 'jam_default_pulang', 'totalJamMasuk', 'totalMasukHari', 'target', 'sisa', 'namaBulan', 'total_terlambat_masuk', 'total_terlambat_pulang']));
        }
    }

    public function laporanPresensiDetailIzin($nama_lengkap, Request $request)
    {
        $user = User::findOrFail($nama_lengkap);

        // Menampilkan Divisi
        $divisi_user = $user->divisi_id;
        $divisi = Divisi::find($divisi_user);

        // Menampilkan Sekolah
        $sekolah_user = $user->sekolah;
        $sekolah = Sekolah::find($sekolah_user);

        //Menampilkan bulan masuk
        $namaBulan = [
            1 => 'January',
            2 => 'February',
            3 => 'March',
            4 => 'April',
            5 => 'May',
            6 => 'June',
            7 => 'July',
            8 => 'August',
            9 => 'September',
            10 => 'October',
            11 => 'November',
            12 => 'December'
        ];

        $tanggal_masuk = Carbon::parse($user->tgl_masuk);
        $bulan_masuk = $tanggal_masuk->format('n'); // Mengambil nomor bulan dari tanggal masuk
        $nama_bulan_masuk = $namaBulan[$bulan_masuk]; // Mengambil nama bulan dari array $namaBulan
        $tahun_masuk = $tanggal_masuk->format('Y');
        $nama_bulan_tahun_masuk = $nama_bulan_masuk . $tahun_masuk;

        $namaBulan['bulan_tahun_masuk'] = $nama_bulan_tahun_masuk;

        $presensi = Presensi::where('nama_lengkap', $nama_lengkap)
            ->where(function ($query) {
                $query->where('status_kehadiran', 'izin')
                    ->orWhere('status_kehadiran', 'sakit');
            })->get();

        // Mengambil data shift berdasarkan user
        $shift = Shift::where('id', $nama_lengkap)->first();

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

        // Inisialisasi variabel untuk menyimpan jumlah terlambat
        $total_terlambat_masuk = 0;
        $total_terlambat_pulang = 0;
        $total_terlambat_istirahat_keluar = 0;
        $total_terlambat_istirahat_kembali = 0;
        $total_terlambat_ijin_keluar = 0;
        $total_terlambat_ijin_kembali = 0;

        // Perulangan untuk menghitung jumlah terlambat
        foreach ($presensi as $item) {
            // Lakukan pengecekan untuk setiap jenis terlambat dan tambahkan ke total jika terlambat
            if ($item->terlambat_masuk > 0) {
                $total_terlambat_masuk++;
            }

            if ($item->terlambat_pulang > 0) {
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

        // Hitung total masuk dalam jam
        $totalMasukJam = floor($jamMasukDetik / 3600);

        // Hitung total masuk dalam hari
        $totalMasukHari = $presensi->count();

        $target = 1440; //dalam jam

        $sisa = $target - $totalMasukJam;

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

        //return ke tampilan
        if ($request->is('api/*') || $request->wantsJson()) {

            return response()->json([
                'message' => 'Berhasil mendapat data',
                'Detail Izin' => $presensi,
                'jam_default_masuk' => $jam_default_masuk,
                'jam_default_pulang' => $jam_default_pulang,
                'kehadiran' => $kehadiranPerNama,
                'totalJamMasuk' => $totalJamMasuk,
                'totalMasuk' => $totalMasukHari,
                'target' => $target,
                'sisa' => $sisa,
                'namaBulan' => $namaBulan,
                'total_terlambat_masuk' => $total_terlambat_masuk,
                'total_terlambat_pulang' => $total_terlambat_pulang,
                'total_terlambat_istirahat_keluar' => $total_terlambat_istirahat_keluar,
                'total_terlambat_istirahat_kembali' => $total_terlambat_istirahat_kembali,
                'total_terlambat_ijin_keluar' => $total_terlambat_ijin_keluar,
                'total_terlambat_ijin_kembali' => $total_terlambat_ijin_kembali,
            ], 200);
        } else {
            return view('user.ContributorForMitra.MitraPresensiDetailIzin', compact(['presensi', 'jam_default_masuk', 'jam_default_pulang',  'sekolah', 'divisi', 'user', 'totalJamMasuk', 'totalMasukHari', 'target', 'sisa', 'namaBulan', 'total_terlambat_masuk', 'total_terlambat_pulang', 'total_terlambat_istirahat_keluar', 'total_terlambat_istirahat_kembali', 'total_terlambat_ijin_keluar', 'total_terlambat_ijin_kembali']));
        }
    }
    public function laporanPresensiDetailTidakHadir($nama_lengkap, Request $request)
    {
        $user = User::findOrFail($nama_lengkap);

        // Menampilkan Divisi
        $divisi_user = $user->divisi_id;
        $divisi = Divisi::find($divisi_user);

        // Menampilkan Sekolah
        $sekolah_user = $user->sekolah;
        $sekolah = Sekolah::find($sekolah_user);

        //Menampilkan bulan masuk
        $namaBulan = [
            1 => 'January',
            2 => 'February',
            3 => 'March',
            4 => 'April',
            5 => 'May',
            6 => 'June',
            7 => 'July',
            8 => 'August',
            9 => 'September',
            10 => 'October',
            11 => 'November',
            12 => 'December'
        ];

        $tanggal_masuk = Carbon::parse($user->tgl_masuk);
        $bulan_masuk = $tanggal_masuk->format('n'); // Mengambil nomor bulan dari tanggal masuk
        $nama_bulan_masuk = $namaBulan[$bulan_masuk]; // Mengambil nama bulan dari array $namaBulan
        $tahun_masuk = $tanggal_masuk->format('Y');
        $nama_bulan_tahun_masuk = $nama_bulan_masuk . $tahun_masuk;

        $namaBulan['bulan_tahun_masuk'] = $nama_bulan_tahun_masuk;

        $presensi = Presensi::where('nama_lengkap', $nama_lengkap)->where('status_kehadiran', 'tidak hadir')->get();

        // Mengambil data shift berdasarkan user
        $shift = Shift::where('id', $nama_lengkap)->first();

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

        $target = 1440; //dalam jam

        $sisa = $target - $totalMasukJam;

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
                'jam_default_masuk' => $jam_default_masuk,
                'jam_default_pulang' => $jam_default_pulang,
                'kehadiran' => $kehadiranPerNama,
                'totalJamMasuk' => $totalJamMasuk,
                'totalMasuk' => $totalMasukHari,
                'target' => $target,
                'sisa' => $sisa,
                'namaBulan' => $namaBulan
            ], 200);
        } else {
            return view('user.ContributorForMitra.MitraPresensiDetailTidakHadir', compact(['presensi', 'jam_default_masuk', 'jam_default_pulang', 'sekolah', 'divisi', 'user', 'totalJamMasuk', 'totalMasukHari', 'target', 'sisa', 'namaBulan']));
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
        $Presensi = new Presensi();
        $Presensi->nama_lengkap = $request->nama_lengkap;
        $Presensi->hari = date('Y-m-d');
        $Presensi->jam_masuk = now();
        $Presensi->status_ganti_jam = 'Tidak Ganti Jam';
        $Presensi->target = 3600;
        $Presensi->save();

        return redirect('mitra-presensi-barcode/istirahat')->with('success', 'silahkan masuk');
    }

    public function view_jam_mulai_istirahat()
    {
        $presensi = Presensi::with('user')->latest()->first();
        $presensiHariIni = Presensi::where('hari', Carbon::today())->exists();
        if (!$presensiHariIni) {
            return redirect('mitra-presensi-barcode/masuk');
        }
        return view('User.ContributorForMitra.barcode_jam-mulai-istirahat', compact('presensi'));
    }
    public function jam_mulai_istirahat(Request $request)
    {
        $presensi = Presensi::where('nama_lengkap', $request->nama_lengkap)
            ->whereDate('hari', date('Y-m-d')) // Ambil data presensi untuk hari ini
            ->latest()
            ->first();
        if ($presensi) {
            $presensi->jam_mulai_istirahat = now();
            $presensi->save();
            return redirect('mitra-presensi-barcode/selesai-istirahat')->with('success', 'silahkan masuk')->with('presensi', $presensi);
        } else {
            return response()->json(['message', 'gagal']);
        }
    }

    public function view_jam_selesai_istirahat()
    {
        $presensi = Presensi::with('user')->latest()->first();
        return view('User.ContributorForMitra.barcode_jam-selesai-istirahat', compact('presensi'));
    }
    public function jam_selesai_istirahat(Request $request)
    {
        $presensi = Presensi::where('nama_lengkap', $request->nama_lengkap)
            ->whereDate('hari', date('Y-m-d')) // Ambil data presensi untuk hari ini
            ->latest()
            ->first();
        if ($presensi) {
            $presensi->jam_selesai_istirahat = now();
            $presensi->save();
            return redirect('mitra-presensi-barcode/pulang')->with('success', 'silahkan masuk')->with('presensi', $presensi);
        } else {
            return response()->json(['message', 'gagal']);
        }
    }
    public function view_jam_pulang()
    {
        $presensi = Presensi::with('user')->latest()->first();
        return view('User.ContributorForMitra.barcode_jam-pulang', compact('presensi'));
    }
    public function jam_pulang(Request $request)
    {
        $presensi = Presensi::where('nama_lengkap', $request->nama_lengkap)
            ->whereDate('hari', date('Y-m-d')) // Ambil data presensi untuk hari ini
            ->latest()
            ->first();

        if ($presensi) {
            $jam_pulang = now();
            $jam_masuk = Carbon::parse($presensi->jam_masuk);

            // Menghitung total jam kerja dalam bentuk detik
            $total_jam_kerja_detik = $jam_pulang->diffInSeconds($jam_masuk);

            $presensi->jam_pulang = $jam_pulang;

            // Total jam kerja yang diinginkan
            $jam_kerja = 0; // Jam
            $menit_kerja = 0.1; // Menit

            // Ubah total jam kerja yang diinginkan ke dalam detik
            $total_jam_kerja_diinginkan_detik = ($jam_kerja * 3600) + ($menit_kerja * 60);

            // Hitung selisih waktu kerja yang diinginkan dengan total jam kerja
            $kurang_jam_kerja_detik = $total_jam_kerja_diinginkan_detik - $total_jam_kerja_detik;

            // Ubah kembali ke format jam:menit:detik jika perlu
            $kurang_jam_kerja = gmdate("H:i:s", $kurang_jam_kerja_detik);

            $presensi->total_jam_kerja = gmdate("H:i:s", $total_jam_kerja_detik);
            $presensi->kurang_jam_kerja = $kurang_jam_kerja;

            $presensi->save();

            return redirect('mitra-presensi-barcode/selesai')->with('success', 'silahkan masuk')->with('presensi', $presensi);
        } else {
            return response()->json(['message', 'gagal']);
        }
    }
    public function view_jam_pulang_selesai()
    {
        $presensi = Presensi::with('user')->latest()->first();
        return view('User.ContributorForMitra.barcode_jam-pulang-selesai', compact('presensi'));
    }

    public function show_mhs()
    {
        $mahasiswa = User::with('divisi')->where('role_id', 3)->get();
        return view('contributorformitra.penilaian-mahasiswa', compact('mahasiswa'));
    }

    public function filterMahasiswa()
    {
        $totalMahasiswa = Presensi::count();
        $totalHadir = Presensi::where('status_kehadiran', 'Hadir')->count();
        $totalIzin = Presensi::where('status_kehadiran', 'Izin')->count();

        return view('contributorformitra.dashboard', compact('totalMahasiswa', 'totalHadir', 'totalIzin'));
    }

    //InputNilai
    public function InputNilai($id)
    {
        $inputnilai = Penilaian::with('user','subKategori', 'subKategori.kategori')->where('nama_lengkap', $id)->first();
        
        // Mengambil data penilaian beserta relasi subKategori dan kategori berdasarkan ID
        // Mengirim data ke view 'input-nilai' bersamaan dengan nama variabel yang sesuai
        return view('penilaian-siswa.input-nilai', compact('inputnilai'));
    }

    public function editProfile()
    {
        $userMitra = User::where('role_id', 5)->first();

        return view('SistemLokasi.AdminSistem-Editprofile', [
            'title' => "userAdmin - Ubah Profil",
            'userAdmin' => $userMitra
        ]);
    }

    public function updateProfile(Request $request, $username)
    {
        $userMitra = User::where('role_id', 2)->first();
        if (!$userMitra) {
            return response()->json(['message' => 'Pengguna dengan peran 2 tidak ditemukan'], 404);
        }

        // // Update data pengguna
        // $userAdmin->username = $username;

        // Validasi input form
        $data = $request->validate([
            'nama_lengkap' => 'required|string',
            'email' => 'required|email|max:255',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'required|string|max:255',
            'about' => 'nullable|string|max:500',
        ]);

        $profile = User::where('username', $username)->first();

        // Periksa apakah profil ditemukan
        if (!$profile) {
            return response()->json(['message' => 'Profil pengguna tidak ditemukan'], 404);
        }

        $profile->update([
        'nama_lengkap' => $data['nama_lengkap'],
        'email' => $data['email'],
        'no_hp' => $data['no_hp'],
        'alamat' => $data['alamat'],
        'about' => $data['about'],
        ]);

        // Periksa jenis respons yang diminta
        if ($request->wantsJson()) {
            // Respon dalam format JSON
            return response()->json([
                'message' => 'Profil berhasil diperbarui.',
                'user' => $userMitra
            ]);
        } else {
            // Redirect ke halaman profil yang diperbarui
            return view('SistemLokasi.AdminSistem-Editprofile')->with('success', 'Profil berhasil diperbarui.');
        }
    }

    public function updateFoto(Request $request, $username)
    {
        try {
            $validator = Validator::make($request->all(), [
                'foto_profil' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            $validator->validate();
        } catch (ValidationException $e) {
            $errorValidate = $e->validator->errors()->all();
            $errorMessage = implode('<br>', $errorValidate);
            return response()->json(['success' => false, 'error' => $errorMessage]);
            // return redirect()->route('SistemLokasi.AdminSistem-EditProfile')->with('error', $errorMessage);
        }

        $profile = User::where('username', $username)->firstOrFail();

        try {
            if ($profile->foto_profil) {
                Storage::delete('public/' . $profile->foto_profil);
            }
            $namaFoto = time() . '.' . $request->foto_profil->getClientOriginalExtension();
            $path = $request->file('foto_profil')->storeAs('public/foto_profil', $namaFoto);
            $profile->update([
                'foto_profil' => 'foto_profil/' . $namaFoto,
            ]);
            //return response()->json(['success' => true, 'message' => 'Foto Berhasil diUbah']);
            return redirect()->route('SistemLokasi.AdminSistem-Editprofile')->with('success', 'Foto Berhasil diUbah');
        } catch (\Exception $e) {
            $errorMessage = strip_tags($e->getMessage());
            //return response()->json(['success' => false, 'error' => $errorMessage]);
            return redirect()->route('SistemLokasi.AdminSistem-Editprofile')->with('error', $errorMessage);
        }
    }

    public function deleteFoto($username)
    {
        $profil = User::where('username', $username)->firstOrFail();
        try {
            if ($profil->foto_profil) {
                Storage::delete('public/' . $profil->foto_profil);
                $profil->foto_profil = null;
                $profil->save();
                return redirect()->route('SistemLokasi.AdminSistem-Editprofile')->with('success', 'Foto Berhasil diHapus');
            } else {
                return redirect()->route('SistemLokasi.AdminSistem-Editprofile')->with('error', 'Anda tidak memiliki Foto Profil');
            }
        } catch (\Exception $e) {
            $errorMessage = strip_tags($e->getMessage());
            return redirect()->route('SistemLokasi.AdminSistem-Editprofile')->with('error', $errorMessage);
        }
    }
}

    
