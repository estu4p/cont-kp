<?php

namespace App\Http\Controllers\BEController;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Mitra;
use App\Models\Presensi;
use App\Models\User;
use Illuminate\Http\Request;

class DataMitraController extends Controller
{
    public function index(Request $request)
    {
        $data = User::all();
        $mitra = Mitra::withCount('mahasiswa')->get();
    
        if ($request->is('api/*') || $request->wantsJson()) {
            return response()->json(['data' => $mitra]);
        } else {
            return view('DataMitra', compact('data', 'mitra'));
        }
    }
    
    public function presensi(Request $request, $id)
    {
        $mitra = Mitra::findOrFail($id);

        // Ambil mahasiswa yang terkait dengan mitra (pada model mitra) (dengan role_id = 3)
        // $mahasiswas = $mitra->mahasiswa()->get();
        $presensi = Presensi::findOrFail($id);

        if ($request->is('api/*') || $request->wantsJson()) {
            return response()->json(['mitra' => $mitra, 'presensi' => $presensi,]);
        } else {
            return view('DataMitraPresensi')->with('mitra', $mitra)->with('presensi', $presensi);
        }
    }
}
