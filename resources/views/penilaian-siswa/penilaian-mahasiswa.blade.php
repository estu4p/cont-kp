@extends('layouts.masterMitra')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/jumlah-mahasiswa.css') }}">

<div class="wadah p-5">
<form action="" method="GET">
    <i class="fa-solid fa-magnifying-glass"></i>
    <input type="text" placeholder="cari nama mahasiswa"/>
</form>
<h1 class=" w-100 text-center judul" >Penilaian Mahasiswa</h1>
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
                    <th></th>
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
                        <div class="{{ ($mhs['status']) }}">{{ $mhs['status'] }}</div>
                    </td>
                    <td class="icon"><a href="/input-nilai"> <i class="fa-solid fa-file-lines"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection
