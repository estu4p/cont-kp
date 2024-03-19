<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Presensi;
use App\Models\User;
use Illuminate\Http\Request;

class MitraTeamAktifController extends Controller
{
    public function teamAktif()
    {
        $divisiCount = Divisi::withCount('mahasiswa')->get();
        return response()->json([
            "divisiCount" => $divisiCount,
        ]);
    }

    public function anggotaTeam($divisi)
    {
        $mahasiswa = User::whereHas('divisi', function ($query) use ($divisi) {
            $query->where('nama_divisi', $divisi);
        })->get();
        return response()->json([
            "mahasiswa" => $mahasiswa,
            "divisi" => $divisi
        ]);
    }

    public function seeAllTeam()
    {
        $mahasiswa = User::all();
        return response()->json($mahasiswa);
    }

    public function profileMahasiswa($username)
    {
        $profile = User::with(['divisi', 'shift', 'project'])->where('username', $username)->first();
        $presensi = Presensi::with('user')->get();
        return response()->json([
            'mahasiswa' => $profile,
            'presensi' => $presensi,
        ]);
    }
}
