@extends('layouts.masterAfterPayProfil')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/AdminUniv-EditProfile.css') }}">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="wadah">

    <div class="propil">
        <img src="assets/images/Rectangle 22.png" alt="Profile Logo" class="gambarkiri">
        <div class="nama">Wahyudi Atkinson</div>
        <div class="email">wahyudiatkinson@gmail.com</div>
        <div class="about">About</div>
        <div class="keterangan">Mengatur pelaksanaan sistem kerja perusahaan, mulai dari meng-input, memproses, mengelola hingga mengevaluasi data</div>
    </div>
    <div class="wadahedit d-flex">
        <div class="editprofil p-5">
            <div class="atas d-flex flex-row  col-5">
                <img src="assets/images/Rectangle 22.png" alt="Profile Logo" class="gambarkanan mx-0" style="width:80px;">
                <div class="upload col-5 d-flex flex-column mx-2 my-auto gap-1">
                    <button class="change m-0 py-1 px-2">Change Photo</button>
                    <button class="remove m-0">remove</button>
                </div>
            </div>
            <div class="tengah row ">
                <div class="judulkanan">Personal Details</div>
                <div class="isi col-12 row justify-content-evenly  ">
                    <div class="form-group  col-6   p-2">
                        <label for="username">Nama lengkap</label>
                        <div class="input-group mb-3">
                            <input class="input form-control" type="text"id="name" placeholder="Wahyudi Atkinson">
                        </div>
                    </div>
                    <div class="form-group  col-6   p-2">
                        <label for="NoHP">No HP</label>
                        <div class="input-group mb-3">
                            <input class="input form-control" type="text"id="NoHP" placeholder="081326273187">
                        </div>
                    </div>
                    <div class="form-group  col-6   p-2">
                        <label for="email">Email</label>
                        <div class=" mb-3">
                            <input class="input form-control" type="email"id="email" placeholder="wahyudiatkinson@gmail.com">
                        </div>
                    </div>
                    <div class="form-group  col-6   p-2">
                        <label for="alamat">Alamat</label>
                        <div class="input-group mb-3">
                            <input class="input form-control" type="text"id="alamat" placeholder="Padang">
                        </div>
                    </div>
                </div>
            </div>
            <div class="bawah p-0 col-6">
                <div class="judulkanan">Additional Info</div>
                <div class="form-group form-floating">
                    <!-- <label for="alamat">About</label> -->
                    <div class="col-12  ">
                        <textarea id="About" name="About" class="form-control " style="width:97%;" placeholder="text
..."></textarea>
                    </div>
                </div>
            </div>
            <div class="tombol d-flex flex gap-2  align-items-end justify-content-end">
                <button class="Cancel">Cancel</button>
                <button class="Update" onclick="showSuccessModal()">Update</button>
            </div>
        </div>
    </div>
</div>

<script>

function showSuccessModal() {
            swal({
                title: "Berhasil!",
                text: "Perubahan berhasil disimpan",
                icon: "success",
            });
        }
  </script>
@endsection