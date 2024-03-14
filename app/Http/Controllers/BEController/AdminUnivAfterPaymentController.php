<?php

namespace App\Http\Controllers\BEController;

use App\Models\User;
use App\Models\Mitra;
use App\Models\Presensi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

    public function adminUnivPresensi($id)
    {
        try {
            $mitra = Mitra::findOrFail($id);
            $presensi = Presensi::where('mitra_id', $id)->get();
            return response()->json(['mitra' => $mitra, 'presensi' => $presensi,]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'data not found', 'data' => null], 404);
        }
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
}
