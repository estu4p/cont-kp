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
            return view('DataMitra')->with('data', $data)->with('mitra', $mitra);
        }
    }
    public function presensi($id)
    {
        $mitra = Mitra::findOrFail($id);
        return view('DataMitraPresensi')->with('mitra', $mitra);
    }
}
