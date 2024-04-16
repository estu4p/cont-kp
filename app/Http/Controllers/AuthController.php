<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Sekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //Login Contributor for Univ/Schoool
    public function index()
    {
        $title = 'login';
        return view("login")->with('title', $title);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $validation = ['email' => $request->email, 'password' => $request->password];
        if (Auth::attempt($validation)) {
            return redirect('/dashboard')->with('success', 'login success');
        }

        return redirect()->to('/logincontributor')->with('error', 'Email or password is incorrect.');
    }
    public function reset($id)
    {
        $user = User::findOrFail(Auth::user()->id);
        return view("landing-page.resetPassword")->with(["user" => $user])->with("title", "reset password");
    }
}
