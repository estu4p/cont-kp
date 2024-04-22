@extends('layouts.masterSistemProfile')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/AdminSistem-Editprofile.css') }}">
<div class="wadah">

<div class="propil">
        <img src="assets/images/atun.png" alt="Profile Logo" class="gambarkiri">
        <div class="nama">{{ $userAdmin->nama_lengkap }}</div>
        <div class="email">{{ $userAdmin->email }}</div>
        <div class="about">About</div>
        <div class="keterangan">{{ $userAdmin->about }}</div>
    </div>

    <div id="preview" class="preview"></div>
    <div class="wadahedit d-flex">
        <div class=" p-5">
            <div class="atas d-flex flex-row  col-5">
                <div id="previewZone">
                    <img src="assets/images/atun.png" alt="Profile Logo" class="gambarkanan">
                </div>
                <div class="upload col-5 d-flex flex-column mx-4 my-auto gap-1">
                    <label for="imageInput" class="custom-file-upload">
                        <span class="change">Change Photo</span>
                        <input type="file" id="imageInput" style="display: none;">
                    </label>
                    <span class="remove m-0">remove</span>
                </div>
            </div>


            <div class="tengah row ">
            <form action="{{ route('userAdmin.updateFoto', $userAdmin->username )}}" method="POST">
                @csrf
                @method('PATCH')
                <div class="judulkanan">Personal Details</div>
                    <div class="isi col-12 row justify-content-evenly">
                        <div class="form-group  col-6   p-2">
                            <label for="nama">Nama Lengkap</label>
                            <div class="input-group mb-3">
                            <input type="text" name="nama_lengkap" value="{{ $userAdmin->nama_lengkap }}"
                                class="input form-control" type="text" style="background-color: #F2F4F8;" id="nama">
                            </div>
                        </div>
                        <div class="form-group  col-6   p-2">
                            <label for="email">Email</label>
                            <div class="input-group mb-3">
                            <input type="email" name="email" value="{{ $userAdmin->email }}"
                                class="input form-control" type="email" style="background-color: #F2F4F8;" id="email">
                            </div>
                        </div>
                        <div class="form-group  col-6   p-2">
                            <label for="hp">No Hp</label>
                            <div class="input-group mb-3">
                            <input type="text" name="no_hp" value="{{ $userAdmin->no_hp }}"
                                class="input form-control" type="text" style="background-color: #F2F4F8;" id="no.Hp">
                            </div>
                        </div>
                        <div class="form-group  col-6   p-2">
                            <label for="alamat">Alamat</label>
                            <div class="input-group mb-3">
                            <input type="text" name="alamat" value="{{ $userAdmin->alamat }}"
                                class="input form-control" type="text" style="background-color: #F2F4F8;" id="alamat">
                            </div>
                        </div>
                    </div>
            </form>
            </div>

            <div class="bawah p-0 col-6">
                <div class="judulkanan">Additional Info</div>
                        <div class="form-group  col-4   p-2">
                            <label for="about">About</label>
                        </div>
                <div class="form-group form-floating">
                    <div class="col-12  ">
                        <textarea id="About" name="About" class="form-control " style="width:97%;" placeholder="{{ $userAdmin->about }}"></textarea>
                    </div>
                </div>
            </div>
            <div class="tombol d-flex flex gap-2  align-items-end justify-content-end">
                <a href="{{ url('AdminSistem-Dashboard') }}" type="button" style="background-color: #02020259; color: white; padding: 8px 16px; border-radius: 8px; border: 0;">Cancel</a>
                <button type="submit" style="background-color: #A4161A; color: white; padding: 8px 16px; border-radius: 8px; border: 0;" onclick="showSuccessModal()">Update</button>
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