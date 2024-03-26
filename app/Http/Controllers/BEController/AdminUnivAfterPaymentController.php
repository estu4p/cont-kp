<?php

namespace App\Http\Controllers\BEController;

use App\Models\User;
use App\Models\Mitra;
use App\Models\Divisi;
use App\Models\Presensi;
use Illuminate\Http\Request;
use App\Models\KategoriPenilaian;
use App\Http\Controllers\Controller;
use App\Models\SubKategoriPenilaian;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use function PHPUnit\Framework\isEmpty;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Log;


use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AdminUnivAfterPaymentController extends Controller
{
    public function index(Request $request)
    // dashboard
    { // menampilkan seluruh data yang diperlukan
        $jumlah_mitra = Mitra::all()->count();
        $jumlah_siswa = User::where("role_id", 3)->count();

        // Mengambil nama siswa dari koleksi data

        if ($request->is('api/*') || $request->wantsJson()) {
            return response()->json([
                "message" => "Success get data",
                "jumlah mitra" => $jumlah_mitra,
                "jumlah siswa" => $jumlah_siswa,
            ]);
        } else {
            return view('adminUniv-afterPayment.AdminUniv-Dashboard', ['jml_mitra' => $jumlah_mitra, 'jml_siswa' => $jumlah_siswa]);
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


    public function adminUnivMitra(Request $request)
    // univ - mitra
    {
        $mitra = Mitra::withCount('mahasiswa')->get();
        // $mitra = Mitra::all();

        if ($request->is('api/*') || $request->wantsJson()) {
            return response()->json(['Jumlah Mahasiswa pada tiap Mitra' => $mitra]);
        } else {
            return view('adminUniv-afterPayment.mitra.adminunivmitra', ['mitra' => $mitra]);
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
    public function adminUnivPengaturanPresensi()
    {
        return response()->json([
            'message' => 'pengaturan presensi'
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

    public function daftarMitraTeamAktif()
    // daftarMitra-teamAktif
    {
        $divisi = Divisi::withCount('mahasiswa')->get();
        return response()->json(['message' => 'team aktif', 'divisi' => $divisi]);
    }

    public function daftarMitraPengaturanDivisi(Request
    $request)
    // Univ - Mitra - Daftar Mitra -  Option - Team Aktif - Pengaturan Divisi
    {
        $divisi = Divisi::all();

        if ($request->is('api/*') || $request->wantsJson()) {
            return response()->json(['message' => 'Pengaturan Divisi', 'Divisi' => $divisi]);
        } else {
            return view('pengaturan.margepenilaiandivisi', ['divisi' => $divisi]);
        }
    }

    public function addDivisi(Request $request)
    // Univ - Mitra - Daftar Mitra -  Option - Team Aktif - Pengaturan Divisi
    {
        $validator = Validator::make($request->all(), [
            'nama_divisi' => 'required',
            'deskripsi_divisi' => '',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = new Divisi([
            'nama_divisi' => $request->input('nama_divisi'), // Sesuaikan dengan nama yang benar dari permintaan
        ]);

        $data->save();

        return response()->json(['success' => true, 'message' => 'Success to add divisi'], 200);
    }
    public function updateDivisi(Request $request, $id)
    // Univ - Mitra - Daftar Mitra -  Option - Team Aktif - Pengaturan Divisi
    {
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
        return response()->json(['success' => true, 'message' => 'succes to update divisi', 'data' => $data], 200);
    }
    public function destroyDivisi($id)
    // Univ - Mitra - Daftar Mitra -  Option - Team Aktif - Pengaturan Divisi
    {
        $data = Divisi::find($id);
        if ($data) {
            $data->delete();
            return response()->json(['success' => true, 'message' => 'Succes to delete divisi'], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Data not found'], 404);
        }
    }

    public function showKategoriPenilaian(Request $request)
    // Univ - Mitra - Daftar Mitra -  Option - Team Aktif - Pengaturan Divisi - Kategori Penilaian
    {
        $kategori = KategoriPenilaian::with('kategori')->get();
        if ($request->is('api/*') || $request->wantsJson()) {
            return response()->json(['success' => true, 'nilai' => $kategori], 200);
        } else {
            return view('pengaturan.kategoripenilaian', ['kategori' => $kategori]);
        }
    }
    public function addKategoriPenilaian(Request $request)
    // Univ - Mitra - Daftar Mitra -  Option - Team Aktif - Pengaturan Divisi - Kategori Penilaian
    {
        $validator = Validator::make($request->all(), [
            'divisi_id' => 'required',
            'nama_kategori' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'Fail to add kategori penilaian',], 400);
        }
        $data = new KategoriPenilaian([
            'divisi_id' => $request->input('divisi_id'),
            'nama_kategori' => $request->input('nama_kategori')
        ]);
        $data->save();

        return response()->json([
            'success' => true,
            'message' => 'success to add data'
        ]);
    }

    public function addSubKategoriPenilaian(Request $request)
    // Univ - Mitra - Daftar Mitra -  Option - Team Aktif - Pengaturan Divisi - Kategori Penilaian
    {
        $validator = Validator::make($request->all(), [
            'kategori_id' => 'required',
            'nama_sub_kategori' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'Fail to add Sub Kategori',], 400);
        }

        $data = new SubKategoriPenilaian([
            'kategori_id' => $request->input('kategori_id'),
            'nama_sub_kategori' => $request->input('nama_sub_kategori')
        ]);

        $data->save();

        return response()->json([
            'message' => 'success to add Sub Kategori'
        ]);
    }

    public function teamAktifKlik($id)
    // Univ - Mitra - Daftar Mitra -  Option - Team Aktif - Klik
    {
        $divisi = Divisi::with('anggotaDivisi')->find($id);

        if (!$divisi) {
            return response()->json(['message' => 'Divisi not found'], 404);
        }

        return response()->json([
            'message' => 'Success to get detail data divisi with mahasiswa',
            'data' => $divisi
        ]);
    }

    public function teamAktifSeeAllTeam($id)
    {
        $user = User::where('role_id', 3)->where('mitra_id', $id)->get();
        return response()->json($user);
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
            return response()->json(['message' => 'success get data', 'kehadiran_per_nama' => $kehadiranPerNama], 200);
        } else {
            return view('adminUniv-afterPayment.mitra.laporanpresensi')
                ->with('presensi', $presensi)->with('kehadiran', $kehadiranPerNama);
        }
    }
    public function teamAktifDetailHadir(Request $request, $nama_lengkap)
    {
        $presensi = Presensi::where('nama_lengkap', $nama_lengkap)->where('status_kehadiran', 'Hadir')->get();
        // $presensiAll = Presensi::where('nama_lengkap', $nama_lengkap)->get();
        // $presensiAll = Presensi::findOrFail($nama_lengkap);
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

            ]);
        } else {
            return view('adminUniv-afterPayment.mitra.laporandetailhadir', compact('presensi'));
        }
    }

    public function teamAktifDetailIzin($nama_lengkap)
    {
        $presensi = Presensi::where('nama_lengkap', $nama_lengkap)->where('status_kehadiran', 'Izin')->get();


        return response()->json([
            'data' => $presensi
        ]);
    }

    public function teamAktifDetailTidakHadir($nama_lengkap)
    {
        $presensi = Presensi::where('nama_lengkap', $nama_lengkap)->where('status_kehadiran', 'Tidak Hadir')->get();

        if (!$presensi) {
            return response()->json(
                ['message' => 'null']
            );
        }


        return response()->json([
            'data' => $presensi
        ]);
    }
}
