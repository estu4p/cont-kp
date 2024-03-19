<?php

namespace App\Http\Controllers\BEController;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class ContributorUnivController extends Controller
{
    public function index()
    { // menampilkan seluruh data yang diperlukan
        $jumlah_Mahasiswa = User::where("role_id", 3)->get();

        // Mengambil nama siswa dari koleksi data

        return response()->json([
            "message" => "Success get data",

        ]);
    }
}
