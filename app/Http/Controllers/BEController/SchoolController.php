<?php

namespace App\Http\Controllers\BEController;

use App\Models\User;
use App\Models\Shift;
use App\Models\Presensi;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SchoolController extends Controller
{
    public function index(Request $request)
    { // menampilkan seluruh data yang diperlukan
        $jumlah_Mahasiswa = User::where("role_id", 3)->count();
        $kehasiran_masuk= Presensi::where("status_kehadiran", 'hadir')->count();
        $kehadiran_izin= Presensi::where("status_kehadiran", 'izin')->count();


        if ($request->is('api/*') || $request->wantsJson()) {
           return response()->json([
            "Dashboard" => "Success get data",
            "jumlah Mahasiswa"=> $jumlah_Mahasiswa,
            "jumlah Masuk"=>$kehasiran_masuk,
            "jumlah Izin" =>$kehadiran_izin
        ]);
        } else {
            return view('jumlah-mahasiswa.profil-siswa',
            ["jumlah Mahasiswa"=> $jumlah_Mahasiswa,
            "jumlah Masuk"=>$kehasiran_masuk,
            "jumlah Izin" =>$kehadiran_izin]);
        }

    }
    public function jumlahMahasiswa(Request $request)
    {   //Menampilkan Data Mahasiswa
        $JM = User::where("role_id",3)
                ->select( "nama_lengkap", "nomor_induk","divisi_id","status_akun")
                ->get();
        if ($request->is('api/*') || $request->wantsJson()) {
              return response()->json([
            "jumlah Mahasiswa" => "view data Mahasiswa ",
            "data" => $JM
        ]);
        } else {
            return view('jumlah-mahasiswa.profil-siswa', ["data" => $JM]);
        }

    }
    public function Lihatprofil(Request $request)
    {
        //Data Mahasiswa- Lihat profile
        $profile = User::all()->where("role_id",3)->first();
        $presensi = Presensi ::where('id', $profile->id)
        ->select("hutang_presensi")->first();
        $Shift= Shift::where('id', $profile->id)
        ->select('nama_shift', 'jml_jam_kerja', 'jam_masuk', 'jam_pulang')->first();

        if ($request->is('api/*') || $request->wantsJson()) {
            return response()->json([
            "massage" => "Lihat profil Mahasiswa ",
            "data" => $profile,
            "Shift"=>$Shift,
            "presensi"=>$presensi,
          ]);
        } else {
            return view('jumlah-mahasiswa.profil-siswa', ["data" => $profile,"Shift"=>$Shift,"presensi"=>$presensi,]);
        }
    }

}
