<?php

namespace App\Http\Controllers\BEController;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
use App\Models\Penilaian;
use App\Models\Sekolah;
use App\Models\SubKategoriPenilaian;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PenilaianMitraController extends Controller
{
    public function showPenilaianSiswa()
    {
        $mahasiswa = User::with('divisi')->where('role_id', 3)->get();
        return view('penilaian-siswa.penilaian-mahasiswa', compact('mahasiswa'));
    }



    public function input_nilai(Request $request, $nama_lengkap)
    {
        $user = User::where('nama_lengkap', $nama_lengkap)->first();
        // $kategori = SubKategoriPenilaian::with('kategori')->get();

        // Menampilkan Divisi
        $divisi_user = $user->divisi_id;
        $divisi = Divisi::find($divisi_user);

        // Menampilkan Sekolah
        $sekolah_user = $user->sekolah;
        $sekolah = Sekolah::find($sekolah_user);

        //Menampilkan bulan masuk
        $namaBulan = [
            1 => 'January',
            2 => 'February',
            3 => 'March',
            4 => 'April',
            5 => 'May',
            6 => 'June',
            7 => 'July',
            8 => 'August',
            9 => 'September',
            10 => 'October',
            11 => 'November',
            12 => 'December'
        ];

        $tanggal_masuk = Carbon::parse($user->tgl_masuk);
        $bulan_masuk = $tanggal_masuk->format('n'); // Mengambil nomor bulan dari tanggal masuk
        $nama_bulan_masuk = $namaBulan[$bulan_masuk]; // Mengambil nama bulan dari array $namaBulan
        $tahun_masuk = $tanggal_masuk->format('Y');
        $nama_bulan_tahun_masuk = $nama_bulan_masuk . $tahun_masuk;

        $namaBulan['bulan_tahun_masuk'] = $nama_bulan_tahun_masuk;

        return view('penilaian-siswa.input-nilai', compact('user','nama_lengkap','divisi', 'sekolah', 'namaBulan'));
    }


    public function penilaianPost(Request $request, $id)
    {
        $user = User::findOrFail($id); // Validasi keberadaan pengguna

        // Validasi data input (disesuaikan dengan kebutuhan)
        $request->validate([
            'topik' => 'required',
            'ruanglingkup' => 'required',
            'Indentifikasi' => 'required',
            'PemecahanMasalah' => 'required',
            'Hasilkerja' => 'required',
            'Partisipasi' => 'required',
            'Kejujuran' => 'required',
            'Kedisiplinan' => 'required',
            'TanggungJawab' => 'required',
            'Inisiatif' => 'required',
            'kritik_saran' => 'required', // Pastikan 'kritik_saran' juga divalidasi jika diasumsikan sama untuk semua input
        ]);

        // Peta nama input ke sub_ids
        $subIds = [
            'topik' => 1,
            'ruanglingkup' => 2,
            'Indentifikasi' => 3,
            'PemecahanMasalah' => 4,
            'Hasilkerja' => 5,
            'Partisipasi' => 6,
            'Kejujuran' => 7,
            'Kedisiplinan' => 8,
            'TanggungJawab' => 9,
            'Inisiatif' => 10
        ];

        foreach ($subIds as $inputName => $subId) {
            if ($request->has($inputName)) { // Periksa jika input hadir
                $penilaian = new Penilaian([
                    'nama_lengkap' => $user->id,
                    'sub_id' => $subId,
                    'nilai' => $request->input($inputName),
                    'kritik_saran' => $request->input('kritik_saran'),
                ]);
                $penilaian->save();
            }
        }

        return back()->with('success', 'Nilai berhasil disimpan!');
    }






}




