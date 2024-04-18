<?php

namespace App\Http\Controllers\BEController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
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
        $User = User::where('role_id', 2)->first();
        $subscriptions = Subscription::with(['user.perguruanTinggi', 'paket'])->get();
        $paket = Paket::all();
        $sekolah = Sekolah::all();

        //return ke tampilan
        if ($request->is('api/*') || $request->wantsJson()) {
            return response()->json([
            'title' => "Subscription",
            'user' => $User,
            'subscriptions' => $subscriptions,
            'sekolah' => $sekolah,
            'paket' => $paket,
            ], 200);
        } else {
            return view('SistemLokasi.AdminSistem-Subcription', compact(['User', 'subscriptions', 'sekolah', 'paket']));
        }
    }

    public function showAlertEditSubs($id)
    {
        $subscription = Subscription::with(['user.perguruanTinggi', 'paket'])->where('id', $id)->firstOrFail();
        return response()->json(['subscription' => $subscription], 200);
    }

    public function updateSubs(Request $request, $id)
    {
        $data = $request->all();
        $subscription = Subscription::with(['user.perguruanTinggi', 'paket'])->findOrFail($id);

        try {
            $validator = Validator::make($request->all(), [
                'email' => [
                    'required',
                    'string',
                    'email',
                    Rule::unique('users', 'email')->ignore($subscription->user->email, 'email')
                ],
            ]);
            $validator->validate();
        } catch (ValidationException $e) {
            $errorValidate = $e->validator->errors()->all();
            $errorMessage = implode('<br>', $errorValidate);
            return redirect()->route('SistemLokasi.AdminSistem-Subscription')->with('error', $errorMessage);
        }

        try {
            $sekolah = Sekolah::where('sekolah', $data['sekolah'])->firstOrFail();
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
            $paket = Paket::where('nama_paket', $data['nama_paket'])->firstOrFail();
            $subscription->paket()->associate($paket);
            $subscription->save();
            return redirect()->route('SistemLokasi.AdminSistem-Subscription')->with('success', 'Data Berhasil diUpdate');
        } catch (\Exception $e) {
            $errorMessage = strip_tags($e->getMessage());
            return redirect()->route('SistemLokasi.AdminSistem-Subscription')->with('error', $errorMessage);
        }
    }

    public function deleteSubs($id)
    {
        $subscription = Subscription::findOrFail($id);
        try {
            $subscription->delete();
            return redirect()->route('SistemLokasi.AdminSistem-Subscription')->with('success', 'Data Admin Berhasil diHapus');
        } catch (\Exception $e) {
            $errorMessage = strip_tags($e->getMessage());
            return redirect()->route('SistemLokasi.AdminSistem-Subscription')->with('error', $errorMessage);
        }
    }
}
