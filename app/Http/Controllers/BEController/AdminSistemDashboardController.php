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
        // Mendapatkan profil pengguna yang sedang login
        $profile = User::findOrFail($id);
        // Validasi file foto yang diunggah
        $request->validate([
            'foto_profil' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        // dd($request->all());

        // Jika pengguna sudah memiliki foto profil, hapus foto profil sebelumnya
        if ($profile->foto_profil) {
            Storage::delete('public/' . $profile->foto_profil);
        }

        // Simpan file foto baru
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

    public function deletePhoto($id)
    {
        // Mendapatkan profil pengguna yang sedang login
        $userAdmin = User::findOrFail($id);

        // Hapus foto profil pengguna jika ada
        if ($userAdmin->foto_profil) {
            // Hapus file dari penyimpanan
            Storage::delete('public/assets/images/' . $userAdmin->foto_profil);
            // Hapus nama file dari database
            $userAdmin->foto_profil = null;
            $userAdmin->save();
        }

        return redirect()->back()->with('success', 'Foto Profil Berhasil Dihapus');
    }
}