<?php

namespace App\Http\Controllers\BEController;

use App\Http\Controllers\Controller;
use App\Models\Privilage;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Mahasiswa;
use Illuminate\Validation\ValidationException;
use App\Models\PrivilageUser;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;



class AdminUserOrganizations extends Controller
{

  
    public function addGuru(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'foto_profil' => 'nullable|string|max:255',
            'email' => 'required|string|max:255',
            'username' => 'nullable|string|unique:users,username',
            'no_hp' => 'nullable|string|max:20',
            'password' => 'required|string|min:8|confirmed',
            'privilege_id' => 'nullable|array',
            'privilege_id.*' => 'exists:privilage,id',
            'mahasiswa_id' => 'required|array',
        ]);


        $mentorRole = Role::where('role', 'Guru')->first();

        $user = new User();
        $user->nama_lengkap = $request->nama_lengkap;
        $user->foto_profil = $request->foto_profil;
        $user->email = $request->email; 
        $user->username = $request->username;
        $user->no_hp = $request->no_hp;
        $user->password = Hash::make($request->password);

        if ($mentorRole) {
            $user->role_id = $mentorRole->id;
        }

        $user->save();

 
        if ($request->has('privilege_id')) {
            $privilege_id = $request->input('privilege_id');
            $user->privileges()->attach($privilege_id);
        }

      
        $mahasiswaIds = $request->input('mahasiswa_id');
        $result = [];

        foreach ($mahasiswaIds as $mahasiswaId) {
            $existingRelation = Mahasiswa::where('user_id', $user->id)
                ->where('mahasiswa_id', $mahasiswaId)
                ->exists();

            if (!$existingRelation) {
                Mahasiswa::create([
                    'user_id' => $user->id,
                    'mahasiswa_id' => $mahasiswaId,
                ]);

                $result[] = [
                    'user_id' => $user->id,
                    'mahasiswa_id' => $mahasiswaId,
                ];
            }
        }

        return response()->json(['message' => 'Mentor and Mahasiswa added successfully', 'result' => $result], 201);
    }




    public function addMentor(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'foto_profil' => 'nullable|string|max:255',
            'email' => 'required|string|max:255',
            'username' => 'nullable|string|unique:users,username',
            'no_hp' => 'nullable|string|max:20',
            'password' => 'required|string|min:8|confirmed',
            'privilege_id' => 'nullable|array',
            'privilege_id.*' => 'exists:privilage,id', 
            'mahasiswa_id' => 'required|array',
        ]);

        // Buat user mentor
        $mentorRole = Role::where('role', 'Mentor')->first();

        $user = new User();
        $user->nama_lengkap = $request->nama_lengkap;
        $user->foto_profil = $request->foto_profil;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->no_hp = $request->no_hp;
        $user->password = Hash::make($request->password);

        if ($mentorRole) {
            $user->role_id = $mentorRole->id;
        }

        $user->save();

        // Tambahkan privilege jika ada
        if ($request->has('privilege_id')) {
            $privilege_ids = $request->input('privilege_id');
            $user->privileges()->attach($privilege_ids);
        }

        // Tambahkan relasi mahasiswa
        $mahasiswaIds = $request->input('mahasiswa_id');
        $result = [];

        foreach ($mahasiswaIds as $mahasiswaId) {
            $existingRelation = Mahasiswa::where('user_id', $user->id)
                ->where('mahasiswa_id', $mahasiswaId)
                ->exists();

            if (!$existingRelation) {
                Mahasiswa::create([
                    'user_id' => $user->id,
                    'mahasiswa_id' => $mahasiswaId,
                ]);

                $result[] = [
                    'user_id' => $user->id,
                    'mahasiswa_id' => $mahasiswaId,
                ];
            }
        }

        return response()->json(['message' => 'Mentor and Mahasiswa added successfully', 'result' => $result], 201);
    }

    
    //search by NIM
    public function searchNIM(Request $request)
    {
        $nomorInduk = $request->input('nomor_induk');
        $request->validate([
            'nomor_induk' => 'required|numeric', 
        ]);

        $user = User::where('nomor_induk', $nomorInduk)->first();

        if ($user) {
            return response()->json([
                'status' => 'success',
                'data' => $user
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'User dengan nomor induk tersebut tidak ditemukan.'
            ], 404);
        }
    }


    //edit di guru $ mentor
    public function editMahasiswa(Request $request, $id)
    {
        $user = User::find($id);
    
        if (!$user) {
            return response()->json(['message' => 'Id guru tidak ditemukan'], 404);
        }
    
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'foto_profil' => 'nullable|string|max:255',
            'email' => 'required|string|max:255',
            'username' => 'nullable|string|unique:users,username,' . $id,
            'no_hp' => 'nullable|string|max:20',
            'password' => 'nullable|string|min:8|confirmed',
            'privilege_id' => 'nullable|array',
            'privilege_id.*' => 'exists:privilage,id',
            'mahasiswa_id' => 'required|array',
            '   '
        ]);
    

        $user->nama_lengkap = $request->nama_lengkap;
        $user->foto_profil = $request->foto_profil;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->no_hp = $request->no_hp;
        
        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }
    
        $user->save();
    
        if ($request->has('privilege_id')) {
            $privilege_ids = $request->input('privilege_id');
            $user->privileges()->sync($privilege_ids);
        }

        $mahasiswaIds = $request->input('mahasiswa_id');
        $result = [];

        Mahasiswa::where('user_id', $user->id)->delete();
        
        foreach ($mahasiswaIds as $mahasiswaId) {
            Mahasiswa::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'mahasiswa_id' => $mahasiswaId,
                ],
                [
                    'user_id' => $user->id,
                    'mahasiswa_id' => $mahasiswaId,
                ]
            );
        
            $result[] = [
                'user_id' => $user->id,
                'mahasiswa_id' => $mahasiswaId,
            ];
        }
        
        
    
        return response()->json(['message' => 'Informasi Guru berhasil diperbarui', 'result' => $result], 200);
    }

    public function deleteMahasiswa(Request $request)
    {
        $request->validate([
            'user_id' => 'required|array',
            'mahasiswa_id' => 'required|array',
        ]);

        $userIds = $request->input('user_id');
        $mahasiswaIds = $request->input('mahasiswa_id');

        $deletedRelations = [];

        foreach ($userIds as $key => $userId) { 
            $user = User::find($userId);
            if ($user && $user->role_id === 1) { 
                foreach ($mahasiswaIds as $mahasiswaId) {
                    $deletedRelation = Mahasiswa::where('user_id', $userId)
                        ->where('mahasiswa_id', $mahasiswaId)
                        ->delete();

                    if ($deletedRelation) {
                        $deletedRelations[] = [
                            'user_id' => $userId,
                            'mahasiswa_id' => $mahasiswaId,
                        ];
                    }
                }
            }
        }

        return response()->json(['message' => 'Mahasiswa berhasil dihapus dari tabel mahasiswa', 'deleted_relations' => $deletedRelations], 200);
    }






        
    


}