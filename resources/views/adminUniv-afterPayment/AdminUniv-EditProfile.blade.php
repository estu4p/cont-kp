@extends('layouts/masterAfterPayProfil')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/AdminUniv-EditProfile.css') }}">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="wadah">

    <div class="propil">
        <img src="assets/images/atun.png" alt="Profile Logo" class="gambarkiri">
        <div class="nama">Atun Khosriatun</div>
        <div class="email">atunkhosriatun@gmail.com</div>
        <div class="about">About</div>
        <div class="keterangan">Mengatur pelaksanaan sistem kerja perusahaan, mulai dari meng-input, memproses, mengelola hingga mengevaluasi data</div>
    </div>

    <div id="preview" class="preview"></div>
    <div class="wadahedit d-flex">
        <div class=" p-5">
            <div class="atas d-flex flex-row  col-5">
                <div id="previewZone">
                    <img src="assets/images/atun.png" alt="Profile Logo" class="gambarkanan">
                </div>
                <div class="upload col-5 d-flex flex-column mx-2 my-auto gap-1">
                    <label for="imageInput" class="custom-file-upload">
                        <span class="change">Change Photo</span>
                        <input type="file" id="imageInput" style="display: none;">
                    </label>
                    <span class="remove m-0">remove</span>
                </div>
            </div>

            <div class="tengah row ">
                <div class="judulkanan">Personal Details</div>
                <div class="isi col-12 row justify-content-evenly  ">
                    <div class="form-group  col-6   p-3">
                        <label for="username">Nama lengkap</label>
                        <div class="input-group mb-3">
                            <input class="input form-control" type="text" id="name" placeholder="Atun Khostriatun">
                        </div>
                    </div>
                    <div class="form-group  col-6   p-3">
                        <label for="NoHP">No HP</label>
                        <div class="input-group mb-3">
                            <input class="input form-control" type="text" id="NoHP" placeholder="081326273187">
                        </div>
                    </div>
                    <div class="form-group  col-6   p-3">
                        <label for="email">Email</label>
                        <div class="input-group mb-3">
                            <input class="input form-control" type="email" id="email" placeholder="wahyudiatkinson@gmail.com">
                        </div>
                    </div>
                    <div class="form-group  col-6   p-3">
                        <label for="alamat">Alamat</label>
                        <div class="input-group mb-3">
                            <input class="input form-control" type="text" id="alamat" placeholder="Jateng">
                        </div>
                    </div>
                </div>
            </div>
            <div class="bawah p-2 col-6">
                <div class="judulkanan">Additional Info</div>
                <div class="form-group form-floating">
                    <div class="col-12  ">
                    <label for="alamat">About</label>
                        <textarea id="About" name="About" class="form-control " style="width:97%;" placeholder="text... "></textarea>
                    </div>
                </div>
            </div>
            <div class="tombol d-flex flex gap-2  align-items-end justify-content-end">
                <a href="{{ url('AdminSistem-Dashboard') }}" class="btn btn-edit btn-sm">Cancel</a>
                <button class="Update" onclick="showSuccessModal()">Update</button>
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
                <p>Perubahan berhasil</p>
            </div>
        </div>
    </div>
</div>

<script>
    function showSuccessModal() {
        event.preventDefault();
        $('#successModal').modal('show');
        setTimeout(function() {
            $('#successModal').modal('hide');
            window.location.href = '/AdminSistem-Dashboard';
        }, 1000);
    }

    const imgInput = document.getElementById('imageInput');
    const previewZone = document.getElementById('previewZone');

    function setDefaultImage() {
        const previewZone = document.getElementById('previewZone');
        previewZone.innerHTML = '<img src="assets/images/atun.png"  class="img-fluid">';
    }

    // Call the setDefaultImage function when the page is loaded
    // Menetapkan gambar default saat dokumen dimuat
    window.addEventListener('DOMContentLoaded', setDefaultImage);

    function setDefaultImage() {
        const defaultImageSrc = 'assets/images/atun.png';

        const previewImage = document.querySelector('.gambarkiri');
        previewImage.src = defaultImageSrc;

        const previewImage2 = document.querySelector('.gambarkanan');
        previewImage2.src = defaultImageSrc;
    }

    function handleImageChange(event) {
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                const previewImage = document.querySelector('.gambarkiri');
                previewImage.src = e.target.result;

                const previewImage2 = document.querySelector('.gambarkanan');
                previewImage2.src = e.target.result; 
            };

            reader.readAsDataURL(file);
        }
    }

    const imageInput = document.getElementById('imageInput');
    imageInput.addEventListener('change', handleImageChange);

    const removeButton = document.querySelector('.remove');
    removeButton.addEventListener('click', function() {
        setDefaultImage(); 
    });


    function redirectToSubscriptionPage() {
        setTimeout(function() {
            window.location.href = 'AdminSistem-Subcription'; 
        }, 5000); 
    }

    document.querySelector('.Update').addEventListener('click', redirectToSubscriptionPage);
</script>
@endsection