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

    public function anggotaTeam($id_divisi)
    {
        $mahasiswa = User::whereHas('divisi', function ($query) use ($id_divisi) {
            $query->where('id', $id_divisi);
        })->where('role_id', 3)->get();
        return response()->json([
            "mahasiswa" => $mahasiswa,
            "divisi" => $id_divisi
        ]);
    }

    public function seeAllTeam()
    {
        $mahasiswa = User::where('role_id', 3)->get();
        return response()->json($mahasiswa);
    }

    public function profileMahasiswa($username)
    {
        $profile = User::with(['divisi', 'shift', 'project'])->where('username', $username)->where('role_id', 3)->firstOrFail();
        $presensi = Presensi::with('user')->where('nama_lengkap', $profile->id)->get();
        return response()->json([
            'mahasiswa' => $profile,
            'presensi' => $presensi,
        ]);
    }
}
