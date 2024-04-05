<?php

namespace App\Http\Controllers\BEController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Presensi;
use App\Models\User; // Import model User
use Carbon\Carbon;

class QRCodeController extends Controller
{
    public function store(Request $request)
    {
        // Temukan user berdasarkan nama lengkap
        $user = User::where('nama_lengkap', $request->nama_lengkap)->first();

        // Jika user tidak ditemukan, kembalikan pesan kesalahan
        if (!$user) {
            return redirect('/')->with('gagal', 'User tidak ditemukan.');
        }

        // Cari presensi berdasarkan user ID dan waktu masuk yang belum memiliki waktu pulang
        $presensi = Presensi::where('nama_lengkap', $user->id)
            ->whereDate('hari', Carbon::now()->toDateString()) // Perubahan: Cari berdasarkan tanggal hari ini
            ->whereNull('jam_pulang')
            ->first();

        // Jika presensi sudah ada, kembalikan pesan kesalahan
        if ($presensi) {
            return redirect('/')->with('gagal', 'Anda sudah melakukan presensi sebelumnya.');
        }

        // Buat presensi baru
        Presensi::create([
            'nama_lengkap' => $user->id, // Simpan ID pengguna
            'hari' => Carbon::now()->toDateString(), // Simpan tanggal hari ini
            'jam_masuk' => Carbon::now(),
            'jam_pulang' => null,
            'jam_mulai_istirahat' => null,
            'jam_selesai_istirahat' => null,
        ]);

        // Kembalikan pesan sukses
        return redirect('/')->with('success', 'Presensi berhasil disimpan. Silahkan masuk.');
    }
}
