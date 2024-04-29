<?php

namespace App\Http\Controllers\BEController;

use DateTime;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Mitra;
use App\Models\Paket;
use App\Models\Divisi;
use App\Mail\SendEmail;
use App\Models\Riwayat;
use App\Models\Sekolah;
use App\Models\Presensi;
use App\Models\Mahasiswa;
use App\Models\Penilaian;
use App\Models\DivisiItem;
use Illuminate\Http\Request;
use App\Models\KategoriPenilaian;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\SubKategoriPenilaian;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use function PHPUnit\Framework\isEmpty;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AdminUnivAfterPaymentController extends Controller
{
    public function index(Request $request)
    // dashboard
    { // menampilkan seluruh data yang diperlukan
        $jumlah_mitra = Mitra::all()->count();
        $jumlah_siswa = User::where("role_id", 3)->count();
        $user = auth()->user();
        // Mengambil nama siswa dari koleksi data

        if ($request->is('api/*') || $request->wantsJson()) {
            return response()->json([
                "message" => "Success get data",
                "jumlah mitra" => $jumlah_mitra,
                "jumlah siswa" => $jumlah_siswa,
            ]);
        } else {
            return view('adminUniv-afterPayment.AdminUniv-Dashboard', ['jml_mitra' => $jumlah_mitra, 'jml_siswa' => $jumlah_siswa, 'user' => $user]);
        }
    }

    public function viewResetPassword()
    {
        return view('adminUniv-afterPayment.AdminUniv-ResetPassword');
    }
    public function resetPasswordAdmin(Request $request)
    { {
            $request->validate([
                'email' => 'required|email',
            ]);
            $user = User::where('email', $request->email)->first();
            if (!$user) {
                return response()->json(['error' => 'User not found.'], 404);
            }
            $otp = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);
            Session::put('otp_', $otp);
            Session::put('reset_password', $request->email);

            try {
                Mail::to($request->email)->send(new SendEmail($otp));
                return redirect()->to('/AdminUniv-InputOTP');
            } catch (\Exception $e) {
                Log::error($e->getMessage());
            }
        }
    }

    public function verifyOTP(Request $request)
    {
        $request->validate([
            'digit1' => 'required|string',
            'digit2' => 'required|string',
            'digit3' => 'required|string',
            'digit4' => 'required|string',
        ]);

        $inputOtp = $request->digit1 . $request->digit2 . $request->digit3 . $request->digit4;
        // Ambil OTP dari session
        $otpFromSession = Session::get('otp_');
        // Cek apakah OTP sesuai
        if ($otpFromSession !== $inputOtp) {
            return redirect()->back()->with('error', 'Invalid OTP');

            $user = User::where('email', $request->email)->first();
            // Cek apakah pengguna ditemukan
            if (!$user) {
                return back()->withErrors(['email' => 'User not found.']);
            }
            //mengecek apakah otp yang dimasukan sesuai dengan yang diharapka atau telah dikirim di email
            if ($user->otp !== $request->otp) {
                return response()->json([
                    'error' => ' Invalid OTP'
                ], 400);
            }

            // Hapus OTP dari session setelah diverifikasi
            $request->session()->forget('otp_' . $request->email);
        }
        return redirect()->to('/user/reset-password/new-password');
    }

    public function newPassword(Request $request)
    {
        // dd($request->session);
        $request->validate([
            'password' => 'required|string|min:5|confirmed',
        ]);
        $reset = Session::get('reset_password');
        $user = User::where('email', $reset)->first();
        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'Pengguna dengan email ini tidak ditemukan.'
            ]);
        }

        $user->update(['password' => Hash::make($request->password)]);
        // Bersihkan session reset_email setelah pengguna berhasil mengubah kata sandi
        $request->session()->forget('reset_password');
        // return redirect()->route('user.login')->with('success', 'Password has been reset successfully. Please login with your new password.');
        // return redirect()->to('user/login');
        return redirect()->to('/AdminUniv-InputNewPassword');
    }

    public function profileAdmin()
    {
        $profil = User::all();
        return response()->json([
            "message" => "Success get data profile",
            "data" => $profil
        ]);
    }
    public function detailAdminProfile(Request $request)
    {
        // $profil = User::find($id);
        $user = auth()->user();
        if ($request->is("api/*") || $request->wantsJson()) {
            return response()->json([
                'profil' => $user
            ]);
        } else {
            return view('adminUniv-afterPayment.AdminUniv-EditProfile', compact('user'));
        }
    }
    public function updateAdminProfile(Request $request)
    {
        $user = auth()->user();
        // $updateUser = User::where('id', $user);
        // Update the user's profile with the validated data
        $user->update([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'kota' => $request->kota,
            'about' => $request->about,
        ]);

        // Redirect back to the edit profile page
        return redirect()->route('adminUniv.editProfile');
    }


    // public function adminUnivMitra(Request $request)
    // // univ - mitra
    // // punya nopal be
    // {
    //     $mitra = Mitra::withCount('mahasiswa')->get();
    //     // $mitra = Mitra::all();

    //     if ($request->is('api/*') || $request->wantsJson()) {
    //         return response()->json(['Jumlah Mahasiswa pada tiap Mitra' => $mitra]);
    //     } else {
    //         return view('adminUniv-afterPayment.mitra.adminunivmitra', ['mitra' => $mitra]);
    //     }
    // }

    public function adminUnivDivisiMitra($id)
    {
        $mitra = Mitra::with('divisiMitra')->findOrFail($id);

        if (!$mitra) {
            return response()->json('message', 'Data tidak ditemukan');
        } else {
            return response()->json([
                'mitra' => $mitra
            ]);
        }
    }
    public function adminUnivPresensi()
    // Univ - Mitra - Daftar Mitra -  Option - Presensi
    {
        try {
            $presensi = Presensi::all();
            return response()->json(['presensi' => $presensi]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'data not found', 'data' => null], 404);
        }
    }
    public function adminUnivPengaturanPresensi($id)
    {
        // Admin Univ-Mitra-Daftar Mitra-Option-Presensi-Pengaturan Presensi
        $optionPresensi = Mitra::findOrFail($id);

        return response()->json([
            'message' => 'pengaturan presensi',
            'Status Absensi' => $optionPresensi
        ]);
    }
    public function updateAdminUnivPengaturanPresensi(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'status_absensi' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'gagal update divisi',], 404);
        }

        $mitra = Mitra::find($id);
        $mitra->fill([
            'status_absensi' => $request->status_absensi
        ]);
        $mitra->save();

        return response()->json([
            'message' => 'update pengaturan',
            'data' => $mitra
        ]);
    }
    public function adminUnivPresensiDetailProfile($id)
    // Univ - Mitra - Daftar Mitra -  Option - Presensi - Detail Profile
    {
        try {
            $presensi = Presensi::findOrFail($id);
            return response()->json(['message' => 'success to get data', 'presensi' => $presensi]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Data Not Found', 'data' => null], 404);
        }
    }

    // public function daftarMitraTeamAktif(Request $request, $id)
    // // daftarMitra-teamAktif
    // // Punya Nopal BE
    // {

    //     // $divisi = Mitra::with('divisiMitra')->findOrFail($id);
    //     // $divisiMitra = $divisi->divisi_mitra;
    //     $divisiMitraId = DivisiItem::where('mitra_id', $id)->first();
    //     $divisiMitra = DivisiItem::with('divisi')->where('mitra_id', $id)->get();
    //     // dd($divisiMitra);
    //     $jml_anggota = User::with('divisi')->where('role_id', 3)->where('mitra_id', $id)->count();
    //     if ($request->is('api/*') || $request->wantsJson()) {
    //         return response()->json(['message' => 'team aktif',   'divisiMitra' => $divisiMitra, 'jml_anggota' => $jml_anggota]);
    //     } else {
    //         return view('adminUniv-afterPayment.mitra.Option-TeamAktif', compact('divisiMitra', 'jml_anggota', 'divisiMitraId'));
    //     }
    // }

    // public function daftarMitraPengaturanDivisi(Request
    // $request, $id)
    // // Univ - Mitra - Daftar Mitra -  Option - Team Aktif - Pengaturan Divisi
    // punya nopal BE
    // {
    //     $divisi = DivisiItem::with('divisi')->where('mitra_id', $id)->get();

    //     if ($request->is('api/*') || $request->wantsJson()) {
    //         return response()->json(['message' => 'Pengaturan Divisi', 'Divisi' => $divisi]);
    //     } else {
    //         return view('adminUniv-afterPayment.mitra.Option-TeamAktif-pengaturanDivisi', ['divisi' => $divisi]);
    //     }
    // }

    public function addDivisi(Request $request)
    // Univ - Mitra - Daftar Mitra -  Option - Team Aktif - Pengaturan Divisi
    {
        $validator = Validator::make($request->all(), [
            'nama_divisi' => 'required',
            'foto_divisi' => '',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = new Divisi([
            'nama_divisi' => $request->input('nama_divisi'), // Sesuaikan dengan nama yang benar dari permintaan
        ]);

        if ($request->hasFile('foto_divisi')) {
            $request->file('foto_divisi')->move('foto_divisi/', $request->file('foto_divisi')->getClientOriginalName());
            $data->foto_divisi = $request->file('foto_divisi')->getClientOriginalName();
            $data->save();
        }
        $data->save();
        if ($request->is('api/*') || $request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Success to add divisi'], 200);
        } else {
            return redirect()->route('adminUniv.addDivisi');
        }
    }
    public function updateDivisi(Request $request, $id)
    // Univ - Mitra - Daftar Mitra -  Option - Team Aktif - Pengaturan Divisi
    {
        $divisi = Divisi::all();
        $validator = Validator::make($request->all(), [
            'nama_divisi' => 'required',
            'deskripsi_divisi' => '',
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'gagal update divisi',], 404);
        }
        $data = Divisi::find($id);
        $data->fill([
            'nama_divisi' => $request->nama_divisi
        ]);
        $data->save();
        return redirect('/AdminUniv/Option-TeamAktif-pengaturanDivisi');
    }
    public function destroyDivisi($id)
    // Univ - Mitra - Daftar Mitra -  Option - Team Aktif - Pengaturan Divisi
    {
        $data = Divisi::find($id);
        if ($data) {
            $data->delete();

            return redirect('/AdminUniv/Option-TeamAktif-pengaturanDivisi');
        } else {
            return response()->json(['success' => false, 'message' => 'Data not found'], 404);
        }
    }

    // public function showKategoriPenilaian(Request $request)
    // // Univ - Mitra - Daftar Mitra -  Option - Team Aktif - Pengaturan Divisi - Kategori Penilaian
    // {
    //     $kategori = KategoriPenilaian::with('kategori')->get();
    //     if ($request->is('api/*') || $request->wantsJson()) {
    //         return response()->json(['success' => true, 'nilai' => $kategori], 200);
    //     } else {
    //         return view('pengaturan.kategoripenilaian', ['kategori' => $kategori]);
    //     }
    // }
    

    // public function teamAktifKlik(Request $Request, $id)
    // // Univ - Mitra - Daftar Mitra -  Option - Team Aktif - Klik
    // //punya Nopal Be
    // {
    //     // $divisi = Divisi::with('anggotaDivisi')->find($id);

    //     $divisi = User::where('role_id', 3)->where('divisi_id', $id)->get();

    //     // $user = $anggota_divisi->nama_lengkap;

    //     if (!$divisi) {
    //         return response()->json(['message' => 'Divisi not found'], 404);
    //     }

    //     if ($Request->is('api/*') || $Request->wantsJson()) {
    //         return response()->json([
    //             'message' => 'Success to get detail data divisi with mahasiswa',
    //             'data' => $divisi,

    //             // 'user' => $user
    //         ]);
    //     } else {
    //         return view('adminUniv-afterPayment.mitra.OptionTeamAktifKlikUiUx', compact('divisi'));
    //     }
    // }

    public function teamAktifSeeAllTeam(Request $request) // menggunakan $id mitra jika berdasarkan mitra yang diikuti
    {
        $user = User::where('role_id', 3)->get();
        if ($request->is('api/*') || $request->wantsJson()) {
            return response()->json($user);
        } else {
            return view('adminUniv-afterPayment.mitra.Option-TeamAktif-SeeAllTeams', compact('user'));
        }
    }

    public function teamAktifSuntingTeam(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required',
            'nomor_induk' => 'required',
            'jurusan' => 'required',
            'kota' => 'required',
            'tgl_lahir' => 'required',
            'no_hp' => 'required',
            'username' => 'required',
            'email' => 'required',
            'tgl_masuk' => 'required',
            'tgl_keluar' => 'required',
            'divisi' => 'required',
            'status_absensi' => 'required',
            'status_akun' => 'required',
            'konfirmasi_email' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password' // Ensure confirm_password matches password
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Masukkan data dengan benar'], 404);
        }

        $user = User::findOrFail($id);

        $user->fill([
            'nama_lengkap' => $request->nama_lengkap,
            'nomor_induk' => $request->nomor_induk,
            'jurusan' => $request->jurusan,
            'kota' => $request->kota,
            'tgl_lahir' => $request->tgl_lahir,
            'no_hp' => $request->no_hp,
            'username' => $request->username,
            'email' => $request->email,
            'tgl_masuk' => $request->tgl_masuk,
            'tgl_keluar' => $request->tgl_keluar,
            'konfirmasi_email' => $request->konfirmasi_email,
            'divisi' => $request->divisi,
            'status_absensi' => $request->status_absensi,
            'status_akun' => $request->status_akun,
        ]);

        // Hash the password
        $user->password = Hash::make($request->password);

        $user->save();

        return response()->json(['message' => 'Berhasil sunting'], 200);
    }
    public function laporanDataPresensi(Request $request)
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
                $item['nama_divisi'] = Divisi::where('id', $item->user->divisi_id)->first();
                $item['nama_sekolah'] = Sekolah::where('id', $item->user->sekolah)->first();
                // tanggal masuk
                $item['tanggal_masuk'] = $item->user->tgl_masuk;
                $item['tahun_masuk'] = Carbon::createFromFormat('Y-m-d', $item->tanggal_masuk)->format('Y');
                $item['bulan_masuk'] = Carbon::createFromFormat('Y-m-d', $item->tanggal_masuk)->format('m');
                $item['hari_masuk'] = Carbon::createFromFormat('Y-m-d', $item->tanggal_masuk)->format('d');

                $item['bulan'] = DateTime::createFromFormat('!m', $item->bulan_masuk)->format('F');
                return $item;
            });

        if ($request->is('api/*') || $request->wantsJson()) {
            return response()->json(['message' => 'success get data', 'kehadiran_per_nama' => $kehadiranPerNama], 200);
        } else {
            return view('adminUniv-afterPayment.mitra.laporanpresensi',)
                ->with('presensi', $presensi)->with('kehadiran', $kehadiranPerNama);
        }
    }
    public function teamAktifDetailHadir(Request $request, $nama_lengkap)
    {
        // dd($nama_lengkap);
        // NIM
        $user = User::findOrFail($nama_lengkap);
        // menampilkan divisi
        $divisi_user = $user->divisi_id;
        $divisi = Divisi::find($divisi_user);
        // untuk menampilkan data sekolah
        $sekolah_user = $user->sekolah;
        $sekolah = Sekolah::find($sekolah_user);

        $presensi = Presensi::where('nama_lengkap', $nama_lengkap)->where('status_kehadiran', 'Hadir')->get();
        $jam_default = User::where('id', $nama_lengkap)
            ->whereNotNull('jam_default_masuk')
            ->whereNotNull('jam_default_pulang')
            ->select('jam_default_masuk', 'jam_default_pulang')
            ->first();

        // total hari masuk
        $total_masuk = Presensi::where('nama_lengkap', $nama_lengkap)->where('status_kehadiran', 'Hadir')->count();

        // total jam masuk
        $total_jam_masuk = Presensi::where('nama_lengkap', $nama_lengkap)
            ->whereNotNull('jam_masuk')
            ->whereNotNull('jam_pulang')
            ->where('status_kehadiran', 'Hadir')
            ->selectRaw('IFNULL(SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(jam_pulang, jam_masuk)))), "00:00:00") AS total_jam_masuk')
            ->first();

        // total jam masuk format integer
        $totalJamMasuk = $total_jam_masuk->total_jam_masuk;
        // Membuat objek Carbon dari total jam masuk
        $carbonJamMasuk = Carbon::parse($totalJamMasuk);
        // Mendapatkan jumlah jam dari waktu masuk sebagai integer
        $jamMasukInteger = $carbonJamMasuk->hour;

        // target lulus
        $target = Presensi::where('nama_lengkap', $nama_lengkap)
            ->whereNotNull('target')
            ->pluck('target')
            ->first();

        // sisa
        $sisa = $target - $jamMasukInteger;


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
        if ($request->is('api/*') || $request->wantsJson()) {
            return response()->json([
                'data' => $presensi,
                'total masuk' => $total_masuk,
                'jam_default' => $jam_default,
                'total_jam_masuk' => $total_jam_masuk,
                'total_jam_masuk_integer' => $jamMasukInteger,
                'target lulus' => $target,
                'sisa' => $sisa
            ]);
        } else {
            return view('adminUniv-afterPayment.mitra.laporandetailhadir', compact('presensi', 'divisi', 'sekolah', 'user', 'total_masuk', 'jam_default', 'total_jam_masuk', 'target', 'sisa'));
        }
    }

    public function teamAktifDetailIzin(Request $request, $nama_lengkap)
    {
        // NIM
        $user = User::findOrFail($nama_lengkap);
        // menampilkan divisi
        $divisi_user = $user->divisi_id;
        $divisi = Divisi::find($divisi_user);
        // untuk menampilkan data sekolah
        $sekolah_user = $user->sekolah;
        $sekolah = Sekolah::find($sekolah_user);

        $presensi = Presensi::where('nama_lengkap', $nama_lengkap)->where('status_kehadiran', 'Izin')->get();

        $date = Carbon::createFromFormat('Y-m-d', '2023-08-11');
        $dayName = $date->format('l');

        // jam default
        $jam_default = User::where('id', $nama_lengkap)
            ->whereNotNull('jam_default_masuk')
            ->whereNotNull('jam_default_pulang')
            ->select('jam_default_masuk', 'jam_default_pulang')
            ->first();

        // total hari masuk
        $total_masuk = Presensi::where('nama_lengkap', $nama_lengkap)->where('status_kehadiran', 'Hadir')->count();

        // total jam masuk
        $total_jam_masuk = Presensi::where('nama_lengkap', $nama_lengkap)
            ->whereNotNull('jam_masuk')
            ->whereNotNull('jam_pulang')
            ->where('status_kehadiran', 'Hadir')
            ->selectRaw('IFNULL(SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(jam_pulang, jam_masuk)))), "00:00:00") AS total_jam_masuk')
            ->first();

        // total jam masuk format integer
        $totalJamMasuk = $total_jam_masuk->total_jam_masuk;
        // Membuat objek Carbon dari total jam masuk
        $carbonJamMasuk = Carbon::parse($totalJamMasuk);
        // Mendapatkan jumlah jam dari waktu masuk sebagai integer
        $jamMasukInteger = $carbonJamMasuk->hour;

        // target lulus
        $target = Presensi::where('nama_lengkap', $nama_lengkap)
            ->whereNotNull('target')
            ->pluck('target')
            ->first();

        // sisa
        $sisa = $target - $jamMasukInteger;


        if ($request->is('api/*')) {
            return response()->json([
                'data' => $presensi,
                'jam default' => $jam_default,
                'total hari masuk' => $total_masuk,
                'total jam masuk' => $total_jam_masuk,
                'target' => $target,
                'sisa' => $sisa,
                'sekolah' => $sekolah

            ]);
        } else {
            return view('adminUniv-afterPayment.mitra.laporandetailizin', compact('user', 'divisi', 'sekolah', 'presensi', 'jam_default', 'total_masuk', 'total_jam_masuk', 'target', 'sisa'));
        }
    }

    public function teamAktifDetailTidakHadir(Request $request, $nama_lengkap)
    {
        // NIM
        $user = User::findOrFail($nama_lengkap);
        // menampilkan divisi
        $divisi_user = $user->divisi_id;
        $divisi = Divisi::find($divisi_user);
        // untuk menampilkan data sekolah
        $sekolah_user = $user->sekolah;
        $sekolah = Sekolah::find($sekolah_user);

        $presensi = Presensi::where('nama_lengkap', $nama_lengkap)->where('status_kehadiran', 'Tidak Hadir')->get();

        $date = Carbon::createFromFormat('Y-m-d', '2023-08-11');
        $dayName = $date->format('l');

        // jam default
        $jam_default = User::where('id', $nama_lengkap)
            ->whereNotNull('jam_default_masuk')
            ->whereNotNull('jam_default_pulang')
            ->select('jam_default_masuk', 'jam_default_pulang')
            ->first();

        // total hari masuk
        $total_masuk = Presensi::where('nama_lengkap', $nama_lengkap)->where('status_kehadiran', 'Hadir')->count();

        // total jam masuk
        $total_jam_masuk = Presensi::where('nama_lengkap', $nama_lengkap)
            ->whereNotNull('jam_masuk')
            ->whereNotNull('jam_pulang')
            ->where('status_kehadiran', 'Hadir')
            ->selectRaw('IFNULL(SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(jam_pulang, jam_masuk)))), "00:00:00") AS total_jam_masuk')
            ->first();

        // total jam masuk format integer
        $totalJamMasuk = $total_jam_masuk->total_jam_masuk;
        // Membuat objek Carbon dari total jam masuk
        $carbonJamMasuk = Carbon::parse($totalJamMasuk);
        // Mendapatkan jumlah jam dari waktu masuk sebagai integer
        $jamMasukInteger = $carbonJamMasuk->hour;

        // target lulus
        $target = Presensi::where('nama_lengkap', $nama_lengkap)
            ->whereNotNull('target')
            ->pluck('target')
            ->first();

        // sisa
        $sisa = $target - $jamMasukInteger;


        if ($request->is('api/*')) {
            return response()->json([
                'data' => $presensi,
                'jam default' => $jam_default,
                'total hari masuk' => $total_masuk,
                'total jam masuk' => $total_jam_masuk,
                'target' => $target,
                'sisa' => $sisa,
                'sekolah' => $sekolah

            ]);
        } else {
            return view('adminUniv-afterPayment.mitra.laporandetailtidakhadir', compact('user', 'divisi', 'sekolah', 'presensi', 'jam_default', 'total_masuk', 'total_jam_masuk', 'target', 'sisa'));
        }
    }

    //riwayatpembelian
    public function RiwayatPembelian()
    {
        $paket = Riwayat::all();
        $user = auth()->user();
        return view('user.AdminUnivAfterPayment.RiwayatPembelian', compact('paket', 'user'));
    }

    // admin paket
    public function adminPaket()
    {
        $user = auth()->user();
        return view('user.AdminUnivAfterPayment.AdminPaket', compact('user'));
    }
    //jangka waktu
    public function JangkaWaktu()
    {
        // $paket = Paket::where('status', 'Aktif')->get();
        $user = auth()->user();
        $paket = Riwayat::all();
        return view('user.AdminUnivAfterPayment.RiwayatJangkaWaktu', compact('paket', 'user'));
    }
    public function bagianMitra()
    {
        // $mitra=User::all();
        $mitra = User::where('role_id', 5)->select('nama_lengkap', 'username')->get();

        return response()->json(['data' => $mitra]);
    }
    public function editUserMitra(Request $request, $id)
    {
        $user = User::find($id);

        $data = [
            'nama_lengkap' => 'nullable|string|max:255',
            'username' => 'nullable|string|unique:users,username',
            'email' => 'nullable|string|email|max:255|unique:users,email,' . $user->id,
            'no_hp' => 'nullable|string|max:20',
            'password' => 'nullable|string|min:8|confirmed',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        $validator = Validator::make($request->all(), $data);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Update user mitra data
        $user->nama_lengkap = $request->nama_lengkap;
        $user->foto_profil = $request->foto_profil;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->no_hp = $request->no_hp;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        $mahasiswa = User::where('role_id', 3)->select('nama_lengkap', 'nomor_induk', 'jurusan')->get();
        $mahasiswa = $request->input('mahasiswa_id');
        $result = [];

        Mahasiswa::where('user_id', $user->id)->delete();

        if (is_array($mahasiswa) && !empty($mahasiswa)) {
            foreach ($mahasiswa as $mhs) {
                Mahasiswa::create([
                    'user_id' => $user->id,
                    'mahasiswa_id' => $mhs,
                ]);

                $result[] = [
                    'user_id' => $user->id,
                    'mahasiswa_id' => $mhs,
                ];
            }
        }
        $mahasiswa = User::where('role_id', 3)->select('nama_lengkap', 'nomor_induk', 'jurusan')->get();

        return response()->json(['message' => 'Profile updated successfully', 'tambah' => $mahasiswa], 200);
    }

    // ALWAN BE
    public function daftarMitraTeamAktif(Request $request, $id)
    // daftarMitra-teamAktif
    {
        $user = auth()->user();
        $divisi = Mitra::with('divisiMitra')->findOrFail($id);
        $divisiMitraId = DivisiItem::where('mitra_id', $id)->first();
        $divisiMitra = DivisiItem::with('divisi')->where('mitra_id', $id)->get();
        $jml_anggota = User::with('divisi')->where('role_id', 3)->where('mitra_id', $id)->count();
        return view('adminUniv-afterPayment.mitra.Option-TeamAktif', [
            'divisi' => $divisi,
            'divisiMitra' => $divisiMitra,
            'jml_anggota' => $jml_anggota,
            'divisiMitraId' => $divisiMitraId,
            'user' => $user
        ]);
    }

    public function adminUnivMitra(Request $request)
    // univ - mitra
    {
        $user = auth()->user();
        $mitra = Mitra::withCount('mahasiswa')->get();
        // $mitra = Mitra::all();

        if ($request->is('api/*') || $request->wantsJson()) {
            return response()->json(['Jumlah Mahasiswa pada tiap Mitra' => $mitra]);
        } else {
            return view('adminUniv-afterPayment.mitra.adminunivmitra', ['mitra' => $mitra, 'user' => $user]);
        }
    }

    public function daftarMitraPengaturanDivisi(Request $request, $id)
    // Univ - Mitra - Daftar Mitra -  Option - Team Aktif - Pengaturan Divisi
    {
        $divisi = DivisiItem::with('divisi')->where('mitra_id', $id)->get();

        if ($request->is('api/*') || $request->wantsJson()) {
            return response()->json(['message' => 'Pengaturan Divisi', 'Divisi' => $divisi]);
        } else {
            return view('adminUniv-afterPayment.mitra.Option-TeamAktif-pengaturanDivisi', ['divisi' => $divisi]);
        }
    }

    public function teamAktifKlik(Request $Request, $id)
    // Univ - Mitra - Daftar Mitra -  Option - Team Aktif - Klik
    {
        $divisi = Divisi::with('anggotaDivisi')->find($id);
        if (!$divisi) {
            return response()->json(['message' => 'Divisi not found'], 404);
        }
        $users = User::where('role_id', 3)->where('divisi_id', $id)->get();
        return view('adminUniv-afterPayment.mitra.OptionTeamAktifKlikUiUx', [
            'divisi' => $divisi,
            'users' => $users,
        ]);
    }
    public function teamAktifEdit(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $sekolah = Sekolah::all();
        $mitra = Mitra::all();
        $divisi = Divisi::all();

        return view('adminUniv-afterPayment.mitra.OptionEditUser', compact('user', 'sekolah', 'mitra', 'divisi'));
    }
    public function teamAktifEditPost(Request $request, $id)
    {
        $user = User::find($id);

        if ($user) {
            $user->nama_lengkap = $request->nama_lengkap;
            $user->sekolah = $request->sekolah;
            $user->mitra_id = $request->mitra_id;
            $user->divisi_id = $request->divisi_id;
            $user->save();
            return redirect()->route('adminUniv.editUser', $user->id)->with('success', 'Data pengguna berhasil diperbarui.');
        } else {
            return redirect()->back()->with('error', 'Pengguna tidak ditemukan.');
        }
    }

    public function hapusDivisi($id)
    {
        Penilaian::whereIn('sub_id', function ($query) use ($id) {
            $query->select('id')
                ->from('sub_kategori_penilaian')
                ->whereIn('kategori_id', function ($query) use ($id) {
                    $query->select('id')
                        ->from('kategori_penilaian')
                        ->where('divisi_id', $id);
                });
        })->delete();

        SubKategoriPenilaian::whereIn('kategori_id', function ($query) use ($id) {
            $query->select('id')
                ->from('kategori_penilaian')
                ->where('divisi_id', $id);
        })->delete();

        KategoriPenilaian::where('divisi_id', $id)->delete();

        Divisi::findOrFail($id)->delete();

        return redirect()->to('/pengaturan-contri');
    }

    public function showKategoriPenilaian($divisi_id)
    // Univ - Mitra - Daftar Mitra -  Option - Team Aktif - Pengaturan Divisi - Kategori Penilaian
    {
        $divisi = Divisi::findOrFail($divisi_id);

        return view('pengaturan.kategoripenilaian', [
            'divisi' => $divisi
        ]);
    }

    public function addKategoriPenilaian(Request $request, $divisi_id)
    // Univ - Mitra - Daftar Mitra -  Option - Team Aktif - Pengaturan Divisi - Kategori Penilaian
    {
        $divisi = Divisi::findOrFail($divisi_id);
        $nama_kategori = $request->input('nama_kategori');
        $data = new KategoriPenilaian;
        $data->divisi_id = $divisi_id;    
        $data->nama_kategori = $nama_kategori;            
        $data->save();
        return view('pengaturan.kategoripenilaian',[
            'divisi' => $divisi
        ]);
    }

    public function addSubKategoriPenilaian(Request $request, $divisi_id, $kategori_id)
    // Univ - Mitra - Daftar Mitra -  Option - Team Aktif - Pengaturan Divisi - Kategori Penilaian
    {
        $divisi = Divisi::findOrFail($divisi_id);
        $nama_sub_kategori = $request->input('nama_sub_kategori');
        $data = new SubKategoriPenilaian;
        $data->divisi_id = $divisi_id;
        $data->kategori_id = $kategori_id;      
        $data->nama_sub_kategori = $nama_sub_kategori;
        $data->save();

        return view('pengaturan.kategoripenilaian', [
            'divisi' => $divisi,
            'kategori_id' => $kategori_id
        ]);
    }
}
