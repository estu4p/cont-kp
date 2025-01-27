@extends('layouts.masterMitra')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/manage-devisi.css') }}">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modal</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Q8i/X+965R3a7ePfVcP1KtH6o5f80tEPso2db+Wt/lq3S1gqPk9CJ5o4lI5G0Bnx" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JcKb8q3z7RH6w4zL7f7FL6nGekd9v/tdTKO/m2+jOMaxXaC0P0Jpam5PMvzR6pF5" crossorigin="anonymous">
    </script>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <div class="kiri-putih p-5 ">
        <div class="card-header">
            <h3 class="card-title">Pengaturan</h3>
        </div>
        <a class="" href="{{ route('mitra.divisi') }}">
            <div class="nav-devisi" style="background-color:  #f9caca; font-weight: bold;">
                <li>Manage Divisi</li>
            </div>
        </a>
        <a class=" " href="{{ route('mitra.showshift') }}">
            <div class="nav-devisi">
                <li>Manage Shift</li>
            </div>
        </a>

    </div>
    <div class="container-fluid  d-flex flex-row justify-content-start gap-0 p-0 wadah">
        <div class="kanan-tabel p-4  w-100 justify-content-start">
            <div>
                <h3 class="manage">Manage Divisi</h3>
                <p class="membuat">Membuat Divisi untuk anak magang</p>
            </div>
            <button type="button" class="tambah" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                    <path
                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                </svg>
                Tambah divisi
            </button>
            <div class="grupselect gap-3">
                <div class="">
                    <select name="page" class="page">
                        <option value="page">page 1 of 1</option>
                    </select>
                </div>
                <div class="">
                    <select name="item" class="item">
                        <option value="item">5 item per page</option>
                    </select>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped" id="examplee">
                    <thead>
                        <tr>
                            <th scope="col" class="ratatengah notabel">No</th>
                            <th scope="col" class="namadiv">Nama Divisi</th>
                            <th scope="col" class="ratatengah">Penilaian</th>
                            <th scope="col" class="ratatengah">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($divisi as $no => $division)
                            <tr>
                                <td class="ratatengah">{{ $no + 1 }}</td>
                                <td>{{ $division->divisi->nama_divisi }}</td>

                                <td class="ratatengah">
                                    <a href="/Kategori-penilaian">
                                        <i class="fa-regular fa-file-lines ic"></i>
                                    </a>
                                </td>

                                <td class="ratatengah">
                                    <form action="{{ route('mitra.deletedivisi', ['id' => $division->id]) }}" method="POST"
                                        class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-edit btn-sm" data-idUpdate="'.$shift->id'"
                                            data-bs-target="#editModal{{ $division->divisi_id }}" data-bs-toggle="modal"
                                            type="button">Edit</button>
                                        <button class="btn btn-danger btn-sm" data-bs-target="#hapusModal"
                                            data-bs-toggle="modal" onclick="return showdeletemodal(event)"
                                            type="button">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>

    <!-- Modal edit divisi -->
    @foreach ($divisi as $item)
        <div class="modal fade modal-sm" id="editModal{{ $item->divisi_id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <form id="editDivisiForm" action="{{ route('mitra.updatedivisi', $item->divisi_id) }}" method="POST">
                    @csrf

                    <div class="modal-content space">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 judulmodal" id="exampleModalLabel">Edit Divisi</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="textdivisi">Edit Divisi</div>
                            <div class="tambahgambar gap-3">
                                <div class="gambar border d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-pen-nib" style="transform: rotate(90deg);"></i>
                                    <input type="file" id="fileInput" style="display: none;">
                                </div>
                                <div>
                                    <button class="addgambar">Edit Photo</button>
                                </div>
                                <div>
                                    <button class="remove">Remove</button>
                                </div>
                            </div>
                            <div class="grupinputt">
                                <div><label for="editNamaDivisi" class="NamaDivisi">Nama Divisi</label></div>
                                <input type="text" class="inputmodalll" name="nama_divisi" id="editNamaDivisi"
                                    placeholder="Masukkan nama divisi" value="{{ $item->divisi->nama_divisi }}">
                            </div>
                        </div>
                        <div class="modal-footer modal-footer d-flex justify-content-center gap-4">
                            <button type="button" class="btn btn-batal" data-bs-dismiss="modal"
                                aria-label="Close">Batal</button>
                            <button type="submit" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close"
                                onclick="updateDivisi()">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endforeach

    <!-- Modal tambah divisi -->
    <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        style="width: 100% !important;">
        <div class="modal-dialog modal-dialog-centered ">
            <form id="addDivisiForm" action="{{ route('mitra.adddivisi') }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-content space">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 judulmodal" id="exampleModalLabel">Tambah Divisi</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="textdivisi">Profil Divisi</div>
                        <div class="tambahgambar gap-3">
                            <div id="fileInputContainer"
                                class="gambar border d-flex align-items-center justify-content-center">
                                <i class="far fa-image"></i>
                                {{-- <input type="file" name="foto_divisi[]" class="form-control fileInput"
                                    style="display: none;"> --}}
                            </div>
                            <div>
                                {{-- <button class="addgambar">Add Photo</button> --}}
                                <input class="form-control addgambar" type="file" id="formFile" name="foto_divisi">
                            </div>
                            <div>
                                <button class="remove">Remove</button>
                            </div>
                        </div>
                        <div class="grupinputt">
                            <div><label for="namaDivisi" class="NamaDivisi">Nama Divisi</label></div>
                            <input type="text" name="nama_divisi" class="inputmodall"
                                placeholder="Masukkan nama divisi">
                        </div>
                    </div>
                    <div class="modal-footer modal-footer d-flex justify-content-center gap-4">
                        <button type="button" class="btn btn-batal" data-bs-dismiss="modal"
                            aria-label="Close">Batal</button>
                        <button type="submit" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close"
                            onclick="sowsukses()">Simpan</button>
                    </div>
                </div>
            </form>
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
            const row = document.querySelectorAll('#examplee tbody tr')[index];
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

            // Kirim permintaan pembaruan ke server
            fetch(`/manage-divisi/update/${editedIndex}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        nama_divisi: editedNamaDivisi
                    })
                })
                .then(response => {
                    if (response.ok) {
                        // Jika permintaan berhasil, perbarui data pada tabel dan tampilkan pesan sukses
                        const row = document.querySelectorAll('#examplee tbody tr')[editedIndex];
                        row.querySelectorAll('td')[1].innerText = editedNamaDivisi;
                        swal({
                            title: "Berhasil !",
                            icon: "success",
                            text: "Perubahan berhasil disimpan",
                            timer: 1500,
                            buttons: false
                        });
                        // Tutup modal edit
                        $('#editModal').modal('hide');
                    } else {
                        // Jika permintaan gagal, tampilkan pesan gagal
                        swal("Gagal!", "Terjadi kesalahan saat menyimpan perubahan.", "error");
                    }
                })
                .catch(error => {
                    // Jika terjadi kesalahan, tampilkan pesan gagal
                    swal("Gagal!", "Terjadi kesalahan saat menghubungi server.", "error");
                });
        }


        // Fungsi untuk menampilkan pesan sukses saat divisi ditambahkan
        function sowsukses() {

            // Dapatkan nilai input dari modal
            var namaDivisi = document.querySelector('.inputmodall').value;

            // Buat elemen HTML untuk baris baru dalam tabel
            var newRow = '<tr>' +
                '<td class = "ratatengah">' + (document.querySelectorAll('#examplee tbody tr').length + 1) + '</td>' +
                '<td>' + namaDivisi + '</td>' +
                '<td class="ratatengah" ><a href="/Kategori-penilaian"><i class="fa-regular fa-file-lines ic"></i></a></td>' +
                '<td class="ratatengah">' +
                '<button class="btn btn-edit btn-sm" data-bs-target="#editModal" data-bs-toggle="modal" onclick="editModal(1)" type="button">Edit</button>' +
                '<button class="btn btn-danger btn-sm tomboll" data-bs-target="#hapusModal" data-bs-toggle="modal" onclick="deleteDivisi(1)" type="button">Hapus</button>' +
                '</td>' +
                '</tr>';

            // Sisipkan baris baru ke dalam tabel
            document.querySelector('#examplee tbody').insertAdjacentHTML('beforeend', newRow);

            // Menambahkan baris baru ke tabel
            $("#examplee tbody").append(newRow);

            // Tampilkan notifikasi sukses
            swal({
                title: "Berhasil !",
                icon: "success",
                text: "Perubahan berhasil disimpan",
                timer: 1500, // Pesan akan ditutup otomatis setelah 3 detik
                buttons: false // Sembunyikan tombol "OK"
            });
        }

        // Fungsi untuk menampilkan modal konfirmasi penghapusan
        function showdeletemodal(event) {
            event.preventDefault();
            swal({
                    title: "Hapus",
                    text: "Apakah anda yakin ingin menghapus!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        // Jika pengguna mengonfirmasi penghapusan, submit form
                        event.target.closest('.delete-form').submit();
                        // Tampilkan notifikasi sukses
                        swal({
                            title: "Berhasil !",
                            icon: "success",
                            text: "Data berhasil dihapus",
                            timer: 5000, // Pesan akan ditutup otomatis setelah 5 detik
                            buttons: false // Sembunyikan tombol "OK"
                        });

                    } else {
                        swal("Penghapusan dibatalkan.");
                    }
                });
        }


        document.querySelector('.addgambar').addEventListener('click', function() {
            document.getElementById('fileInput').click();
        });

        function addgambar() {
            var newFileInput = document.createElement('input');
            newFileInput.type = 'file';
            newFileInput.name = 'foto_divisi[]';
            newFileInput.classList.add('fileInput');
            newFileInput.style.display = 'none';

            var fileInputContainer = document.getElementById('fileInputContainer');
            fileInputContainer.appendChild(newFileInput);

            newFileInput.click(); // Membuka dialog pemilihan file secara otomatis
        }

        document.querySelectorAll('.fileInput').forEach(function(input) {
            input.addEventListener('change', function() {

                var file = this.files[0];
                var reader = new FileReader();
                reader.onload = function(e) {
                    var imageSrc = e.target.result;
                    document.querySelector('.gambar').innerHTML = '<img src="' + imageSrc +
                        '" style="max-width: 100%; max-height: 100%;" />';
                };
                reader.readAsDataURL(file);
            });
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
