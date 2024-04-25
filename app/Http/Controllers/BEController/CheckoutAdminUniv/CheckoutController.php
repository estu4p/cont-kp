<?php

namespace App\Http\Controllers\BEController\CheckoutAdminUniv;

use App\Models\Riwayat;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class CheckoutController extends Controller
{
    public function CheckoutBronze(Request $request,)
    {
        $api = Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/provinces.json');

        if ($request->is('api/*') || $request->wantsJson()) {
            if ($api->successful()) {
                // Mendapatkan data dari respons
                $data = $api->json();

                // Lakukan sesuatu dengan data...
                return response()->json([
                    'Data kota Indonesia' => $data
                ]);
            } else {
                // Panggilan tidak berhasil, tangani kesalahan di sini...
                return response()->json(['message' => 'Failed to fetch data from API'], $api->status());
            }
        } else {
            if ($api->successful()) {
                $data = $api->json();
                return view('user.AdminUnivAfterPayment.CheckoutBronze', compact('data'));
            } else {
                return response()->json([
                    'message' => 'Data kota tidak ditemukan'
                ]);
            }
        }
    }
    public function CheckoutBronzePost(Request $request)
    {
        $timestamp = now()->timestamp;
        $random_string = str_shuffle($timestamp); // Acak string timestamp
        $no_pesanan = substr($random_string, 0, 8); // Generates a random string of length 8
        $tanggal_berakhir = now()->addYear();
        $harga = '1000000';
        $data = new Riwayat([
            'nama_paket' => $request->input('nama_paket'),
            'tanggal' => now(),
            'tanggal_berakhir' => $tanggal_berakhir,
            'status' => 'Aktif',
            'no_pesanan' =>   $no_pesanan,
            'harga' => $harga,
            'metode_bayar' => $request->input('metode_bayar'),
            'lokasi' => $request->input('lokasi')
        ]);

        $data->save();

        return response()->json([
            'data' => $data
        ]);
    }
}
