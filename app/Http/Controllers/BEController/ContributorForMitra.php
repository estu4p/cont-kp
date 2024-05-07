<?php

namespace App\Http\Controllers\BEController;


use DateTime;
use App\Models\User;
use App\Models\Shift;
use App\Models\Divisi;
use App\Models\Sekolah;
use App\Models\Presensi;
use App\Models\Penilaian;
use App\Models\DivisiItem;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\KategoriPenilaian;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\SubKategoriPenilaian;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;



class ContributorForMitra extends Controller
{

    public function showDaftarDivisi(Request $request)

    {
        $user = auth()->user();
        $query = $request->input('query');
        $divisi = DivisiItem::with('divisi')
            ->whereHas('divisi', function ($q) use ($query) {
                $q->where('nama_divisi', 'like', "%$query%");
            })->where('mitra_id', $user->mitra_id)
            ->get();
        if ($request->is('api/*') || $request->wantsJson()) {

            return response()->json(['message' => 'Daftar Divisi', 'Divisi' => $divisi, 'user' => $user]);
        } else {
            return view('contributorformitra.devisi', ['divisi' => $divisi, 'user' => $user]);
        }
    }

    public function divisiMitra(Request $request)
    {
        $query = $request->input('query');
        $divisi = DivisiItem::with('divisi')
            ->whereHas('divisi', function ($q) use ($query) {
                $q->where('nama_divisi', 'like', "%$query%");
            })
            ->get();
        // dd($divisi);
        if ($request->is('api/*') || $request->wantsJson()) {

            return response()->json(['message' => 'Daftar Divisi', 'Divisi' => $divisi]);
        } else {
            return view('mitra-pengaturan.manage-devisi', ['divisi' => $divisi]);
        }
    }

    public function showAllTeams(Request $request, $id)
    {
        $user = User::find($id);
        $users = User::where('role_id', 3)->where('mitra_id', $id)->get();
        return view('contributorformitra.devisi-Seeallteams', compact('users', 'user'));
    }
    public function showDataMahasiswa(Request $request, $id)
    {
        $user = auth()->user();
        $query = $request->input('query');

        $usersQuery = User::where('role_id', 3)
            ->where('divisi_id', $id)
            ->where('nama_lengkap', 'like', "%$query%");

        // Jika Anda ingin menyaring berdasarkan kolom tertentu atau mengurutkan hasil pencarian, Anda dapat menambahkan kode berikut
        // Contoh pengurutan berdasarkan nama_lengkap secara default
        $usersQuery->orderBy('nama_lengkap');

        // Jika Anda ingin menggunakan pagination untuk membatasi jumlah pengguna yang ditampilkan per halaman
        $users = $usersQuery->paginate(10); // 10 adalah jumlah item per halaman, sesuaikan sesuai kebutuhan

        $divisi = Divisi::find($id);

        return view('contributorformitra.teamaktifanggota', compact('users', 'user', 'divisi'));
    }

    public function showPengaturanDivisi()
    {
        $user = auth()->user();
        $divisi = DivisiItem::where('mitra_id', $user->mitra_id)->get();
        return view('mitra-pengaturan.manage-devisi', compact('divisi', 'user'));
    }
    public function addPengaturanDivisi(Request $request)
    {
        $user = auth()->user();
        $data = new Divisi([
            'nama_divisi' => $request->input('nama_divisi'),
        ]);
        $data->save();

        $dataId = $data->id;

        $dataItem = new DivisiItem([
            'mitra_id' => $user->mitra_id,
            'divisi_id' => $dataId
        ]);
        $dataItem->save();
        return redirect('/manage-devisi')->with('success', 'Berhasil menambahkan divisi');
    }


    public function updateDivisi(Request $request, $id)
    {
        $divisi = Divisi::find($id);

        // dd($divisi);
        if (!$divisi) {
            return redirect()->back()->with(['error' => true, 'message' => 'Divisi tidak ditemukan']);
        }

        $divisi->update([
            'nama_divisi' => $request->input('nama_divisi'),
        ]);
        // dd('Berhasil');
        return redirect()->route('mitra.pengaturan.divisi');

        // return redirect()->back()->with(['success' => true, 'message' => 'Berhasil update data divisi']);
    }

