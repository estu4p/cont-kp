@extends('layouts.master')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/jumlah-mahasiswa.css') }}">
<form action="" method="GET">
<!-- <i class="fa-solid fa-magnifying-glass"></i> -->
    <!-- <input type="text" placeholder="cari nama mahasiswa"/> -->
</form>
<div class="wadah p-5">
    <h1 style="margin-top: 10px;">Data Mahasiswa</h1>
    <!-- <select name="page" class="page">
        <option value="page">page 1 of 1</option>
    </select>
    <select name="item" class="item">
        <option value="item">5 item per page</option>
    </select>  -->
    <div class="wadah-tabel w-100 p-0">
        <table class="" id="example">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIP</th>
                <th>Divisi</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $key => $mhs)
            <tr class="{{ $key % 2 == 0 ? 'abu' : 'putih' }}">
                <td>{{ $key + 1 }}</td>
                <td>{{ $mhs->nama_lengkap }}</td>
                <td>{{ $mhs->nomor_induk }}</td>
                <td>{{ $mhs->divisi_id }}</td>
                <td>
                    <div class="{{ strtolower($mhs->status_akun) }}">{{ $mhs->status_akun }}</div>
                </td>
                <td><a href="{{route('detail-profil-siswa', $mhs->id)}}"> <i class="fa-solid fa-circle-info icon"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>

</div>
@endsection
