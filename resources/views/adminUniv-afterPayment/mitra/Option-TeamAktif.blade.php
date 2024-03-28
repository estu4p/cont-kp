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
    <div class="col" style="display: flex">
        <i class="icon fa-solid fa-pen-nib"></i><a href="OptionTeamAktifKlikUiUx">UI/UX Designer<br>
            20 Anggota</a>
    </div>
    <div class="col" style="display: flex">
        <i class="icon fa-solid fa-bag-shopping"></i>Marketing & Sales<br>
        20 Anggota
    </div>
    <div class="col" style="display: flex">
        <i class="icon fa-regular fa-thumbs-up"></i>Social Media Specialist<br>
        20 Anggota
    </div>
    <div class="col" style="display: flex">
        <img src="assets/images/arrow-separate.png" class="icon" style="width:70px;height:70px; "></i> Programmer<br>
        20 Anggota
    </div>
    <div class="col" style="display: flex">
        <i class="icon fa-regular fa-handshake"></i>Marcom/Public Relation<br>
        20 Anggota
    </div>
    <div class="col" style="display: flex">
        <img src="assets/images/emojione-monotone_selfie.png" class="icon" style="width:70px;height:70px; ">Tiktok Creator<br>
        20 Anggota
    </div>
    <div class="col" style="display: flex">
        <i class="icon fa-solid fa-palette"></i>Desain Grafis<br>
        20 Anggota
    </div>
    <div class="col" style="display: flex">
        <i class="icon fa-regular fa-pen-to-square"></i>content writer<br>
        20 Anggota
    </div>
    <div class="col" style="display: flex">
        <img src="assets/images/presenter.png" class="icon" style="width:70px;height:70px; ">Host/Presenter<br>
        20 Anggota
    </div>
    <div class="col" style="display: flex">
        <i class="icon fa-solid fa-camera"></i>Fotografer<br>
        20 Anggota
    </div>
    <div class="col" style="display: flex">
        <i class="icon fa-solid fa-calendar-days"></i>Content Planner<br>
        20 Anggota
    </div>
    <div class="col" style="display: flex">
        <i class="icon fa-solid fa-microphone"></i>Voice Over Talent<br>
        20 Anggota
    </div>
    <div class="col" style="display: flex">
        <i class="icon fa-solid fa-video"></i>Videografer<br>
        20 Anggota
    </div>
    <div class="col" style="display: flex">
        <i class="icon fa-solid fa-business-time"></i>Administrasi<br>
        20 Anggota
    </div>
    <div class="col" style="display: flex">
        <img src="assets/images/las.png" class="icon" style="width:70px;height:70px; ">las<br>
        20 Anggota
    </div>

    <div class="col" style="display: flex">
        <i class="icon fa-solid fa-bullhorn"></i>digital marketing<br>
        20 Anggota
    </div>
    <div class="col" style="display: flex">
        <img src="assets/images/bokmar.png" class="icon" style="width:70px;height:70px; ">Project Manager<br>
        20 Anggota
    </div>
    <div class="col" style="display: flex">
        <i class="icon fa-solid fa-bullhorn"></i>digital marketing<br>
        20 Anggota
    </div>
    <div class="col" style="display: flex">
        <img src="assets/images/healthicons.png" class="icon" style="width:70px;height:70px; ">Human Resource<br>
        20 Anggota
    </div>
    <div class="col" style="display: flex">
        <img src="assets/images/list-search-line.png" class="icon" style="width:70px;height:70px; ">Research & Development<br>
        20 Anggota
    </div>



    <div>
    </div>
</div>
<div class="bawah">
    <a href="/Option-TeamAktif-SeeAllTeams" style="color: #A4161A">lihat data seluruh siswa...</a>
    <a href="/Option-TeamAktif-pengaturanDivisi" style="color: #A4161A">Pengaturan Divisi...<i class="fa-solid fa-gear"></i></a>

</div>
@endsection