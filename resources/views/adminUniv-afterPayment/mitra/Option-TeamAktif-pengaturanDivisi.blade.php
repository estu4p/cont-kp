@extends('layouts.masterAfterPay')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/adminUniv-afterPayment/mitra/Option-TeamAktif-pengaturanDivisi.css') }}">
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

<head>
    <div class="container-fluid  d-flex flex-row justify-content-start gap-0 p-0 wadahh">
        <div class="kanan-tabel p-4  w-100 justify-content-start">
            <div class="atas">
                <div class="ikon">
                    <a href="Option-TeamAktif"><i class="icon fa-solid fa-angle-left" style=" color: #000000;"></i></a>
                </div>
                <div class="judull">
                <h3 class="manage">Pengaturan Divisi</h3>
                </div>
            </div>
            <button type="button" class="tambah" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fa-solid fa-circle-plus"></i>
                Tambah divisi
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
                                    <td class="ratakanan">1</td>
                                    <td>Ui/Ux Designer</td>

                                    <td class="ratakanan"><a href="/TeamAktif-kategoripenilaian-UiuX"><i class="fa-regular fa-file-lines ic"></i></a></td>

                                    <td>
                                        <button class="btn btn-edit btn-sm" data-bs-target="#editModal" data-bs-toggle="modal" onclick="editModal(0)" type="button">Edit</button>
                                        <button class="btn btn-danger btn-sm" data-bs-target="#hapusModal" data-bs-toggle="modal" onclick="deleteDivisi(0)" type="button">Hapus</button>
                                    </td>
                                </tr>
                                <!-- tambahkan baris data yang lain di sini -->
                                <tr>
                                    <td class="ratakanan">2</td>
                                    <td>Programmer</td>

                                    <td class="ratakanan"><a href="#"><i class="fa-regular fa-file-lines ic"></i></a></td>

                                    <td>
                                        <button class="btn btn-edit btn-sm" data-bs-target="#editModal" data-bs-toggle="modal" onclick="editModal(1)" type="button">Edit</button>
                                        <button class="btn btn-danger btn-sm" data-bs-target="#hapusModal" data-bs-toggle="modal" onclick="deleteDivisi(1)" type="button">Hapus</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ratakanan">3</td>
                                    <td>Digital Marketing</td>

                                    <td class="ratakanan"><a href="#"><i class="fa-regular fa-file-lines ic"></i></a></td>

                                    <td>
                                        <button class="btn btn-edit btn-sm" data-bs-target="#editModal" data-bs-toggle="modal" onclick="editModal(2)" type="button">Edit</button>
                                        <button class="btn btn-danger btn-sm" data-bs-target="#hapusModal" data-bs-toggle="modal" onclick="deleteDivisi(2)" type="button">Hapus</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ratakanan">4</td>
                                    <td>Conten Creator</td>

                                    <td class="ratakanan"><a href="#"><i class="fa-regular fa-file-lines ic"></i></a></td>

                                    <td>
                                        <button class="btn btn-edit btn-sm" data-bs-target="#editModal" data-bs-toggle="modal" onclick="editModal(3)" type="button">Edit</button>
                                        <button class="btn btn-danger btn-sm" data-bs-target="#hapusModal" data-bs-toggle="modal" onclick="deleteDivisi(3)" type="button">Hapus</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ratakanan">5</td>
                                    <td>Editor Vidio</td>

                                    <td class="ratakanan"><a href="#"><i class="fa-regular fa-file-lines ic"></i></a></td>

                                    <td>
                                        <button class="btn btn-edit btn-sm" data-bs-target="#editModal" data-bs-toggle="modal" onclick="editModal(4)" type="button">Edit</button>
                                        <button class="btn btn-danger btn-sm" data-bs-target="#hapusModal" data-bs-toggle="modal" onclick="deleteDivisi(4)" type="button">Hapus</button>
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

    <!-- Modal edit divisi -->
    <div class="modal fade " id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 judulmodal" id="exampleModalLabel">Edit Divisi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="textdivisi">Edit Divisi</div>
                    <div class="tambahgambar gap-3">
                        <div class="gambar border d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-pen-nib"></i>
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
                        <div><label for="editNamaDivisi" class="NamaDivisi">Nama Divisi</label></div>
                        <input type="text" class="inputmodalll" id="editNamaDivisi" placeholder="Masukkan nama divisi">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Batal</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close" onclick="updateDivisi()">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal tambah divisi -->
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Batal</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close" onclick="sowsukses()">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Variabel global untuk menyimpan indeks divisi yang akan diedit
        let editedIndex = null;

        // Fungsi untuk menampilkan modal edit dengan data divisi yang dipilih
        function editModal(index) {
            // Simpan indeks divisi yang akan diedit
            editedIndex = index;

            // Dapatkan data divisi dari tabel
            const row = document.querySelectorAll('#example tbody tr')[index];
            const namaDivisi = row.querySelectorAll('td')[1].innerText;

            // Isi input modal dengan data divisi yang dipilih
            document.getElementById('editNamaDivisi').value = namaDivisi;

            // Tampilkan modal edit
            $('#editModal').modal('show');
        }

        // Fungsi untuk menyimpan perubahan pada divisi yang diedit
        function updateDivisi() {
            // Dapatkan nilai input dari modal
            const editedNamaDivisi = document.getElementById('editNamaDivisi').value;

            // Perbarui data divisi pada tabel dengan nilai yang diedit
            const row = document.querySelectorAll('#example tbody tr')[editedIndex];
            row.querySelectorAll('td')[1].innerText = editedNamaDivisi;

            // Tampilkan pesan sukses
            swal({
                title: "Berhasil !",
                icon: "success",
                text: "Perubahan berhasil disimpan",
                timer: 1500,
                buttons: false
            });

            // Tutup modal edit
            $('#editModal').modal('hide');

        }

        // Fungsi untuk menampilkan pesan sukses saat divisi ditambahkan
        function sowsukses() {
            // Dapatkan nilai input dari modal
            var namaDivisi = document.querySelector('.inputmodall').value;

            // Buat elemen HTML untuk baris baru dalam tabel
            var newRow = '<tr>' +
                '<td class = "ratakanan">' + (document.querySelectorAll('#example tbody tr').length + 1) + '</td>' +
                '<td>' + namaDivisi + '</td>' +
                '<td class="ratakanan" ><a href="/Kategori-penilaian"><i class="fa-regular fa-file-lines ic"></i></a></td>' +
                '<td>' +
                '<button class="btn btn-edit btn-sm" data-bs-target="#editModal" data-bs-toggle="modal" onclick="editModal(5)" type="button">Edit</button>' +
                '<button class="btn btn-danger btn-sm tomboll" data-bs-target="#hapusModal" data-bs-toggle="modal" onclick="deleteDivisi(5)" type="button">Hapus</button>' +
                '</td>' +
                '</tr>';

            // Sisipkan baris baru ke dalam tabel
            document.querySelector('#example tbody').insertAdjacentHTML('beforeend', newRow);

            // Tampilkan pesan sukses
            swal({
                title: "Berhasil !",
                icon: "success",
                text: "Perubahan berhasil disimpan",
                timer: 1500, // Pesan akan ditutup otomatis setelah 3 detik
                buttons: false // Sembunyikan tombol "OK"
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
        document.querySelector('.addgambar').addEventListener('click', function() {
            document.getElementById('fileInput').click();
        });

        document.getElementById('fileInput').addEventListener('change', function() {
            var file = this.files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                var imageSrc = e.target.result;
                document.querySelector('.gambar').innerHTML = '<img src="' + imageSrc + '" style="max-width: 100%; max-height: 100%;" />';
            };
            reader.readAsDataURL(file);
        });

        document.querySelector('.remove').addEventListener('click', function() {
            document.querySelector('.gambar').innerHTML = '<i class="far fa-image"></i>';
            document.getElementById('fileInput').value = ''; // Clear input value
        });
    </script>
    <script>
        $(document).ready(function() {
            // Ketika tombol "Add Photo" diklik
            $(".addgambar").click(function() {
                // Membuka dialog untuk memilih gambar
                $("#fileInput").click();
            });

            // Ketika input gambar dipilih
            $("#fileInput").change(function() {
                // Mendapatkan file yang dipilih
                var file = $(this)[0].files[0];
                // Memeriksa apakah ada file yang dipilih
                if (file) {
                    // Membaca file sebagai URL data
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        // Menampilkan gambar di wadah gambar
                        $(".gambar").html('<img src="' + e.target.result + '" class="img-fluid">');
                    }
                    reader.readAsDataURL(file);
                }
            });

            // Ketika tombol "Remove" diklik
            $(".remove").click(function() {
                // Menghapus gambar dari wadah gambar
                $(".gambar").html('<i class="fa-regular fa-image"></i>');
                // Mengosongkan input file
                $("#fileInput").val('');
            });

        });
    </script>

    @endsection