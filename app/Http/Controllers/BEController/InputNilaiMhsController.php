<?php

namespace App\Http\Controllers\BEController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubKategoriPenilaian;
use App\Models\Penilaian;

class InputNilaiMhsController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|exists:users,id',
            'sub_id' => 'required|exists:sub_kategori_penilaian,id',
            'nilai' => 'required|integer',
            'kritik_saran' => 'nullable|string',
        ]);

        // Simpan data penilaian ke database
        $penilaian = Penilaian::create($validatedData);

        return response()->json(['message' => 'Data nilai mahasiswa berhasil disimpan', 'data' => $penilaian], 201);
    }
}
