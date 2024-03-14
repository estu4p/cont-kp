@extends('layouts.masterAfterPay')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/AdminUniv-Dashboard.css') }}">
<div class="wadah">
    <div class="dashboard">
        <div class="kartu1">
            <h2 class="kartu-judul">Jumlah Mitra</h2>
            <tr>
                <th>300</th>
                <img src="assets/images/apartment.png" alt="Logo1" class="logo1">
            </tr>
        </div>
        <div class="kartu2">
            <h2 class="kartu-judul">Jumlah Siswa</h2>
            <tr>
                <td>200</td>
                <img src="assets/images/school.png" alt="Logo1" class="logo1">
            </tr>
        </div>
    </div>
    <button class="buku">
        <i class="fa-solid fa-book-bookmark"></i>
        <a href="#">
            Buku Panduan Menggunakan Website
        </a>
    </button>
</div>

@endsection