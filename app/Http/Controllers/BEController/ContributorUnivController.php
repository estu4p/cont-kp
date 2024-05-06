<?php

namespace App\Http\Controllers\BEController;

use App\Models\User;
use App\Models\Divisi;
use App\Models\Presensi;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use App\Models\KategoriPenilaian;
use App\Http\Controllers\Controller;
use App\Models\SubKategoriPenilaian;

class ContributorUnivController extends Controller
{
    public function DataPresensiSiswa($id)
    {
        // Mengambil data siswa berdasarkan ID

        $datasiswa = Presensi::with('user')->where('nama_lengkap', $id)->first();
        $presensi = Presensi::where('nama_lengkap', $id)->get();

    // Menangani kasus di mana siswa tidak ditemukan
    if (!$datasiswa) {
        abort(404); // Tampilkan halaman 404 jika siswa tidak ditemukan
    }

    // Mengambil data presensi siswa menggunakan relasi antara User dan Presensi
    // $presensi_siswa = $datasiswa->presensi;

    // Mengirim data siswa dan presensi ke view
    return view('presensi.datapresensisiswa', compact('datasiswa', 'presensi'));
}

    public function DataPresensi()
    {

        // Ambil data presensi dari database
        $presensiharian = Presensi::all(); // Anda mungkin perlu mengatur query sesuai dengan kebutuhan aplikasi Anda

        // Kirim data presensi ke halaman view
        return view('presensi.presensiharian', compact('presensiharian'));
    }

    public function hapusDivisi($id)
    {
        Penilaian::whereIn('sub_id', function ($query) use ($id) {
            $query->select('id')
                ->from('sub_kategori_penilaian')
                ->whereIn('kategori_id', function ($query) use ($id) {
                    $query->select('id')
                        ->from('kategori_penilaian')
                        ->where('divisi_id', $id);
                });
        })->delete();

        SubKategoriPenilaian::whereIn('kategori_id', function ($query) use ($id) {
            $query->select('id')
                ->from('kategori_penilaian')
                ->where('divisi_id', $id);
        })->delete();

        KategoriPenilaian::where('divisi_id', $id)->delete();

        Divisi::findOrFail($id)->delete();

        return redirect()->to('/pengaturan-contri');
    }

    public function showKategoriPenilaian($divisi_id)
    // Univ - Mitra - Daftar Mitra -  Option - Team Aktif - Pengaturan Divisi - Kategori Penilaian
    {
        $divisi = Divisi::findOrFail($divisi_id);
        $subKategori = SubKategoriPenilaian::with('kategori')->get()->groupBy('kategori_id');
        $kategori = KategoriPenilaian::where('divisi_id', $divisi_id)->get();

        return view('pengaturan.kategoripenilaian', [
            'divisi' => $divisi,
            'kategori' => $kategori,
            'subKategori' => $subKategori,
        ]);
    }

    public function addKategoriPenilaian(Request $request, $divisi_id)
    // Univ - Mitra - Daftar Mitra -  Option - Team Aktif - Pengaturan Divisi - Kategori Penilaian
    {
        $subKategori = SubKategoriPenilaian::with('kategori')->get()->groupBy('kategori_id');
        $divisi = Divisi::findOrFail($divisi_id);
        $kategori = KategoriPenilaian::where('divisi_id', $divisi_id)->get();
        $nama_kategori = $request->input('nama_kategori');
        $data = new KategoriPenilaian;
        $data->divisi_id = $divisi_id;
        $data->nama_kategori = $nama_kategori;
        $data->save();

        return redirect()->route('showKategoriPenilaian',  [
            'id' => $divisi->id,
            'divisi' => $divisi,
            'kategori' => $kategori,
            'subKategori' => $subKategori,
        ]);
    }

    public function addSubKategoriPenilaian(Request $request, $divisi_id, $kategori_id)
    // Univ - Mitra - Daftar Mitra -  Option - Team Aktif - Pengaturan Divisi - Kategori Penilaian
    {
        $subKategori = SubKategoriPenilaian::with('kategori')->get()->groupBy('kategori_id');
        $divisi = Divisi::findOrFail($divisi_id);
        $kategori = KategoriPenilaian::where('divisi_id', $divisi_id)->get();
        $nama_sub_kategori = $request->input('nama_sub_kategori');
        $data = new SubKategoriPenilaian;
        $data->kategori_id = $kategori_id;
        $data->nama_sub_kategori = $nama_sub_kategori;
        $data->save();


        return redirect()->route('showKategoriPenilaian',  [
            'id' => $divisi->id,
            'divisi' => $divisi,
            'kategori' => $kategori,
            'subKategori' => $subKategori,
        ]);
    }

    public function deleteKategori($id, $divisi_id)
    {
        $kategori = KategoriPenilaian::find($id);
        $kategori->delete();
        $divisi = Divisi::findOrFail($divisi_id);
        return redirect()->route('showKategoriPenilaian',  [
            'id' => $divisi->id,
        ]);
    }

    public function deleteSubKategori($id, $divisi_id)
    {
        $subKategori = SubKategoriPenilaian::find($id);
        $subKategori->delete();
        $divisi = Divisi::findOrFail($divisi_id);
        return redirect()->route('showKategoriPenilaian',  [
            'id' => $divisi->id,
        ]);
    }
    
}
