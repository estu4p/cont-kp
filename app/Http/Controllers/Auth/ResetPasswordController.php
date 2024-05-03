<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Mail\SendEmail;
use App\Mail\SendEmailAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


class ResetPasswordController extends Controller
{
    public function index()
    {
        return view('user.reset');
    }

    public function indexAdminUniv()
    {
        return view('adminUniv-afterPayment.AdminUniv-ResetPassword');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return redirect()->back()->with('error', 'Email anda belum terdaftar, silahkan Registrasi!.');
        }
        $otp = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);
        Session::put('otp_', $otp);
        Session::put('reset_password', $request->email);

        try {
            Mail::to($request->email)->send(new SendEmail($otp));
            return redirect()->to('/user/reset-password/otp');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
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
        $otpFromSession = Session::get('otp_');
        if ($otpFromSession !== $inputOtp) {
            return redirect()->back()->with('error', 'Invalid OTP');
            $user = User::where('email', $request->email)->first();
            if (!$user) {
                return back()->withErrors(['email' => 'User not found.']);
            }           
            $request->session()->forget('otp_' . $request->email);
        }
        return redirect()->to('/user/reset-password/new-password');
    }


    public function newPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
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
        $request->session()->forget('reset_password');
        return redirect()->to('/user/reset-password/confirm');
    }
}
