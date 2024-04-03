<?php

namespace App\Http\Controllers\BEController;

use App\Models\User;
use App\Models\Shift;
use App\Models\Divisi;
use App\Models\Project;
use App\Models\Presensi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SchoolController extends Controller
{
    public function index(Request $request)
    { // menampilkan seluruh data yang diperlukan
        $jumlah_mahasiswa = User::where("role_id", 3)->count();
        $kehadiran_masuk= Presensi::where("status_kehadiran", 'hadir')->count();
        $kehadiran_izin= Presensi::where("status_kehadiran", 'izin')->count();


        if ($request->is('api/*') || $request->wantsJson()) {
           return response()->json([
            "Dashboard" => "Success get data",
            "jumlah mahasiswa"=> $jumlah_mahasiswa,
            "jumlah masuk"=>$kehadiran_masuk,
            "jumlah izin" =>$kehadiran_izin
        ]);
        } else {
            // return view('dashboard.dashboard',
            // ["jumlah Mahasiswa"=> $jumlah_mahasiswa,
            // "jumlah Masuk"=>$kehadiran_masuk,
            // "jumlah Izin" =>$kehadiran_izin]);
            return view('dashboard.dashboard', compact('jumlah_mahasiswa','kehadiran_masuk','kehadiran_izin'));
        }
    }
    public function jumlahMahasiswa(Request $request)
    {   //Menampilkan Data Mahasiswa
        $JM = User::where('role_id', 3)->get();
       // dd($JM);
        if ($request->is('api/*') || $request->wantsJson()) {
            return response()->json([
            "jumlah Mahasiswa" => "view data Mahasiswa ",
            "data" => $JM
        ]);
        } else {
            return view('jumlah-mahasiswa.jumlah-mahasiswa',["data" => $JM]);
        }
    }
    public function Lihatprofil(Request $request, $id)
    {
        //Data Mahasiswa- Lihat profile
        $lihat = User::where("role_id",3)->first();
        dd($lihat);
        $presensi = Presensi::where('id', $lihat->id)
        ->select("hutang_presensi")->first();
        $divisi = Divisi::where('id', $lihat->divisi_id)
        ->select("nama_divisi")->first();
        $project = Project :: where ('id', $lihat->project_id)
        ->select("nama_project")->first();
        $Shift= Shift::where('id', $lihat->shift_id)
        ->select('nama_shift', 'jml_jam_kerja', 'jam_masuk', 'jam_pulang')->first();


        $lihat = User::where("role_id", 3)
        ->where('nama_lengkap', 'nama_lengkap') // Ubah 'nama_lengkap' dengan nilai yang ingin Anda cari
        ->get();

        // if ($lihat) {
        //     $presensi = Presensi::where('id', $lihat->id)->select("hutang_presensi")->first();
        //     $divisi = Divisi::where('id', $lihat->divisi_id)->select("nama_divisi")->first();
        //     $project = Project::where('id', $lihat->project_id)->select("nama_project")->first();
        //     $shift = Shift::where('id', $lihat->shift_id)->select('nama_shift', 'jml_jam_kerja', 'jam_masuk', 'jam_pulang')->first();
        // };
        // dd($lihat);
      
        if ($request->is('api/*') || $request->wantsJson()) {
            return response()->json([
            "massage" => "Lihat profil Mahasiswa ",
            "profile" => $lihat,
            "Shift"=>$Shift,
            "presensi"=>$presensi,
            "project"=> $project,
            "divisi"=>$divisi
          ]);
        } else {
            return view('jumlah-mahasiswa.profil-siswa',
            compact('lihat','Shift','presensi','project','divisi'));
            // ["profile" => $lihat,"Shift"=>$Shift,"presensi"=>$presensi,]);
        }
    }

}
