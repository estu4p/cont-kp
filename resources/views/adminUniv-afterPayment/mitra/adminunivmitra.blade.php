@extends('layouts.masterAfterPay')

@section('content')
    <link href="/assets/css//adminunivmitra.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/2632061c04.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <div class="wadah p-5">
        <h1 class="text-center mb-5 judulmitra">DATA MITRA</h1>
        <div class="container">
            <button type="button" class="position-relative btn-tambah-mitra" data-bs-toggle="modal"
                data-bs-target="#tambahMitraModal">
                <i class="bi bi-plus-circle" style="font-size: 1rem; padding-right: 5px;"></i>
                Tambah Mitra
            </button>

            <div class="input-group mb-3 ml-auto" style="max-width: 300px;">
                <div class="input-group-append">
                    <!-- Not sure what should be here, removed the closing tag -->
                </div>

                <div class="carimahasiswa">
                    <form action="{{ route('adminUniv.mitra') }}">
                        <i class="fa-solid fa-search" style="position: absolute; left: 20px; top: 50%; transform: translateY(-50%); color:black"></i>
                        <input type="text" name="cari" class="inputsearch" placeholder="Cari Mitra" style="padding-left: 40px">
                        <button type="submit" hidden></button>
                    </form>
                </div>
            </div>
        </div>

        @if ($mitra->isEmpty())
            <div class="text-center">Tidak ada mitra</div>
        @else
            @foreach ($mitra as $data)
                <div class="card wadah">
                    <div class="card-header">
                        MITRA
                        <div class="dropdown">
                            <button class="dropdown-toggle" type="button" id="dropdownMenuButton" aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical klik" data-toggle="modal" data-target="#exampleModal"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="#">Data Presensi Siswa/Mahasiswa</a></li>
                                <li><a class="dropdown-item" href="{{ route('adminUniv.Divisi', $data->id) }}">Data Divisi siswa/Mahasiswa</a></li>
                                <li><a class="dropdown-item" href="/AdminUniv-mitra-laporanpresensi">Laporan Presensi Siswa/Mahasiswa</a></li>
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
                    <div class="card-body d-flex justify-content-between">
                        <div>
                            <p style="font-size: 14px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $data->nama_mitra }}</p>
                        </div>
                        <div>
                            <p style="font-size: 11px">{{ $data->mahasiswa_count }} Orang</p>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

        <!-- Modal -->
    
<div class="modal fade" id="tambahMitraModal" tabindex="-1" aria-labelledby="tambahMitraModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahMitraModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Isi formulir tambah mitra di sini -->
                <form>
                    <div style="border: 0.5px solid #00000030; padding: 12px; text-transform: capitalize;">
                    <h6>profile photo</h6>
                   <div class="d-flex gap-4">
                        <img id="previewImage" src="{{ asset('assets/images/User Thumb.png') }}" width="80" height="80"
                            class="mt-2 img-fluid object-fit-contain foto-profil" alt="Preview Image">
                        <div class="my-auto d-flex flex-column" style="flex-direction: row;">
                            <label for="photoInput"
                                style="border: 2px solid #A4161A; border-radius: 6px; background-color: white; color: #000000; font-size: 12px; font-weight: 600; padding: 8px 12px; text-transform: capitalize;">
                                Add Photo
                                <input type="file" name="foto_profil" id="photoInput" accept="image/*" style="display:none;">
                            </label>
                            <button
                                id="buttonDeleteFoto" type="button"
                                style="border: 0; color: red; background-color: transparent; text-transform: capitalize;"
                                onclick="removePhoto()">Remove</button>
                        </div>
                    </div>
                </div>
                <div class="mt-3 d-flex flex-column">
                    <label for="nama"
                        style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">nama</label>
                    <input type="text" name="nama_lengkap" placeholder="Nama"
                        class="px-3 py-2 border-0 border-bottom" style="background-color: #f7f9fc;"
                        id="nama_lengkap">
                </div>
                <div class="mt-3 d-flex flex-column">
                    <label for="username"
                        style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">username</label>
                    <input type="text" name="username" placeholder="Username" required
                        class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;"
                        id="username">
                </div>
                <div class="mt-3 d-flex flex-column">
                    <label for="email" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">email
                        address</label>
                    <input type="email" name="email" placeholder="E-Mail"
                        class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;"
                        id="email">
                </div>
                <div class="mt-3 d-flex flex-column">
                    <label for="hp" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">No
                        HP</label>
                    <input type="text" name="no_hp" placeholder="08328732777"
                        class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;"
                        id="no_hp">
                </div>
                <div class="d-flex gap-4">
                    <div class="mt-3 d-flex flex-column w-50">
                        <label for="password"
                            style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">password</label>
                        <input type="password" name="password" placeholder="Masukkan Password" required
                            class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;"
                            id="password">
                    </div>
                    <div class="mt-3 d-flex flex-column w-50">
                        <label for="password_confirmation" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">ulangi
                            password</label>
                        <input type="password" name="password_confirmation" placeholder="Ulangi Password" required
                            class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;"
                            id="password_confirmation">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit"
                        style="background-color: #A4161A; border: 0; border-radius: 8px; color: white; padding: 6px 10px;">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
    </div>
</div>
</div>
<div class="input-group mb-3 ml-auto" style="max-width: 300px;">
    <div class="input-group-append">
        <!-- <button class="btn btn-outline-secondary" type="button">Button</button> -->
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

                function showSuccessModal() {
            event.preventDefault();
            $('#successModal').modal('show');
            setTimeout(function() {
                $('#successModal').modal('hide');
                window.location.href = '/AdminUniv-Dashboard';
            }, 1000);
        }

        const imgInput = document.getElementById('imageInput');
        const previewZone = document.getElementById('previewZone');

        function setDefaultImage() {
            const previewZone = document.getElementById('previewZone');
            previewZone.innerHTML = '<img src="assets/images/atun.png"  class="img-fluid">';
        }

        // Call the setDefaultImage function when the page is loaded
        // Menetapkan gambar default saat dokumen dimuat
        window.addEventListener('DOMContentLoaded', setDefaultImage);

        function setDefaultImage() {
            const defaultImageSrc = 'assets/images/atun.png';

            const previewImage = document.querySelector('.gambarkiri');
            previewImage.src = defaultImageSrc;

            const previewImage2 = document.querySelector('.gambarkanan');
            previewImage2.src = defaultImageSrc;
        }

        function handleImageChange(event) {
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    const previewImage = document.querySelector('.gambarkiri');
                    previewImage.src = e.target.result;

                    const previewImage2 = document.querySelector('.gambarkanan');
                    previewImage2.src = e.target.result;
                };

                reader.readAsDataURL(file);
            }
        }

        const imageInput = document.getElementById('imageInput');
        imageInput.addEventListener('change', handleImageChange);

        const removeButton = document.querySelector('.remove');
        removeButton.addEventListener('click', function() {
            setDefaultImage();
        });


        function redirectToSubscriptionPage() {
            setTimeout(function() {
                window.location.href = 'AdminSistem-Subcription';
            }, 5000);
        }

        document.querySelector('.Update').addEventListener('click', redirectToSubscriptionPage);
    </script>
@endsection


