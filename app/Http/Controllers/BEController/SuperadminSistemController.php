<?php

namespace App\Http\Controllers\BEController;

use App\Http\Controllers\Controller;
use App\Models\Paket;
use App\Models\Sekolah;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class SuperadminSistemController extends Controller
{
    public function dashboard()
    {
        $jumlah_admin_sistem = User::where('role_id', 2)->count();
        $jumlah_subscriptions = Subscription::count();
        return view('superAdmin.dashboard', [
            'title' => "Super Admin - Dashboard",
            'subscription' => 200,
            'admin_sistem' => $jumlah_admin_sistem,
            'subscription' => $jumlah_subscriptions,
        ]);
    }

    public function editProfile(Request $request)
    {
        $superAdmin = auth()->user();
        if ($request->is("api/*") || $request->wantsJson()) {
            return response()->json([
                'profil' => $superAdmin
            ]);
        } else {
            // return view('adminUniv-afterPayment.AdminUniv-EditProfile', compact('user'));
            return view('superAdmin.edit', [
                'title' => "Super Admin - Ubah Profil",
                'superAdmin' => $superAdmin
            ]);
        }

    }

    public function updateProfile(Request $request, $username)
    {
        $superAdmin = auth()->user();
        $data = $request->all();
        // dd($data);
        try {
            $validator = Validator::make($request->all(), [
                'nama_lengkap' => 'string|nullable',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'email' => [
                    'string',
                    'email',
                    'nullable',
                    Rule::unique('users', 'email')->ignore($superAdmin->email, 'email')
                ],
                'no_hp' => 'string|nullable',
                'alamat' => 'string|nullable',
                'about' => 'string|nullable',
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

    public function dataAdmin()
    {
        // $admins = User::where('role_id', 2)->paginate(10);
        $admins = User::where('role_id', 2)->get();
        return view('superAdmin.dataAdmin', [
            'title' => "Data Admin",
            'admins' => $admins,
        ]);
    }

    public function showAlertEditAdmin($adminId)
    {
        $admin = User::where('id', $adminId)->firstOrFail();
        return response()->json(['admin' => $admin], 200);
    }

    public function updateAdmin(Request $request, $username)
    {
        $data = $request->all();
        $admin = User::where('username', $username)->firstOrFail();

        try {
            $validator = Validator::make($request->all(), [
                'foto_profil' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'password' => 'confirmed',
                'username' => [
                    'required',
                    'string',
                    Rule::unique('users', 'username')->ignore($admin->username, 'username')
                ],
                'email' => [
                    'string',
                    'email',
                    'nullable',
                    Rule::unique('users', 'email')->ignore($admin->email, 'email')
                ],
            ]);
            $validator->validate();
        } catch (ValidationException $e) {
            $errorValidate = $e->validator->errors()->all();
            $errorMessage = implode('<br>', $errorValidate);
            return redirect()->route('superAdmin.dataAdmin')->with('error', $errorMessage);
        }

        try {
            if (isset($data['foto_profil'])) {
                if ($admin->foto_profil) {
                    Storage::delete('public/' . $admin->foto_profil);
                }
                $namaFoto = time() . '.' . $request->foto_profil->getClientOriginalExtension();
                $path = $request->file('foto_profil')->storeAs('public/foto_profil', $namaFoto);
                $admin->update([
                    'foto_profil' => 'foto_profil/' . $namaFoto,
                ]);
            }
            if ($data['password']) {
                $admin->update([
                    'nama_lengkap' => $data['nama_lengkap'],
                    'username' => $data['username'],
                    'email' => $data['email'],
                    'no_hp' => $data['no_hp'],
                    'password' => Hash::make($data['password']),
                    'kota' => $data['kota'],
                ]);
            } else {
                $admin->update([
                    'nama_lengkap' => $data['nama_lengkap'],
                    'username' => $data['username'],
                    'email' => $data['email'],
                    'no_hp' => $data['no_hp'],
                    'kota' => $data['kota'],
                ]);
            }

            return redirect()->route('superAdmin.dataAdmin')->with('success', 'Data Berhasil diUpdate');
        } catch (\Exception $e) {
            $errorMessage = strip_tags($e->getMessage());
            return redirect()->route('superAdmin.dataAdmin')->with('error', $errorMessage);
        }
    }

    public function deleteAdmin($username)
    {
        $admin = User::where('username', $username)->firstOrFail();
        try {
            $admin->delete();
            return redirect()->route('superAdmin.dataAdmin')->with('success', 'Data Admin Berhasil diHapus');
        } catch (\Exception $e) {
            $errorMessage = strip_tags($e->getMessage());
            return redirect()->route('superAdmin.dataAdmin')->with('error', $errorMessage);
        }
    }

    public function addAdmin(Request $request)
    {
        $data = $request->all();
        try {
            $validator = Validator::make($request->all(), [
                'foto_profil' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'nama_lengkap' => 'string|nullable',
                'username' => 'required|string|unique:users',
                'email' => 'string|email|unique:users,email|nullable',
                'no_hp' => 'string|nullable',
                'password' => 'required|string|confirmed',
                'kota' => 'string|nullable',
            ]);
            $validator->validate();
        } catch (ValidationException $e) {
            $errorValidate = $e->validator->errors()->all();
            $errorMessage = implode('<br>', $errorValidate);
            return redirect()->route('superAdmin.dataAdmin')->with('error', $errorMessage);
        }

        try {
            if (isset($data['foto_profil'])) {
                $namaFoto = time() . '.' . $data['foto_profil']->getClientOriginalExtension();
                $path = $request->file('foto_profil')->storeAs('public/foto_profil', $namaFoto);
                $pathFoto = 'foto_profil/' . $namaFoto;
            } else {
                $namaFoto = null;
                $pathFoto = null;
            }

            User::create([
                // 'foto_profil' => ($data['foto_profil']) ? 'foto_profil/' . $namaFoto : null,
                'foto_profil' => $pathFoto,
                'nama_lengkap' => $data['nama_lengkap'],
                'username' => $data['username'],
                'email' => $data['email'],
                'no_hp' => $data['no_hp'],
                'password' => Hash::make($data['password']),
                'kota' => $data['kota'],
                'jam_default_masuk' => '06:30:00',
                'jam_default_pulang' => '13:00:00',
                'role_id' => 2,
            ]);
            return redirect()->route('superAdmin.dataAdmin')->with('success', "Berhasil menambahkan data {$data['nama_lengkap']}");
        } catch (\Exception $e) {
            $errorMessage = strip_tags($e->getMessage());
            return redirect()->route('superAdmin.dataAdmin')->with('error', $errorMessage);
        }
    }

    public function langganan()
    {
        $subscriptions = Subscription::with(['user.perguruanTinggi', 'paket'])->get();
        $paket = Paket::all();
        $sekolah = Sekolah::all();

        return view('superAdmin.langganan', [
            'title' => "Langganan",
            'subscriptions' => $subscriptions,
            'sekolah' => $sekolah,
            'paket' => $paket,
        ]);
    }

    public function showAlertEditLangganan($id)
    {
        $subscription = Subscription::with(['user.perguruanTinggi', 'paket'])->where('id', $id)->firstOrFail();
        return response()->json(['subscription' => $subscription], 200);
    }

    public function updateLangganan(Request $request, $id)
    {
        $data = $request->all();
        $subscription = Subscription::with(['user.perguruanTinggi', 'paket'])->findOrFail($id);

        try {
            $validator = Validator::make($request->all(), [
                'email' => [
                    'string',
                    'email',
                    'nullable',
                    Rule::unique('users', 'email')->ignore($subscription->user->email, 'email')
                ],
            ]);
            $validator->validate();
        } catch (ValidationException $e) {
            $errorValidate = $e->validator->errors()->all();
            $errorMessage = implode('<br>', $errorValidate);
            return redirect()->route('superAdmin.langganan')->with('error', $errorMessage);
        }

        try {
            $sekolah = Sekolah::where('nama_sekolah', $data['sekolah'])->firstOrFail();
            $subscription->user->update([
                'nama_lengkap' => $data['nama_lengkap'],
                'email' => $data['email'],
                'no_hp' => $data['no_hp'],
                'tgl_masuk' => $data['tgl_masuk'],
                'tgl_keluar' => $data['tgl_keluar'],
                'status_akun' => $data['status_akun'],
                'sekolah' => $sekolah->id,
            ]);
            $subscription->update([
                'harga' => $data['harga'],
            ]);
            $paket = Paket::where('paket', $data['nama_paket'])->firstOrFail();
            $subscription->paket()->associate($paket);
            $subscription->save();
            return redirect()->route('superAdmin.langganan')->with('success', 'Data Berhasil diUpdate');
        } catch (\Exception $e) {
            $errorMessage = strip_tags($e->getMessage());
            return redirect()->route('superAdmin.langganan')->with('error', $errorMessage);
        }
    }

    public function deleteLangganan($id)
    {
        $langganan = Subscription::findOrFail($id);
        try {
            $langganan->delete();
            return redirect()->route('superAdmin.langganan')->with('success', 'Data Admin Berhasil diHapus');
        } catch (\Exception $e) {
            $errorMessage = strip_tags($e->getMessage());
            return redirect()->route('superAdmin.langganan')->with('error', $errorMessage);
        }
    }

    public function deleteFotoAdmin($username)
    {
        $admin = User::where('username', $username)->firstOrFail();
        try {
            if ($admin->foto_profil) {
                Storage::delete('public/' . $admin->foto_profil);
                $admin->foto_profil = null;
                $admin->save();
                return redirect()->route('superAdmin.dataAdmin')->with('success', 'Foto Berhasil diHapus');
            } else {
                return redirect()->route('superAdmin.dataAdmin')->with('error', 'Anda tidak memiliki Foto Profil');
            }
        } catch (\Exception $e) {
            $errorMessage = strip_tags($e->getMessage());
            return redirect()->route('superAdmin.dataAdmin')->with('error', $errorMessage);
        }
    }
}
