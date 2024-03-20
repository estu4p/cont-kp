<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class ApiAuthController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $users = User::where('email', $email)->first();

        if ($users && password_verify($password, $users->password)) {
            // Login berhasil
            // $users->last_login_at = now(); // Tambahkan logika lain yang diperlukan di sini
            // $users->save();
            return response()->json(['message' => 'Login success', 'user' => $users]);
        } else {
            // Invalid credentials
            Log::error('Invalid credentials. Input: ' . json_encode($request->all()));
            return response()->json(['error' => 'Invalid credentials.'], 401);
        }
    }
}
