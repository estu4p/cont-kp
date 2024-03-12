<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class MitraDashboardController extends Controller
{
    public function showProfile()
    {
        // Ambil data user dari model atau sesuaikan dengan kebutuhan
        $user = auth()->user();

        return view('mitra.dashboard.profile', compact('user'));
    }
}
