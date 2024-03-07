<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function index()
    {
        $title = 'login';
        return view("landing-page.login")->with("title", $title);
    }

    public function login(Request $request)
    {
    }
}
