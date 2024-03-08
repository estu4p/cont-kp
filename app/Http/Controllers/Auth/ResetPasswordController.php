<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Mail\SendEmail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\to;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;


class ResetPasswordController extends Controller
{
    public function index()
    {
        return view("landing-page.resetPassword")->with("title", "reset password");
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = Password::sendResetLink(
            $request->only('email')
        );

        if ($user === Password::RESET_LINK_SENT) {
            $otp = Str::random(4);
            Mail::to($request->email)->send(new SendEmail($otp));
            return response()->json([
                'message' => 'OTP has been sent to your email'
            ]);
        } else {
            return response()->json([
                'error' => 'Unable to send OTP'
            ], 400);
        }
    }

    public function verifyOTP(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|string',
        ]);
        $user = User::where('email', $request->email)->first();
        // Cek apakah pengguna ditemukan
        if (!$user) {
            return back()->withErrors(['email' => 'User not found.']);
        }
        //mengecek apakah otp yang dimasukan sesuai dengan yang diharapka atau telah dikirim di email
        if ($user->otp !== $request->otp) {
            return response()->json([
                'error' => ' Invalid OTP'
            ], 400);
        }
        $user->otp = null;
        $user->save();
        return redirect()->route('password.reset', ['email' => $request->email]);
    }

    public function newPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
        ]);
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json(['error' => 'User not found.'], 404);
        }
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('login')->with('success', 'Password has been reset successfully. Please login with your new password.');
    }
}
