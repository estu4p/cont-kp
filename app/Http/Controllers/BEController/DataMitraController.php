<?php

namespace App\Http\Controllers\BEController;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Mitra;
use App\Models\Presensi;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class DataMitraController extends Controller
{
    public function index(Request $request)
    {
        $mitra = Mitra::withCount('mahasiswa')->get();

        if ($request->is('api/*') || $request->wantsJson()) {
            return response()->json(['Jumlah Mahasiswa pada tiap Mitra' => $mitra]);
        } else {
            return view('DataMitra')->with('mitra', $mitra);
        }
    }
    public function presensi($id)
    {
        try {
            $mitra = Mitra::findOrFail($id);
            $presensi = Presensi::where('mitra_id', $id)->get();
            return response()->json(['mitra' => $mitra, 'presensi' => $presensi,]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'data not found', 'data' => null], 404);
        }
    }

    public function presensiDetailProfile($id)
    {
        try {
            $presensi = Presensi::findOrFail($id);
            return response()->json(['message' => 'success to get data', 'presensi' => $presensi]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Data Not Found', 'data' => null], 404);
        }
    }
}
