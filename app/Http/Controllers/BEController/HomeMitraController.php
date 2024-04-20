<?php

namespace App\Http\Controllers\BEController;

use DateTime;
use App\Models\User;
use App\Models\Mitra;
use App\Models\Divisi;
use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;





class HomeMitraController extends Controller
{
    public function pilihMitra(Request $request)
    {
        $mitra = Mitra::all();
        $divisi = Divisi::all();

        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'nama_mitra' => 'required|string',
                'divisi_mitra' => 'required|string',
            ]);

            // Ambil nama mitra dan divisi yang dipilih dari formulir
            $selectedMitraNama = $request->input('nama_mitra');
            $selectedDivisiNama = $request->input('divisi_mitra');

            // Cari ID mitra berdasarkan nama
            $selectedMitraId = Mitra::where('nama_mitra', $selectedMitraNama)->value('id');

            // Cari ID divisi berdasarkan nama
            $selectedDivisiId = Divisi::where('nama_divisi', $selectedDivisiNama)->value('id');

            // Simpan ID mitra dan divisi yang dipilih ke dalam sesi
            Session::put('selected_mitra_id', $selectedMitraId);
            Session::put('selected_divisi_id', $selectedDivisiId);

            // return redirect()->route('home_masuk')->with('success', 'Anda telah memilih mitra!');
            return response()->json(['status' => 'success', 'message' => 'Anda telah memilih mitra!']);
        }

        // return view('pilihmitra', compact('mitra', 'divisi'));
    }

    public function jamMasuk(Request $request)
    {
        $user = Auth::user();

        $nama_lengkap = $request->input('id');
        $hari = $request->input('hari');
        $jam_masuk = $request->input('jam');
        $status_kehadiran = $request->input('status_kehadiran');
        $keterangan_jam_masuk = $request->input('keterangan');

        $data = new Presensi;

        $data->nama_lengkap = $nama_lengkap;
        $data->hari = $hari;
        $data->keterangan_jam_masuk = $keterangan_jam_masuk;
        $data->jam_masuk = $jam_masuk;
        $data->status_kehadiran = $status_kehadiran;
        $data->save();
        $dataPresensi = Presensi::with('user')->where('nama_lengkap', 1)->latest()->first();
        if ($data) {
            return view('pemagang/home', [
                'button' => 'Istirahat',
                'route' => '/jamMulaiIstirahat',
                'data' => $dataPresensi
            ]);
        } else {
            return response([
                'pesan' => 'data tidak ada',
            ], 404);
        }
    }

    public function jamMulaiIstirahat(Request $request)
    {
        // $user = Auth::user();
        $data = Presensi::where('nama_lengkap', 1)->latest();

        if ($data) {
            $data->update([
                'jam_mulai_istirahat' => $request->jam,
                'keterangan_jam_mulai_istirahat' => $request->keterangan
            ]);
            $dataPresensi = Presensi::with('user')->where('nama_lengkap', 1)->latest()->first();

            return view('pemagang/home', [
                'button' => 'Masuk Kembali',
                'route' => '/jamSelesaiIstirahat',
                'data' => $dataPresensi
            ]);
        } else {
            return response()->json([
                'status' => 'Data tidak ditemukan',
            ], 404);
        }
    }

    public function jamSelesaiIstirahat(Request $request)
    {
        $user = Auth::user();
        $data = Presensi::where('nama_lengkap', 1)->latest();
        if ($data) {
            $data->update([
                'jam_selesai_istirahat' => $request->jam,
                'keterangan_jam_selesai_istirahat' => $request->keterangan
            ]);
            $dataPresensi = Presensi::with('user')->where('nama_lengkap', 1)->latest()->first();

            return view('pemagang/home', [
                'button' => 'Pulang',
                'route' => '/jamPulang',
                'data' => $dataPresensi
            ]);
        } else {
            return response()->json([
                'status' => 'Data tidak ditemukan',
            ], 404);
        }
    }

    public function jamPulang(Request $request,)
    {
        $user = Auth::user();
        $data = Presensi::where('nama_lengkap', 1)->latest();

        if ($data) {
            $data->update([
                'jam_pulang' => $request->jam,
                'keterangan_jam_pulang' => $request->keterangan
            ]);
            $dataPresensi = Presensi::with('user')->where('nama_lengkap', 1)->latest()->first();

            return view('pemagang/home', [
                'button' => 'Log Activity',
                'route' => '/catatLogAktivity',
                'data' => $dataPresensi
            ]);
        } else {
            return response()->json([
                'status' => 'Data tidak ditemukan',
            ], 404);
        }
    }


    public function totalJamKerja(Request $request, $id)
    {
        $user = Auth::user();
        $data = Presensi::where('nama_lengkap', 1)->latest()->first();

        if ($data) {
            $jam_masuk = $data->jam_masuk;
            $jam_pulang = $data->jam_pulang;

            if ($jam_masuk && $jam_pulang) {
                $jam_masuk_formatted = date('H:i:s', strtotime($jam_masuk));
                $jam_pulang_formatted = date('H:i:s', strtotime($jam_pulang));

                $jam_masuk_obj = new DateTime($jam_masuk_formatted);
                $jam_pulang_obj = new DateTime($jam_pulang_formatted);
                $total_jam_kerja = $jam_masuk_obj->diff($jam_pulang_obj)->format('%H:%I:%S');

                $data->update(['total_jam_kerja' => $total_jam_kerja]);

                return response()->json([
                    'status' => 'success',
                    'data' => $data,
                ], 200);
            } else {
                return response()->json([
                    'status' => 'Jam masuk atau jam pulang belum diisi',
                ], 400);
            }
        } else {
            return response()->json([
                'status' => 'Data tidak ditemukan',
            ], 404);
        }
    }


    public function kebaikan(Request $request)
    {
        $user = Auth::user();
        $data = Presensi::where('nama_lengkap', 1)->latest()->first();

        if ($data) {
            $data->update([
                'kebaikan' => $request->kebaikan
            ]);
            $dataPresensi = Presensi::with('user')->where('nama_lengkap', 1)->latest()->first();

            return view('pemagang/home', [
                'button' => 'Log Activity',
                'data' => $dataPresensi
            ]);
        } else {
            return response()->json([
                'status' => 'Data tidak ditemukan',
            ], 404);
        }
    }

    public function catatLogAktivity(Request $request)
    {
        $user = Auth::user();
        $data = Presensi::where('nama_lengkap', 1)->latest()->first();

        if ($data) {
            $data->update([
                'log_aktivitas' => $request->log_aktivitas
            ]);
            $dataPresensi = Presensi::with('user')->where('nama_lengkap', 1)->latest()->first();

            return view('pemagang/home', [
                'button' => 'Log Activity',
                'logActivitySubmitted' => true,
                'data' => $dataPresensi
            ]);
        } else {
            return response()->json([
                'status' => 'Data tidak ditemukan',
            ], 404);
        }
    }

    public function catatIzin(Request $request)
    {
        // $user = Auth::user();
        // $data = Presensi::where('nama_lengkap', 1)->first();
        $nama_lengkap = 1;
        $keterangan_status = $request->input('keterangan_status');
        $bukti_foto_izin = $request->input('bukti_foto_izin');

        $data = new Presensi;
        $data->nama_lengkap = $nama_lengkap;
        $data->hari = Carbon::now()->addDay();
        $data->keterangan_status = $keterangan_status;
        $data->bukti_foto_izin = $bukti_foto_izin;
        $data->status_kehadiran = 'Izin';
        $data->status_ganti_jam = 'Ganti Jam';

        $data->save();

        $dataPresensi = Presensi::with('user')->where('nama_lengkap', $nama_lengkap)->latest()->get()->reverse();

        if ($data) {
            return redirect()->to('/pemagang/detail/' . $nama_lengkap);
        } else {
            return response()->json([
                'status' => 'Data presensi tidak ditemukan',
            ], 404);
        }
    }

    public function ijin($nama_lengkap)
    {
        $dataPresensi = Presensi::with('user')->where('nama_lengkap', $nama_lengkap)->latest()->get()->reverse();

        return view('pemagang/gantiJam', [
            'button' => 'Log Activity',
            'data' => $dataPresensi
        ]);
    }

    public function generateQRCode(Request $request, $id)
    {
        $presensi = Presensi::where('nama_lengkap', $id)->first();
        if (!$presensi) {
            return response()->json([
                'status' => 'Pengguna tidak ditemukan'
            ], 404);
        }

        $currentTime = Carbon::now();
        $sessionKey = 'lastBarcodeTime_' . $id;
        $lastBarcodeTime = $request->session()->get($sessionKey, null);

        if (!$lastBarcodeTime || $currentTime->diffInMinutes($lastBarcodeTime) >= 5) {
            $qrCode = QrCode::size(300)->format('svg')->generate("ID: $id");
            $filename = "qrcode_$id.svg";
            $path = public_path("barcodes/$filename");
            file_put_contents($path, $qrCode);
            $path = str_replace('\\', '/', $path);

            $presensi->barcode = "/barcodes/$filename";
            $presensi->save();

            $request->session()->put($sessionKey, $currentTime);

            return response()->json([
                'status' => 'QR Code berhasil dibuat dan disimpan',
                'barcode_url' => asset("barcodes/$filename")
            ]);
        } else {
            $remainingTime = 5 - $currentTime->diffInMinutes($lastBarcodeTime);
            if ($remainingTime < 0) {
                $request->session()->forget($sessionKey);
                return $this->generateQRCode($request, $id);
            } else {
                return response()->json([
                    'status' => 'Anda hanya dapat mengubah barcode setiap 5 menit',
                    'remaining_time' => $remainingTime
                ], 403);
            }
        }
    }

    public function detailGantiJam(Request $request, $id)
    {
        $data = Presensi::select('hari', 'keterangan_status', 'status_kehadiran')->find($id);
        if ($data) {
            return response([
                'pesan' => 'data berhasil di tampilkan',
                'data' => $data,
            ], 200);
        } else {
            return response([
                'pesan' => 'data tidak ada',
            ], 404);
        }
    }
}