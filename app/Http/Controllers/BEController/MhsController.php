<?php

namespace App\Http\Controllers\BEController;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\MitraMahasiswa;
use App\Http\Controllers\Controller;

class MhsController extends Controller
{
    public function update(Request $request, $id)
    {
        try {
            // Validasi request
            $validatedData = $request->validate([
                'nama_lengkap' => 'nullable|string',
                'email' => 'required|email|unique:mahasiswa,email',
                'alamat' => 'required|string',
                'no_hp' => 'nullable|string',
                'about' => 'nullable|string',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Aturan untuk foto
            ]);
            // dd($validatedData['nama_lengkap']);

            // Cari mahasiswa berdasarkan ID
            $mahasiswa = MitraMahasiswa::find($id);
            // dd($mahasiswa);

            // Jika mahasiswa tidak ditemukan
            if (!$mahasiswa) {
                return response()->json(['message' => 'Mahasiswa not found'], 404);
            }

            // Update data mahasiswa
            $mahasiswa->nama_lengkap = $validatedData['nama_lengkap'];
            $mahasiswa->email = $validatedData['email'];
            $mahasiswa->alamat = $validatedData['alamat'];
            $mahasiswa->no_hp = $validatedData['no_hp'];
            $mahasiswa->about = $validatedData['about'];

            // Jika ada foto yang diunggah
            if ($request->hasFile('foto')) {
                $fotoPath = $request->file('foto')->store('public/foto'); // Simpan foto di direktori storage/foto
                $mahasiswa->foto = basename($fotoPath); // Simpan nama file foto di database
            }

            $mahasiswa->save();

            // Response
            return response()->json(['message' => 'Profil mahasiswa berhasil diperbarui', 'data' => $mahasiswa]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal memperbarui profil mahasiswa. ' . $e->getMessage()], 500);
        }
    }
}
