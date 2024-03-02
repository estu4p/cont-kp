<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index()
    {
        return view('login', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }

    public function ValidateLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        $login = $request->only('email', 'password');
        $remember = $request->filled('remember');

        if(Auth::attempt($login, $remember)){
            $user = Auth::user();

            if($user->role == 1){
                return response()->json([
                    'message' => 'Login berhasil sebagai Super Admin',
                    'redirect' => '/SuperAdmin/dashboard'
                ], 200);
            } else if($user->role == 2){
                return response()->json([
                    'message' => 'Login berhasil sebagai Admin',
                    'redirect' => '/Admin/dashboard'
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Login berhasil sebagai User',
                    'redirect' => '/dashboard'
                ], 200);
            }

        } else {
            return response()->json([
                'error' => 'Email atau password salah'
            ], 422);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
