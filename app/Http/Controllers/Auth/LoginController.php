<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('user.login');
    }

    public function ValidateLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $login = $request->only('email', 'password');
        $remember = $request->filled('remember');

        if (Auth::attempt($login, $remember)) {
            $user = Auth::user();

            if ($user->role == 1) {
                return redirect()->to('/pemagang/home');
            } else if ($user->role == 2) {
                return redirect()->to('/pemagang/home');
            } else if ($user->role == 3) {
                return redirect()->to('/pemagang/home');
            } else if ($user->role == 4) {
                return redirect()->to('/pemagang/home');
            } else {
                return redirect()->to('/pemagang/home');
            }
        } else {
            return response()->json([
                'error' => 'Email atau Password yang anda masukan salah'
            ], 422);
        }
    }
}
