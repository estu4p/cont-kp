<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str; 


class ResetPasswordController extends Controller
{
    public function resetPassword(Request $request){
        $request->validate([
            'email' => 'required|email',
            'token' => 'required|string',
            'otp' => 'required|string',
            'password' => 'required|string|min:5|confirmed',
        ]);

        $user = User::where('email', $request->email)->first();

        //pengecekan apakah pengguna di temukan dan token riset valid
        if(!$user || Password::tokenExists($user, $request->token)){
            return response()->json([
                'error' => ' Invalid or expired token'
            ], 400);
        }

        //mengecek apakah otp yang dimasukan sesuai dengan yang diharapka atau telah dikirim di email
        if($user->otp !== $request->otp){
            return response()->json([
                'error' => ' Invalid OTP'
            ], 400);
        }

        $user->password = Hash::make($request->password);
        $user->setRememberToken(Str::random(60));
        $user->save(); 

        return response()->json([
            'message' => 'Password has been reset successfully'
        ]);
    }
}
