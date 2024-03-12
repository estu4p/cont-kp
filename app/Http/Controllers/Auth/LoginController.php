<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/dashboard'; // Sesuaikan dengan rute dashboard Anda

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Override method untuk menangani respons setelah login
    protected function authenticated(Request $request, $user)
    {
        return redirect($this->redirectTo)->with('success', 'Login successful.');
    }
}
