<?php

namespace App\Http\Controllers\BEController;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
use App\Models\KategoriPenilaian;
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
        $user = auth()->user();
        $mahasiswa = User::with('divisi')->where('role_id', 3)->get();
        return view('penilaian-siswa.penilaian-mahasiswa', compact('mahasiswa', 'user'));
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

        return view('penilaian-siswa.input-nilai', compact('user', 'nama_lengkap', 'divisi', 'sekolah', 'namaBulan'));
    }

    // public function penilaianPost(Request $request, $id)
    // {
    //     $user = User::findOrFail($id);
    //     dd($request->all());
    //     $request->validate([
    //         'nilai' => 'required|array',
    //         'kritik_saran' => 'required|string',
    //     ]);

    //     // Atur subkategori untuk setiap kategori
    //     $subkategori_per_kategori = [
    //         1 => [21, 22],
    //         2 => [23, 24, 25, 26],
    //         3 => [28, 29],
    //         4 => [27],
    //         5 => [26],
    //     ];

    //     $kategori_penilaian = KategoriPenilaian::all();
    //     $nilai = $request->nilai;

    //     // Simpan nilai pada tabel penilaian untuk setiap input
    //     foreach ($request->kategori_id as $kategoriId) {
    //         // Ambil kategori terkait
    //         $kategori = $kategori_penilaian->find($kategoriId);

    //         // Periksa apakah kategori ditemukan
    //         if ($kategori) {
    //             // Ambil subkategori yang sesuai dengan kategori
    //             $subKategoriIds = $subkategori_per_kategori[$kategoriId] ?? [];

    //             foreach ($subKategoriIds as $subKategoriId) {
    //                 $nilaiSubKategori = $nilai[$kategoriId][$subKategoriId] ?? null;

    //                 if ($nilaiSubKategori !== null) {
    //                     // Simpan nilai jika subkategori ditemukan dalam kategori yang sesuai
    //                     $penilaian = new Penilaian([
    //                         'nama_lengkap' => $user->id,
    //                         'sub_id' => $subKategoriId,
    //                         'nilai' => $nilaiSubKategori,
    //                         'kritik_saran' => $request->kritik_saran,
    //                     ]);
    //                     $penilaian->save();
    //                 }
    //             }
    //         }
    //     }

    //     $nilai = Penilaian::with('user', 'subKategori', 'subKategori.kategori')
    //                     ->where('nama_lengkap', $id)->first();

    //     return view('penilaian-siswa.input-nilai', compact('nilai', 'kategori_penilaian'))->with('success', 'Nilai berhasil disimpan!');
    // }


    public function penilaianPost(Request $request, $id)
    {
        dd($request->all());
        $user = User::findOrFail($id);
        $request->validate([
            'nilai' => 'required|array',
            'kritik_saran' => 'required|string',
        ]);

        $kategori_penilaian = KategoriPenilaian::all();
        // dd($kategori_penilaian);

        // Atur subkategori untuk setiap kategori
        $subkategori_per_kategori = [
            1 => [21, 22],
            2 => [23, 24, 25, 26],
            3 => [28, 29],
            4 => [27],
            5 => [26],
        ];

        // dd($subkategori_per_kategori);

        // dd($kategori_penilaian);
        $nilai = $request->nilai;

        // Simpan nilai pada tabel penilaian untuk setiap input
        foreach ($request->kategori_id as $kategoriId => $kategoriValue) {
            // Ambil kategori terkait
            $kategori = $kategori_penilaian->find($kategoriValue);

            // Periksa apakah kategori ditemukan
            if ($kategori) {
                // Ambil subkategori yang sesuai dengan kategori
                $subKategoriIds = $subkategori_per_kategori[$kategoriValue] ?? [];

                foreach ($subKategoriIds as $subKategoriId) {
                    // Periksa apakah ada nilai untuk subkategori ini
                    if (isset($nilai[$kategoriValue][$subKategoriId])) {
                        $nilaiSubKategori = $nilai[$kategoriValue][$subKategoriId];

                        // Simpan nilai jika subkategori ditemukan dalam kategori yang sesuai
                        $penilaian = new Penilaian([
                            'nama_lengkap' => $user->id,
                            'sub_id' => $subKategoriId,
                            'nilai' => $nilaiSubKategori,
                            'kritik_saran' => $request->kritik_saran,
                        ]);
                        $penilaian->save();
                    }
                }
            }
        }

        $nilai = Penilaian::with('user', 'subKategori', 'subKategori.kategori')
            ->where('nama_lengkap', $id)->first();

        return view('penilaian-siswa.input-nilai', compact('nilai', 'kategori_penilaian', 'subkategori_per_kategori'))->with('success', 'Nilai berhasil disimpan!');
    }

    // public function penilaianPost(Request $request, $id)
    // {
    //     // Temukan pengguna berdasarkan ID
    //     $user = User::findOrFail($id);
    //     dd($request->all());
    //     // Ambil data kategori penilaian tanpa eager loading
    //     $kategori_penilaian = KategoriPenilaian::all();
    //     // Validasi permintaan
    //     $request->validate([
    //         'nilai' => 'required|array',
    //         'kritik_saran' => 'required|string',
    //     ]);

    //     // Ambil data nilai dari permintaan
    //     $nilai = $request->nilai;

    //     // Simpan nilai pada tabel penilaian untuk setiap input
    //     foreach ($request->kategori_id as $kategoriId => $kategoriValue) {
    //         $kategori = $kategori_penilaian->find($kategoriValue);

    //         if ($kategori) {
    //             // Lakukan operasi lainnya, seperti menyimpan nilai
    //             // (Kode penyimpanan nilai Anda di sini)
    //         }
    //     }

    //     // Ambil data nilai untuk pengguna yang ditentukan
    //     $nilai = Penilaian::with('user', 'subKategori', 'subKategori.kategori')
    //                     ->where('nama_lengkap', $id)
    //                     ->first();

    //     // Kemudian, kirim data kategori penilaian dan nilai ke view
    //     return view('penilaian-siswa.input-nilai', compact('kategori_penilaian', 'nilai'))
    //         ->with('success', 'Nilai berhasil disimpan!');
    // }
}
