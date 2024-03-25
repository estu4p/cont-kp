@extends('layouts.masterSistemProfile')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/AdminSistem-Editprofile.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<div class="wadah">

    <div class="propil">
        <img src="assets/images/atun.png" alt="Profile Logo" class="gambarkiri">
        <div class="nama">Atun Khosriatun</div>
        <div class="email">atunkhosriatun@gmail.com </div>
        <div class="about">About</div>
        <div class="keterangan">Mengatur pelaksanaan sistem kerja perusahaan, mulai dari meng-input, memproses, mengelola hingga mengevaluasi datat</div>
    </div>

    <div id="preview" class="preview"></div>
    <div class="wadahedit d-flex">
        <div class="editprofil p-5">
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
                    <div class="form-group  col-6   p-2">
                        <label for="username">Nama lengkap</label>
                        <div class="input-group mb-3">
                            <input class="input form-control" type="text" id="name" placeholder="Atun Khostriatun">
                        </div>
                    </div>
                    <div class="form-group  col-6   p-2">
                        <label for="NoHP">No HP</label>
                        <div class="input-group mb-3">
                            <input class="input form-control" type="text" id="NoHP" placeholder="081326273187">
                        </div>
                    </div>
                    <div class="form-group  col-6   p-2">
                        <label for="email">Email</label>
                        <div class="input-group mb-3">
                            <input class="input form-control" type="email" id="email" placeholder="wahyudiatkinson@gmail.com">
                        </div>
                    </div>
                    <div class="form-group  col-6   p-2">
                        <label for="alamat">Alamat</label>
                        <div class="input-group mb-3">
                            <input class="input form-control" type="text" id="alamat" placeholder="Jateng">
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
                previewImage2.src = e.target.result; // Mengubah gambar kanan juga
            };

            reader.readAsDataURL(file);
        }
    }

    // Menambahkan event listener pada elemen input gambar
    const imageInput = document.getElementById('imageInput');
    imageInput.addEventListener('change', handleImageChange);

    // Menambahkan event listener pada elemen span dengan kelas "remove"
    const removeButton = document.querySelector('.remove');
    removeButton.addEventListener('click', function() {
        setDefaultImage(); // Memanggil fungsi untuk menetapkan gambar default
    });
    function updateProfile() {
        // Ambil nilai dari input
        var nameValue = document.getElementById('name').value;
        var emailValue = document.getElementById('email').value;
        var aboutValue = document.getElementById('About').value;

        // Ubah data yang ditampilkan
        document.querySelector('.nama').textContent = nameValue;
        document.querySelector('.email').textContent = emailValue;
        document.querySelector('.keterangan').textContent = aboutValue;
    }

    function showSuccessModal() {
        // Panggil fungsi updateProfile
        updateProfile();

        // Tampilkan modal sukses
        // Misalnya, dengan SweetAlert atau modal lainnya
        // Contoh menggunakan alert sederhana
        $('#successModal').modal('show');

        // Sembunyikan modal setelah beberapa detik (contoh: 1 detik)
        setTimeout(function() {
            $('#successModal').modal('hide');
        }, 1000);
    }
</script

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
