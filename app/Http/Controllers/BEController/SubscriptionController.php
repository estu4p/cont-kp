<?php

namespace App\Http\Controllers\BEController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Paket;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input jika diperlukan
        $request->validate([
            'nama_lengkap' => 'required',
            'email' => 'required',
            'sekolah' => 'required',
            'paket_id' => 'required',
            'kota' => 'required',
        ]);
    
        // Simpan data user ke dalam database
        $user = User::create([
            'nama_lengkap' => $request->input('nama_lengkap'),
            'email' => $request->input('email'),
            'sekolah' => $request->input('sekolah'),
            'paket_id' => $request->input('paket_id'),
            'kota' => $request->input('kota'),
        ]);
    
        // Berikan respons yang sesuai
        return response()->json(['message' => 'Subscription created successfully', 'user' => $user], 201);
    }

public function destroy($id)
{
    $user = User::find($id);
    
    if (!$user) {
        return response()->json(['message' => 'User not found.'], 404);
    }

    $user->delete();

    return response()->json(['message' => 'User deleted successfully'], 200);
}
public function update(Request $request, $id)
{
    $user = User::find($id);
    
    if (!$user) {
        return response()->json(['message' => 'User not found.'], 404);
    }

    $user->update($request->all());

    return response()->json(['message' => 'User updated successfully', 'user' => $user], 200);
}

}
