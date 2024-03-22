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
}
