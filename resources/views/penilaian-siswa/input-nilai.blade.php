@extends('layouts.masterMitra')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/input-nilai.css') }}">
    <div class="wadah">
        <div class="judul d-flex flex-row justify-content-start">
            <a href="/penilaian-mahasiswa"> <i class="fa-solid text-dark ikon-kiri fa-chevron-left icon fs-1 p-2"></i></a>
            <div class="tengah-judul d-flex flex-row align-items-center gap-3">
                <div class="profil d-flex justify-content-center align-items-center "><i class="fa-solid fa-user"
                        style="color: #ffffff;"></i></div>
                <div class="kekanan">
                    <p class="name">{{ $userId->nama_lengkap }}</p>
                    <p class="nip">NIP: {{ $userId->nomor_induk }}</p>
                </div>
            </div>
        </div>

        <div class="container-fluid  align-items-start d-flex flex-row wadah-card row gap-4 bodiinput">
            <div class="judulmagang">
                INPUT NILAI MAGANG
            </div>
            <form action="{{ route('mitra.inputNilai', $userId->id) }}" method="POST">
                @csrf
                <div class="col-6">
                    <div class="grup w-100 p-3 d-flex flex-column gap-3">
                        @foreach ($subKategori as $kategoriId => $subKategoris)
                            <div class="judulgrup">
                                <h2>{{ $subKategoris->first()->kategori->nama_kategori }}</h2>
                                @foreach ($subKategoris as $subKategori)
                                    <div class="grupinput d-flex justify-content-between">
                                        <label for="topik"
                                            class="text-input">{{ $subKategori->nama_sub_kategori }}</label>
                                        <input type="hidden" value="{{ $subKategori->id }}" name="sub_id[]">
                                        <!-- Menggunakan array pada nama input -->
                                        <input class="input mb-1" type="text" id="topik" placeholder=""
                                            name="nilai[]">
                                        <!-- ^^^^^^ -->
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                    <div class="col-6 justify-content-center d-flex">
                        <button class="btn-md btn py-0 px-4 text-center submit" style="width:max-content !important"
                            type="submit">Submit</button>
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
