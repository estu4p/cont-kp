<?php

namespace App\Http\Controllers\BEController;

use App\Models\User;
use App\Models\Paket;
use App\Models\Riwayat;
use App\Models\Sekolah;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UserAdminSistemController extends Controller
{
    public function IndexSubscription(Request $request)
    {
        $userAdmin = auth()->user();
        
        $subscriptions = Riwayat::all();
        $sekolah = Sekolah::pluck('nama_sekolah', 'id');
        $allSekolah = Sekolah::all();

        // Ambil semua data pengguna untuk setiap langganan
    foreach ($subscriptions as $subscription) {
        // Periksa apakah pengguna ditemukan
        $user = $subscription->user;

        // Jika pengguna ditemukan, tambahkan informasi pengguna ke langganan
        if ($user) {
            $subscription->nama_lengkap = $user->nama_lengkap;
            $subscription->no_hp = $user->no_hp;
            $subscription->email = $user->email;
        } else {
            // Jika pengguna tidak ditemukan, berikan nilai default
            $subscription->nama_lengkap = "Pengguna tidak ditemukan";
            $subscription->no_hp = "-";
            $subscription->email = "-";
        }
    }
        return view('SistemLokasi.AdminSistem-Subcription', compact(['userAdmin', 'subscriptions', 'sekolah', 'allSekolah']));

    }
     public function storeSubs(Request $request)
    {
        // Validasi input jika diperlukan
        $request->validate([
            'id' => 'required|exists:users,id',
            'paket_id' => 'required|exists:paket,id',
            'sekolah' => 'required|exists:sekolah,id'
        ]);

        // Simpan data ke tabel riwayat
        $subscription = new Riwayat();
        $subscription->nama_lengkap = $request->input('id');
        $subscription->no_hp = $request->input('no_hp');
        $subscription->email = $request->input('email');
        $subscription->paket_id = $request->input('paket_id');
        $subscription->sekolah = $request->input('sekolah');
        $subscription->save();

        // Jika request berasal dari API atau ingin respon dalam format JSON
        if ($request->is('api/*') || $request->wantsJson()) {
            return response()->json([
                'message' => 'Subscription added successfully.',
                'subscription' => $subscription,
            ], 200);
        } else {
            // Jika request berasal dari tampilan web
            return redirect()->back()->with('success', 'Subscription added successfully.');
        }
    }
    public function updateSubs(Request $request, $id)
    {
// Validasi input jika diperlukan
$request->validate([
    'nama' => 'required|string',
    'email' => 'required|email',
    'no_hp' => 'required|string',
    'sekolah' => 'required|string',
    'paket_berlangganan' => 'required|exists:paket,id',
]);

// Cari riwayat yang ingin diperbarui
$subscription = Riwayat::findOrFail($id);
// Update data riwayat
$subscription->nama_lengkap = $request->input('nama');
$subscription->no_hp = $request->input('no_hp');
$subscription->email = $request->input('email');
$subscription->paket_id = $request->input('paket_berlangganan');
$subscription->sekolah = $request->input('sekolah');
$subscription->save();
    }
    public function deleteSubs(Request $request, $id)
    {
        // Temukan subscription berdasarkan ID
        $subscription = Riwayat::find($id);

        // Pastikan subscription ditemukan
        if (!$subscription) {
            // Jika request berasal dari API atau ingin respon dalam format JSON
            if ($request->is('api/*') || $request->wantsJson()) {
                return response()->json([
                    'message' => 'Subscription not found.',
                ], 404);
            } else {
                // Jika request berasal dari tampilan web
                return redirect()->back()->with('error', 'Subscription not found.');
            }
        }

        // Hapus subscription
        $subscription->delete();

        // Jika request berasal dari API atau ingin respon dalam format JSON
        if ($request->is('api/*') || $request->wantsJson()) {
            return response()->json([
                'message' => 'Subscription deleted successfully.',
            ], 200);
        } else {
            // Jika request berasal dari tampilan web
            return redirect()->back()->with('success', 'Subscription deleted successfully.');
        }
    }
}