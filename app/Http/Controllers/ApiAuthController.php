<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class ApiAuthController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', $email)->first();

        if ($user && password_verify($password, $user->password)) {
            // Login berhasil
            // $users->last_login_at = now(); // Tambahkan logika lain yang diperlukan di sini
            // $users->save();
            return response()->json(['message' => 'Login success', 'user' => $user]);
        } else {
            // Invalid credentials
            Log::error('Invalid credentials. Input: ' . json_encode($request->all()));
            return response()->json(['error' => 'Invalid credentials.'], 401);
        }
    }
}
