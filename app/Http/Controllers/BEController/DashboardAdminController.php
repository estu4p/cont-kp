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
        $jumlah_siswa = User::where("role", 1)->get();

        // Mengambil nama siswa dari koleksi data

        return response()->json([
            "message" => "Succes get data",
            "jumlah mitra" => $jumlah_mitra,
            "jumlah siswa" => $jumlah_siswa,

        ]);
    }

    public function profile(Request $request)
    {
        $profil = Mahasiswa::all();
        return response()->json([
            "message" => "Success get data profile",
            "data" => $profil
        ]);
    }

    public function detailProfile(Request $request, $id)
    {
        $profil = Mahasiswa::find($id);
        return response()->json([
            "message" => "Success to get detail profile",
            "data" => $profil
        ]);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "nama_mahasiswa" => 'required',
            'email' => 'required|min:6',
            'nomor_induk_mahasiswa' => 'required',
            'jurusan' => 'required',
            'no_hp' => 'required',
            'address' => 'required',
            'about' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $user = Mahasiswa::findOrFail($id);

        $user->fill([
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'email' => $request->email,
            'nomor_induk_mahasiswa' => $request->nomor_induk_mahasiswa,
            'jurusan' => $request->jurusan,
            'no_hp' => $request->no_hp,
            'address' => $request->address,
            'about' => $request->about
        ]);

        $user->save();


        return response()->json([
            'message' => 'Success to update data profile',
            'data' => $user
        ], 200);
    }
}
