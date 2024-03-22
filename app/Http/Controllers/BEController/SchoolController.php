<?php

namespace App\Http\Controllers\BEController;

use App\Models\User;
use App\Models\Presensi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SchoolController extends Controller
{
    public function index()
    { // menampilkan seluruh data yang diperlukan
        $jumlah_Mahasiswa = User::where("role_id", 3)->get();
        $kehasiran_masuk= Presensi::where("status_kehadiran", 'hadir')->count();
        $kehadiran_izin= Presensi::where("status_kehadiran", 'izin')->count();

        return response()->json([
            "Dasnoard" => "Success get data",
            "jumlah Mahasiswa"=> $jumlah_Mahasiswa,
            "jumlah Masuk"=>$kehasiran_masuk,
            "jumlah Izin"=>$kehadiran_izin,

        ]);
    }
}
