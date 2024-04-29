@extends('layouts.masterMitra')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/input-nilai.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/sidebar.css') }}">


@php
    $kategori_penilaian = App\Models\KategoriPenilaian::with('subKategori')->get();
    // dd($kategori_penilaian);
    $subkategori_per_kategori = [
            1 => [21, 22],
            2 => [23, 24, 25, 26],
            3 => [28, 29],
            4 => [27],
            5 => [26],
        ];
    // dd($subkategori_per_kategori);

@endphp
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
        <form action="{{ route('input-nilai.store', ['user_id' => $user->id]) }}" method="POST">
            @csrf
            <div class="d-flex justify-content-between row flex-row">
                @foreach($kategori_penilaian as $kategori)
                    <div class="kiri col-6 d-flex flex-column">
                        <div class="grup w-100 p-3 d-flex flex-column gap-3">
                            @if($kategori->id == 1)
                                <div class="judulgrup">Pengetahuan</div>
                                {{-- <input class="input" type="hidden" name="kategori_id[1]" value="{{ $kategori->id }}"> --}}
                                @foreach($kategori->subKategori as $subK)
                                    @if(in_array($subK->id, $subkategori_per_kategori[$kategori->id] ?? []))
                                    {{-- @dd($subK->id); --}}
                                        <div class="grupinput d-flex justify-content-between">
                                            <label for="{{ $subK->nama_sub_kategori }}" class="text-input">Pemahaman topik magang</label>
                                            <input class="input" type="text" id="nilai_{{ $subK->id }}" name="nilai[{{ $kategori->id }}][{{ $subK->id }}]" placeholder="" value="{{ $nilai[$kategori->id][$subK->id] ?? '' }}">
                                            {{-- <input type="hidden" name="subkategori_id[21]" value="{{ $subK->id }}"> --}}
                                        </div>
                                        <div class="grupinput d-flex justify-content-between">
                                            <label for="{{ $subK->nama_sub_kategori }}" class="text-input">Pemahaman ruang lingkup magang</label>
                                            <input class="input" type="text" id="nilai_{{ $subK->id }}" name="nilai[{{ $kategori->id }}][{{ $subK->id }}]" placeholder="" value="{{ $nilai[$kategori->id][$subK->id] ?? '' }}">
                                            {{-- <input type="hidden" name="subkategori_id[22]" value="{{ $subK->id }}"> --}}
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>

                        <div class="grup w-100 p-3 d-flex flex-column gap-3">
                            @if($kategori->id == 2)
                                <div class="judulgrup">Keterampilan</div>
                                {{-- <input class="input" type="hidden" id="keterampilan" name="kategori[2]" placeholder="" value="2"> --}}
                                    @foreach($kategori->subKategori as $subK)
                                        @if(in_array($subK->id, $subkategori_per_kategori[$kategori->id] ?? []))
                                            <div class="grupinput d-flex justify-content-between">
                                                <label for="{{ $subK->nama_sub_kategori }}" class="text-input">Indentifikasi masalah</label>
                                                <input class="input" type="text" id="nilai_{{ $subK->id }}" name="nilai[{{ $kategori->id }}][{{ $subK->id }}]" placeholder="" value="{{ $nilai[$kategori->id][$subK->id] ?? '' }}">
                                            </div>
                                            <div class="grupinput d-flex justify-content-between">
                                                <label for="{{ $subK->nama_sub_kategori }}" class="text-input">Pemecahan Masalah</label>
                                                <input class="input" type="text" id="nilai_{{ $subK->id }}" name="nilai[{{ $kategori->id }}][{{ $subK->id }}]" placeholder="" value="{{ $nilai[$kategori->id][$subK->id] ?? '' }}">
                                            </div>
                                            <div class="grupinput d-flex justify-content-between">
                                                <label for="{{ $subK->nama_sub_kategori }}" class="text-input">Hasil kerja</label>
                                                <input class="input" type="text" id="nilai_{{ $subK->id }}" name="nilai[{{ $kategori->id }}][{{ $subK->id }}]" placeholder="" value="{{ $nilai[$kategori->id][$subK->id] ?? '' }}">
                                            </div>
                                        @endif
                                    @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="grup kanan col-6 d-flex flex-column p-3 gap-3">
                        <div class="judulgrup">Lainnya</div>
                        <div class="grupinput row  d-flex justify-content-between">
                            @if($kategori->id == 5)
                                @foreach($kategori->subKategori as $subK)
                                    @if(in_array($subK->id, $subkategori_per_kategori[$kategori->id] ?? []))
                                    @dd($subK->id);
                                        <label for="{{ $subK->nama_sub_kategori }}" class="text-input col-6">Partisipasi</label>
                                        <input class="input col-6" type="text" id="nilai_{{ $subK->id }}" name="nilai[{{ $kategori->id }}][{{ $subK->id }}]" placeholder="" value="{{ $nilai[$kategori->id][$subK->id] ?? '' }}">
                                    @endif
                                @endforeach
                            @endif
                        </div>
                        <div class="grupinput row d-flex justify-content-between">
                            @if($kategori->id == 4)
                                @foreach($kategori->subKategori as $subK)
                                    @if(in_array($subK->id, $subkategori_per_kategori[$kategori->id] ?? []))
                                        <label for="{{ $subK->nama_sub_kategori }}" class="text-input col-6">Kejujuran</label>
                                        <input class="input col-6" type="text" id="nilai_{{ $subK->id }}" name="nilai[{{ $kategori->id }}][{{ $subK->id }}]" placeholder="" value="{{ $nilai[$kategori->id][$subK->id] ?? '' }}">
                                    @endif
                                @endforeach
                            @endif
                        </div>
                        <div class="grupinput row d-flex justify-content-between">
                            @if($kategori->id == 3)
                                @foreach($kategori->subKategori as $subK)
                                    @if(in_array($subK->id, $subkategori_per_kategori[$kategori->id] ?? []))
                                        <label for="{{ $subK->nama_sub_kategori }}" class="text-input col-6">Kedisiplinan</label>
                                        <input class="input col-6" type="text" id="nilai_{{ $subK->id }}" name="nilai[{{ $kategori->id }}][{{ $subK->id }}" placeholder="" value="{{ $nilai[$kategori->id][$subK->id] ?? '' }}">
                                    @endif
                                @endforeach
                            @endif
                        </div>
                        <div class="grupinput row  d-flex justify-content-between">
                            @if($kategori->id == 3)
                                @foreach($kategori->subKategori as $subK)
                                    @if(in_array($subK->id, $subkategori_per_kategori[$kategori->id] ?? []))
                                        <label for="{{ $subK->nama_sub_kategori }}" class="text-input col-6">Tanggung Jawab</label>
                                        <input class="input col-6" type="text" id="nilai_{{ $subK->id }}" name="nilai[{{ $kategori->id }}][{{ $subK->id }}" placeholder="" value="{{ $nilai[$kategori->id][$subK->id] ?? '' }}">
                                    @endif
                                @endforeach
                            @endif
                        </div>
                        <div class="grupinput row d-flex  justify-content-between">
                            @if($kategori->id == 3)
                                @foreach($kategori->subKategori as $subK)
                                    @if(in_array($subK->id, $subkategori_per_kategori[$kategori->id] ?? []))
                                        <label for="{{ $subK->nama_sub_kategori }}" class="text-input col-6">Inisiatif</label>
                                        <input class="input col-6" type="text" id="nilai_{{ $subK->id }}" name="nilai[{{ $kategori->id }}][{{ $subK->id }}" placeholder="" value="{{ $nilai[$kategori->id][$subK->id] ?? '' }}">
                                    @endif
                                @endforeach
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-6">
                            </div>
                            <div class="col-6 justify-content-center d-flex">
                                <button type="submit" class="btn-md btn py-0 px-4 text-center submit" style="width:max-content !important">Submit</button>
                            </div>
                        </div>
                    </div>
                @endforeach

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
