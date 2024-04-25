@extends('layouts.masterMitraprofile')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/contributorformitra/editprofile.css') }}">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="wadah">
    <!-- Form pengeditan profil -->
    <form action="{{ route('contributorformitra.update') }}" method="POST" enctype="multipart/form-data">
       @csrf
       @method('PUT')  
        <div class="propil">
            <img src="{{ asset('uploads/profile_images/'.$contributor->foto_profil) }}" alt="Profile Logo" class="gambarkiri">
            <div class="nama">{{ $contributor->nama_lengkap }}</div>
            <div class="email">{{ $contributor->email }}</div>
            <div class="about">About</div>
            <div class="keterangan">{{ $contributor->about }}</div>
        </div>

        <!-- Konten form pengeditan -->
        <div class="wadahedit d-flex">
            <div class="editprofil p-5">
                <div class="atas d-flex flex-row  col-5">
                    <div id="previewZone">
                        <img src="{{ asset('uploads/profile_images/'.$contributor->foto_profil) }}" alt="Profile Logo" class="gambarkanan">
                    </div>
                    <div class="upload col-5 d-flex flex-column mx-2 my-auto gap-1">
                        <label for="imageInput" class="custom-file-upload">
                            <span class="change">Change Photo</span>
                            <input type="file" id="imageInput" name="profile_image" style="display: none;">
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
                                <input class="input form-control" type="text" id="name" name="name" value="{{ $contributor->name }}">
                            </div>
                        </div>
                        <div class="form-group  col-6   p-2">
                            <label for="NoHP">No HP</label>
                            <div class="input-group mb-3">
                                <input class="input form-control" type="text" id="NoHP" name="phone" value="{{ $contributor->phone }}">
                            </div>
                        </div>
                        <div class="form-group  col-6   p-2">
                            <label for="email">Email</label>
                            <div class="input-group mb-3">
                                <input class="input form-control" type="email" id="email" name="email" value="{{ $contributor->email }}">
                            </div>
                        </div>
                        <div class="form-group  col-6   p-2">
                            <label for="alamat">Alamat</label>
                            <div class="input-group mb-3">
                                <input class="input form-control" type="text" id="alamat" name="address" value="{{ $contributor->address }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bawah p-0 col-6">
                    <div class="judulkanan">Additional Info</div>
                    <div class="form-group form-floating">
                        <div class="col-12  ">
                            <textarea id="About" name="about" class="form-control" style="width:97%;" placeholder="text">{{ $contributor->about }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="tombol d-flex flex gap-2  align-items-end justify-content-end">
                    <a href="{{ route('contributorformitra.editprofile') }}" class="btn btn-edit btn-sm">Cancel</a>
                    <button type="submit" class="Update">Update</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Modal sukses -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-body text-center">
                <h3>Berhasil!</h3>
                <img src="{{ asset('assets/images/berhasil.png') }}" alt="Logo" class="logo">
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
        previewZone.innerHTML = '<img src="' + defaultImageSrc + '" class="img-fluid">';    }

    // Call the setDefaultImage function when the page is loaded
    window.addEventListener('DOMContentLoaded', setDefaultImage);

    function setDefaultImage() {
        <div id="previewZone" data-default-image-src="{{ asset('uploads/profile_images/'.$contributor->foto_profil) }}">
        </div>
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

    function updateProfile() {
        var nameValue = document.getElementById('name').value;
        var emailValue = document.getElementById('email').value;
        var aboutValue = document.getElementById('About').value;

        document.querySelector('.nama').textContent = nameValue;
        document.querySelector('.email').textContent = emailValue;
        document.querySelector('.keterangan').textContent = aboutValue;
    }

    function showSuccessModal() {
        updateProfile();

        $('#successModal').modal('show');

        setTimeout(function() {
            $('#successModal').modal('hide');
        }, 1000);
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
