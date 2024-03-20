<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mitra;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class AdminUnivAfterPaymentController extends Controller
{
    public function index()
    {
        $jumlah_mitra = Mitra::all()->count();
        $jumlah_siswa = User::where("role_id", 3)->count();

        // Mengambil nama siswa dari koleksi data


        return view('adminUniv-afterPayment.AdminUniv-Dashboard', ['jml_mitra' => $jumlah_mitra, 'jml_siswa' => $jumlah_siswa]);
    }
}
