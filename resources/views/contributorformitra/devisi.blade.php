@extends('layouts.masterMitra')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/contributorformitra/devisi.css') }}">
<div class="topcontent">
    <div>
        <p style="font-size: 24px" ><u>Aktif</u></p>
    </div>
    <div>
        <div class="input">
        <i class="fa-solid fa-magnifying-glass" style="padding-left: 10px"></i>
        <input type="search" class="inputsearch" placeholder="cari team/project">
        </div>
    </div>
</div>
    <div class="isi row row-cols-3">
        <div class="col" style="display: flex" >
            <i class="icon fa-solid fa-pen-nib"></i><a href="/contributorformitra-devisi-teamaktif"> UI/UX Designer<br>
            20 Anggota</a>
        </div>
        <div class="col" style="display: flex" >
            <i class="icon fa-solid fa-bag-shopping"></i>Marketing & Sales<br>
            20 Anggota
        </div>
        <div class="col" style="display: flex" >
            <i class="icon fa-regular fa-thumbs-up"></i>Social Media Specialist<br>
            20 Anggota
        </div>
       <div class="col" style="display: flex" >
            <img src="assets/images/programmer.png" class="icon" style="width:70px;height:70px; "></i> Programmer<br>
            20 Anggota
        </div>
        <div class="col" style="display: flex" >
            <i class="icon fa-regular fa-handshake"></i>Marcom/Public Relation<br>
            20 Anggota
        </div>
       <div class="col" style="display: flex" >
        <img src="assets/images/kontenkreator.png" class="icon" style="width:70px;height:70px; ">Tiktok Creator<br>
            20 Anggota
        </div>
        <div class="col" style="display: flex" >
            <i class="icon fa-solid fa-palette"></i>Desain Grafis<br>
                20 Anggota
        </div>
        <div class="col" style="display: flex" >
            <i class="icon fa-regular fa-pen-to-square"></i>content writer<br>
                20 Anggota
        </div>
        <div class="col" style="display: flex" >
            <img src="assets/images/presenter.png" class="icon" style="width:70px;height:70px; ">Host/Presenter<br>
                20 Anggota
        </div>
        <div class="col" style="display: flex" >
            <i class="icon fa-solid fa-camera"></i>Fotografer<br>
                20 Anggota
        </div>
        <div class="col" style="display: flex" >
            <i class="icon fa-solid fa-calendar-days"></i>Content Planner<br>
                20 Anggota
        </div>
        <div class="col" style="display: flex" >
            <i class="icon fa-solid fa-microphone"></i>Voice Over Talent<br>
            20 Anggota
        </div>
        <div class="col" style="display: flex" >
            <i class="icon fa-solid fa-video"></i>Videografer<br>
                20 Anggota
        </div>
        <div class="col" style="display: flex" >
            <i class="icon fa-solid fa-business-time"></i>Administrasi<br>
            20 Anggota
        </div>
        <div class="col" style="display: flex" >
            <img src="assets/images/las.png" class="icon" style="width:70px;height:70px; ">las<br>
            20 Anggota
        </div>
        <div class="col" style="display: flex" >
            <i class="icon fa-solid fa-bullhorn"></i>digital marketing<br>
            20 Anggota
        </div>
        <div class="col" style="display: flex" >
            <i class="icon fa-solid fa-bullhorn"></i>digital marketing<br>
            20 Anggota
        </div>
        <div class="col" style="display: flex" >
            <img src="assets/images/bookmark.png" class="icon" style="width:70px;height:70px; ">Project Manager<br>
            20 Anggota
        </div>
        <div class="col" style="display: flex" >
            <img src="assets/images/hr.png" class="icon" style="width:70px;height:70px; ">Human Resource<br>
            20 Anggota
        </div>
        <div class="col" style="display: flex" >
            <img src="assets/images/research.png" class="icon" style="width:70px;height:70px; ">Research & Development<br>
            20 Anggota
        </div>
        <div>
        </div>
        <a href="/contributorformitra-devisi-Seeallteams" style="color: #A4161A">See all teams...</a>

    </div>






@endsection
