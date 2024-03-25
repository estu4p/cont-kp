<?php

namespace App\Http\Controllers\BEController;

use App\Models\User;
use App\Models\Presensi;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SchoolController extends Controller
{
    public function index()
    { // menampilkan seluruh data yang diperlukan
        $jumlah_Mahasiswa = User::where("role_id", 3)->count();
        $kehasiran_masuk= Presensi::where("status_kehadiran", 'hadir')->count();
        $kehadiran_izin= Presensi::where("status_kehadiran", 'izin')->count();

        return response()->json([
            "Dashboard" => "Success get data",
            "jumlah Mahasiswa"=> $jumlah_Mahasiswa,
            "jumlah Masuk"=>$kehasiran_masuk,
            "jumlah Izin" =>$kehadiran_izin
        ]);
    }
    public function jumlahMahasiswa()
    {   //Menampilkan Data Mahasiswa
        $JM = User::where("role_id",3)
                ->select( "nama_lengkap", "nomor_induk","divisi_id","status_akun")
                ->get();

        return response()->json([
            "jumlah Mahasiswa" => "view data Mahasiswa ",
            "data" => $JM
        ]);
    }
    public function Lihatprofil($id)
    {
        //$profil = User:: all();
        $mahasiswa = User::where("role_id", 3)
                    ->where("id", $id)
                    ->select("nama_lengkap", "nomor_induk", "divisi_id", "status_akun")
                    ->first();

             if (!$mahasiswa) {
                return response()->json([
                "message" => "Mahasiswa tidak ditemukan"
                ], 404);
                }

        return response()->json([
            "massage" => "Lihat profil Mahasiswa ",
            "data" => $mahasiswa
        ]);
    }

}
