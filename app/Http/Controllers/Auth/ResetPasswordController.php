<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Mail\SendEmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


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
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json(['error' => 'User not found.'], 404);
        }
        $otp = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);
        Session::put('otp_', $otp);
        Session::put('reset_password', $request->email);
        // Kirim OTP ke email pengguna
        try {
            Mail::to($request->email)->send(new SendEmail($otp));
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to send OTP email. Please try again later.'], 500);
        }
        return view('otp', ['email' => $request->email, 'otp' => $otp]);
    }

    public function verifyOTP(Request $request)
    {
        $request->validate([
            'digit1' => 'required|string',
            'digit2' => 'required|string',
            'digit3' => 'required|string',
            'digit4' => 'required|string',
        ]);

        $inputOtp = $request->digit1 . $request->digit2 . $request->digit3 . $request->digit4;
        // Ambil OTP dari session
        $otpFromSession = Session::get('otp_');
        // Cek apakah OTP sesuai
        if ($otpFromSession !== $inputOtp) {
            return redirect()->back()->with('error', 'Invalid OTP');

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

            // Hapus OTP dari session setelah diverifikasi
            $request->session()->forget('otp_' . $request->email);
            return view('newpw', ['email' => $request->email]);
        } 
    }

    public function newPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:5|confirmed',
        ]);
        $reset = Session::get('reset_password');
        $user = User::where('email', $reset)->first();
        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'Pengguna dengan email ini tidak ditemukan.'
            ]);
        }

        $user->update(['password' => Hash::make($request->password)]);
        // Bersihkan session reset_email setelah pengguna berhasil mengubah kata sandi
        $request->session()->forget('reset_password');
        return redirect()->route('login')->with('success', 'Password has been reset successfully. Please login with your new password.');
    }
}
