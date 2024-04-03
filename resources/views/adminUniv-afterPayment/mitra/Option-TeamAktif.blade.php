@extends('layouts.masterAfterPay')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css//adminUniv-afterPayment/Option-TeamAktif.css') }}">
    <div class="topcontent">
        <div style="display: flex;">
            <div class="">
                <a href="OptionTeamAktifKlikUiUx"><i class="iconn fa-solid fa-angle-left"></i></a>
            </div>
            <div class="kembali">
                <p style="font-size: 24px"><u>Data Divisi</p>
            </div>
        </div>
        <div>
            <div class="input">
                <i class="fa-solid fa-magnifying-glass" style="padding-left: 10px"></i>
                <input type="search" class="inputsearch" placeholder="cari team/project">
            </div>
        </div>
    </div>
    <div class="isi row row-cols-3">
        @foreach ($divisi as $item)
            <div class="col" style="display: flex">
                @if ($item->id == 1)
                    <i class="icon fa-solid fa-pen-nib"></i>
                @elseif ($item->id == 2)
                    <i class="icon fa-solid fa-code"></i>
                @elseif ($item->id == 3)
                    <i class="icon fa-solid fa-palette"></i>
                @elseif ($item->id == 4)
                    <i class="icon fa-solid fa-camera"></i>
                @elseif ($item->id == 5)
                    <i class="icon fa-solid fa-bullhorn"></i>
                @elseif ($item->id == 6)
                    <i class="icon fa-solid fa-home"></i>
                @elseif ($item->id == 7)
                    <i class="icon fa-solid fa-bag-shopping"></i>
                @elseif ($item->id == 8)
                    <i class="icon fa-regular fa-handshake"></i>
                @elseif ($item->id == 9)
                    <i class="icon fa-regular fa-pen-to-square"></i>
                @elseif ($item->id == 10)
                    <i class="icon fa-solid fa-calendar-days"></i>
                @elseif ($item->id == 11)
                    <i class="icon fa-solid fa-business-time"></i>
                @elseif ($item->id == 12)
                    <i class="icon fa-solid fa-diagram-project"></i>
                @elseif ($item->id == 13)
                    <i class="icon fa-solid fa-book-open"></i>
                @elseif ($item->id == 14)
                    <i class="icon fa-regular fa-thumbs-up"></i>
                @elseif ($item->id == 15)
                    <img src="assets/images/emojione-monotone_selfie.png" class="icon" style="width:70px;height:70px; ">
                @elseif ($item->id == 16)
                    <i class="icon fa-regular fa-pen-to-square"></i>
                @elseif ($item->id == 17)
                    <img src="assets/images/presenter.png" class="icon" style="width:70px;height:70px; ">
                @elseif ($item->id == 18)
                    <img src="assets/images/las.png" class="icon" style="width:70px;height:70px; ">
                @else
                    <i class="icon fa-solid fa-user"></i>
                @endif

                <a href="OptionTeamAktifKlikUiUx" style="text-decoration: none">
                    {{ $item->nama_divisi }}<br>
                    {{ $item->mahasiswa_count }} Anggota
                </a>
            </div>
        @endforeach

    </div>

    <div class="bawah">
        <a href="/Option-TeamAktif-SeeAllTeams" style="color: #A4161A">lihat data seluruh siswa...</a>
        <a href="/Option-TeamAktif-pengaturanDivisi" style="color: #A4161A">Pengaturan Divisi...<i
                class="fa-solid fa-gear"></i></a>

    </div>
@endsection
