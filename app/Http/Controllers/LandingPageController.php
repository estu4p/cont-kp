<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Daftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class LandingPageController extends Controller
{

    public function lpdaftar(Request $request)
    {
            $name= $request->input('fullname');
            $sekolah= $request->input('sekolah');
            $email= $request->input('email');
            $telephone=$request->input('telephoen');
            $password=$request->input('password');

            $daftar = new Daftar;
            $daftar->name = $name;
            $daftar->sekolah = $sekolah;
            $daftar->email = $email;
            $daftar->telephone = $telephone;
            $daftar->password = $password;
            $daftar->save();

            return Redirect::route('daftar')->with('success', 'Pendaftaran berhasil');
    }
}
