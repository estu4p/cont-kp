@extends('layouts.masterMitra')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/contributorformitra/devisi.css') }}">
    <div class="topcontent">
        <div>
            <p style="font-size: 24px"><u>Aktif</u></p>
        </div>
        <div>
            <div class="input">
                <form action="{{ route('mitra.divisi') }}" method="GET">
                    <i class="fa-solid fa-magnifying-glass" style="padding-left: 10px"></i>
                    <input type="text" name="query" class="inputsearch" placeholder="cari team/project">
                    <button type="submit" hidden></button>
                </form>
            </div>
        </div>
    </div>
    <div class="isi row row-cols-3">
        @if ($divisi->isEmpty())
            <div class="col" style="display: flex">
                <p>Tidak ada mitra yang tersedia saat ini.</p>
            </div>
        @else
            @foreach ($divisi as $item)
                <div class="col" style="display: flex">
                    <i class="icon">
                        <img src="{{ asset('foto_divisi/' . $item->divisi->foto_divisi) }}" alt="" width="45px">
                    </i>


                    <a href="{{ route('mitra.divisiTeam', $item->id) }}" style="text-decoration: none">
                        {{ $item->divisi->nama_divisi }}<br>
                        Anggota
                    </a>
                    {{--
                    <a href="{{ route('mitra.divisiTeam', $item->divisi_id) }}" style="text-decoration: none">
                        {{ $item->divisi->nama_divisi }}<br>
                        Anggota
                    </a> --}}
                </div>
            @endforeach
        @endif

    </div>
    <div class="isi">
        <a href="{{ route('mitra.allteams', $user->id) }}" style="color: #A4161A">See all teams...
        </a>
    </div>
@endsection
