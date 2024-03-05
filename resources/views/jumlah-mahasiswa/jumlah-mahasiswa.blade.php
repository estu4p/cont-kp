@extends('layouts.master')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/jumlah-mahasiswa.css') }}">
<form action="" method="GET">
<i class="fa-solid fa-magnifying-glass"></i>
    <input type="text" placeholder="cari nama mahasiswa"/>
</form>
<div class="wadah p-5">
    <h1 style="margin-top: 10px;">Data Mahasiswa</h1>
    <select name="page" class="page">
        <option value="page">page 1 of 1</option>
    </select>
    <select name="item" class="item">
        <option value="item">5 item per page</option>
    </select> 
    <div class="wadah-tabel w-100 p-0">
        <table class="">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIP</th>
                <th>Divisi</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mahasiswa as $key => $mhs)
            <tr class="{{ $key % 2 == 0 ? 'abu' : 'putih' }}">
                <td>{{ $key + 1 }}</td>
                <td>{{ $mhs['nama'] }}</td>
                <td>{{ $mhs['nip'] }}</td>
                <td>{{ $mhs['divisi'] }}</td>
                <td>
                    <div class="{{ strtolower($mhs['status']) }}">{{ $mhs['status'] }}</div>
                </td>
                <td><i class="fa-solid fa-circle-info icon"></i></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    
</div>
@endsection