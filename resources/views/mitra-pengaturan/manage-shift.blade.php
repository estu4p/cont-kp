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
    <a class="" href="{{ route('mitra.showdivisi') }}">
        <div class="nav-devisi">
            <li>Manage Divisi</li>
        </div>
    </a>
    <a class=" " href="{{ route('mitra.showshift') }}">
        <div class="nav-devisi" style="background-color:  #f9caca; font-weight: bold;">
            <li>Manage Shift</li>
        </div>
    </a>
</div>
<div class="container-fluid  d-flex flex-row justify-content-start gap-0 p-0 wadah">

    <div class="kanan-tabel p-5  w-100 justify-content-start ">
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
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
            </svg>
            Tambah Shift
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
            <table class="table  table-striped" id="examplee">
                <thead>
                    <tr>
                        <th scope="col" class="ratatengah">No</th>
                        <th scope="col">Detail</th>
                        <th scope="col">Jam</th>
                        <th scope="col">Istirahat</th>
                        <th scope="col" class="ratatengah">aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($shift as $shifts)
                    @csrf

                    <tr>
                        <td class="ratatengah">{{ $loop->iteration }}</td>
                        <td>{{ $shifts->nama_shift}}</td>
                        <td>{{ $shifts->jam_masuk }}</td>
                        <td>{{ $shifts->istirahat }}</td>
                        <td class="ratatengah">
                            <form action="{{ route('mitra.deleteshift', ['id' => $shifts->id]) }}" method="POST" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-edit btn-sm" data-idUpdate="'.$shift->id'" data-bs-target="#editModal{{$shifts->id}}" data-bs-toggle="modal" type="button">Edit</button>

                                <button class="btn btn-danger btn-sm" data-bs-target="#hapusModal" data-bs-toggle="modal" onclick="return showdeletemodal(event)" type="button">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal edit shift -->
@foreach($shift as $item)
<div class="modal fade modal-sm" id="editModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form action="{{route('mitra.updateShift', $item->id)}}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 judulmodal" id="exampleModalLabel">Edit Shift</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="grupinpu">
                        <div><label for="detail" class="labelmodal">Detail</label></div>
                        <input type="text" name="nama_shift" class="inputmodal" id="editDetail" placeholder="Masukkan nama shift">
                    </div>
                    <div class="grupinput">
                        <div><label for="jaml" class="labelmodal">Jam</label></div>
                        <input type="text" name="jam_masuk" class="inputmodal" id="editJam" placeholder="06:30:00 - 18:00:00">
                    </div>
                    <div class="grupinput">
                        <div><label for="Istirahat" class="labelmodal">Istirahat</label></div>
                        <input type="text" name="istirahat" class="inputmodal" id="editIstirahat" placeholder="06:30:00 - 18:00:00">
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="buttongrup gap-3">
                        <button type="button" class="btn btn-batal" data-bs-dismiss="modal" aria-label="Close">Batal</button>
                        <button type="submit" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close" onclick="showedit()">Simpan</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>
@endforeach

<!-- Modal tambah shif -->

<div class="modal fade modal-sm" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form action="{{route('mitra.addShift')}}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 judulmodal" id="exampleModalLabel">Tambah Shift</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="grupinpu">
                        <div><label for="detail" class="labelmodal">Detail</label></div>
                        <input type="text" name="nama_shift" class="inputmodal inputdetail" placeholder="Masukkan nama shift">
                    </div>
                    <div class="grupinput">
                        <div><label for="jaml" class="labelmodal">Jam</label></div>
                        <input type="text" name="jam_masuk" class="inputmodal inputjam" placeholder="Masukkan jam masuk - keluar">
                    </div>
                    <div class="grupinput">
                        <div><label for="Istirahat" class="labelmodal">Istirahat</label></div>
                        <input type="text" name="istirahat" class="inputmodal inputistirahat" placeholder="Masukkan jam istirahat">
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="button-grup gap-3">
                        <button type="button" class="btn btn-batal" data-bs-dismiss="modal" aria-label="Close">Batal</button>
                        <button type="submit" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close" onclick="sowsukses()">Simpan</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>

<script>
    function sowsukses() {
        // Mendapatkan nilai input dari modal
        var detail = document.querySelector('.inputdetail').value;
        var jam = document.querySelector('.inputjam').value;
        var istirahat = document.querySelector('.inputistirahat').value;
        var lastNumber = $("#examplee tbody tr").length + 1;

        // Membuat baris baru untuk tabel
        var newRow = "<tr>" +
            "<td class = 'ratatengah'>" + (document.querySelectorAll('#examplee tbody tr').length + 1) + "</td>" + // Nomor dapat disesuaikan dengan jumlah baris yang sudah ada
            "<td>" + detail + "</td>" +
            "<td>" + jam + "</td>" +
            "<td>" + istirahat + "</td>" +
            "<td class = 'ratatengah'>" +
            "<button class='btn btn-edit btn-sm' data-bs-target='#editModal' data-bs-toggle='modal' onclick='editModal(5)' type='button'>Edit</button>" +
            "<button class='btn btn-danger btn-sm tomboll' data-bs-target='#hapusModal' data-bs-toggle='modal' onclick='deleteShift(5)' type='button'>Hapus</button>" +
            "</td>" +
            "</tr>";

        // Menambahkan baris baru ke tabel
        $("#examplee tbody").append(newRow);

        // Tampilkan notifikasi sukses
        swal({
            title: "Berhasil !",
            icon: "success",
            text: "Perubahan berhasil disimpan",
            timer: 10000, // Pesan akan ditutup otomatis setelah 3 detik
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
        const row = document.querySelectorAll('#examplee tbody tr')[index];
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
        const row = document.querySelectorAll('#examplee tbody tr')[editedIndex];
        row.querySelectorAll('td')[1].innerText = editedDetail;
        row.querySelectorAll('td')[2].innerText = editedJam;
        row.querySelectorAll('td')[3].innerText = editedIstirahat;

        // Tampilkan notifikasi sukses
        swal({
            title: "Berhasil !",
            icon: "success",
            text: "Perubahan berhasil disimpan",
            timer: 5000, // Pesan akan ditutup otomatis setelah 5 detik
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

</script>



@endsection