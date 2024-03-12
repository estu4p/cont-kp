<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class MitraEditprofilController extends Controller
{
    public function editProfile()
    {
        // Ambil data user dari model atau sesuaikan dengan kebutuhan
        $user = auth()->user();

        return view('mitra.dashboard.edit-profile', compact('user'));
    }

    public function updateProfile(Request $request, User $user)
    {
        // Validasi input data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'bio' => 'nullable|string',
            // Add more validation rules as needed
        ]);

        // Update informasi user
        $user->update($validatedData);

        // Redirect atau kirim respons
        return redirect()->route('mitra.dashboard.profile')->with('success', 'Profile updated successfully.');
    }
}