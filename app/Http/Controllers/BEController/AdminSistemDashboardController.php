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
    public function filterDashboard(Request $request)
    {
        // Menghitung total subscription
        $totalSubscription = User::count();

        // Menghitung total aktif dan tidak aktif
        $totalAktif = User::where('status_akun', 'aktif')->count();
        $totalTidakAktif = User::where('status_akun', 'alumni')->count(); // Ubah sesuai dengan nilai yang menunjukkan status tidak aktif

        //return ke tampilan
        if ($request->is('api/*') || $request->wantsJson()) {
            return response()->json([
                'total_subscription' => $totalSubscription,
                'total_aktif' => $totalAktif,
                'total_alumni' => $totalTidakAktif,
            ], 200);
        } else {
            return view('SistemLokasi.AdminSistem-Dashboard', compact(['totalSubscription', 'totalAktif', 'totalTidakAktif']));
        }
    }

    public function editProfile()
    {
        $userAdmin = User::where('role_id', 2)->first();

        return view('SistemLokasi.AdminSistem-EditProfile', [
            'title' => "userAdmin - Ubah Profil",
            'userAdmin' => $userAdmin
        ]);
    }

    public function updateProfile(Request $request, $username)
    {
        $superAdmin = User::where('role_id', 1)->first();
        $data = $request->all();
        try {
            $validator = Validator::make($request->all(), [
                'nama_lengkap' => 'string',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'email' => [
                    'string',
                    'email',
                    Rule::unique('users', 'email')->ignore($superAdmin->email, 'email')
                ],
                'no_hp' => 'string',
                'alamat' => 'string',
                'about' => 'string',
            ]);
            $validator->validate();
        } catch (ValidationException $e) {
            $errorValidate = $e->validator->errors()->all();
            $errorMessage = implode('<br>', $errorValidate);
            return redirect()->route('superAdmin.editProfile')->with('error', $errorMessage);
        }

        $profile = User::where('username', $username)->first();

        try {
            $profile->update([
                'nama_lengkap' => $data['nama_lengkap'],
                'email' => $data['email'],
                'no_hp' => $data['no_hp'],
                'alamat' => $data['alamat'],
                'about' => $data['about'],
            ]);
            return redirect()->route('superAdmin.editProfile')->with('success', 'Data Profil Berhasil diUbah');
        } catch (\Exception $e) {
            $errorMessage = strip_tags($e->getMessage());
            return redirect()->route('superAdmin.editProfile')->with('error', $errorMessage);
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
            return redirect()->route('superAdmin.editProfile')->with('error', $errorMessage);
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
            return redirect()->route('superAdmin.editProfile')->with('success', 'Foto Berhasil diUbah');
        } catch (\Exception $e) {
            $errorMessage = strip_tags($e->getMessage());
            return redirect()->route('superAdmin.editProfile')->with('error', $errorMessage);
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
                return redirect()->route('superAdmin.editProfile')->with('success', 'Foto Berhasil diHapus');
            } else {
                return redirect()->route('superAdmin.editProfile')->with('error', 'Anda tidak memiliki Foto Profil');
            }
        } catch (\Exception $e) {
            $errorMessage = strip_tags($e->getMessage());
            return redirect()->route('superAdmin.editProfile')->with('error', $errorMessage);
        }
    }
}
