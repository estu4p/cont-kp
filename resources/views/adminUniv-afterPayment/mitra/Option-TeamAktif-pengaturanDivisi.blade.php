@extends('layouts.masterAfterPay')

@section('content')
<link rel="stylesheet"
    href="{{ asset('assets/css/adminUniv-afterPayment/mitra/Option-TeamAktif-pengaturanDivisi.css') }}">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <div class="container-fluid d-flex flex-row justify-content-start gap-0 p-0 wadah ">

        <div class="kanan-tabel p-5 w-100 justify-content-start">
            <div>
                <h1 class="manage">Pengaturan Divisi</h1>
            </div>
            <button class="btn-tambah" onclick="openDepartmentModal()"><i class="fa-solid fa-circle-plus"></i>Tambah
                Divisi</button>
            <div>
                <select name="page" class="page">
                    <option value="page">page 1 of 1</option>
                </select>
                <select name="item" class="item">
                    <option value="item">5 item per page</option>
                </select>
            </div>
            <div class="card py-0">
                <div class="card-body  py-0 my-0">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="example">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Divisi</th>
                                    <th scope="col">penilaian</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody style="overflow: scroll;">
                                <tr>
                                    <td>1</td>
                                    <td>Ui/Ux Designer</td>
                                    <td>
                                        <a href="/TeamAktif-kategoripenilaian-UiuX">
                                            <i class="fa-regular fa-file-lines"></i>
                                        </a>
                                    </td>

                                    <td>
                                        <button type="button" class="btn btn-edit btn-sm">Edit</button>
                                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#konfirmasi">Hapus</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Programmer</td>
                                    <td><i class="fa-regular fa-file-lines"></i></td>
                                    <td>
                                        <button type="button" class="btn btn-edit btn-sm">Edit</button>
                                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#konfirmasi">Hapus</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Digital Marketing</td>
                                    <td><i class="fa-regular fa-file-lines"></i></td>
                                    <td>
                                        <button type="button" class="btn btn-edit btn-sm">Edit</button>
                                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#konfirmasi">Hapus</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Content Creator</td>
                                    <td><i class="fa-regular fa-file-lines"></i></td>
                                    <td>
                                        <button type="button" class="btn btn-edit btn-sm">Edit</button>
                                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#konfirmasi">Hapus</button>
                                    </td>
                                </tr>


                                <tr>
                                    <td>5</td>
                                    <td>Editor Vidio</td>
                                    <td><i class="fa-regular fa-file-lines"></i></td>
                                    <td>
                                        <button type="button" class="btn btn-edit btn-sm">Edit</button>
                                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#konfirmasi">Hapus</button>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                        <div>


                        </div>
                        <div>

                        </div>
                    </div>
                    <div>

                    </div>
                </div>


            </div>

            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>



    </div>


    <!-- ModalkonfirmasiDihapus -->
    <div class="modal fade" id="konfirmasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-body text-center ">
                        <h5 class="modal-title text-center" id="exampleModalLabel">Berhasil!</h5>
                        <div>

                            <div class="modal-body text-center">
                                <p>Apakah anda ingin menghapus ?</p>

                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>

                                <button type="submit" class="btn btn-light" data-bs-dismiss="modal"
                                    data-bs-toggle="modal" data-bs-target="#sukseshapus"
                                    onclick="deleteData()">Ya</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 judulmodal" id="exampleModalLabel">Tambah Divisi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="textdivisi">Profil Divisi</div>
                    <div class="tambahgambar gap-3">
                        <div class="gambar border d-flex align-items-center justify-content-center">
                            <i class="fa-regular fa-image"></i>
                            <input type="file" id="fileInput" style="display: none;">
                        </div>
                        <div>
                            <button class="addgambar">Add Photo</button>
                        </div>
                        <div>
                            <button class="remove">Remove</button>
                        </div>
                    </div>
                    <div class="grupinputt">
                        <div><label for="namaDivisi" class="NamaDivisi">Nama Divisi</label></div>
                        <input type="text" class="inputmodall" placeholder="Masukkan nama divisi">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal"
                        aria-label="Close">Batal</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close"
                        onclick="sowsukses()">Simpan</button>

                </div>
            </div>
        </div>
    </div>


    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    function sowsukses() {
        swal("Good job!", "You clicked the button!", "success");
    }

    function showConfirmationModal() {
        $('#confirmationModal').modal('show');
    }

    function deleteData() {
        Swal.fire({
            position: "center",
            icon: "success",
            title: "Dara berhasil dihapus",
            showConfirmButton: false,
            timer: 1500
        });
    }



    function cancelData() {
        // Tambahkan logika untuk membatalkan operasi di sini

        // Tutup modal konfirmasi
        $('#confirmationModal').modal('hide');
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Ambil elemen modal
        var modal = document.getElementById('department-modal');

        // Ambil tombol yang membuka modal
        var openModalButton = document.getElementById('open-department-modal');

        // Ambil tombol-tombol di dalam modal
        var cancelButton = document.getElementById('cancel-button');
        var saveButton = document.getElementById('save-button');

        // Fungsi untuk membuka modal
        function openModal() {
            modal.style.display = 'block'; // Tampilkan modal saat tombol ditekan
        }

        // Fungsi untuk menutup modal
        function closeModal() {
            modal.style.display = 'none'; // Sembunyikan modal saat tombol ditekan
        }

        // Event listener untuk membuka modal saat tombol ditekan
        openModalButton.addEventListener('click', openModal);

        // Event listener untuk menutup modal saat tombol "Batal" ditekan
        cancelButton.addEventListener('click', closeModal);

        // Event listener untuk menutup modal saat tombol "Simpan" ditekan
        saveButton.addEventListener('click', function(event) {
            // Lakukan operasi penyimpanan data atau validasi formulir di sini

            // Setelah selesai, tutup modal
            closeModal();
        });

        // Event listener untuk menutup modal saat klik di luar area modal
        window.addEventListener('click', function(event) {
            if (event.target == modal) {
                closeModal();
            }
        });
    });
    // Fungsi untuk menampilkan modal
    function showModal() {
        var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
        myModal.show();
    }

    // Fungsi untuk menampilkan modal konfirmasi keberhasilan
    function sowsukses() {
        var successModal = new bootstrap.Modal(document.getElementById('successModal'));
        successModal.show();
    }

    // Event listener untuk tombol "Add Photo"
    document.querySelector('.addgambar').addEventListener('click', function() {
        document.getElementById('fileInput').click();
    });

    // Event listener untuk input file
    document.getElementById('fileInput').addEventListener('change', function() {
        var file = this.files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
            var imagePreview = document.querySelector('.gambar');
            imagePreview.innerHTML = '<img src="' + e.target.result + '" alt="Preview Gambar">';
        };

        reader.readAsDataURL(file);
    });

    // Event listener untuk tombol "Remove"
    document.querySelector('.remove').addEventListener('click', function() {
        var imagePreview = document.querySelector('.gambar');
        imagePreview.innerHTML =
            '<i class="fa-regular fa-image"></i><input type="file" id="fileInput" style="display: none;">';
    });
    // Fungsi untuk membuka modal departemen
    function openDepartmentModal() {
        var departmentModal = new bootstrap.Modal(document.getElementById('exampleModal'));
        departmentModal.show();
    }

    // Fungsi untuk menangani klik tombol "Simpan"
    function sowsukses() {
        swal("Good job!", "You clicked the button!", "success");
    }
    </script>
    @endsection