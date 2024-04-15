@extends('layouts.masterAfterPay')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/AdminUniv-Dashboard.css') }}">
<div class="wadah flex-md-column ">
    <div class="dashboard gap-5  p-5 d-flex  flex-lg-row flex-md-column flex-sm-column ">
        <div class="kartu1 m-lg-0 m-md-auto m-sm-auto my-md-3">
            <h2 class="kartu-judul">Jumlah Mitra</h2>
            <tr>
                <th>{{ $jml_mitra }}</th>
                <td><img src="assets/images/apartment.png" alt="Logo1" class="logo1"></td>
            </tr>
        </div>
        <div class="kartu2 m-lg-0 m-md-auto m-sm-auto my-md-3">
            <h2 class="kartu-judul">Jumlah Siswa</h2>
            <tr>
                <td>{{ $jml_siswa }}</td>
               <td> <img src="assets/images/school.png" alt="Logo1" class="logo1"></td>
            </tr>
        </div>
    </div>
    <button class="buku">
        <i class="fa-solid fa-book-bookmark"></i>
        <a href="#">Buku Panduan Menggunakan Website</a>
    </button>
</div>
@endsection