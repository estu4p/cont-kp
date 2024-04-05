<?php
namespace App\Http\Controllers\BEController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class NilaiMhsController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data yang diterima dari request
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string',
            'nomor_induk' => 'nullable|integer',
            'divisi_id' => 'nullable|exists:divisi,id',
            'status_akun' => 'nullable|in:aktif,alumni',
        ]);

        // Buat objek User baru dan isi dengan data yang divalidasi
        $user = new User;
        $user->fill($validatedData);

        // Simpan data user ke dalam database
        $user->save();

        // Beri respons dengan pesan berhasil dan data user yang baru ditambahkan
        return response()->json(['message' => 'Data user berhasil disimpan', 'data' => $user], 201);
    }
}
