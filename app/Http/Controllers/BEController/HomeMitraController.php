<?php

namespace App\Http\Controllers\BEController;

use App\Models\User;
use App\Models\Mitra;
use App\Models\Divisi;
use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
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
        $nama_lengkap = $request->input('id');
        $hari = $request->input('hari');
        $jam_masuk = $request->input('jam_masuk');
        $status_kehadiran = $request->input('status_kehadiran');
        $keterangan_status = $request->input('keterangan_status');
        $kebaikan = $request->input('kebaikan');
        $status_absensi = $request->input('status_absensi');

        $data = new Presensi;

        $data->nama_lengkap = $nama_lengkap;
        $data->hari = $hari;
        $data->keterangan_status = $keterangan_status;
        $data->kebaikan = $kebaikan;
        $data->status_absensi = $status_absensi;
        $data->jam_masuk = $jam_masuk;
        $data->status_kehadiran = $status_kehadiran;
        $data->save();

        if ($data) {
            return response([
                'pesan' => 'data berhasil',
                'data' => $data,
            ], 200);
        } else {
            return response([
                'pesan' => 'data tidak ada',
            ], 404);
        }
    }

    public function jamPulang(Request $request, string $id)
    {
        $data = Presensi::where('id', $id)->first();

        if ($data) {
            $jam_pulang = $request->input('jam_pulang');
            $data->jam_pulang = $jam_pulang;
            $data->save();

            return response()->json([
                'status' => 'success',
                'data' => $data,
            ], 200);
        } else {
            return response()->json([
                'status' => 'Data tidak ditemukan',
            ], 404);
        }
    }


    public function jamMulaiIstirahat(Request $request, string $id)
    {
        $data = Presensi::where('id', $id)->first();

        if ($data) {
            $jam_mulai_istirahat = $request->input('jam_mulai_istirahat');
            $data->jam_mulai_istirahat = $jam_mulai_istirahat;
            $data->save();

            return response()->json([
                'status' => 'success',
                'data' => $data,
            ], 200);
        } else {
            return response()->json([
                'status' => 'Data tidak ditemukan',
            ], 404);
        }
    }

    public function jamSelesaiIstirahat(Request $request, string $id)
    {
        $data = Presensi::where('id', $id)->first();

        if ($data) {
            $jam_selesai_istirahat = $request->input('jam_selesai_istirahat');
            $data->jam_selesai_istirahat = $jam_selesai_istirahat;
            $data->save();

            return response()->json([
                'status' => 'success',
                'data' => $data,
            ], 200);
        } else {
            return response()->json([
                'status' => 'Data tidak ditemukan',
            ], 404);
        }
    }

    public function totalJamKerja(Request $request, $id)
    {
        $data = Presensi::where('id', $id)->first();

        if ($data) {
            $jam_masuk = Carbon::parse($data->jam_masuk); // Pastikan ini adalah objek Carbon
            $jam_pulang = Carbon::parse($data->jam_pulang);

            if ($jam_masuk && $jam_pulang) {
                $total_jam_kerja = $jam_masuk->diffInHours($jam_pulang);
                $data->total_jam_kerja = $total_jam_kerja;
                $data->save();

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

    public function catatLogAktivitas(Request $request, $id)
    {
        $data = Presensi::where('id', $id)->first();

        if ($data) {
            $log_aktivitas = $request->input('log_aktivitas');
            $data->log_aktivitas = $log_aktivitas;
            $data->save();

            return response()->json([
                'status' => 'success',
                'data' => $data,
            ], 200);
        } else {
            return response()->json([
                'status' => 'Data tidak ditemukan',
            ], 404);
        }
    }

    public function catatIzin(Request $request, $id)
    {
        $data = Presensi::where('id', $id)->first();

        if ($data) {
            $status_kehadiran = $request->input('status_kehadiran');
            $data->status_kehadiran = $status_kehadiran;
            $data->save();

            return response()->json([
                'status' => 'Izin magang berhasil dicatat',
                'data' => $data,
            ], 200);
        } else {
            return response()->json([
                'status' => 'Data presensi tidak ditemukan',
            ], 404);
        }
    }

    public function barcode(Request $request, $id)
    {
        $presensi = Presensi::where('nama_lengkap', $id)->first();
        if ($presensi) {
            $currentTime = Carbon::now();
            $sessionKey = 'lastBarcodeTime_' . $id;
            $lastBarcodeTime = $request->session()->get($sessionKey, null);

            if (!$lastBarcodeTime || $id !== $request->session()->get('lastUserId')) {
                $request->session()->put($sessionKey, $currentTime);
                $request->session()->put('lastUserId', $id);
            }

            if (!$lastBarcodeTime || $currentTime->diffInMinutes($lastBarcodeTime) >= 5) {
                $barcode = time();
                $presensi->barcode = $barcode;
                $presensi->save();

                $presensi->jam_masuk = $currentTime;
                $presensi->status_kehadiran = 'Hadir';
                $presensi->save();

                $request->session()->put($sessionKey, $currentTime);

                return response()->json([
                    'status' => 'Presensi berhasil dicatat',
                    'data' => $presensi,
                    'barcode' => $barcode
                ], 200);
            } else {
                return response()->json([
                    'status' => 'Anda hanya dapat mengubah barcode setiap 5 menit',
                    'remaining_time' => 5 - $currentTime->diffInMinutes($lastBarcodeTime)
                ], 403);
            }
        } else {
            return response()->json([
                'status' => 'User ID tidak valid atau tidak memiliki presensi'
            ], 404);
        }
    }

    public function generateQRCode(Request $request, $id)
    {
        $presensi = Presensi::where('nama_lengkap', $id)->first();
        if (!$presensi) {
            return response()->json([
                'status' => 'Pengguna tidak ditemukan'
            ], 404);
        }
        $izin = $request->input('izin', false);

        $qrCode = QrCode::size(100)->generate("ID: $id");
        $filename = "qrcode_$id.png";
        $path = public_path("barcodes/$filename");
        file_put_contents($path, $qrCode);
        
        // Update 'barcode' column pada model Presensi
        $presensi->barcode = "/barcodes/$filename";
        $presensi->save();
        // Jika ada izin, simpan status izin pada presensi
        if ($izin) {
            $presensi->izin = true;
            $presensi->save();
        }

        return response()->json([
            'status' => 'QR Code berhasil dibuat dan disimpan',
            'barcode_url' => asset("barcodes/$filename")
        ]);
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
