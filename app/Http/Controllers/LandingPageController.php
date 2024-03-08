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
        $request->validate([
            'fullname' => 'required|string|max:100',
            'sekolah' => 'required|string',
            'email' => 'email|required|unique:daftar,email',
            'telephone' => 'required|regex:/^\d+$/',
            'password' => 'min:8|required'
        ]);

            $data = Daftar::create([
                'name' => $request->fullname,
                'sekolah' => $request->sekolah,
                'email' => $request->email,
                'telephone' => $request->telephone,
                'password' => $request->password,
            ]);

            return response()->json(['data' => $data]);
    }
}
