<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Mitra;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view("dashboard.dashboard");
    }

    public function dashboardAdmin(Request $request)
    {

        $jumlah_mitra = Mitra::count();
        // $jumlah_siswa = User::count();
        $jumlah_siswa = User::where('role_id', 3)->count();

        return view("dashboard.dashboard-admin")->with(["jumlah_mitra" => $jumlah_mitra, "jumlah_siswa" => $jumlah_siswa]);

        // return view("dashboard.dashboard-admin")->with("mitra", $data);
    }
}
