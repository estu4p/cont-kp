@extends('layouts.master')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
<div class="wadah  p-5">
<h1 >SELAMAT DATANG</h1>
<h2 >DI PANEL CONTRIBUTOR</h2>
<p class="pantau">Pantau Mahasiswa/Siswa/i Anda Disini</p>

<div class="card-group  gap-5 p-5 row d-flex flex-row justify-content-around">
    <div class="card lengkung p-0 col-5">
        <div class="card-header d-flex align-items-center justify-content-between p-3 atas">
            <div class="img-container gambargroup my-2 mx-2">
                <img src="/assets/images/groups.png" alt=>
            </div>
            <div class="d-flex  flex-column  h-100 mx-2">
                <h5 class="card-title m-0 d-flex justify-content-end fs-6">Jumlah Mahasiswa</h5>
                <p class="jumlah-mahasiswa m-0  d-flex justify-content-end my-3">50</p>
            </div>
        </div>
        
        <div class="card-body d-flex justify-content-between bawah">
            <p>View Detail</p>
            <a href="/jumlah-mahasiswa" ><i class="fa-solid fa-circle-arrow-right icon"></i></a>
        </div>
    </div>

    <div class="card lengkung lengkung2 p-0 col-5">
        <div class="card-header card-header d-flex align-items-center justify-content-between p-3 atas ">
            <div class=" h-100 mx-2">
                <h5 class="card-title  m-0">Masuk</h5>
                <p class="masuk my-3 m-0">35</p>
            </div>
            <div class=" h-100 mx-5">
                <h5 class="card-title  m-0">Izin</h5>
                <p class="izin  my-3 m-0">15</p>
            </div>
        </div>
        <div class="card-body d-flex justify-content-between bawah">
            <p>View Detail</p>
            <a href="{{ route('presensiharian') }}"><i class="fa-solid fa-circle-arrow-right icon"></i></a>
            <a href="#" ><i class="fa-solid fa-circle-arrow-right icon"></i></a>
        </div>
    </div>
</div>
</div>

@endsection
