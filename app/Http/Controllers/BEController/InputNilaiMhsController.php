<?php

namespace App\Http\Controllers\BEController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InputMhs; 

class InputNilaiMhsController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([       
            'pengetahuan_topik_magang' => 'required',
            'pengetahuan_ruang_lingkup_magang' => 'required', 
            'indentifikasi_masalah' => 'required',
            'pemecahan_masalah' => 'required',
            'hasil_kerja' => 'required',
            'partisipasi' => 'required',
            'kejujuran' => 'required',
            'kedisiplinan' => 'required',
            'tanggung_jawab' => 'required',
            'inisiatif' => 'required',
            'sertifikat_link' => 'nullable|url'
        ]);

        $nilai = InputMhs::create($validatedData); 
        return response()->json(['message' => 'Data nilai mahasiswa berhasil disimpan', 'data' => $nilai], 201);
    }
}
