@extends('layouts.masterAfterPay')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/adminUniv-afterPayment/mitra/OptionTeamAktifKlikUiUx.css') }}">

    <div class="topcontent">
        <div>
            <a href="/AdminUniv/Option-TeamAktif"><i class="icon fa-solid fa-angle-left"></i></a>
        </div>
    </div>

    <div style="padding-left:70%">
        <div class="input">
            <i class="fa-solid fa-magnifying-glass" style="padding-left: 10px"></i>
            <input type="search" class="inputsearch" placeholder="cari team/project">
        </div>
    </div>
    <br>

    <div class="row isi">
        @if ($users->count() === 0)
            <p>Tidak ada data anggota divisi yang ditemukan.</p>
        @else
            @foreach ($users as $anggota)
                <div class="col-3 my-5">
                    <div class="dropdown" style="color: blueviolet;">
                        <div class="atasan">
                            <span>{{ $anggota->nomor_induk }}</span>
                            <i class="ikon fas fa-ellipsis-v ikon-klik" aria-haspopup="true" aria-expanded="false"></i>
                        </div>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Lihat Profil Mahasiswa</a>
                            <a class="dropdown-item" href="#">Lihat Data Presensi Mahasiswa</a>
                        </div>
                    </div>
                    <div class="bawahan">
                        <p>{{ $anggota->nama_lengkap }}</p>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    <script>
        // JavaScript untuk menangani dropdown
        document.addEventListener('DOMContentLoaded', function() {
            var dropdownMenus = document.querySelectorAll('.ikon-klik');
            for (let i = 0; i < dropdownMenus.length; i++) {
                dropdownMenus[i].addEventListener('click', function(event) {
                    var parent = this.closest('.atasan');
                    if (parent) {
                        parent.nextElementSibling.style.display = "inline-block";
                    }
                    event.stopPropagation(); // Menghentikan penyebaran event ke elemen lain
                });
            }

            document.addEventListener('click', function(event) {
                var dropdownMenus = document.querySelectorAll('.dropdown-menu');
                for (let i = 0; i < dropdownMenus.length; i++) {
                    if (!event.target.closest('.ikon-klik') && !event.target.closest('.dropdown-menu')) {
                        dropdownMenus[i].style.display = "none";
                    }
                }
            });
        });
    </script>
@endsection
