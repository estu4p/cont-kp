<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class SuperadminSistemController extends Controller
{
    public function dashboard()
    {
        $superAdmin = User::where('role_id', 1)->first();
        $jumlah_admin_sistem = User::where('role_id', 2)->count();

        return view('super-admin.dashboard', [
            'title' => "Super Admin - Dashboard",
            'subscription' => 200,
            'admin_sistem' => $jumlah_admin_sistem,
            'superAdmin' => $superAdmin
        ]);
    }

    public function editProfile()
    {
        $superAdmin = User::where('role_id', 1)->first();

        return view('super-admin.edit', [
            'title' => "Super Admin - Ubah Profil",
            'superAdmin' => $superAdmin
        ]);
    }

    public function updateProfile(Request $request, $username)
    {
        $superAdmin = User::where('role_id', 1)->first();
        $data = $request->all();
        try {
            $validator = Validator::make($request->all(), [
                'nama_lengkap' => 'required|string',
                'email' => [
                    'required',
                    'string',
                    'email',
                    Rule::unique('users', 'email')->ignore($superAdmin->email, 'email')
                ],
                'no_hp' => 'required|string',
                'alamat' => 'string',
                'about' => 'string',
            ]);
            $validator->validate();
        } catch (ValidationException $e) {
            $errorValidate = $e->validator->errors()->all();
            $errorMessage = implode('<br>', $errorValidate);
            return redirect()->route('super-admin.edit-profile')->with('error', $errorMessage);
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
            return redirect()->route('super-admin.edit-profile')->with('success', 'Data Profil Berhasil diUbah');
        } catch (\Exception $e) {
            $errorMessage = strip_tags($e->getMessage());
            return redirect()->route('super-admin.edit-profile')->with('error', $errorMessage);
        }
    }

    public function dataAdmin()
    {
        $superAdmin = User::where('role_id', 1)->first();
        // $admins = User::where('role_id', 2)->paginate(10);
        $admins = User::where('role_id', 2)->get();
        return view('super-admin.data-admin', [
            'title' => "Data Admin",
            'admins' => $admins,
            'superAdmin' => $superAdmin
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
                'password' => 'confirmed',
                'username' => [
                    'required',
                    'string',
                    Rule::unique('users', 'username')->ignore($admin->username, 'username')
                ],
                'email' => [
                    'required',
                    'string',
                    'email',
                    Rule::unique('users', 'email')->ignore($admin->email, 'email')
                ],
            ]);
            $validator->validate();
        } catch (ValidationException $e) {
            $errorValidate = $e->validator->errors()->all();
            $errorMessage = implode('<br>', $errorValidate);
            return redirect()->route('super-admin.data-admin')->with('error', $errorMessage);
        }

        try {
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

            return redirect()->route('super-admin.data-admin')->with('success', 'Data Berhasil diUpdate');
        } catch (\Exception $e) {
            $errorMessage = strip_tags($e->getMessage());
            return redirect()->route('super-admin.data-admin')->with('error', $errorMessage);
        }
    }

    public function deleteAdmin($username)
    {
        $admin = User::where('username', $username)->firstOrFail();
        try {
            $admin->delete();
            return redirect()->route('super-admin.data-admin')->with('success', 'Data Admin Berhasil diHapus');
        } catch (\Exception $e) {
            $errorMessage = strip_tags($e->getMessage());
            return redirect()->route('super-admin.data-admin')->with('error', $errorMessage);
        }
    }

    public function addAdmin(Request $request)
    {
        $data = $request->all();
        try {
            $validator = Validator::make($request->all(), [
                'nama_lengkap' => 'required|string',
                'username' => 'required|string|unique:users',
                'email' => 'required|string|email|unique:users,email',
                'no_hp' => 'required|string',
                'password' => 'required|string|confirmed',
                'kota' => 'required|string',
            ]);
            $validator->validate();
        } catch (ValidationException $e) {
            $errorValidate = $e->validator->errors()->all();
            $errorMessage = implode('<br>', $errorValidate);
            return redirect()->route('super-admin.data-admin')->with('error', $errorMessage);
        }

        try {
            User::create([
                'nama_lengkap' => $data['nama_lengkap'],
                'username' => $data['username'],
                'email' => $data['email'],
                'no_hp' => $data['no_hp'],
                'password' => Hash::make($data['password']),
                'kota' => $data['kota'],
                'role_id' => 2,
            ]);
            return redirect()->route('super-admin.data-admin')->with('success', "Berhasil menambahkan data {$data['nama_lengkap']}");
        } catch (\Exception $e) {
            $errorMessage = strip_tags($e->getMessage());
            return redirect()->route('super-admin.data-admin')->with('error', $errorMessage);
        }
    }
}
