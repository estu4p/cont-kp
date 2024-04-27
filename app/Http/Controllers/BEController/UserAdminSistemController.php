<?php

namespace App\Http\Controllers\BEController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\Paket;
use App\Models\Sekolah;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class UserAdminSistemController extends Controller
{
    public function IndexSubscription(Request $request)
    {
        $userAdmin = auth()->user();
        $subscriptions = Subscription::with(['user.perguruanTinggi', 'paket', 'user.sekolah'])->get();
        $paket = Paket::all();
        $sekolah = Sekolah::pluck('nama_sekolah', 'id');

        //return ke tampilan
        if ($request->is('api/*') || $request->wantsJson()) {
            return response()->json([
            'title' => "Subscription",
            'user' => $userAdmin,
            'subscriptions' => $subscriptions,
            'sekolah' => $sekolah,
            'paket' => $paket,
            ], 200);
        } else {
            return view('SistemLokasi.AdminSistem-Subcription', compact(['userAdmin', 'subscriptions', 'sekolah', 'paket']));
        }
    }
    public function storeSubs(Request $request)
    {
        // Validasi input jika diperlukan
        $request->validate([
            'id' => 'required|exists:users,id',
            'paket_id' => 'required|exists:paket,id',
            'sekolah' => 'required|exists:sekolah,id'
        ]);

        // Simpan data ke tabel subscription
        $subscription = new Subscription();
        $subscription->nama_lengkap = $request->input('id');
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

    public function update(Request $request, $id)
{
    // Validasi input jika diperlukan
    $request->validate([
        'nama' => 'required|string',
        'email' => 'required|email',
        'telepon' => 'required|string',
        'sekolah' => 'required|string',
        'paket_berlangganan' => 'required|exists:paket,id',
    ]);

    // Cari subscription yang ingin diperbarui
    $subscription = Subscription::findOrFail($id);

    // Update data subscription
    $subscription->nama_lengkap = $request->input('nama');
    $subscription->paket_id = $request->input('paket_berlangganan');
    $subscription->sekolah = $request->input('sekolah');

    // Ambil user terkait dan update kolom-kolomnya
    $user = $subscription->user;
    $user->email = $request->input('email');
    $user->telepon = $request->input('telepon');
    $user->tgl_masuk = $request->input('tgl_masuk');
    $user->tgl_keluar = $request->input('tgl_keluar');
    $user->harga = $request->input('harga');
    $user->status_akun = $request->input('status_berlangganan');
    $user->save();

    $subscription->save();

    // Berikan respons sesuai dengan jenis permintaan
    if ($request->expectsJson()) {
        return response()->json([
            'message' => 'Subscription updated successfully.',
            'subscription' => $subscription,
        ], 200);
    } else {
        return redirect()->back()->with('success', 'Subscription updated successfully.');
    }
}


    // public function updateSubs(Request $request, $id)
    // {
    //     $data = $request->all();
    //     $subscription = Subscription::with(['user.perguruanTinggi', 'paket'])->findOrFail($id);

    //     try {
    //         $validator = Validator::make($request->all(), [
    //             'email' => [
    //                 'required',
    //                 'string',
    //                 'email',
    //                 Rule::unique('users', 'email')->ignore($subscription->user->id, 'id')
    //             ],
    //         ]);
    //         $validator->validate();
    //     } catch (ValidationException $e) {
    //         $errorValidate = $e->validator->errors()->all();
    //         $errorMessage = implode('<br>', $errorValidate);
    //         return response()->json(['error' => $errorMessage]);
    //     }

    //     try {
    //         $sekolah = Sekolah::where('sekolah', $data['sekolah'])->firstOrFail();
    //         $subscription->user->update([
    //             'nama_lengkap' => $data['nama_lengkap'],
    //             'email' => $data['email'],
    //             'no_hp' => $data['no_hp'],
    //             'tgl_masuk' => $data['tgl_masuk'],
    //             'tgl_keluar' => $data['tgl_keluar'],
    //             'status_akun' => $data['status_akun'],
    //             'sekolah' => $sekolah->id,
    //         ]);
    //         $subscription->update([
    //             'harga' => $data['harga'],
    //         ]);
    //         $paket = Paket::where('nama_paket', $data['nama_paket'])->firstOrFail();
    //         $subscription->paket()->associate($paket);
    //         $subscription->save();
    //         return response()->json(['success' => 'Data Berhasil diUpdate']);
    //     } catch (\Exception $e) {
    //         $errorMessage = strip_tags($e->getMessage());
    //         return response()->json(['error' => $errorMessage]);
    //     }
    // }

    public function deleteSubs(Request $request, $id)
    {
        // Temukan subscription berdasarkan ID
        $subscription = Subscription::find($id);

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
