@extends('layouts.master')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/jumlah-mahasiswa.css') }}">
<form action="" method="GET">
    <i class="fa-solid fa-magnifying-glass"></i>
    <input type="text" placeholder="cari nama mahasiswa" />
</form>
<div class="wadah p-5">
    <h1 style="margin-top: 10px;  text-align: center;">Data Mahasiswa</h1>
    <select name="page" class="page">
        <option value="page">page 1 of 1</option>
    </select>
    <select name="item" class="item">
        <option value="item">5 item per page</option>
    </select>
    <div class="wadah-tabel w-100 p-0">
        <table class="" id="example">
            <thead>
            <tr>
                    <th style="text-align: center;">No</th>
                    <th>Nama</th>
                    <th >NIP</th>
                    <th style="text-align: center;">Divisi</th>
                    <th style="text-align: center;">Status</th>
                    <th style="text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mahasiswa as $key => $mhs)
                <tr class="{{$key % 2 == 0 ? 'abu' : 'putih'}}">
                    <td style="text-align: center;">{{$key + 1}}</td>
                    <td>{{$mhs->nama_lengkap}}</td>
                    <td>{{$mhs->nomor_induk}}</td>
                    <td style="text-align: center;">{{$mhs->divisi->nama_divisi}}</td>
                    <td class="center">
                        <div class="{{($mhs['status_akun'])}}">{{$mhs->status_akun == 'alumni' ? 'inactive' : $mhs->status_akun}}</div>
                    </td>
                    <td style="text-align: center;">
                        <a href="{{ route('detail-profil-siswa', ['id' => $mhs->id])}}">
                            <i class="fa-solid fa-circle-info icon"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>

    </div>
</div>
@endsection