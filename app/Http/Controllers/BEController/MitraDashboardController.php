<?php

namespace App\Http\Controllers\BEController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MitraMahasiswa;

class MitraDashboardController extends Controller
{
    public function filterMahasiswa()
    {
        $totalMahasiswa = MitraMahasiswa::count();
        $totalMasuk = MitraMahasiswa::where('masuk', true)->count();
        $totalIzin = MitraMahasiswa::where('izin', true)->count();


        return response()->json([
            'total_mahasiswa' => $totalMahasiswa,
            'total_masuk' => $totalMasuk,
            'total_izin' => $totalIzin,
        ]);
    }

    // Fungsi untuk memperbarui data mahasiswa
    public function updateMahasiswa(Request $request, $id)
    {
        // Validasi request
        $request->validate([
            'nama_lengkap' => 'required|string',
            'email' => 'required|email',
            'alamat' => 'required|string',
            'about' => 'nullable|string',
            'masuk' => 'required|boolean',
            'izin' => 'required|boolean',
        ]);

        // Cari data mahasiswa berdasarkan ID
        $mahasiswa = MitraMahasiswa::find($id);

        // Jika data tidak ditemukan, kembalikan respons 404
        if (!$mahasiswa) {
            return response()->json(['message' => 'Data mahasiswa tidak ditemukan'], 404);
        }

        // Perbarui data mahasiswa dengan data baru dari request
        $mahasiswa->update([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'about' => $request->about,
            'masuk' => $request->masuk,
            'izin' => $request->izin,
        ]);

        // Kembalikan respons sukses
        return response()->json(['message' => 'Data mahasiswa berhasil diperbarui'], 200);
    }
}