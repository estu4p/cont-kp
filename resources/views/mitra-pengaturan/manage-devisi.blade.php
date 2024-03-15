@extends('layouts.masterMitra')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/manage-devisi.css') }}">

<div class="container-fluid  d-flex flex-row justify-content-start gap-0 p-0 wadah">
    <div class="kiri-putih p-5 ">
        <div class="card-header">
            <h3 class="card-title">Pengaturan</h3>

        </div>
        <a class="nav-link" style="font-size: 14px; width:max-content;" href="/manage-devisi">Manage Divisi</a>
        <a class="nav-link" style="font-size: 14px; width:max-content;" href="/manage-shift">Manage Shift</a>
    </div>
    <div class="kanan-tabel p-4  w-100 justify-content-start">
        <div>
            <h3 class="manage">Manage Divisi</h3>
            <p class="membuat">Membuat Divisi untuk anak magang</p>
        </div>
        <button class="tambah"><i class="fa-solid fa-circle-plus"></i> Tambah devisi</button>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <form action="#">
                            <div class="form-group">
                                <label for="nama_divisi"></label>
                        </form>
                    </div>
                    <!-- <select name="page" class="page">
                        <option value="page">page 1 of 1</option>
                    </select>
                    <select name="item" class="item">
                        <option value="item">5 item per page</option>
                    </select> -->
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="example">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Divisi</th>
                                <th scope="col">Penilaian</th>
                                <th scope="col">Aksi</th>

                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>1</td>
                                <td>Ui/Ux</td>
                                <td><a href="/Kategori-penilaian"><i class="fa-regular fa-file-lines ic"></i></a></td>
                                <td>
                                    <a class="btn btn-edit btn-sm" href="/kategoripenilaian">Edit</a>
                                    <button class="btn btn-danger btn-sm" data-bs-target="#exampleModal" data-bs-toggle="modal" onclick="openConfirmationModal()" type="button">Hapus</button>

                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Programmer</td>
                                <td><a href="/Kategori-penilaian"><i class="fa-regular fa-file-lines ic"></i></a></td>
                                <td>
                                    <a class="btn btn-edit btn-sm" href="/kategoripenilaian">Edit</a>
                                    <button class="btn btn-danger btn-sm" data-bs-target="#exampleModal" data-bs-toggle="modal" onclick="openConfirmationModal()" type="button">Hapus</button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Digital marketing</td>
                                <td><a href="/Kategori-penilaian"><i class="fa-regular fa-file-lines ic"></i></a></td>
                                <td>
                                    <a class="btn btn-edit btn-sm" href="/kategoripenilaian">Edit</a>
                                    <button class="btn btn-danger btn-sm" data-bs-target="#exampleModal" data-bs-toggle="modal" onclick="openConfirmationModal()" type="button">Hapus</button>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Content Creator</td>
                                <td><a href="/Kategori-penilaian"><i class="fa-regular fa-file-lines ic"></i></a></td>
                                <td>
                                    <a class="btn btn-edit btn-sm" href="/kategoripenilaian">Edit</a>
                                    <button class="btn btn-danger btn-sm" data-bs-target="#exampleModal" data-bs-toggle="modal" onclick="openConfirmationModal()" type="button">Hapus</button>
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Editor Vidio</td>
                                <td><a href="/Kategori-penilaian"><i class="fa-regular fa-file-lines ic"></i></a></td>
                                <td>
                                    <a class="btn btn-edit btn-sm" href="/kategoripenilaian">Edit</a>
                                    <button class="btn btn-danger btn-sm" data-bs-target="#exampleModal" data-bs-toggle="modal" onclick="openConfirmationModal()" type="button">Hapus</button>
                                </td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Desain Grafis</td>
                                <td><a href="/Kategori-penilaian"><i class="fa-regular fa-file-lines ic"></i></a></td>
                                <td>
                                    <a class="btn btn-edit btn-sm" href="/kategoripenilaian">Edit</a>
                                    <button class="btn btn-danger btn-sm" data-bs-target="#exampleModal" data-bs-toggle="modal" onclick="openConfirmationModal()" type="button">Hapus</button>
                                </td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>Content Writer</td>
                                <td><a href="/Kategori-penilaian"><i class="fa-regular fa-file-lines ic"></i></a></td>
                                <td>
                                    <a class="btn btn-edit btn-sm" href="/kategoripenilaian">Edit</a>
                                    <button class="btn btn-danger btn-sm" data-bs-target="#exampleModal" data-bs-toggle="modal" onclick="openConfirmationModal()" type="button">Hapus</button>
                                </td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>Content Planner</td>
                                <td><a href="/Kategori-penilaian"><i class="fa-regular fa-file-lines ic"></i></a></td>
                                <td>
                                    <a class="btn btn-edit btn-sm" href="/kategoripenilaian">Edit</a>
                                    <button class="btn btn-danger btn-sm" data-bs-target="#exampleModal" data-bs-toggle="modal" onclick="openConfirmationModal()" type="button">Hapus</button>
                                </td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>Administrasi</td>
                                <td><a href="/Kategori-penilaian"><i class="fa-regular fa-file-lines ic"></i></a></td>
                                <td>
                                    <a class="btn btn-edit btn-sm" href="/kategoripenilaian">Edit</a>
                                    <button class="btn btn-danger btn-sm" data-bs-target="#exampleModal" data-bs-toggle="modal" onclick="openConfirmationModal()" type="button">Hapus</button>


                                </td>

                            </tr>

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
</div>

<!-- Modal -->
<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-frame-2">
        <div class="modal-content modal-frame-3">
            <div class="modal-body modal-frame-4 text-center">
                <p class="fs-5" style="color: #EFAF18"></p>
                <h3 class="card-title">Hapus</h3>
                <span class="mt-1 mb-3" style="color: black">Apakah anda yakin ingin menghapus</span>
                <br>
                <button type="button" class="btn mt-4 mb-5" style="background-color: red; color: white; padding: 7px 35px;" onclick="cancelDelete()">Batal</button>
                <button type="button" class="btn mt-4 mb-5" style="background-color: white; color: black; padding: 7px 35px; margin-left:30px" data-bs-dismiss="modal">Ya</button>
            </div>
        </div>
    </div>
</div>

<script>
    function openConfirmationModal() {
        var myModal = new bootstrap.Modal(document.getElementById('konfirmasiBackdrop'));
        myModal.show();
    }

    function cancelDelete() {
        var myModal = new bootstrap.Modal(document.getElementById('konfirmasiBackdrop'));
        myModal.hide();
    }
</script>


@endsection