    public function deleteDivisi($id)
    {
        $divisi = DivisiItem::find($id);

        if ($divisi) {
            $divisi->delete();

            return redirect()->back()->with(['success' => true, 'message' => 'Berhasil menghapus data shift']);
        }
    }

    public function detailProfil(Request $request, $id)
    {
        $user = auth()->user();
        $users = User::find($id);
        // dd($users);
        $shift = Shift::all();
        if ($user) {
            $divisiPerMitra = $user->mitra_id;
        } else {
            return response()->json([
                'message' => 'Data User Mitra tidak ditemukan'
            ]);
        }

        $divisi = DivisiItem::with('divisi')->where('mitra_id', $divisiPerMitra)->get();
        // dd($divisi);
        if ($request->is('api/*') || $request->wantsJson()) {
            return response()->json(
                [
                    'user detail' => $users,
                    'divisi' => $divisi,
                    'divisi mitra' => $divisiPerMitra
                ]
            );
        }
        return view("contributorformitra.Lihat-Profil-Mahasiswa", compact('user', 'users', 'divisi', 'shift'));
    }

    public function editDetailProfil(Request $request, $id)
    {
        $user = auth()->user();
        $users = User::find($id);
        $users->update([
            'tgl_masuk' => $request->input('tgl_masuk'),
            'tgl_keluar' => $request->input('tgl_keluar'),
            'divisi_id' => $request->input('divisi_id'),
            'project' => $request->input('project'),
            'shift_id' => $request->input('shift_id'),
            'os' => $request->input('os'),
            'browser' => $request->input('browser'),
            'status_absensi' => $request->input('status_absensi'),
            'status_akun' => $request->input('status_akun'),
            'konfirmasi_email' => $request->input('konfirmasi_email')
        ]);

        if ($request->is('api/*') || $request->wantsJson()) {
            return response()->json(
                ['user update' => $users]
            );
        };

        return redirect()->route('mitra.detailprofil', $users->id)->with('success', 'Data pengguna berhasil diperbarui.');
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

    public function showShift(Request $request)
    {
        $user = auth()->user();
        $shift = Shift::all();

        if ($request->is('api/*') || $request->wantsJson()) {
            return response()->json([
                'message' => 'Daftar Shift',
                'shift' => $shift,
            ], 200);
        } else {
            return view('mitra-pengaturan.manage-shift', compact('shift', 'user'));
        }
    }


    public function addShift(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'nama_shift' => 'required',
        //     'jml_jam_kerja' => 'required',
        //     'jam_masuk' => 'required',
        //     'jam_pulang' => 'required',
        // ]);

        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }

        $data = new Shift([
            'nama_shift' => $request->input('nama_shift'),
            'jml_jam_kerja' => $request->input('jml_jam_kerja'),
            'jam_masuk' => $request->input('jam_masuk'),
            'jam_pulang' => $request->input('jam_pulang'),
            'istirahat' => $request->input('istirahat')
        ]);

        $data->save();
        return redirect('/manage-shift');
        // return response()->json(['success' => true, 'message' => 'Berhasil menambahkan data shift'], 200);
    }

