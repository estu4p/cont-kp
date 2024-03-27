@extends('layouts.masterAfterPay')

@section('content')
<link href="/assets/css//adminunivmitra.css" rel="stylesheet">
<script src="https://kit.fontawesome.com/2632061c04.js" crossorigin="anonymous"></script>


<div class="wadah p-5">
    <h1 class="text-center mb-5 judulmitra">DATA MITRA</h1>


    <div class="container">
        <button type="button" class="btn btn-primary position-relative btn-tambah-mitra">
            <i class="fa-solid fa-circle-plus"></i>
            Tambah Mitra
        </button>

        <div class="input-group mb-3 ml-auto" style="max-width: 300px;">
            <div class="input-group-append">
                </button>
            </div>

            <div class="carimahasiswa">
                <input type="text" id="search-input" class="form-control" placeholder="     Cari Mahasiswa" aria-label="Cari mitra" aria-describedby="basic-addon2">
                <i class="fa-solid fa-search" style="position: absolute; left: 20px; top: 50%; transform: translateY(-50%); color:black"></i>
            </div>
        </div>

        </span>
    </div>

    <body>
        @foreach ($mitra as $data)
        <div class="card wadah">
            <div class="card-header">
                MITRA
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" aria-expanded="false">
                        <i class="fa-solid fa-ellipsis-vertical klik" data-toggle="modal" data-target="#exampleModal"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="#">Opsi 1</a></li>
                        <li><a class="dropdown-item" href="#">Opsi 2</a></li>
                        <li><a class="dropdown-item" href="#">Opsi 3</a></li>
                    </ul>
                </div>
            </div>
            {{-- dari BE, pake flex mas jangan pake margin left :) --}}
            <div class="card-body flex justify-content-between">
                <div>
                    <h5>{{ $data->nama_mitra }}</h5>
                </div>
                <div>
                    <p>{{ $data->mahasiswa_count }} Orang</p>
                </div>
            </div>
        </div>
        @endforeach




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
            //     document.addEventListener('click', function(event) {
            //     const tampilElement = document.querySelector('.tampil');
            //     const cardElement = document.querySelector('.wadah');

            //     // Periksa apakah klik terjadi di luar area elemen '.tampil'
            //     if (!tampilElement.contains(event.target) && !cardElement.contains(event.target)) {
            //       tampilElement.style.display = "none";
            //     }
            //   });
            document.addEventListener("DOMContentLoaded", function() {
        const dropdownToggle = document.querySelector(".dropdown-toggle");
        const dropdownMenu = document.querySelector(".dropdown-menu");

        dropdownToggle.addEventListener("click", function() {
            dropdownMenu.classList.toggle("show");
        });

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