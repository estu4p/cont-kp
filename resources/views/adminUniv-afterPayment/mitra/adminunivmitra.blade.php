@extends('layouts.masterAfterPay')

@section('content')
    <link href="/assets/css//adminunivmitra.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/2632061c04.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <div class="wadah p-5">
        <h1 class="text-center mb-5 judulmitra"><b>DATA MITRA</b></h1>
        <div class="container">
            <button type="button" class=" position-relative btn-tambah-mitra" data-bs-toggle="modal"
                data-bs-target="#tambahMitraModal">
                <i class="bi bi-plus-circle" style="font-size: 1rem; padding-right: 5px; "></i>
                Tambah Mitra
            </button>

            <div class="input-group mb-3 ml-auto" style="max-width: 300px;">
                <div class="input-group-append">
                    </button>
                </div>

                <div class="carimahasiswa">
                    <form action="{{ route('adminUniv.mitra') }}">
                        <i class="fa-solid fa-search"
                            style="position: absolute; left: 20px; top: 50%; transform: translateY(-50%); color:black"></i>

                        <input type="text" name="cari" class="inputsearch" placeholder="Cari Mitra" style="padding-left: 40px">
                        <button type="submit" hidden></button>

                        <button type="submit" hidden></button>
                    </form>
                </div>
            </div>

            </span>
        </div>

        <body>
            @if ($mitra->isEmpty())
                <div class="text-center">Tidak ada mitra</div>
            @else
                @foreach ($mitra as $data)
                    <div class="card wadah">
                        <div class="card-header">
                            MITRA
                            <div class="dropdown">
                                <button class=" dropdown-toggle" type="button" id="dropdownMenuButton"
                                    aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical klik" data-toggle="modal"
                                        data-target="#exampleModal"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item" href="#">Data Presensi Siswa/Mahasiswa</a></li>
                                    <li><a class="dropdown-item" href="{{ route('adminUniv.Divisi', $data->id) }}">Data
                                            Divisi
                                            siswa/Mahasiswa</a></li>
                                    <li><a class="dropdown-item" href="/AdminUniv-mitra-laporanpresensi">Laporan Presensi
                                            Siswa/Mahasiswa</a></li>
                                    <li>
                                        <form action="{{ route('hapusMitra', $data->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item">Hapus Mitra</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body flex justify-content-between">
                            <div>
                                <h6>{{ $data->nama_mitra }}</h6>
                            </div>
                            <div>
                                <p>{{ $data->mahasiswa_count }} Orang</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

            <!-- Modal -->
            <div class="modal fade" id="tambahMitraModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <form action="{{ route('tambahMitra') }}" method="POST">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <label for="">Photo Profil</label> <br>
                                <input type="file" name="foto_profil"> <br>

                                <label for="">Nama mitra</label> <br>
                                <input type="text" name="nama_lengkap" id=""> <br>

                                <label for="">Username</label> <br>
                                <input type="text" name="username"> <br>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                @if (session('error'))
                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                @endif

                                <label for="">Email address</label> <br>
                                <input type="email" name="email"> <br>

                                <label for="">No hp</label> <br>
                                <input type="text" name="no_hp"> <br>

                                <label for="">password</label> <br>
                                <input type="password" name="password"> <br>

                                <label for=""> konfirmasi password</label> <br>
                                <input type="password" name="password_confirmation"> <br>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>




            <script>
                document.querySelector('.klik').addEventListener('click', function(event) {
                    document.querySelector('.tampil').style.display = "inline-block";
                    event.stopPropagation();
                });

                document.addEventListener('click', function(event) {
                    var tampilElement = document.querySelector('.tampil');
                    if (!tampilElement.contains(event.target)) {
                        tampilElement.style.display = "none";
                    }
                });

                document.addEventListener("DOMContentLoaded", function() {
                    const dropdownToggle = document.querySelectorAll(".dropdown-toggle");
                    const dropdownMenu = document.querySelector(".dropdown-menu");

                    for (let i = 0; i < dropdownToggle.length; i++) {
                        dropdownToggle[i].addEventListener("click", function() {
                            this.nextElementSibling.classList.toggle("show");


                        });

                    }

                    document.addEventListener("click", function(event) {
                        if (!dropdownToggle.contains(event.target) && !dropdownMenu.contains(event.target)) {
                            dropdownMenu.classList.remove("show");
                        }
                    });
                });
            </script>
        </body>

        </html>
    @endsection
