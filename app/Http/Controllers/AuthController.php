<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function index()
    {
        $title = 'login';
        return view("landing-page.login")->with("title", $title);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);
        $email = $request->input('email');
        $pass = $request->input('password');
        
        $validation = ['email' => $request->email, 'password' => $request->password];
        if (Auth::attempt($validation)) {
            return redirect('/dashboard-admin')->with('success', 'login success');
        }

        return redirect()->to('/loginpage')->with('error', 'Email or password is incorrect.');
    }
    public function reset($id)
    {
        $user = User::findOrFail(Auth::user()->id);
        return view("landing-page.resetPassword")->with(["user" => $user])->with("title", "reset password");
    }
}
