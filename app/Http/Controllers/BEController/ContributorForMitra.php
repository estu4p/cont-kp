<?php

namespace App\Http\Controllers\BEController;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
use Illuminate\Http\Request;
use App\Models\Shift;
use App\Models\KategoriPenilaian;
use App\Models\SubKategoriPenilaian;
use App\Models\User;
use App\Models\Presensi;
use Illuminate\Support\Facades\Validator;



class ContributorForMitra extends Controller
{
    public function showDaftarDivisi(Request $request)
    {
        $divisi = Divisi::all();

        if ($request->is('api/*') || $request->wantsJson()) {
            return response()->json(['message' => 'Daftar Divisi', 'Divisi' => $divisi]);
        } else {
            return view('manage.margepenilaiandivisi', ['divisi' => $divisi]);
        }
    }

    public function addDivisi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_divisi' => 'required',
            'deskripsi_divisi' => '',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = new Divisi([
            'nama_divisi' => $request->input('nama_divisi'), // Sesuaikan dengan data yang sudah ada
            'deskripsi_divisi' => $request->input('deskripsi_divisi'),
        ]);

        $data->save();

        return response()->json(['success' => true, 'message' => 'Berhasil menambahkan divisi'], 200);
    }
    public function updateDivisi(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_divisi' => 'required',
            'deskripsi_divisi' => '',
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'Gagal update divisi',], 404);
        }
        $data = Divisi::find($id);
        $data->fill([
            'nama_divisi' => $request->nama_divisi,
            'deskripsi_divisi' => $request->deskripsi_divisi
        ]);
        $data->save();
        return response()->json(['success' => true, 'message' => 'Berhasil update divisi', 'data' => $data], 200);
    }
    public function destroyDivisi($id)
    {
        $data = Divisi::find($id);
        if ($data) {
            $deletedId = $data->id; // Mendapatkan ID shift yang akan dihapus
            $data->delete();
            return response()->json(['success' => true, 'message' => "Berhasil menghapus divisi dengan id $deletedId"], 200);
        } else {
            return response()->json(['success' => false, 'message' => "Data dengan id $id tidak ditemukan"], 404);
        }
    }

    public function showKategoriPenilaian(Request $request)
    {
        $kategori = KategoriPenilaian::with('kategori')->get();
        if ($request->is('api/*') || $request->wantsJson()) {
            return response()->json(['success' => true, 'nilai' => $kategori], 200);
        } else {
            return view('manage.kategoripenilaian', ['kategori' => $kategori]);
        }
    }

    public function addKategoriPenilaian(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'divisi_id' => 'required',
            'nama_kategori' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'Gagal menambahkan kategori penilaian',], 400);
        }
        $data = new KategoriPenilaian([
            'divisi_id' => $request->input('divisi_id'),
            'nama_kategori' => $request->input('nama_kategori')
        ]);
        $data->save();

        return response()->json([
            'success' => true,
            'message' => 'Berhasil menambahkan kategori penilaian'
        ]);
    }

    public function addSubKategoriPenilaian(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kategori_id' => 'required',
            'nama_sub_kategori' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'Gagal menambahkan sub kategori penilaian',], 400);
        }

        $data = new SubKategoriPenilaian([
            'kategori_id' => $request->input('kategori_id'),
            'nama_sub_kategori' => $request->input('nama_sub_kategori')
        ]);

        $data->save();

        return response()->json([
            'message' => 'Berhasil menambahkan sub kategori penilaian'
        ]);
    }

    public function showDataShift(Request $request)
    {
        $shift = Shift::all();
        if ($request->is('api/*') || $request->wantsJson()) {
            return response()->json(['success' => true, 'nilai' => $shift], 200);
        } else {
            return view('manage.datashift', ['shift' => $shift]);
        }
    }

    public function addShift(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_shift' => 'required',
            'jml_jam_kerja'=> 'required',
            'jam_masuk'=> 'required',
            'jam_pulang'=> 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = new Shift([
            'nama_shift' => $request->input('nama_shift'),
            'jml_jam_kerja'=> $request->input('jml_jam_kerja'),
            'jam_masuk'=> $request->input('jam_masuk'),
            'jam_pulang'=> $request->input('jam_pulang'),
        ]);

        $data->save();

        return response()->json(['success'=> true, 'message'=> 'Berhasil menambahkan data shift'], 200);
    }

    public function updateShift($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_shift' => 'required',
            'jml_jam_kerja'=> 'required',
            'jam_masuk'=> 'required',
            'jam_pulang'=> 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Gagal update data shift',], 404);
        }
        $data = Shift::find($id);
        if (!$data) {
            return response()->json(['message' => 'Data shift tidak ditemukan'], 404);
        }

        $data->fill([
            'nama_shift' => $request->input('nama_shift'),
            'jml_jam_kerja'=> $request->input('jml_jam_kerja'),
            'jam_masuk'=> $request->input('jam_masuk'),
            'jam_pulang'=> $request->input('jam_pulang'),
        ]);

        $data->save();

        return response()->json(['success'=> true,'message'=> 'Berhasil update data shift'], 200);
    }

    public function destroyShift($id)
    {
        $data = Shift::find($id);
        if ($data) {
            $deletedId = $data->id; // Mendapatkan ID shift yang akan dihapus
            $data->delete();
            return response()->json(['success' => true, 'message' => "Berhasil menghapus data shift dengan id $deletedId"], 200);
        } else {
            return response()->json(['success' => false, 'message' => "Data shift dengan id $id tidak ditemukan"], 404);
        }
    }

    public function laporanPresensi(Request $request)
    {
        $presensi = User::where('role_id', 3)->get();

        //Hitunng total kehadiran, izin, dan ketidakhadiran pernama
        $kehadiranPerNama = Presensi::select('nama_lengkap')
            ->groupBy('nama_lengkap')->with('user')
            ->get()
            ->map(function ($item) {
                $item['total_kehadiran'] = Presensi::where('nama_lengkap', $item->nama_lengkap)
                    ->where('status_kehadiran', 'hadir')
                    ->count();
                $item['total_izin'] = Presensi::where('nama_lengkap', $item->nama_lengkap)
                    ->whereIn('status_kehadiran', ['izin', 'sakit'])
                    ->count();
                $item['total_ketidakhadiran'] = Presensi::where('nama_lengkap', $item->nama_lengkap)
                    ->where('status_kehadiran', 'Tidak Hadir')
                    ->count();
                return $item;
            });

        //Hitung total jam masuk, total masuk, target, dan sisa
        $totalJamMasuk = $presensi->sum('jam masuk');
        $totalMasuk = Presensi::where('status_kehadiran', 'hadir')->count();
        $target = 1100;
        $sisa = $target - $totalJamMasuk;

        //Konversi total jam masuk dan sisa menjadi format jam:menit:detik
        $jam = floor($totalJamMasuk / 3600);
        $menit = floor(($totalJamMasuk % 3600) / 60);
        $detik = $totalJamMasuk % 60;
        $totalJamMasukFormat = sprintf('%02d:%02d:%02d', $jam, $menit, $detik);

        $jamSisa = floor($sisa / 3600);
        $menitSisa = floor(($sisa % 3600) / 60);
        $detikSisa = $sisa % 60;
        $sisaFormat = sprintf('%02d:%02d:%02d', $jamSisa, $menitSisa, $detikSisa);

        //Kirim data ke tampilan
        if ($request->is('api/*') || $request->wantsJson()) {
            return response()->json([
            'message' =>'Berhasil mendapat data',
                        'kehadiran_per_nama' => $kehadiranPerNama,
                        'data' => $presensi,
                        'total_jam_masuk' => $totalJamMasukFormat,
                        'total_masuk' => $totalMasuk,
                        'target' => $target,
                        'sisa' => $sisaFormat], 200);
        } else {
            return view('user.ContributorForMitra.laporanpresensi')->with([
                'presensi' => $presensi,
                'kehadiran' => $kehadiranPerNama,
                'total_jam_masuk' => $totalJamMasukFormat,
                'total_masuk' => $totalMasuk,
                'target' => $target,
                'sisa' => $sisaFormat
            ]);
        }
    }

    public function laporanPresensiDetailHadir(Request $request,$nama_lengkap,)
    {
        $user = User::findOrFail($nama_lengkap);
        $presensi = Presensi::where('nama_lengkap' ,$nama_lengkap)->where('status_kehadiran', 'hadir')->get();


        if ($request->is('api/*') || $request->wantsJson()) {
            return response()->json(['message' => 'Berhasil mendapat data', 'Detail Hadir' => $presensi, 'data' => $user], 200);
        } else {
            return view('user.ContributorForMitra.MitraPresensiDetailHadir', compact(['presensi', 'user']));
        }
    }

    public function laporanPresensiDetailIzin($nama_lengkap, Request $request)
    {
        $user = User::findOrFail($nama_lengkap);
        $presensi = Presensi::where('nama_lengkap', $nama_lengkap)
                        ->where(function ($query) {
                            $query->where('status_kehadiran', 'izin')
                                  ->orWhere('status_kehadiran', 'sakit');
                        })->get();

        if ($request->is('api/*') || $request->wantsJson()) {
                return response()->json(['message' => 'Berhasil mendapat data', 'Detail Izin' => $presensi], 200);
        } else {
                return view('user.ContributorForMitra.MitraPresensiDetailIzin', compact(['presensi', 'user']));
        }
    }

    public function laporanPresensiDetailTidakHadir($nama_lengkap, Request $request)
    {
        $user = User::findOrFail($nama_lengkap);
        $presensi = Presensi::where('nama_lengkap', $nama_lengkap)->where('status_kehadiran', 'tidak hadir')->get();

        if ($request->is('api/*') || $request->wantsJson()) {
                return response()->json(['message' => 'Berhasil mendapat data', 'Detail Izin' => $presensi], 200);
        } else {
                return view('user.ContributorForMitra.MitraPresensiDetailTidakHadir', compact(['presensi', 'user']));
        
        }
    }
    
}
