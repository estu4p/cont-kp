@extends('layouts.master')

@section('content')
    <link rel="stylesheet" href="assets/css/kategoripenilaian.css">

    <!-- <div class="kanan-tabel p-5 container-fluid m-auto  w-100 justify-content-center" style="background-color:#EFAF18"> -->
    <div class="container p-4 w-120 justify-content-start" style="position:relative ;">
        <div style="display:flex;">
            <a href="/pengaturan-contri" class="kekiri m-2 mt-1" style="color:black"><i class="fa-solid fa-chevron-left"
                style="color: black;"></i></a>
            <h3 class="kategori">Kategori Penilaian {{ $divisi->nama_divisi }}</h3>
        </div>
        <div class="card m-4 mt-3 ">
            <div class="card-header bg-dark p-4">
                <h3 class="text-light">Tambah Kategori Penilaian {{ $divisi->nama_divisi }}</h3>
                <p class="text-light">Digunakan untuk menentukan kategori penilaian kepada peserta magang</p>
            </div>
            <div class="card-body">
                <form @submit.prevent="tambahPenilaian">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <button type="button" class="btn btn-danger col-4 btn-sm"
                                    onclick="openConfirmationModal()"> +Tambahkan Kategori</button>
                            </div>

                            <div class="form-group">
                                <h3 class="">kreativitas</h3>
                                <div class="tag-p justify-content-between d-flex w-100">
                                    <p class="">Desain yang menarik</p>
                                    <button type="button" class="btn-close" aria-label="Close"></button>
                                </div>

                                <hr class="m-0 p-0">
                                <div class="tag-p justify-content-between d-flex w-100">
                                    <p class="">Pemecahan masalah pengguna</p>
                                    <button type="button" class="btn-close" aria-label="Close"></button>
                                </div>
                                <hr class="m-0 p-0">
                                <div class="tag-p justify-content-between d-flex w-100">
                                    <p class="">Hasil kerja</p>
                                    <button type="button" class="btn-close" aria-label="Close"></button>
                                </div>
                                <hr class="m-0 p-0">
                                <div class="tag-input mt-4 m-1 d-flex justify-content-between flex-row row ">
                                    <form action="{{ route('tambahSubKategori',['divisi_id' => $divisi->id, 'kategori_id']) }}" method="POST">
                                        @csrf
                                        <input name="nama_sub_kategori" type="text" class="form-control" id="nama_kategori"
                                            v-model="newPenilaian.namaKategori" placeholder="">
                                        <button type="submit" class="btn btn-danger col-4">tambahkan</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <h3 class="">Lainnya</h3>
                                <div class="tag-p justify-content-between d-flex w-100">
                                    <p class="">Aktif Presentasi</p>
                                    <button type="button" class="btn-close" aria-label="Close"></button>
                                </div>
                                <hr class="m-0 p-0">
                                <div class="tag-p justify-content-between d-flex w-100">
                                    <p class="">Kejujuran</p>
                                    <button type="button" class="btn-close" aria-label="Close"></button>
                                </div>
                                <hr class="m-0 p-0">
                                <div class="tag-p justify-content-between d-flex w-100">
                                    <p class="">Kedisiplinan</p>
                                    <button type="button" class="btn-close" aria-label="Close"></button>
                                </div>
                                <hr class="m-0 p-0">
                                <div class="tag-p justify-content-between d-flex w-100">
                                    <p class="">tanggung jawab</p>
                                    <button type="button" class="btn-close" aria-label="Close"></button>
                                </div>
                                <hr class="m-0 p-0">
                                <div class="tag-input mt-4 m-1 d-flex justify-content-between flex-row row ">
                                    <input type="text" class="form-control" id="nama_kategori"
                                        v-model="newPenilaian.namaKategori" placeholder="">
                                    <button type="button" class="btn btn-danger col-4">Tambahkan</button>

                                </div>
                                <button class="btn btnsubmit" onclick="showSuccessModal()">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-frame-2">
            <div class="modal-content modal-frame-3">
                <form action="{{ route('tambahKategori', ['divisi_id' => $divisi->id]) }}" method="POST">
                    @csrf
                    <div class="modal-body modal-frame-4 text-center">
                        <p class="fs-5" style="color: #EFAF18"></p>
                        <span class="mt-1 mb-3" style="color: black">Tambah Kategori</span>
                        <div class="kategori">
                            <div class="sub-kategori">
                                <div class="tag-p justify-content-between m-0 p-0 d-flex w-100">
                                    <p class="">Pengetahuan</p>
                                    <button type="button" class="btn-close" aria-label="Close"></button>
                                </div>
                                <hr class="m-0 p-0">
                                <br>
                                <div class="tag-p justify-content-between m-0 p-0 d-flex w-100">
                                    <p class="">Keterampilan</p>
                                    <button type="button" class="btn-close" aria-label="Close"></button>
                                </div>
                                <hr class="m-0 p-0">
                                <br>
                                <div class="tag-p justify-content-between m-0 p-0 d-flex w-100">
                                    <p class="">Lainnya</p>
                                    <button type="button" class="btn-close" aria-label="Close"></button>
                                </div>
                                <hr class="m-0 p-0">
                            </div>
                        </div>
                        <input name="nama_kategori" class="form-control form-control-lg" type="text" placeholder="tamabah kategori"
                            aria-label=".form-control-lg example"
                            style="background-color: #f0f0f0; border-style: solid; border-radius: 5px;">


                        <button type="button" class="btn mt-4 mb-5"
                            style="background-color: white; color: black; padding: 7px 35px; margin-left:30px"
                            data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn mt-4 mb-5"
                            style="background-color: red; color: white; padding: 7px 35px;"
                            onclick="showConfirmationModal()">Tambahkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="konfirmasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-frame-2">
            <div class="modal-content modal-frame-3">
                <div class="modal-body modal-frame-4 text-center">
                    <h3>Berhasil!</h3>
                    <img src="assets/images/berhasil.png" alt="Logo" class="logo">
                    <p>Kategori berhasil ditambahkan</p>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content ">
                <div class="modal-body text-center">
                    <h3>Berhasil!</h3>
                    <img src="assets/images/berhasil.png" alt="Logo" class="logo">
                    <p>Kategori penilaian berhasil disimpan</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showConfirmationModal() {
            // alert('asdas')
            $('#exampleModal').modal('hide');
            $('#konfirmasi').modal('show');
            setTimeout(function() {
                $('#konfirmasi').modal('hide');
            }, 1000);
        }

        function showSuccessModal() {
            event.preventDefault();
            $('#successModal').modal('show');
            setTimeout(function() {
                $('#successModal').modal('hide');
            }, 1000);
        }

        function openConfirmationModal() {
            $('#exampleModal').modal('show');
            // var myModal = new bootstrap.Modal(document.getElementById('konfirmasiBackdrop'));
            // myModal.show();
        }

        function cancelDelete() {

            var myModal = new bootstrap.Modal(document.getElementById('konfirmasiBackdrop'));
            myModal.hide();
        }
    </script>
@endsection
