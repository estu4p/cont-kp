<?php

namespace App\Http\Controllers\BEController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;


class AdminSistemDashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        $userAdmin = User::where('role_id', 2)->first();
        $totalSubscription = User::count();
        $totalAktif = User::where('status_akun', 'aktif')->count();
        $totalTidakAktif = User::where('status_akun', 'alumni')->count();

        if ($request->is('api/*')||$request->wantsJson()) {
            return response()->json([
                'total_subscription' => $totalSubscription,
                'total_aktif' => $totalAktif,
                'total_alumni' => $totalTidakAktif,
                'userAdmin' => $userAdmin,
            ], 200);
        } else {
            return view('SistemLokasi.AdminSistem-Dashboard',compact(['userAdmin', 'totalSubscription', 'totalAktif', 'totalTidakAktif']));
        }
    }

    public function editProfile()
    {
        $userAdmin = User::where('role_id', 2)->first();

        return view('SistemLokasi.AdminSistem-Editprofile', [
            'title' => "userAdmin - Ubah Profil",
            'userAdmin' => $userAdmin
        ]);
    }

    public function updateProfile(Request $request, $username)
    {
        $userAdmin = User::where('role_id', 2)->first();
        if (!$userAdmin) {
            return response()->json(['message' => 'Pengguna dengan peran 2 tidak ditemukan'], 404);
        }

        // // Update data pengguna
        // $userAdmin->username = $username;

        // Validasi input form
        $data = $request->validate([
            'nama_lengkap' => 'required|string',
            'email' => 'required|email|max:255',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'required|string|max:255',
            'about' => 'nullable|string|max:500',
        ]);

        $profile = User::where('username', $username)->first();

        // Periksa apakah profil ditemukan
        if (!$profile) {
            return response()->json(['message' => 'Profil pengguna tidak ditemukan'], 404);
        }

        $profile->update([
        'nama_lengkap' => $data['nama_lengkap'],
        'email' => $data['email'],
        'no_hp' => $data['no_hp'],
        'alamat' => $data['alamat'],
        'about' => $data['about'],
        ]);

        // // Update data pengguna
        // $userAdmin->nama_lengkap = $validatedData['nama_lengkap'];
        // $userAdmin->email = $validatedData['email'];
        // $userAdmin->no_hp = $validatedData['no_hp'];
        // $userAdmin->alamat = $validatedData['alamat'];
        // $userAdmin->about = $validatedData['about'];
        // $userAdmin->save();

        // Periksa jenis respons yang diminta
        if ($request->wantsJson()) {
            // Respon dalam format JSON
            return response()->json([
                'message' => 'Profil berhasil diperbarui.',
                'user' => $userAdmin
            ]);
        } else {
            // Redirect ke halaman profil yang diperbarui
            return view('SistemLokasi.AdminSistem-Editprofile')->with('success', 'Profil berhasil diperbarui.');
        }
    }

    public function updateFoto(Request $request, $username)
    {
        try {
            $validator = Validator::make($request->all(), [
                'foto_profil' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            $validator->validate();
        } catch (ValidationException $e) {
            $errorValidate = $e->validator->errors()->all();
            $errorMessage = implode('<br>', $errorValidate);
            return response()->json(['success' => false, 'error' => $errorMessage]);
            // return redirect()->route('SistemLokasi.AdminSistem-EditProfile')->with('error', $errorMessage);
        }

        $profile = User::where('username', $username)->firstOrFail();

        try {
            if ($profile->foto_profil) {
                Storage::delete('public/' . $profile->foto_profil);
            }
            $namaFoto = time() . '.' . $request->foto_profil->getClientOriginalExtension();
            $path = $request->file('foto_profil')->storeAs('public/foto_profil', $namaFoto);
            $profile->update([
                'foto_profil' => 'foto_profil/' . $namaFoto,
            ]);
            //return response()->json(['success' => true, 'message' => 'Foto Berhasil diUbah']);
            return redirect()->route('SistemLokasi.AdminSistem-Editprofile')->with('success', 'Foto Berhasil diUbah');
        } catch (\Exception $e) {
            $errorMessage = strip_tags($e->getMessage());
            //return response()->json(['success' => false, 'error' => $errorMessage]);
            return redirect()->route('SistemLokasi.AdminSistem-Editprofile')->with('error', $errorMessage);
        }
    }

    public function deleteFoto($username)
    {
        $profil = User::where('username', $username)->firstOrFail();
        try {
            if ($profil->foto_profil) {
                Storage::delete('public/' . $profil->foto_profil);
                $profil->foto_profil = null;
                $profil->save();
                return redirect()->route('SistemLokasi.AdminSistem-Editprofile')->with('success', 'Foto Berhasil diHapus');
            } else {
                return redirect()->route('SistemLokasi.AdminSistem-Editprofile')->with('error', 'Anda tidak memiliki Foto Profil');
            }
        } catch (\Exception $e) {
            $errorMessage = strip_tags($e->getMessage());
            return redirect()->route('SistemLokasi.AdminSistem-Editprofile')->with('error', $errorMessage);
        }
    }
}