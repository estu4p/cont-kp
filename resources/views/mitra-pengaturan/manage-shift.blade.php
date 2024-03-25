@extends('layouts.masterMitra')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/manage-devisi.css') }}">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Modal</title>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Q8i/X+965R3a7ePfVcP1KtH6o5f80tEPso2db+Wt/lq3S1gqPk9CJ5o4lI5G0Bnx" crossorigin="anonymous">
<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-JcKb8q3z7RH6w4zL7f7FL6nGekd9v/tdTKO/m2+jOMaxXaC0P0Jpam5PMvzR6pF5" crossorigin="anonymous"></script>
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



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
            <label class="form-check-label col-6 " style="white-space: nowrap;" for="flexSwitchCheckDefault">Ganti Jam</label>
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
                                    <button class="btn btn-edit btn-sm" data-bs-target="#editModal" data-bs-toggle="modal" onclick="editModal(0)" type="button">Edit</button>
                                    <button class="btn btn-danger btn-sm" data-bs-target="#hapusModal" data-bs-toggle="modal" onclick="deleteDivisi(0)" type="button">Hapus</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Shift Pagi</td>
                                <td>06:30:00 - 13:00:00</td>
                                <td>-</td>
                                <td>
                                    <button class="btn btn-edit btn-sm" data-bs-target="#editModal" data-bs-toggle="modal" onclick="editModal(1)" type="button">Edit</button>
                                    <button class="btn btn-danger btn-sm" data-bs-target="#hapusModal" data-bs-toggle="modal" onclick="deleteDivisi(1)" type="button">Hapus</button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Shift Middle</td>
                                <td>09:00:00 - 17:00:00</td>
                                <td>12:00:00 - 13:00:00</td>
                                <td>
                                    <button class="btn btn-edit btn-sm" data-bs-target="#editModal" data-bs-toggle="modal" onclick="editModal(2)" type="button">Edit</button>
                                    <button class="btn btn-danger btn-sm" data-bs-target="#hapusModal" data-bs-toggle="modal" onclick="deleteDivisi(2)" type="button">Hapus</button>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Shift Siang</td>
                                <td>13:00:00 - 21:00:00</td>
                                <td>18:00:00 - 19:00:00</td>
                                <td>
                                    <button class="btn btn-edit btn-sm" data-bs-target="#editModal" data-bs-toggle="modal" onclick="editModal(3)" type="button">Edit</button>
                                    <button class="btn btn-danger btn-sm" data-bs-target="#hapusModal" data-bs-toggle="modal" onclick="deleteDivisi(3)" type="button">Hapus</button>
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Shift Malam</td>
                                <td>16:00:00 - 23:00:00</td>
                                <td>-</td>
                                <td>
                                    <button class="btn btn-edit btn-sm" data-bs-target="#editModal" data-bs-toggle="modal" onclick="editModal(4)" type="button">Edit</button>
                                    <button class="btn btn-danger btn-sm" data-bs-target="#hapusModal" data-bs-toggle="modal" onclick="edeleteDivisi(4)" type="button">Hapus</button>
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
                    <input type="text" class="inputmodal" id="editDetail" placeholder="Masukkan nama shift">
                </div>
                <div class="grupinput">
                    <div><label for="jaml" class="labelmodal">Jam</label></div>
                    <input type="text" class="inputmodal" id="editJam" placeholder="07:30:00 - 18:00:00">
                </div>
                <div class="grupinput">
                    <div><label for="Istirahat" class="labelmodal">Istirahat</label></div>
                    <input type="text" class="inputmodal" id="editIstirahat" placeholder="07:30:00 - 18:00:00">
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
                    <input type="text" class="inputmodal inputdetail" placeholder="Masukkan nama shift">
                </div>
                <div class="grupinput">
                    <div><label for="jaml" class="labelmodal">Jam</label></div>
                    <input type="text" class="inputmodal inputjam" placeholder="Masukkan jam masuk - keluar">
                </div>
                <div class="grupinput">
                    <div><label for="Istirahat" class="labelmodal">Istirahat</label></div>
                    <input type="text" class="inputmodal inputistirahat" placeholder="Masukkan jam istirahat">
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
        // Mendapatkan nilai input dari modal
        var detail = document.querySelector('.inputdetail').value;
        var jam = document.querySelector('.inputjam').value;
        var istirahat = document.querySelector('.inputistirahat').value;
        var lastNumber = $("#example tbody tr").length + 1;

        // Membuat baris baru untuk tabel
        var newRow = "<tr>" +
            "<td class = 'ratakanan'>" + (document.querySelectorAll('#example tbody tr').length + 1) + "</td>" + // Nomor dapat disesuaikan dengan jumlah baris yang sudah ada
            "<td>" + detail + "</td>" +
            "<td>" + jam + "</td>" +
            "<td>" + istirahat + "</td>" +
            "<td>" +
            "<button class='btn btn-edit btn-sm' data-bs-target='#editModal' data-bs-toggle='modal' onclick='eeditModal(5)' type='button'>Edit</button>" +
            "<button class='btn btn-danger btn-sm tomboll' data-bs-target='#hapusModal' data-bs-toggle='modal' onclick='edeleteDivisi(5)' type='button'>Hapus</button>" +
            "</td>" +
            "</tr>";

        // Menambahkan baris baru ke tabel
        $("#example tbody").append(newRow);

        // Tampilkan notifikasi sukses
        swal({
            title: "Berhasil !",
            icon: "success",
            text: "Perubahan berhasil disimpan",
            timer: 2000, // Pesan akan ditutup otomatis setelah 3 detik
            buttons: false // Sembunyikan tombol "OK"
        });
    }


    // Variabel global untuk menyimpan indeks divisi yang akan diedit
    let editedIndex = null;

    // Fungsi untuk menampilkan modal edit dengan data divisi yang dipilih
    function editModal(index) {
        // Simpan indeks shift yang akan diedit
        editedIndex = index;

        // Dapatkan data shift dari tabel
        const row = document.querySelectorAll('#example tbody tr')[index];
        const detail = row.querySelectorAll('td')[1].innerText;
        const jam = row.querySelectorAll('td')[2].innerText;
        const istirahat = row.querySelectorAll('td')[3].innerText;

        // Isi input modal dengan data shift yang dipilih
        document.getElementById('editDetail').value = detail;
        document.getElementById('editJam').value = jam;
        document.getElementById('editIstirahat').value = istirahat;

        // Tampilkan modal edit
        $('#editModal').modal('show');
    }


    function showedit() {
        // Dapatkan nilai input dari modal
        const editedDetail = document.getElementById('editDetail').value;
        const editedJam = document.getElementById('editJam').value;
        const editedIstirahat = document.getElementById('editIstirahat').value;

        // Perbarui data shift pada tabel dengan nilai yang diedit
        const row = document.querySelectorAll('#example tbody tr')[editedIndex];
        row.querySelectorAll('td')[1].innerText = editedDetail;
        row.querySelectorAll('td')[2].innerText = editedJam;
        row.querySelectorAll('td')[3].innerText = editedIstirahat;

        // Tampilkan notifikasi sukses
        swal({
            title: "Berhasil !",
            icon: "success",
            text: "Perubahan berhasil disimpan",
            timer: 3000, // Pesan akan ditutup otomatis setelah 3 detik
            buttons: false // Sembunyikan tombol "OK"
        });
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

    function deleteDivisi(index) {
        // Tampilkan modal konfirmasi penghapusan
        swal({
            title: "Hapus",
            text: "Apakah Anda ingin menghapus divisi ini?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                // Hapus baris divisi dari tabel
                document.querySelector('#example tbody').deleteRow(index);

                // Tampilkan pesan sukses
                swal("Berhasil!", "Divisi berhasil dihapus.", {
                    icon: "success",
                    timer: 1500,
                    buttons: false
                });
            } else {
                // Tampilkan pesan bahwa data aman
                swal("Data Anda aman.");
            }
        });
    }
</script>



@endsection