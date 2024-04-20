<?php

namespace App\Http\Controllers\BEController;

use DateTime;
use App\Models\User;
use App\Models\Mitra;
use App\Models\Divisi;
use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Sekolah;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class HomeMitraController extends Controller
{
    public function pilihMitra($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mitra_id' => 'required|exists:mitra,id',
            'divisi_id' => 'required|exists:divisi,id',
        ]);
        $validatedData = $validator->validate();
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu.');
        }
        $mitraId = $validatedData['mitra_id'];
        $divisiId = $validatedData['divisi_id'];
        $user = User::findOrFail($id);

        $user->mitra_id = $mitraId;
        $user->divisi_id = $divisiId;
        $user->save();
        return redirect()->to('/pemagang/home/' . $id);
    }

    public function profil($id)
    {
        $user = Auth::user();
        $nama_divisi = Divisi::where('id', $user->divisi_id)->first();
        $nama_sekolah = Sekolah::where('id', $user->sekolah)->first();
        $today = date('F Y/d');
        $dataPresensi = Presensi::with('user')->where('nama_lengkap', $id)->latest()->first();
        
        return view('pemagang.home', [
            'title' => "Home",
            'button' => "Masuk",
            'route' => '/jamMasuk/{id}',
            'data' => $dataPresensi,
            'nama_divisi' => $nama_divisi,
            'nama_sekolah' => $nama_sekolah,
            'today' => $today,
            'user' => $user,
        ]);
    }

    public function jamMasuk(Request $request)
    {
        $user = Auth::user();

        $nama_lengkap = $request->input('id');
        $hari = $request->input('hari');
        $jam_masuk = $request->input('jam');
        $status_kehadiran = $request->input('status_kehadiran');
        $keterangan_jam_masuk = $request->input('keterangan');
        $jam_default_masuk = '06:30';
        $status_ganti_jam = 'Tidak Ganti jam';

        $data = new Presensi;

        $data->nama_lengkap = $nama_lengkap;
        $data->hari = $hari;
        $data->keterangan_jam_masuk = $keterangan_jam_masuk;
        $data->jam_masuk = $jam_masuk;
        $data->status_kehadiran = $status_kehadiran;
        $data->jam_default_masuk = $jam_default_masuk;
        $data->status_ganti_jam = $status_ganti_jam;
        $data->save();
        $dataPresensi = Presensi::with('user')->where('nama_lengkap', $user->id)->latest()->first();
        if ($data) {
            return view('pemagang/home', [
                'button' => 'Istirahat',
                'route' => '/jamMulaiIstirahat/{id}',
                'dataPresensi' => $dataPresensi,
                'user' => $user,
                'today' => date('F Y/d'),
                'nama_divisi' => Divisi::where('id', $user->divisi_id)->first(),
                'nama_sekolah' => Sekolah::where('id', $user->sekolah)->first()
            ]);
        } else {
            return response([
                'pesan' => 'data tidak ada',
            ], 404);
        }
    }

    public function jamMulaiIstirahat(Request $request)
    {
        $user = Auth::user();
        $dataPresensi = Presensi::with('user')->where('nama_lengkap', $user->id)->latest()->first();

        if ($dataPresensi) {
            $dataPresensi->update([
                'jam_mulai_istirahat' => $request->jam,
                'keterangan_jam_mulai_istirahat' => $request->keterangan
            ]);
        
            return view('pemagang/home', [
                'button' => 'Masuk Kembali',
                'route' => '/jamSelesaiIstirahat/{id}',
                'dataPresensi' => $dataPresensi,
                'user' => $user,
                'today' => date('F Y/d'),
                'nama_divisi' => Divisi::where('id', $user->divisi_id)->first(),
                'nama_sekolah' => Sekolah::where('id', $user->sekolah)->first()
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
        $dataPresensi = Presensi::with('user')->where('nama_lengkap', $user->id)->latest()->first();

        if ($dataPresensi) {
            $dataPresensi->update([
                'jam_selesai_istirahat' => $request->jam,
                'keterangan_jam_selesai_istirahat' => $request->keterangan
            ]);

            return view('pemagang/home', [
                'button' => 'Pulang',
                'route' => '/jamPulang/{id}',
                'dataPresensi' => $dataPresensi,
                'user' => $user,
                'today' => date('F Y/d'),
                'nama_divisi' => Divisi::where('id', $user->divisi_id)->first(),
                'nama_sekolah' => Sekolah::where('id', $user->sekolah)->first()
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
        $dataPresensi = Presensi::with('user')->where('nama_lengkap', $user->id)->latest()->first();

        if ($dataPresensi) {
            $dataPresensi->update([
                'jam_pulang' => $request->jam,
                'keterangan_jam_pulang' => $request->keterangan
            ]);

            return view('pemagang/home', [
                'button' => 'Log Activity',
                'route' => '/catatLogAktivity/{id}',
                'dataPresensi' => $dataPresensi,
                'user' => $user,
                'today' => date('F Y/d'),
                'nama_divisi' => Divisi::where('id', $user->divisi_id)->first(),
                'nama_sekolah' => Sekolah::where('id', $user->sekolah)->first()
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
        $dataPresensi = Presensi::with('user')->where('nama_lengkap', $user->id)->latest();

        if ($dataPresensi) {
            $jam_masuk = $dataPresensi->jam_masuk;
            $jam_pulang = $dataPresensi->jam_pulang;

            if ($jam_masuk && $jam_pulang) {
                $jam_masuk_formatted = date('H:i:s', strtotime($jam_masuk));
                $jam_pulang_formatted = date('H:i:s', strtotime($jam_pulang));

                $jam_masuk_obj = new DateTime($jam_masuk_formatted);
                $jam_pulang_obj = new DateTime($jam_pulang_formatted);
                $total_jam_kerja = $jam_masuk_obj->diff($jam_pulang_obj)->format('%H:%I:%S');

                $dataPresensi->update(['total_jam_kerja' => $total_jam_kerja]);

                return view('pemagang/home', [
                    'button' => 'Log Activity',
                    'route' => '/catatLogAktivity/{id}',
                    'dataPresensi' => $dataPresensi,
                    'user' => $user,
                    'today' => date('F Y/d'),
                    'nama_divisi' => Divisi::where('id', $user->divisi_id)->first(),
                    'nama_sekolah' => Sekolah::where('id', $user->sekolah)->first()
                ]);
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
        $dataPresensi = Presensi::with('user')->where('nama_lengkap', $user->id)->latest()->first();

        if ($dataPresensi) {
            $dataPresensi->update([
                'kebaikan' => $request->kebaikan
            ]);

            return view('pemagang/home', [
                'button' => 'Log Activity',
                'dataPresensi' => $dataPresensi,
                'user' => $user,
                'today' => date('F Y/d'),
                'nama_divisi' => Divisi::where('id', $user->divisi_id)->first(),
                'nama_sekolah' => Sekolah::where('id', $user->sekolah)->first()
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
        $dataPresensi = Presensi::with('user')->where('nama_lengkap', $user->id)->latest()->first();

        if ($dataPresensi) {
            $dataPresensi->update([
                'log_aktivitas' => $request->log_aktivitas
            ]);

            return view('pemagang/home', [
                'button' => 'Log Activity',
                'logActivitySubmitted' => true,
                'dataPresensi' => $dataPresensi,
                'user' => $user,
                'today' => date('F Y/d'),
                'nama_divisi' => Divisi::where('id', $user->divisi_id)->first(),
                'nama_sekolah' => Sekolah::where('id', $user->sekolah)->first()
            ]);
        } else {
            return response()->json([
                'status' => 'Data tidak ditemukan',
            ], 404);
        }
    }

    public function catatIzin(Request $request)
    {
        $user = Auth::user();
        $dataPresensi = Presensi::with('user')->where('nama_lengkap', $user->id)->latest()->get()->reverse()->first();
        $keterangan_status = $request->input('keterangan_status');
        $bukti_foto_izin = $request->input('bukti_foto_izin');

        $data = new Presensi;
        $data->nama_lengkap = $user->id;
        $data->hari = Carbon::now()->format('Y-m-d'); 
        $data->keterangan_status = $keterangan_status;
        $data->bukti_foto_izin = $bukti_foto_izin;
        $data->status_kehadiran = 'Izin';
        $data->status_ganti_jam = 'Ganti Jam';

        $data->save();

        if ($data) {
            return view('pemagang/home', [
                'button' => 'Masuk',
                'dataPresensi' => $dataPresensi,
                'izinSubmitted' => true,
                'user' => $user,
                'today' => date('F Y/d'),
                'nama_divisi' => Divisi::where('id', $user->divisi_id)->first(),
                'nama_sekolah' => Sekolah::where('id', $user->sekolah)->first()
            ]);
        } else {
            return response()->json([
                'status' => 'Data presensi tidak ditemukan',
            ], 404);
        }
    }

    public function ijin()
    {
        $user = Auth::user();
        $dataPresensi = Presensi::with('user')->where('nama_lengkap', $user->id)->get()->reverse();
        
        return view('pemagang/gantiJam', [
            'button' => 'Log Activity',
            'dataPresensi' => $dataPresensi,
            'user' => $user,
            'today' => date('F Y/d'),
            'nama_divisi' => Divisi::where('id', $user->divisi_id)->first(),
            'nama_sekolah' => Sekolah::where('id', $user->sekolah)->first()
        ]);
    }

    public function generateQRCode(Request $request, $id){
        $user = Auth::user();
        $userData = $user->id; 
        $barcodeSvg = QrCode::size(300)->generate($userData);
        return view('pemagang.myqr' ,[
            'user' => $user,
        ],compact('barcodeSvg'));
    }
}
