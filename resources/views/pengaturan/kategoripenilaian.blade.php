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
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <button type="button" class="btn btn-danger col-4 btn-sm" onclick="openConfirmationModal()">
                                +Tambahkan Kategori</button>
                        </div>

                        <div class="form-group">
                            @if ($kategori->isEmpty())
                                <p>Tidak ada kategori yang tersedia.</p>
                            @else
                                @foreach ($kategori as $kat)
                                    <h3>{{  $kat->nama_kategori }}</h3>
                                    {{-- <input type="text" name="kategori_id" value="{{  $kat->nama_kategori }}"> --}}
                                    <hr class="m-0 p-0">
                                    @isset($subKategori[$kat->id])
                                        @foreach ($subKategori[$kat->id] as $subKat)
                                            <div class="tag-p justify-content-between d-flex w-100">
                                                <p>{{ $subKat->nama_sub_kategori }}</p>
                                                {{-- <input type="text" name="nama_sub_kategori" value="{{$subKategori->nama_sub_kategori}}"> --}}
                                                <button type="button" class="btn-close" aria-label="Close"></button>
                                            </div>
                                            <hr class="m-0 p-0">
                                        @endforeach
                                    @else
                                        <p>Tidak ada subkategori yang tersedia untuk kategori ini.</p>
                                    @endisset
                                    <div class="tag-input mt-4 m-1 d-flex justify-content-between flex-row row ">
                                        <form id="subKategoriForm" action="{{ route('tambahSubKategori', ['divisi_id' => $divisi->id, 'kategori_id' => $kat->id]) }}"  method="POST">
                                            @csrf
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <input name="nama_sub_kategori" type="text" class="form-control"
                                                        id="nama_kategori" v-model="newPenilaian.namaKategori" placeholder="">
                                                    <div id="errorMessages" class="mt-2 text-danger"></div>
                                                </div>
                                                <div class="col-auto">
                                                    <button id="submitButton" type="submit" class="btn btn-danger"
                                                        style="padding: 8px 40px;" >tambahkan</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <button class="btn btn-danger" onclick="showSuccessModal()">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-frame-2">
            <div class="modal-content modal-frame-3">
                <form id="subKategoriFormModal" action="{{ route('tambahKategori', ['divisi_id' => $divisi->id]) }}" method="POST">
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
                            </div>
                        </div>
                        <input name="nama_kategori" class="form-control form-control-lg" type="text"
                            id="nama_kategori_modal" placeholder="tamabah kategori" aria-label=".form-control-lg example"
                            style="background-color: #f0f0f0; border-style: solid; border-radius: 5px;">
                        <div id="errorMessagesModal" class="mt-2 text-danger"></div>

                        <button type="button" class="btn mt-4 mb-5"
                            style="background-color: white; color: black; padding: 7px 35px; margin-left:30px"
                            data-bs-dismiss="modal">Batal</button>
                        <button id="submitButtonModal" type="submit" class="btn mt-4 mb-5"
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
            if (document.getElementById('nama_kategori_modal').value.trim() === '') {
                document.getElementById('errorMessagesModal').innerText = 'Silakan isi sebelum menambahkan!';
            } else {
                $('#exampleModal').modal('hide');
                $('#konfirmasi').modal('show');
                setTimeout(function() {
                    $('#konfirmasi').modal('hide');
                }, 1000);
            }
        }

        const closeButton = document.querySelector('.modal.fade .btn-close');
        closeButton.addEventListener('click', function() {
            $('#exampleModal').modal('hide');
        });


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

        document.addEventListener('DOMContentLoaded', function() {
            var submitButtons = document.querySelectorAll('.btn-danger');

            submitButtons.forEach(function(button) {
                button.addEventListener('click', function(event) {
                    var form = event.target.closest('form');
                    var input = form.querySelector('.form-control');
                    var errorMessages = form.querySelector('.text-danger');
                    
                    if (input.value.trim() === '') {
                        errorMessages.innerText = 'Silakan isi SubKategori sebelum menambahkan!';
                        event.preventDefault(); 
                    } else {                        
                        errorMessages.innerText = '';
                    }
                });
            });
        });


        const subKategoriFormModal = document.getElementById('subKategoriFormModal');
        const namaKategoriInputModal = document.getElementById('nama_kategori_modal');
        const submitButtonModal = document.getElementById('submitButtonModal');
        const errorMessagesDivModal = document.getElementById('errorMessagesModal');

        subKategoriFormModal.addEventListener('submit', function(event) {
            errorMessagesDivModal.innerHTML = '';
            if (namaKategoriInputModal.value.trim() === '') {
                errorMessagesDivModal.innerHTML = 'Silakan isi Kategori sebelum menambahkan!';
                event.preventDefault();
            } else {
                // Hanya tutup modal jika input telah diisi dan proses berhasil
                $('#exampleModal').modal('hide');
            }
        });
    </script>
@endsection
