<?php

namespace App\Http\Controllers\BEController;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Mitra;
use Illuminate\Http\Request;

class DataMitraController extends Controller
{
    public function index(Request $request)
    {
        $data = Mahasiswa::all();
        $mitra = Mitra::withCount('mahasiswa')->get();
        // return view("DataMitra")->with("data", $data)->with('mitra', $mitra);
        if ($request->is('api/*') || $request->wantsJson()) {
            return response()->json(['data' => $mitra]);
        } else {
            return view('DataMitra')->with('data', $data)->with('mitra', $mitra);
        }
    }
}
