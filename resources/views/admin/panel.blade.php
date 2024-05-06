@extends('layouts.masterAfterPay')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/quote.css') }}">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="kiri-putih p-3 ">
    <div class="h4 judul-kiri">Pengaturan</div>
    <div class="nav">
        <div class="">PENGATURAN UTAMA</div>
        <div class="quote">
            <ul>
                <li><a href="/AdminUniv/setting/quote">Quote</a></li>
            </ul>
        </div>
    </div>
    <div class="hr">
        <hr>
    </div>
    <div class="navv">
        <div class="">PANEL ADMINISTRATOR</div>
        <div class="quote p-1" style="background-color:  #f9caca; font-weight: bold;  border-radius: 10px; ">
            <ul>
                <li><a href="/AdminUniv/setting/panel">User & Organizations</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container-fluid gap-0 p-0 wadah">

    <div class="kanan-tabel p-5  w-100 ">
        <div class="h5">User & Organization</div>
        <p>Informasi tentang user guru atau dosen pembimbing dan mitra</p>

        <button type="button" class="bt-add" data-bs-toggle="modal" data-bs-target="#exampleModal">Add User</button>
        <div class="tab">
            <div class="grup ">
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link navlink active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Guru</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link navlink" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Mitra</button>
                    </li>
                </ul>
            </div>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                    <div class="wadahdata mb-3">
                        <div class="d-flex align-items-center gap-4 rounded">
                            <div class="container d-flex align-items-center gap-4 mb-4">
                                <img src="{{ asset('assets/images/userAfter.png') }}" width="80" height="80" alt="">
                                <div class="flex-grow-1">
                                    <p class="fw-semibold mb-1">usernameguru1</p>
                                    <p class="mb-1">Name: Guru1</p>
                                    <div class="d-flex flex-wrap">Privilege:
                                        <div class="indukpri d-flex justify-content-start gap-1">
                                            <div class="wadahpri">Manage Kategori Penilainan</div>
                                            <div class="wadahpri">Lihat Penilaian</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ms-auto">
                                    <button class="btn btn-primary">edit</button>
                                    <button class="btn btn-danger">hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wadahdata mb-3">
                        <div class="d-flex align-items-center gap-4 rounded">
                            <div class="container d-flex align-items-center gap-4 mb-4">
                            <img src="{{ asset('assets/images/userAfter.png') }}" width="80" height="80" alt="">
                            <div class="flex-grow-1">
                                <p class="fw-semibold mb-1">usernameguru1</p>
                                <p class="mb-1">Name: Guru1</p>
                                <div class="d-flex flex-wrap">Privilege:
                                    <div class="indukpri d-flex justify-content-start gap-1">
                                        <div class="wadahpri">Manage Kategori Penilainan</div>
                                        <div class="wadahpri">Lihat Penilaian</div>
                                    </div>
                                </div>
                            </div>
                            <div class="ms-auto">
                                <button class="btn btn-primary">edit</button>
                                <button class="btn btn-danger">hapus</button>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="wadahdata mb-3">
                        <div class="d-flex align-items-center gap-4 rounded">
                            <div class="container d-flex align-items-center gap-4 mb-4">
                            <img src="{{ asset('assets/images/userAfter.png') }}" width="80" height="80" alt="">
                            <div class="flex-grow-1">
                                <p class="fw-semibold mb-1">usernameguru1</p>
                                <p class="mb-1">Name: Guru1</p>
                                <div class="d-flex flex-wrap">Privilege:
                                    <div class="indukpri d-flex justify-content-start gap-1">
                                        <div class="wadahpri">Manage Kategori Penilainan</div>
                                        <div class="wadahpri">Lihat Penilaian</div>
                                    </div>
                                </div>
                            </div>
                            <div class="ms-auto">
                                <button class="btn btn-primary">edit</button>
                                <button class="btn btn-danger">hapus</button>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="wadahdata mb-3">
                        <div class="d-flex align-items-center gap-4 rounded">
                            <div class="container d-flex align-items-center gap-4 mb-4">
                            <img src="{{ asset('assets/images/userAfter.png') }}" width="80" height="80" alt="">
                            <div class="flex-grow-1">
                                <p class="fw-semibold mb-1">usernameguru1</p>
                                <p class="mb-1">Name: Guru1</p>
                                <div class="d-flex flex-wrap">Privilege:
                                    <div class="indukpri d-flex justify-content-start gap-1">
                                        <div class="wadahpri">Manage Kategori Penilainan</div>
                                        <div class="wadahpri">Lihat Penilaian</div>
                                    </div>
                                </div>
                            </div>
                            <div class="ms-auto">
                                <button class="btn btn-primary">edit</button>
                                <button class="btn btn-danger">hapus</button>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="wadahdata mb-3">
                        <div class="d-flex align-items-center gap-4 rounded">
                            <div class="container d-flex align-items-center gap-4 mb-4">
                            <img src="{{ asset('assets/images/userAfter.png') }}" width="80" height="80" alt="">
                            <div class="flex-grow-1">
                                <p class="fw-semibold mb-1">usernameguru1</p>
                                <p class="mb-1">Name: Guru1</p>
                                <div class="d-flex flex-wrap">Privilege:
                                    <div class="indukpri d-flex justify-content-start gap-1">
                                        <div class="wadahpri">Manage Kategori Penilainan</div>
                                        <div class="wadahpri">Lihat Penilaian</div>
                                    </div>
                                </div>
                            </div>
                            <div class="ms-auto">
                                <button class="btn btn-primary">edit</button>
                                <button class="btn btn-danger">hapus</button>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="wadahdata mb-3">
                        <div class="d-flex align-items-center gap-4 rounded">
                            <div class="container d-flex align-items-center gap-4 mb-4">
                            <img src="{{ asset('assets/images/userAfter.png') }}" width="80" height="80" alt="">
                            <div class="flex-grow-1">
                                <p class="fw-semibold mb-1">usernameguru1</p>
                                <p class="mb-1">Name: Guru1</p>
                                <div class="d-flex flex-wrap">Privilege:
                                    <div class="indukpri d-flex justify-content-start gap-1">
                                        <div class="wadahpri">Manage Kategori Penilainan</div>
                                        <div class="wadahpri">Lihat Penilaian</div>
                                    </div>
                                </div>
                            </div>
                            <div class="ms-auto">
                                <button class="btn btn-primary">edit</button>
                                <button class="btn btn-danger">hapus</button>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                    <div class="wadahdata mb-3">
                        <div class="d-flex align-items-center gap-4 rounded">
                            <div class="container d-flex align-items-center gap-4 mb-4">
                                <img src="{{ asset('assets/images/userAfter.png') }}" width="80" height="80" alt="">
                                <div class="flex-grow-1">
                                    <p class="fw-semibold mb-1">usernamemitra</p>
                                    <p class="mb-1">Name: mentor1</p>
                                    <div class="d-flex flex-wrap">Privilege:
                                        <div class="indukpri d-flex justify-content-start gap-1">
                                            <div class="wadahpri">Input Nilai</div>
                                            <div class="wadahpri">Accept/Reject Log Activity</div>
                                            <div class="wadahpri">Manage Divisi</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ms-auto">
                                    <button class="btn btn-primary">edit</button>
                                    <button class="btn btn-danger">hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wadahdata mb-3">
                        <div class="d-flex align-items-center gap-4 rounded">
                            <div class="container d-flex align-items-center gap-4 mb-4">
                                <img src="{{ asset('assets/images/userAfter.png') }}" width="80" height="80" alt="">
                                <div class="flex-grow-1">
                                    <p class="fw-semibold mb-1">usernamemitra</p>
                                    <p class="mb-1">Name: mentor1</p>
                                    <div class="d-flex flex-wrap">Privilege:
                                        <div class="indukpri d-flex justify-content-start gap-1">
                                            <div class="wadahpri">Input Nilai</div>
                                            <div class="wadahpri">Accept/Reject Log Activity</div>
                                            <div class="wadahpri">Manage Divisi</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ms-auto">
                                    <button class="btn btn-primary">edit</button>
                                    <button class="btn btn-danger">hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wadahdata mb-3">
                        <div class="d-flex align-items-center gap-4 rounded">
                            <div class="container d-flex align-items-center gap-4 mb-4">
                                <img src="{{ asset('assets/images/userAfter.png') }}" width="80" height="80" alt="">
                                <div class="flex-grow-1">
                                    <p class="fw-semibold mb-1">usernamemitra</p>
                                    <p class="mb-1">Name: mentor1</p>
                                    <div class="d-flex flex-wrap">Privilege:
                                        <div class="indukpri d-flex justify-content-start gap-1">
                                            <div class="wadahpri">Input Nilai</div>
                                            <div class="wadahpri">Accept/Reject Log Activity</div>
                                            <div class="wadahpri">Manage Divisi</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ms-auto">
                                    <button class="btn btn-primary">edit</button>
                                    <button class="btn btn-danger">hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wadahdata mb-3">
                        <div class="d-flex align-items-center gap-4 rounded">
                            <div class="container d-flex align-items-center gap-4 mb-4">
                                <img src="{{ asset('assets/images/userAfter.png') }}" width="80" height="80" alt="">
                                <div class="flex-grow-1">
                                    <p class="fw-semibold mb-1">usernamemitra</p>
                                    <p class="mb-1">Name: mentor1</p>
                                    <div class="d-flex flex-wrap">Privilege:
                                        <div class="indukpri d-flex justify-content-start gap-1">
                                            <div class="wadahpri">Input Nilai</div>
                                            <div class="wadahpri">Accept/Reject Log Activity</div>
                                            <div class="wadahpri">Manage Divisi</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ms-auto">
                                    <button class="btn btn-primary">edit</button>
                                    <button class="btn btn-danger">hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wadahdata mb-3">
                        <div class="d-flex align-items-center gap-4 rounded">
                            <div class="container d-flex align-items-center gap-4 mb-4">
                                <img src="{{ asset('assets/images/userAfter.png') }}" width="80" height="80" alt="">
                                <div class="flex-grow-1">
                                    <p class="fw-semibold mb-1">usernamemitra</p>
                                    <p class="mb-1">Name: mentor1</p>
                                    <div class="d-flex flex-wrap">Privilege:
                                        <div class="indukpri d-flex justify-content-start gap-1">
                                            <div class="wadahpri">Input Nilai</div>
                                            <div class="wadahpri">Accept/Reject Log Activity</div>
                                            <div class="wadahpri">Manage Divisi</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ms-auto">
                                    <button class="btn btn-primary">edit</button>
                                    <button class="btn btn-danger">hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wadahdata mb-3">
                        <div class="d-flex align-items-center gap-4 rounded">
                            <div class="container d-flex align-items-center gap-4 mb-4">
                                <img src="{{ asset('assets/images/userAfter.png') }}" width="80" height="80" alt="">
                                <div class="flex-grow-1">
                                    <p class="fw-semibold mb-1">usernamemitra</p>
                                    <p class="mb-1">Name: mentor1</p>
                                    <div class="d-flex flex-wrap">Privilege:
                                        <div class="indukpri d-flex justify-content-start gap-1">
                                            <div class="wadahpri">Input Nilai</div>
                                            <div class="wadahpri">Accept/Reject Log Activity</div>
                                            <div class="wadahpri">Manage Divisi</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ms-auto">
                                    <button class="btn btn-primary">edit</button>
                                    <button class="btn btn-danger">hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wadahdata mb-3">
                        <div class="d-flex align-items-center gap-4 rounded">
                            <div class="container d-flex align-items-center gap-4 mb-4">
                                <img src="{{ asset('assets/images/userAfter.png') }}" width="80" height="80" alt="">
                                <div class="flex-grow-1">
                                    <p class="fw-semibold mb-1">usernamemitra</p>
                                    <p class="mb-1">Name: mentor1</p>
                                    <div class="d-flex flex-wrap">Privilege:
                                        <div class="indukpri d-flex justify-content-start gap-1">
                                            <div class="wadahpri">Input Nilai</div>
                                            <div class="wadahpri">Accept/Reject Log Activity</div>
                                            <div class="wadahpri">Manage Divisi</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ms-auto">
                                    <button class="btn btn-primary">edit</button>
                                    <button class="btn btn-danger">hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wadahdata mb-3">
                        <div class="d-flex align-items-center gap-4 rounded">
                            <div class="container d-flex align-items-center gap-4 mb-4">
                                <img src="{{ asset('assets/images/userAfter.png') }}" width="80" height="80" alt="">
                                <div class="flex-grow-1">
                                    <p class="fw-semibold mb-1">usernamemitra</p>
                                    <p class="mb-1">Name: mentor1</p>
                                    <div class="d-flex flex-wrap">Privilege:
                                        <div class="indukpri d-flex justify-content-start gap-1">
                                            <div class="wadahpri">Input Nilai</div>
                                            <div class="wadahpri">Accept/Reject Log Activity</div>
                                            <div class="wadahpri">Manage Divisi</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ms-auto">
                                    <button class="btn btn-primary">edit</button>
                                    <button class="btn btn-danger">hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection