@extends('layouts.masterMitra')

@section('content')
<link rel="stylesheet" href="{{ asset('/assets/css/manage-devisi.css') }}">

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
            <h3 class="manage">Manage Shift</h3>
            <p class="membuat">Membuat Shift untuk anak magang</p>
        </div>

        <div class="btn-jam">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" >
                <label class="form-check-label" for="flexSwitchCheckDefault">Ganti Jam</label>
            </div>
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
                                <th scope="col">Detail</th>
                                <th scope="col">Jam</th>
                                <th scope="col">Istirahat</th>
                                <th scope="col">aksi</th>


                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>1</td>
                                <td>Shift Full Time</td>
                                <td>07:30:00 - 18:00:00</td>
                                <td>13:30:00 - 15:00:00</td>
                                <td>
                                    <a class="btn btn-edit btn-sm" href="#">Edit</a>
                                    <button class="btn btn-danger btn-sm" data-bs-target="#exampleModal" data-bs-toggle="modal" onclick="openConfirmationModal()" type="button">Hapus</button>

                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Shift Pagi</td>
                                <td>06:30:00 - 13:00:00</td>
                                <td>-</td>
                                <td>
                                    <a class="btn btn-edit btn-sm" href="#">Edit</a>
                                    <button class="btn btn-danger btn-sm" data-bs-target="#exampleModal" data-bs-toggle="modal" onclick="openConfirmationModal()" type="button">Hapus</button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Shift Middle</td>
                                <td>09:00:00 - 17:00:00</td>
                                <td>12:00:00 - 13:00:00</td>
                                <td>
                                    <a class="btn btn-edit btn-sm" href="#">Edit</a>
                                    <button class="btn btn-danger btn-sm" data-bs-target="#exampleModal" data-bs-toggle="modal" onclick="openConfirmationModal()" type="button">Hapus</button>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Shift Siang</td>
                                <td>13:00:00 - 21:00:00</td>
                                <td>18:00:00 - 19:00:00</td>
                                <td>
                                    <a class="btn btn-edit btn-sm" href="#">Edit</a>
                                    <button class="btn btn-danger btn-sm" data-bs-target="#exampleModal" data-bs-toggle="modal" onclick="openConfirmationModal()" type="button">Hapus</button>
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Shift Malam</td>
                                <td>16:00:00 - 23:00:00</td>
                                <td>-</td>
                                <td>
                                    <a class="btn btn-edit btn-sm" href="#">Edit</a>
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




@endsection