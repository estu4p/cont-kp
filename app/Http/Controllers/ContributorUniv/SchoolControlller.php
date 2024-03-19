<?php

namespace App\Http\Controllers\BEController;

use App\Models\User;
use App\Models\Presensi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class ContributorUnivController extends Controller
{
    public function index()
    { // menampilkan seluruh data yang diperlukan
        $jumlah_Mahasiswa = User::where("role_id", 3)->get();
        $kehasiran_masuk= Presensi::where("status_kehadiran", 'hadir')->get();
        $kehadiran_izin=Presensi::where("status_kehadiran", 'izin');

        // Mengambil mahasiswa dari koleksi data

        return response()->json([
            "message" => "Success get data",

        ]);
    }
}
