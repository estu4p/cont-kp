<?php

namespace App\Http\Controllers\BEController;

use App\Models\KategoriPenilaian;
use App\Models\SubKategoriPenilaian;
use App\Models\User;
use App\Models\Mitra;
use App\Models\Presensi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Divisi;
use App\Models\Penilaian;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AdminUnivAfterPaymentController extends Controller
{
    public function index()
    { // menampilkan seluruh data yang diperlukan
        $jumlah_mitra = Mitra::all();
        $jumlah_siswa = User::where("role_id", 1)->get();

        // Mengambil nama siswa dari koleksi data

        return response()->json([
            "message" => "Success get data",
            "jumlah mitra" => $jumlah_mitra,
            "jumlah siswa" => $jumlah_siswa,

        ]);
    }
    public function profileAdmin(Request $request)
    {
        $profil = User::all();
        return response()->json([
            "message" => "Success get data profile",
            "data" => $profil
        ]);
    }
    public function detailAdminProfile(Request $request, $id)
    {
        $profil = User::find($id);
        if ($profil) {
            return response()->json([
                "message" => "Success to get detail profile",
                "data" => $profil
            ]);
        } else {
            return response()->json(['message' => 'Fail to get detail profile'], 404);
        }
    }
    public function updateAdminProfile(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "nama_lengkap" => 'required',
            'email' => 'required|min:6',
            'nomor_induk' => 'required',
            'jurusan' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'about' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::findOrFail($id);

        $user->fill([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'nomor_induk_' => $request->nomor_induk,
            'jurusan' => $request->jurusan,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'about' => $request->about
        ]);

        $user->save();

        if ($user) {
            return response()->json([
                'message' => 'Success to update data profile',
                'data' => $user
            ], 200);
        } else {
            return response()->json(['message' => 'Fail to update data proifile'], 404);
        }
    }

    public function adminUnivMitra(Request $request)
    {
        $mitra = Mitra::withCount('mahasiswa')->get();

        if ($request->is('api/*') || $request->wantsJson()) {
            return response()->json(['Jumlah Mahasiswa pada tiap Mitra' => $mitra]);
        } else {
            return view('DataMitra')->with('mitra', $mitra);
        }
    }

    public function adminUnivPresensi()
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
    {
        try {
            $presensi = Presensi::findOrFail($id);
            return response()->json(['message' => 'success to get data', 'presensi' => $presensi]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Data Not Found', 'data' => null], 404);
        }
    }

    public function daftarMitraTeamAktif()
    {
        $divisi = Divisi::withCount('mahasiswa')->get();
        return response()->json(['message' => 'team aktif', 'divisi' => $divisi]);
    }
    public function daftarMitraPengaturanDivisi()
    {
        $divisi = Divisi::all();
        return response()->json(['message' => 'Pengaturan Divisi', 'Divisi' => $divisi]);
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
            'nama_divisi' => $request->input('nama_divisi'), // Sesuaikan dengan nama yang benar dari permintaan
        ]);

        $data->save();

        return response()->json(['success' => true, 'message' => 'Success to add divisi'], 200);
    }
    public function updateDivisi(Request $request, $id)
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
    {
        $data = Divisi::find($id);
        if ($data) {
            $data->delete();
            return response()->json(['success' => true, 'message' => 'Succes to delete divisi'], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Data not found'], 404);
        }
    }

    public function showKategoriPenilaian()
    {
        $kategori = KategoriPenilaian::with('kategori')->get();
        return response()->json(['success' => true, 'nilai' => $kategori], 200);
    }
    public function addKategoriPenilaian(Request $request)
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
}
