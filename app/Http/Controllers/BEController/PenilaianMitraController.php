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
        // Mengambil data penilaian beserta relasi subKategori dan kategori berdasarkan ID
        $penilaian = Penilaian::with('subKategori')->find($id);

        // Memeriksa apakah data penilaian ditemukan
        if (!$penilaian) {
            // Jika tidak ditemukan, mengembalikan response dengan pesan error
            return abort(404, 'Data penilaian tidak ditemukan.');
        }

        // Memeriksa apakah relasi subKategori tersedia
        if ($penilaian->subKategori !== null) {
            // Jika relasi subKategori tersedia, gunakan metode where() untuk mencari nilaiSubkategori
            $nilaiPemahamanDesain = $penilaian->kategori->where('sub_id', 'Pemahaman Penerapan Desain')->first()->nilai;
            $nilaiDesainThinking = $penilaian->kategori->where('sub_id', 'Desain Thinking')->first()->nilai;
        } else {
            // Jika relasi subKategori null, handle sesuai kebutuhan aplikasi Anda
            // Misalnya, set nilaiSubkategori menjadi null atau berikan nilai default
            $nilaiPemahamanDesain = null;
            $nilaiDesainThinking = null;
        }

        // Membuat objek Penilaian baru untuk disimpan
        $user = User::findOrFail($id);
        $nilai = new Penilaian([
            'nama_lengkap' => $user->id,
            'sub_id' => $request->input('sub_id'),
            'nilai' => $request->input('nilai'),
            'kritik_saran' => $request->input('kritik_saran'),
        ]);
        $nilai->save();

        // Kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Nilai berhasil disimpan!');
    }




}




