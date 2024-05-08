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
                    <div class="wadahdata mb-3 rounded">
                        <div class="d-flex align-items-center gap-4 rounded-1">
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
                                    <button class="btn btn-primary edit-guru" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>
                                    <button class="btn btn-danger hapus-guru" onclick="hapus()">Hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wadahdata mb-3 rounded">
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
                                    <button class="btn btn-primary edit-guru" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>
                                    <button class="btn btn-danger hapus-guru" onclick="hapus()">Hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wadahdata mb-3 rounded">
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
                                    <button class="btn btn-primary edit-guru" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>
                                    <button class="btn btn-danger hapus-guru" onclick="hapus()">Hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wadahdata mb-3 rounded">
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
                                    <button class="btn btn-primary edit-guru" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>
                                    <button class="btn btn-danger hapus-guru" onclick="hapus()">Hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wadahdata mb-3 rounded">
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
                                    <button class="btn btn-primary edit-guru" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>
                                    <button class="btn btn-danger hapus-guru" onclick="hapus()">Hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wadahdata mb-3 rounded">
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
                                    <button class="btn btn-primary edit-guru" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>
                                    <button class="btn btn-danger hapus-guru" onclick="hapus()">Hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                    <div class="wadahdata mb-3 rounded">
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
                                    <button class="btn btn-primary edit-mitra" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>
                                    <button class="btn btn-danger hapus-mitra" onclick="hapus()">Hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wadahdata mb-3 rounded">
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
                                    <button class="btn btn-primary edit-mitra" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>
                                    <button class="btn btn-danger hapus-mitra" onclick="hapus()">Hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wadahdata mb-3 rounded">
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
                                    <button class="btn btn-primary edit-mitra" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>
                                    <button class="btn btn-danger hapus-mitra" onclick="hapus()">Hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wadahdata mb-3 rounded">
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
                                    <button class="btn btn-primary edit-mitra" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>
                                    <button class="btn btn-danger hapus-mitra" onclick="hapus()">Hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wadahdata mb-3 rounded">
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
                                    <button class="btn btn-primary edit-mitra" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>
                                    <button class="btn btn-danger hapus-mitra" onclick="hapus()">Hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wadahdata mb-3 rounded">
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
                                    <button class="btn btn-primary edit-mitra" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>
                                    <button class="btn btn-danger hapus-mitra" onclick="hapus()">Hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wadahdata mb-3 rounded">
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
                                    <button class="btn btn-primary edit-mitra" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>
                                    <button class="btn btn-danger hapus-mitra" onclick="hapus()">Hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wadahdata mb-3 rounded">
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
                                    <button class="btn btn-primary edit-mitra" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>
                                    <button class="btn btn-danger hapus-mitra" onclick="hapus()">Hapus</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>



    <!-- modal edit -->
    <div class="modal fade"  id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userModalLabel">Edit Guru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="text-capitalize">
                        <div style="border: 0.5px solid #00000030; padding: 12px; text-transform: capitalize;">
                            <h6>profile photo</h6>
                            <div class="d-flex gap-4">
                                <img id="previewImage" src="{{ asset('assets/images/userAfter.png') }}" width="80" class="mt-2" alt="Preview Image">
                                <div class="my-auto d-flex flex-column" style="flex-direction: row;">
                                    <label for="photoInput" style="border: 2px solid #A4161A; border-radius: 6px; background-color: white; color: #000000; font-size: 12px; font-weight: 600; padding: 8px 12px; text-transform: capitalize;">
                                        Add Photo
                                        <input type="file" id="photoInput" accept="image/*" style="display:none;">
                                    </label>
                                    <button style="border: 0; color: red; background-color: transparent; text-transform: capitalize;" onclick="removePhoto()">Remove</button>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3 d-flex flex-column">
                            <label for="nama" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">nama</label>
                            <input type="text" name="nama" placeholder="Guru" class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;" id="">
                        </div>
                        <div class="mt-3 d-flex flex-column">
                            <label for="username" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">username</label>
                            <input type="text" name="username" placeholder="Pembimbing" class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;" id="">
                        </div>
                        <div class="mt-3 d-flex flex-column">
                            <label for="email" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">email
                                address</label>
                            <input type="email" name="email" placeholder="guru123@gmail.com" class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;" id="">
                        </div>
                        <div class="mt-3 d-flex flex-column">
                            <label for="hp" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">No
                                HP</label>
                            <input type="number" name="hp" placeholder="08328732777" class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;" id="">
                        </div>
                        <div class="d-flex gap-4">
                            <div class="mt-3 d-flex flex-column w-50">
                                <label for="password" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">password</label>
                                <input type="password" name="password" placeholder="Masukkan Password" class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;" id="">
                            </div>
                            <div class="mt-3 d-flex flex-column w-50">
                                <label for="konfirm" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">ulangi
                                    password</label>
                                <input type="password" name="konfirm" placeholder="Ulangi Password" class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;" id="">
                            </div>
                        </div>
                        <div class="mt-3 d-flex flex-column">
                            <label for="mahasiswa" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">
                                pilih mahasiswa</label>
                            <div class="d-flex">
                                <button id="pilihMetode" class="py-2 border-0 border-bottom" style="background-color: #F2F4F8; width: 100%;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="border: 2px solid #E9E9E9; padding: 15px; border-radius: 0px 8px 8px 0px; width: 100%;">
                                    Pilih Mahasiswa<i class="fa-solid fa-caret-down" style="padding-left: 70%;"></i>
                                </button>
                            </div>

                            <div class="collapse" id="collapseExample">
                                <div class="px-3 py-2 mt-2 border-0 border-bottom" style="background-color: #F2F4F8; width: 100%;">
                                    <div class="d-flex" style="width: 100%;">
                                        <p class="text-capitalize">available users</p>
                                        <button class="border-0 bg-transparent" style="margin-left: 70%; margin-top: -20px; right: 0;" onclick="toggleCollapse()">
                                            <i class="fa-solid fa-caret-up"></i>
                                        </button>
                                    </div>
                                    <div>
                                        <input type="text" name="search" id="search" placeholder="Cari berdasarkan NIM" class="px-2 py-1 border-0 border-bottom rounded mb-2" style="background-color: #ffffff; border: 0.5px solid #0000003f; font-size: 12px;">
                                        <table class="table table-bordered text-center" style="width: 100%; font-size: 12px;">
                                            <thead>
                                                <td><input type="checkbox" id="checkAll"></td>
                                                <td>NIM</td>
                                                <td>Nama</td>
                                                <td>Prodi</td>
                                                <td><button class="border-0 bg-transparent" style="opacity: 0; pointer-event: none;"></button></td>
                                            </thead>
                                            <tbody id="tableBody">
                                            </tbody>
                                        </table>

                                        <p class="text-capitalize my-2">selected users</p>
                                        <table class="table table-bordered text-center" style="width: 100%; font-size: 12px;">
                                            <thead>
                                                <tr>
                                                    <td>NIM</td>
                                                    <td>Nama</td>
                                                    <td>Prodi</td>
                                                    <td><button class="border-0 bg-transparent" style="opacity: 0; pointer-event: none;"></button></td>
                                                </tr>
                                            </thead>
                                            <tbody id="selectedDataBody" class="table-danger">
                                            </tbody>
                                        </table>
                                    </div>
                                    <div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button onclick="alert()" type="button" style="background-color: #A4161A; border: 0; border-radius: 8px; color: white; padding: 6px 10px;">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <script>
        function hapus() {
            swal({
                    title: "Apakah Anda yakin ingin menghapus?",
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: "warning",
                    buttons: ["Batal", "Hapus"],
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        // Menghapus elemen yang berisi quote
                        // Misalnya jika quote berada dalam elemen dengan class "hapus"
                        document.querySelector('.wadahdata').remove();

                        swal("Data berhasil dihapus!", {
                            icon: "success",
                        });
                    } else {
                        swal("Data tidak jadi dihapus.");
                    }
                });
        }
    </script>
    @endsection