    public function updateShift($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_shift' => 'required',
            // 'jml_jam_kerja' => 'required',
            'jam_masuk' => 'required',
            'istirahat' => 'required',
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
            'istirahat' => $request->input('istirahat'),
        ]);

        $data->save();

        return redirect()->back()->with(['success' => true, 'message' => 'Berhasil update data shift']);
    }

    public function deleteShift($id)
    {
        $shift = Shift::find($id);

        if ($shift) {
            $shift->delete();

            return redirect()->back()->with(['success' => true, 'message' => 'Berhasil menghapus data shift']);
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
        $user = auth()->user();
        $totalMahasiswa = Presensi::count();
        $totalHadir = Presensi::where('status_kehadiran', 'Hadir')->count();
        $totalIzin = Presensi::where('status_kehadiran', 'Izin')->count();

        return view('contributorformitra.dashboard', compact('totalMahasiswa', 'totalHadir', 'totalIzin', 'user'));
    }

    //InputNilai
    public function InputNilai(Request $request, $id)
    {
        $subKategori = SubKategoriPenilaian::with('kategori')->get()->groupBy('kategori_id');
        $penilaian = Penilaian::find($id);
        $userId = User::find($id);
        $user = auth()->user();

        if ($request->is('api/*') || $request->wantsJson()) {
            return response()->json([
                'subKategori' => $subKategori
            ]);
        };
        return view('penilaian-siswa.input-nilai', compact('user', 'subKategori', 'userId', 'penilaian'));
    }
    public function inputNilaiPost(Request $request, $id)
    {
        // Mengambil ID User
        $userId = $id;

        foreach ($request->input('sub_id') as $key => $subId) {
            // Mencari data Penilaian berdasarkan ID user dan sub_id
            $penilaian = Penilaian::where('nama_lengkap', $userId)
                ->where('sub_id', $subId)
                ->first();

            // Jika data Penilaian ditemukan, perbarui nilai
            // Jika tidak, buat data Penilaian baru
            if ($penilaian) {
                $penilaian->update([
                    'nilai' => $request->input('nilai')[$key],
                    'sertifikat' => $request->input('sertifikat'),
                ]);
            } else {
                Penilaian::create([
                    'nama_lengkap' => $userId,
                    'sub_id' => $subId,
                    'sertifikat' => $request->input('sertifikat'),
                    'nilai' => $request->input('nilai')[$key]
                ]);
            }
        }

        return redirect('/penilaian-mahasiswa');
    }



    //edit profil untuk mitra

    public function editProfile()
    {
        //$userMitra = auth()->user();
        $userMitra = User::where('role_id', 5)->first();
        return view('contributorformitra.editprofile', [
            'title' => "userMitra- Ubah Profil",
            'userMitra' => $userMitra,
            'csrfToken' => $csrfToken = csrf_token(),
        ]);
    }

    // Menyimpan perubahan pada profil
    public function update(Request $request)
    {
        // Validasi data yang diinput
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_hp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:255',
            'about' => 'nullable|string',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Menambahkan validasi untuk gambar

        ]);
    }

    public function updateProfile(Request $request)
    {
        //$userMitra = auth()->user();
        $userMitra = User::where('role_id', 5)->first();
        $userMitra->update([
            'nama_lengkap' => $request->input('nama_lengkap'),
            'email' => $request->input('email'),
            'no_hp' => $request->input('no_hp'),
            'alamat' => $request->input('alamat'),
            'about' => $request->input('about'),
        ]);

        return redirect('/contributorformitra-editprofile');
    }

    public function updateFoto(Request $request, $id)
    {
        try {
            // Mendapatkan profil pengguna yang sedang masuk
            $profile = User::findOrFail($id);
            // Validasi file gambar yang diunggah
            $request->validate([
                'foto_profil' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            // dd($request->all());

            // Jika pengguna sudah memiliki foto profil, hapus foto profil sebelumnya
            if ($profile->foto_profil) {
                Storage::delete('public/' . $profile->foto_profil);
            }

            // Simpan file gambar baru
            $namaFoto = time() . '.' . $request->foto_profile->getClientOriginalExtension();
            $path = $request->foto_profile->storeAs('public/assets/images', $namaFoto);

            // Perbarui data foto profil pengguna
            $profile->update([
                'foto_profil' => $namaFoto,
            ]);

            // Redirect kembali ke halaman edit profile
            return response()->json(['success' => 'Foto Profil Berhasil Diperbarui', 'data' => $namaFoto]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }
    public function deleteFoto($id)
    {
        $profil = User::findOrFail($id);
        try {
            if ($profil->foto_profil) {
                Storage::delete('public/' . $profil->foto_profil);
                $profil->foto_profil = null;
                $profil->save();
                return response()->json(['success' => 'Foto Berhasil diHapus']);
            } else {
                return response()->json(['error' => 'Anda tidak memiliki Foto Profil']);
            }
        } catch (\Exception $e) {
            $errorMessage = strip_tags($e->getMessage());
            return response()->json(['error' => $errorMessage]);
        }
    }

    public function Divisi()
    {
        // Ambil semua data devisi
        $devisiList = Divisi::all();

        // Loop melalui setiap devisi
        foreach ($devisiList as $devisi) {
            // Ambil semua user yang memiliki devisi_id yang sesuai dengan id devisi saat ini
            $users = User::where('divisi')->first();

            // Kirim data devisi beserta anggotanya ke view
            return view('contributorformitra.devisi', compact('devisiList', 'users', 'devisi'));
        }
    }
}
