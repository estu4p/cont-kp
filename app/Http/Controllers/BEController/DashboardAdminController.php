<?php

namespace App\Http\Controllers\BEController;

use App\Models\User;
use App\Models\Mitra;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DashboardAdminController extends Controller
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

    public function profile(Request $request)
    {
        $profil = User::all();
        return response()->json([
            "message" => "Success get data profile",
            "data" => $profil
        ]);
    }

    public function detailProfile(Request $request, $id)
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
    public function update(Request $request, $id)
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
}
