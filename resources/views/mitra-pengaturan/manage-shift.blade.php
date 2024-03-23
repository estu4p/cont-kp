@extends('layouts.masterMitra')

@section('content')
<link rel="stylesheet" href="{{ asset('/assets/css/manage-devisi.css') }}">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="kiri-putih p-5 ">
    <div class="card-header">
        <h3 class="card-title">Pengaturan</h3>

    </div>
    <a class="nav-link" style="font-size: 14px; width:max-content;" href="/manage-devisi">Manage Divisi</a>
    <a class="nav-link" style="font-size: 14px; width:max-content;" href="/manage-shift">Manage Shift</a>

</div>
<div class="container-fluid  d-flex flex-row justify-content-start gap-0 p-0 wadah">

    <div class="kanan-tabel p-5 border w-100 justify-content-start ">
        <div class="">
            <h3 class="manage">Manage Shift</h3>
            <p class="membuat">Membuat Shift untuk anak magang</p>
        </div>

        <div class="btn-jam px-0 d-flex align-items-center  justify-content-between row my-2 mx-0">
             <label class="form-check-label col-6 " style="white-space: nowrap;"
             for="flexSwitchCheckDefault">Ganti Jam</label>
            <div class="form-check justify-content-center d-flex text-center align-items-center col-6 form-switch swic "> 
               
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">

            </div>
        </div>
        <button type="button" class="tambah bg my-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="fa-solid fa-circle-plus"></i>
            Tambah Shift
        </button>
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
                                    <button class="btn btn-edit btn-sm" data-bs-target="#editModal" data-bs-toggle="modal" onclick="editModal()" type="button">Edit</button>
                                    <button class="btn btn-danger btn-sm" data-bs-target="#hapusModal" data-bs-toggle="modal" onclick="hapusModal()" type="button">Hapus</button>


                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Shift Pagi</td>
                                <td>06:30:00 - 13:00:00</td>
                                <td>-</td>
                                <td>
                                    <button class="btn btn-edit btn-sm" data-bs-target="#editModal" data-bs-toggle="modal" onclick="editModal()" type="button">Edit</button>
                                    <button class="btn btn-danger btn-sm" data-bs-target="#hapusModal" data-bs-toggle="modal" onclick="hapusModal()" type="button">Hapus</button>

                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Shift Middle</td>
                                <td>09:00:00 - 17:00:00</td>
                                <td>12:00:00 - 13:00:00</td>
                                <td>
                                    <button class="btn btn-edit btn-sm" data-bs-target="#editModal" data-bs-toggle="modal" onclick="editModal()" type="button">Edit</button>
                                    <button class="btn btn-danger btn-sm" data-bs-target="#hapusModal" data-bs-toggle="modal" onclick="hapusModal()" type="button">Hapus</button>

                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Shift Siang</td>
                                <td>13:00:00 - 21:00:00</td>
                                <td>18:00:00 - 19:00:00</td>
                                <td>
                                    <button class="btn btn-edit btn-sm" data-bs-target="#editModal" data-bs-toggle="modal" onclick="editModal()" type="button">Edit</button>
                                    <button class="btn btn-danger btn-sm" data-bs-target="#hapusModal" data-bs-toggle="modal" onclick="hapusModal()" type="button">Hapus</button>

                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Shift Malam</td>
                                <td>16:00:00 - 23:00:00</td>
                                <td>-</td>
                                <td>
                                    <button class="btn btn-edit btn-sm" data-bs-target="#editModal" data-bs-toggle="modal" onclick="editModal()" type="button">Edit</button>
                                    <button class="btn btn-danger btn-sm" data-bs-target="#hapusModal" data-bs-toggle="modal" onclick="hapusModal()" type="button">Hapus</button>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Modal edit shif -->
<div class="modal fade modal-sm" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 judulmodal" id="exampleModalLabel">Edit Shift</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="grupinpu">
                    <div><label for="detail" class="labelmodal">Detail</label></div>
                    <input type="text" class="inputmodal" placeholder="Shift Full Time">
                </div>
                <div class="grupinput">
                    <div><label for="jaml" class="labelmodal">Jam</label></div>
                    <input type="text" class="inputmodal" placeholder="07:30:00 - 18:00:00">
                </div>
                <div class="grupinput">
                    <div><label for="Istirahat" class="labelmodal">Istirahat</label></div>
                    <input type="text" class="inputmodal" placeholder="07:30:00 - 18:00:00">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Batal</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close" onclick="showedit()">Simpan</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal tambah shif -->

<div class="modal fade modal-sm" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 judulmodal" id="exampleModalLabel">Tambah Shift</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="grupinpu">
                    <div><label for="detail" class="labelmodal">Detail</label></div>
                    <input type="text" class="inputmodal" placeholder="Masukkan nama shift">
                </div>
                <div class="grupinput">
                    <div><label for="jaml" class="labelmodal">Jam</label></div>
                    <input type="text" class="inputmodal" placeholder="Masukkan jam masuk - keluar">
                </div>
                <div class="grupinput">
                    <div><label for="Istirahat" class="labelmodal">Istirahat</label></div>
                    <input type="text" class="inputmodal" placeholder="Masukkan jam istirahat">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Batal</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close" onclick="sowsukses()">Simpan</button>
            </div>
        </div>
    </div>
</div>
<script>
    function sowsukses() {
        swal({
            title: "Berhasil !",
            icon: "success",
            text: "Perubahan berhasil disimpan",
            timer: 3000, // Pesan akan ditutup otomatis setelah 3 detik
            buttons: false // Sembunyikan tombol "OK"
        });

        // Setelah 3 detik, halaman akan direfresh
        setTimeout(function() {
            location.reload();
        }, 2000);
    }


    function showedit() {
        swal({
            title: "Berhasil !",
            icon: "success",
            text: "Perubahan berhasil disimpan",
            timer: 3000, // Pesan akan ditutup otomatis setelah 3 detik
            buttons: false // Sembunyikan tombol "OK"
        });

        // Setelah 3 detik, halaman akan direfresh
        setTimeout(function() {
            location.reload();
        }, 2000);
    }

    function hapusModal() {
        swal({
                title: "Hapus",
                text: "Apakah Anda ingin menghapus?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("Hapus", "Data berhasil dihapus", {
                        icon: "success",
                        buttons: false,
                    });

                    // Setelah 3 detik, halaman akan direfresh
                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                } else {
                    swal("Data Anda aman !");
                }
            });
    }
</script>



@endsection