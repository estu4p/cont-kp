@extends('layouts.masterMitra')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/input-nilai.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/sidebar.css') }}">



<div class="wadah">
    <div class="judul d-flex flex-row justify-content-start">
        <a href="/penilaian-mahasiswa"> <i class="fa-solid text-dark ikon-kiri fa-chevron-left icon fs-1 p-2"></i></a>
        <div class="tengah-judul d-flex flex-row align-items-center gap-3">
            <div class="profil d-flex justify-content-center align-items-center "><i class="fa-solid fa-user" style="color: #ffffff;"></i></div>
            <div class="kekanan">
                <p class="name">{{ $nama_lengkap }}</p>
                <p class="nip">NIP: MJ/{{ $divisi->nama_divisi}}/{{$sekolah->sekolah}}/{{ $namaBulan['bulan_tahun_masuk'] }}/{{ $user->id }}</p>
            </div>
        </div>
    </div>

    <div class="container-fluid  align-items-start d-flex flex-row wadah-card row gap-4 bodiinput">
        <div class="judulmagang">
            INPUT NILAI MAGANG
        </div>
        <form action="{{ route('input-nilai.store', ['id' => $user->id]) }}" method="POST">
            @csrf
            <div class="d-flex justify-content-between row flex-row">
                <div class="kiri col-6 d-flex flex-column">
                    <div class="grup w-100 p-3  d-flex flex-column gap-3">
                        <div class="judulgrup">Pengetahuan</div>
                        <div class="grupinput d-flex justify-content-between">
                            <label for="topik" class="text-input">Pemahaman topik magang</label>
                            <input class="input" type="text" id="topik" name="topik" placeholder="" value="{{ $nilai['topik'] ?? old('topik') }}">
                        </div>
                        <div class="grupinput d-flex justify-content-between">
                            <label for="ruanglingkup" class="text-input">Pemahaman ruang lingkup magang</label>
                            <input class="input" type="text" id="ruanglingkup" name="ruanglingkup" placeholder="" value="{{ $nilai['ruanglingkup'] ?? old('ruanglingkup') }}">
                        </div>
                    </div>
                    <div class="grup w-100 p-3 d-flex flex-column gap-3">
                        <div class="judulgrup">Keterampilan</div>
                        <div class="grupinput d-flex justify-content-between">
                            <label for="Indentifikasi" class="text-input">Indentifikasi masalah</label>
                            <input class="input" type="text" id="Indentifikasi" name="Indentifikasi" placeholder="" value="{{ $nilai['Indentifikasi'] ?? old('Indentifikasi') }}">
                        </div>
                        <div class="grupinput d-flex justify-content-between">
                            <label for="PemecahanMasalah" class="text-input">Pemecahan Masalah</label>
                            <input class="input" type="text" id="PemecahanMasalah" name="PemecahanMasalah" placeholder="" value="{{ $nilai['PemecahanMasalah'] ?? old('PemecahanMasalah') }}">
                        </div>
                        <div class="grupinput d-flex justify-content-between">
                            <label for="Hasilkerja" class="text-input">Hasil kerja</label>
                            <input class="input" type="text" id="Hasilkerja" name="Hasilkerja" placeholder="" value="{{ $nilai['Hasilkerja'] ?? old('Hasilkerja') }}">
                        </div>
                    </div>
                </div>

                <div class="grup kanan col-6 d-flex flex-column p-3 gap-3">
                    <div class="judulgrup">Lainnya</div>
                    <div class="grupinput row  d-flex justify-content-between">
                        <label for="Partisipasi" class="text-input col-6">Partisipasi</label>
                        <input class="input col-6" type="text" id="Partisipasi" name="Partisipasi" placeholder="" value="{{ $nilai['Partisipasi'] ?? old('Partisipasi') }}">
                    </div>
                    <div class="grupinput row d-flex justify-content-between">
                        <label for="Kejujuran" class="text-input col-6">Kejujuran</label>
                        <input class="input col-6" type="text" id="Kejujuran" name="Kejujuran" placeholder="" value="{{ $nilai['Kejujuran'] ?? old('Kejujuran') }}">
                    </div>
                    <div class="grupinput row d-flex justify-content-between">
                        <label for="Kedisiplinan" class="text-input col-6">Kedisiplinan</label>
                        <input class="input col-6" type="text" id="Kedisiplinan" name="Kedisiplinan" placeholder="" value="{{ $nilai['Kedisiplinan'] ?? old('Kedisiplinan') }}">
                    </div>
                    <div class="grupinput row  d-flex justify-content-between">
                        <label for="TanggungJawab" class="text-input col-6">Tanggung Jawab</label>
                        <input class="input col-6" type="text" id="TanggungJawab" name="TanggungJawab" placeholder="" value="{{ $nilai['TanggungJawab'] ?? old('TanggungJawab') }}">
                    </div>
                    <div class="grupinput row d-flex  justify-content-between">
                        <label for="Inisiatif" class="text-input col-6">Inisiatif</label>
                        <input class="input col-6" type="text" id="Inisiatif" name="Inisiatif" placeholder="" value="{{ $nilai['Inisiatif'] ?? old('Inisiatif') }}">
                    </div>
                    <div class="row">
                        <div class="col-6">

                        </div>
                        <div class="col-6 justify-content-center d-flex">
                            <button class="btn-md btn py-0 px-4 text-center submit" style="width:max-content !important">Submit</button>
                        </div>
                    </div>
                </div>

            </div>
        </form>

        <div class="peringatan">
            <h5>Lihat Hutang Jam Siswa/Mahasiswa</h5>
            <p>Klik pada link untuk melihat sertifikat dan penilaian siswa/mahasiswa</p>
        </div>

        <div class="card lengkung p-0 col-3">
            <div class="card-header d-flex align-items-center justify-content-between p-3 atas">
                <div class="d-flex  flex-column  h-100 mx-2">
                    <h5 class="card-title m-0 d-flex justify-content-end fs-6 sertif">Sertifikat</h5>
                </div>
            </div>
            <div class="card-body ">
                <label for="Inisiatif" class=" col-6">Link G-Drive</label>
                <input class="inputnilai col-8" type="text" id="Inisiatif" placeholder="">
            </div>
        </div>
    </div>
</div>

@endsection
