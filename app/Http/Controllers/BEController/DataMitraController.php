<?php

namespace App\Http\Controllers\BEController;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Mitra;
use Illuminate\Http\Request;

class DataMitraController extends Controller
{
    public function index()
    {
        $data = Mahasiswa::all();
        $mitra = Mitra::withCount('mahasiswa')->get();
        return view("DataMitra")->with("data", $data)->with('mitra', $mitra);
    }
}
