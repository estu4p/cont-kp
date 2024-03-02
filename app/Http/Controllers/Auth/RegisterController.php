<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function index(){
        return view('register', [
            'title' => 'register',
            'active' => 'register'
        ]);
    }

    public function register(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'integer|in:1,2,3',
            'password' => 'required|string|min:5|confirmed',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json([
            'massage' => 'Registrasi berhasil!',
            'data' => $user
        ], 200);
    }

    public function sigupQRcode(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'integer|in:1,2,3',
            'password' => 'required|string|min:5|confirmed',
            'barcode' => 'required|string|unique:users', // Validasi barcode
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);
        $user->barcode = $request->barcode; 
        $user->save();

        return response()->json([
            'message' => 'Registrasi berhasil!',
            'data' => $user
        ], 200);
    }
}
