<?php

namespace App\Http\Controllers\BEController;

use App\Models\User;
use App\Models\Mitra;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
    public function update()
    {
        $user = User::find(Auth::user()->id);
    }
}
