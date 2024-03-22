@extends('layouts.master')

@section('content')
    <link rel="stylesheet" href="assets/css/margepenilaiandivisi.css">

    <div class="container-fluid d-flex flex-row justify-content-start gap-0 p-0 wadah">
        <div class="kiri-putih p-5 ">
            <div class="card-header">
                <h3 class="card-title">Pengaturan</h3>
            </div>
            <a class="nav-link" style="font-size: 14px; width:max-content;">PENGATURAN UTAMA</a>
            <li class="nav-item manageP">
                <a class=>Manage penilaian</a>
            </li>
        </div>

        <div class="kanan-tabel p-5 w-100 justify-content-start">
            <div>
                <h3 class="manage">Manage Penilaian Divisi</h3>
                <p class="membuat">Membuat Kategori Penilaian Per Divisi</p>
            </div>
            <div>
                <select name="page" class="page">
                    <option value="page">page 1 of 1</option>
                </select>
                <select name="item" class="item">
                    <option value="item">5 item per page</option>
                </select>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="#">
                                <div class="form-group">
                                    <label for="nama_divisi"></label>

                                </div>
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
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($divisi as $no => $data)
                                    <tr>
                                        <td>{{ $no + 1 }}</td>
                                        <td>{{ $data->nama_divisi }}</td>
                                        <td>
                                            <a href="{{ url('kategoripenilaian') }}" class="btn btn-edit btn-sm">Edit</a>
                                            <button class="btn btn-danger btn-sm"
                                                onclick="showDeleteConfirmationModal()">Hapus</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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


    <!-- Modal Konfirmasi -->
    <div class="modal fade" id="confirmationModal" tabindex="-5" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" style="padding-left: 40%;"> Hapus</h1>
                </div>
                <br>
                <br>
                <div class="modal-body" style="text-align: center;">
                    Apakah Anda yakin ingin menghapus ?
                </div>
                <br>
                <br>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btnbatal" onclick="cancelData()">Batal</button>
                    <button type="button" class="btnya" onclick="deleteData()">Ya</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Berhasil Dihapus -->
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-body text-center ">
                        <h5 class="modal-title text-center" id="exampleModalLabel">Berhasil!</h5>
                        <div>
                            <div>
                                <img src="assets/images/berhasil.png" alt="Logo" class="logo">
                            </div>

                            <div class="modal-body text-center">
                                <p>Data berhasil dihapus</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        function showConfirmationModal() {
            $('#confirmationModal').modal('show');
        }

        function showDeleteConfirmationModal() {
            $('#confirmationModal').modal('show');
        }

        function deleteData() {
            // Tambahkan logika untuk menghapus data di sini

            // Tutup modal konfirmasi
            $('#confirmationModal').modal('hide');

            // Tampilkan modal berhasil dihapus
            $('#successModal').modal('show');

            // Set timeout untuk menyembunyikan modal berhasil dihapus setelah beberapa waktu
            setTimeout(function() {
                $('#successModal').modal('hide');
            }, 1000); // Waktu dalam milidetik (3000 = 3 detik)
        }

        function cancelData() {
            // Tambahkan logika untuk menghapus data di sini

            // Tutup modal konfirmasi
            $('#confirmationModal').modal('hide');

        }
    </script>
@endsection

