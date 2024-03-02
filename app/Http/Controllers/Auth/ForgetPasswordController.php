<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;

class ForgetPasswordController extends Controller
{
    public function ForgetPassword(Request $request){
        $request->validate([
            'email' => 'required|email',
        ]);
        
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
            ? response()->json([
                'massage' => 'OTP has been sent to your email'
            ])
            : response()->json([
                'erors' => 'Unable to send OTP'
            ], 400);
    }
}
