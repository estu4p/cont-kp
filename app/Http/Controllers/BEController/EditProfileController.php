<?php

namespace App\Http\Controllers\BEController;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class EditProfileController extends Controller
{
    public function update(Request $request, $id)
    {
            // Validasi request
            $validatedData = $request->validate([
                'nama_lengkap' => 'nullable|string',
                'email' => 'nullable|email', 
                'alamat' => 'nullable|string',
                'no_hp' => 'nullable|string',
                'about' => 'nullable|string',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Aturan untuk foto
            ]);

            // $iniData = $request->all();

            // Cari entitas berdasarkan ID
            $user = User::find($id);
            // dd($user);

            // Jika entitas tidak ditemukan
            if (!$user) {
                return response()->json(['message' => 'Entitas not found'], 404);
            }
        try{
            // Memperbarui data entitas
            $user->update([
                'nama_lengkap' => $request->nama_lengkap,
                'email' => $request->email,
                'alamat'=> $request->alamat,
                'no_hp'=> $request->no_hp,
                'about'=> $request->about,
            ]);

            if ($request->hasFile('foto')) {
                $fotoPath = $request->file('foto')->store('public/foto'); // Simpan foto di direktori storage/foto
                $user->foto = basename($fotoPath); // Simpan nama file foto di database
            }

            // Response
            return response()->json(['message' => 'Profil entitas berhasil diperbarui', 'data' => $user]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => 'Gagal memperbarui entitas. ' . $e->getMessage()], 500);
        }
    }
}