<?php

namespace App\Http\Controllers\BEController;

use App\Models\User;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

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

    public function detailUnivProfile(Request $request)
    {
        // $profil = User::find($id);
        // $user = auth()->user();
        $user = User::where('role_id', 4)->first();
        if ($request->is("api/*") || $request->wantsJson()) {
            return response()->json([
                'profil' => $user
            ]);
        } else {
            return view('contributorforuniv.editProfile', compact('user'));
        }
    }

    public function updateUnivProfile(Request $request)
    {
        $user = User::where('role_id', 4)->first();
        // $updateUser = User::where('id', $user);
        // Update the user's profile with the validated data
        $user->update([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'kota' => $request->kota,
            'about' => $request->about,
        ]);

        // Redirect back to the edit profile page
        return redirect()->back();
    }

    public function updateFoto(Request $request, $id)
    {
        try {
            // Mendapatkan profil pengguna yang sedang masuk
            $profile = User::findOrFail($id);

            // Validasi file gambar yang diunggah
            $request->validate([
                'foto_profil' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Jika pengguna sudah memiliki foto profil, hapus foto profil sebelumnya
            if ($profile->foto_profil) {
                Storage::delete('public/assets/images/' . $profile->foto_profil);
            }

            // Simpan file gambar baru
            $namaFoto = time() . '.' . $request->file('foto_profil')->getClientOriginalExtension();
            $request->file('foto_profil')->storeAs('public/assets/images', $namaFoto);

            // Perbarui data foto profil pengguna di database
            $profile->update([
                'foto_profil' => $namaFoto,
            ]);

            // Redirect kembali ke halaman edit profile
            return response()->json(['success' => 'Foto Profil Berhasil Diperbarui',
                'data' => $namaFoto,
                'newImageUrl' => asset('storage/assets/images/' . $namaFoto) // Tambahkan URL gambar baru ke respons JSON
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }


    public function deleteFoto($id)
    {
        $profil = User::findOrFail($id);
        try {
            if ($profil->foto_profil) {
                Storage::delete('public/' . $profil->foto_profil);
                $profil->foto_profil = null;
                $profil->save();
                return response()->json(['success' => 'Foto Berhasil diHapus']);
            } else {
                return response()->json(['error' => 'Anda tidak memiliki Foto Profil']);
            }
        } catch (\Exception $e) {
            $errorMessage = strip_tags($e->getMessage());
            return response()->json(['error' => $errorMessage]);
        }
    }
}
