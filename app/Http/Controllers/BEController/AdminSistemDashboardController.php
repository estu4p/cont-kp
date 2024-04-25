<?php

namespace App\Http\Controllers\BEController;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


class AdminSistemDashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        $userAdmin = auth()->user();
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
        $userAdmin = auth()->user();
        return view('SistemLokasi.AdminSistem-Editprofile', [
            'title' => "userAdmin - Ubah Profil",
            'userAdmin' => $userAdmin,
            'csrfToken' => $csrfToken = csrf_token(),
        ]);
    }

    public function updateProfile(Request $request)
    {
        $profile = auth()->user();
        
        $profile->update([
            'nama_lengkap' => $request->input('nama_lengkap'),
            'email' => $request->input('email'),
            'no_hp' => $request->input('no_hp'),
            'alamat' => $request->input('alamat'),
            'about' => $request->input('about'),
        ]);
        
        return redirect('/AdminSistem-Editprofile');
    }

    public function updateFoto(Request $request, $id)
    {
        try {
        // Mendapatkan profil pengguna yang sedang masuk
        $profile = User::findOrFail($id);
        // Validasi file gambar yang diunggah
        $request->validate([
            'foto_profil' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        // dd($request->all());

        // Jika pengguna sudah memiliki foto profil, hapus foto profil sebelumnya
        if ($profile->foto_profil) {
            Storage::delete('public/' . $profile->foto_profil);
        }

        // Simpan file gambar baru
        $namaFoto = time() . '.' . $request->foto_profile->getClientOriginalExtension();
        $path = $request->foto_profile->storeAs('public/assets/images', $namaFoto);

        // Perbarui data foto profil pengguna
        $profile->update([
            'foto_profil' => $namaFoto,
        ]);

        // Redirect kembali ke halaman edit profile
        return response()->json(['success' => 'Foto Profil Berhasil Diperbarui', 'data' => $namaFoto]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
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
