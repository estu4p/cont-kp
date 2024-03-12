<?php

namespace App\Http\Controllers\BEController;

use App\Models\Mitra;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;


class HomeMitraController extends Controller
{
    public function pilihMitra (Request $request)
    {
        $mitra = Mitra::all();
        $divisi = Mitra::all();
        
        if ($request->isMethod('post')) {
            // Ambil ID mitra yang dipilih dari formulir
            $selectedMitraId = $request->input('mitra');

            // Simpan ID mitra yang dipilih ke dalam sesi
            Session::put('selected_mitra_id', $selectedMitraId);

            return redirect()->route('home_masuk')->with('success', 'Anda telah memilih mitra!');
        }
        return view('pilihmitra', compact('mitra', 'divisi')); 
    }
}
