<?php

namespace App\Http\Controllers\BEController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
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
            'userAdmin' => $userAdmin
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

    public function updateFoto(Request $request)
    {
        // Mendapatkan profil pengguna yang sedang masuk
        $profile = auth()->user();

        // Validasi file gambar yang diunggah
        $request->validate([
            'foto_profil' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Jika pengguna sudah memiliki foto profil, hapus foto profil sebelumnya
        if ($profile->foto_profil) {
            Storage::delete('public/' . $profile->foto_profil);
        }

        // Simpan file gambar baru
        $namaFoto = time() . '.' . $request->foto_profil->getClientOriginalExtension();
        $path = $request->file('foto_profil')->storeAs('public/assets/images', $namaFoto);

        // Perbarui data foto profil pengguna
        $profile->update([
            'foto_profil' => 'images/' . $namaFoto,
        ]);

        // Redirect kembali ke halaman edit profile
        return redirect('/AdminSistem-Editprofile')->with('success', 'Foto Profil Berhasil Diperbarui');
    }


    // public function updateFoto(Request $request)
    // {
    //     try {
    //         $validator = Validator::make($request->all(), [
    //             'foto_profil' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    //         ]);
    //         $validator->validate();
    //     } catch (ValidationException $e) {
    //         $errorValidate = $e->validator->errors()->all();
    //         $errorMessage = implode('<br>', $errorValidate);
    //         return redirect()->route('SistemLokasi.AdminSistem-EditProfile')->with('error', $errorMessage);
    //     }

    //     $profile = auth()->user();

    //     try {
    //         if ($profile->foto_profil) {
    //             Storage::delete('public/' . $profile->foto_profil);
    //         }
    //         $namaFoto = time() . '.' . $request->foto_profil->getClientOriginalExtension();
    //         $path = $request->file('foto_profil')->storeAs('public/foto_profil', $namaFoto);
    //         $profile->update([
    //             'foto_profil' => 'foto_profil/' . $namaFoto,
    //         ]);
    //         return redirect()->route('SistemLokasi.AdminSistem-Editprofile')->with('success', 'Foto Berhasil diUbah');
    //     } catch (\Exception $e) {
    //         $errorMessage = strip_tags($e->getMessage());
    //         return redirect()->route('SistemLokasi.AdminSistem-Editprofile')->with('error', $errorMessage);
    //     }
    // }

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
