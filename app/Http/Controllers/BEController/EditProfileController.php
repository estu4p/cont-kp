<?php

namespace App\Http\Controllers\BEController;

use Illuminate\Http\Request;
use App\Models\MitraMahasiswa;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class EditProfileController extends Controller
{
    public function update($id, Request $request)
    {
        try {
            // Validasi request
            $validatedData = $request->validate([
                'nama_lengkap' => 'nullable|string',
                'email' => 'nullable|email', 
                'alamat' => 'nullable|string',
                'no_hp' => 'nullable|string',
                'about' => 'nullable|string',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Aturan untuk foto
            ]);

            // Cari entitas berdasarkan ID
            $entitas = MitraMahasiswa::find($id);

            // Jika entitas tidak ditemukan
            if (!$entitas) {
                return response()->json(['message' => 'Entitas not found'], 404);
            }

            // Memperbarui data entitas
            $entitas->update([
                'nama_lengkap' => $request->nama_lengkap,
                'email' => $request->email,
                'alamat'=> $request->alamat,
                'no_hp'=> $request->no_hp,
                'about'=> $request->about,
            ]);

            if ($request->hasFile('foto')) {
                $fotoPath = $request->file('foto')->store('public/foto'); // Simpan foto di direktori storage/foto
                $entitas->foto = basename($fotoPath); // Simpan nama file foto di database
            }

            // Response
            return response()->json(['message' => 'Profil entitas berhasil diperbarui', 'data' => $entitas]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => 'Gagal memperbarui entitas. ' . $e->getMessage()], 500);
        }
    }
}
