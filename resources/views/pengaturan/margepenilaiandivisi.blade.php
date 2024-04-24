@extends('layouts.master')

@section('content')
<link rel="stylesheet" href="assets/css/margepenilaiandivisi.css">
<div class="kiri-putih p-5">
    <div class="card-header">
        <h3 class="card-title">Pengaturan</h3>
    </div>
    <a class="nav-link" style="font-size: 14px; width:max-content;">PENGATURAN UTAMA</a>
    <li class="nav-item manageP">
        <a class=>Manage penilaian</a>
    </li>
</div>
<div class="container-fluid d-flex flex-row justify-content-start gap-0 p-0 wadah ">

    <div class="kanan-tabel p-5 w-100 justify-content-start">
        <div>
            <h3 class="manage">Manage Penilaian Divisi</h3>
            <p class="membuat">Membuat Kategori Penilaian Per Divisi</p>
        </div>
        <br>
        <div>
            <select name="page" class="page">
                <option value="page">page 1 of 1</option>
            </select>
            <select name="item" class="item">
                <option value="item">5 item per page</option>
            </select>
        </div>
        <br>
        <div class="table">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" style="text-align:center">No</th>
                        <th scope="col">Nama Kategori</th>
                        <th scope="col">Penilaian</th>
                    </tr>
                </thead>
                <tbody style="overflow: scroll">
                    <tr>
                        <td class="tengah">1</td>
                        <td>Ui/Ux</td>
                        <td class="actions">
                            <a href="{{ url('kategoripenilaian') }}" class="btn btn-primary btn-sm">Edit</a>
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#konfirmasi">Hapus</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="tengah">2</td>
                        <td>Programmer</td>
                        <td class="actions">
                            <a href="{{ url('kategoripenilaian') }}" class="btn btn-primary btn-sm">Edit</a>
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#konfirmasi">Hapus</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="tengah">3</td>
                        <td>Digital Marketing</td>
                        <td class="actions">
                            <a href="{{ url('kategoripenilaian') }}" class="btn btn-primary btn-sm">Edit</a>
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#konfirmasi">Hapus</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="tengah">4</td>
                        <td>Content Creator</td>
                        <td class="actions">
                            <a href="{{ url('kategoripenilaian') }}" class="btn btn-primary btn-sm">Edit</a>
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#konfirmasi">Hapus</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="tengah">5</td>
                        <td>Editor Vidio</td>
                        <td class="actions">
                            <a href="{{ url('kategoripenilaian') }}" class="btn btn-primary btn-sm">Edit</a>
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#konfirmasi">Hapus</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="tengah">6</td>
                        <td>Desain Grafis</td>
                        <td class="actions">
                            <a href="{{ url('kategoripenilaian') }}" class="btn btn-primary btn-sm">Edit</a>
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#konfirmasi">Hapus</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="tengah">7</td>
                        <td>Content Writer</td>
                        <td class="actions">
                            <a href="{{ url('kategoripenilaian') }}" class="btn btn-primary btn-sm">Edit</a>
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#konfirmasi">Hapus</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="tengah">8</td>
                        <td>Content Planner</td>
                        <td class="actions">
                            <a href="{{ url('kategoripenilaian') }}" class="btn btn-primary btn-sm">Edit</a>
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#konfirmasi">Hapus</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="tengah">9</td>
                        <td>Administrasi</td>
                        <td class="actions">
                            <a href="{{ url('kategoripenilaian') }}" class="btn btn-primary btn-sm">Edit</a>
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#konfirmasi">Hapus</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <nav aria-label="Page ">
            <ul class="paging pagination">
                <li class="page-item "><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item disabled"><a class="page-link" href="#">...</a></li>
                <li class="page-item"><a class="page-link" href="#">10</a></li>
            </ul>
        </nav>



    </div>


    <!-- ModalkonfirmasiDihapus -->
    <div class="modal fade" id="konfirmasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                                <button type="submit" class="btn btn-light" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#sukseshapus" onclick="deleteData()">Ya</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
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
    </script>

    </script>
    @endsection