<?php

namespace App\Http\Controllers\BEController;

use App\Http\Controllers\Controller;
use App\Models\NilaiMahasiswa; 
use Illuminate\Http\Request;

class NilaiMhsController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input jika diperlukan
        $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'divisi' => 'required',
            'status' => 'required|in:active,inactive,done', // Memastikan status hanya salah satu dari pilihan yang diperbolehkan
        ]);

        // Buat objek NilaiMahasiswa dari request data
        $mahasiswa = new NilaiMahasiswa(); // Instansiasi objek NilaiMahasiswa
        $mahasiswa->nama = $request->input('nama');
        $mahasiswa->nip = $request->input('nip');
        $mahasiswa->divisi = $request->input('divisi');
        $mahasiswa->status = $request->input('status');

        // Simpan objek NilaiMahasiswa ke dalam database
        $mahasiswa->save();

        // Berikan respons yang sesuai
        return response()->json(['message' => 'Data mahasiswa berhasil disimpan'], 201);
    }
}
