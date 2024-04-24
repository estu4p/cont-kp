@extends('layouts.masterSistemProfile')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/AdminSistem-Editprofile.css') }}">
<div class="wadah">
    <div class="propil"> 
    <div class="gambarkiri" > 
    <img src="{{ asset('assets/images/' . $userAdmin->foto_profil) }}" style="border-radius: 50%;" width="80" alt="Foto Profil">
    </div>
            <div class="nama">{{ $userAdmin->nama_lengkap }}</div>
            <div class="email">{{ $userAdmin->email }}</div>
            <div class="about">About</div>
            <div class="keterangan">{{ $userAdmin->about }}</div>
    </div>
    
        <div class="bg-white p-4 rounded  tes col-xl-7 col-lg-7 col-md-11  col-sm-9  " style="">
            <div class="d-flex gap-4">
                <!-- @if ($userAdmin->foto_profil) -->
                <img src="{{ asset('assets/images/' . $userAdmin->foto_profil) }}" style="border-radius: 50%;" width="80" alt="Foto Profil">
                <!-- @else -->
                    <img src="{{ asset('assets/images/default-fotoProfil.png') }}" width="80" alt="Foto Profil">
                <!-- @endif -->
                <div class="my-auto d-flex flex-column" style="flex-direction: row;">
                    <form action="{{ route('userAdmin.updateFoto', $userAdmin->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <input type="file" name="foto_profil" id="uploadFoto" style="display: none;" onchange="uploadFile()">
                        <button type="button" onclick="document.getElementById('uploadFoto').click()" style="border: 2px solid #00000080; border-radius: 6px; background-color: white; color: #00000080; font-size: 12px; font-weight: 600; padding: 8px 12px; text-transform: capitalize;">
                            Change photo
                        </button>
                    </form>
                    <form id="deleteFoto" action="" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                    <button onclick="showAlertDeleteProfile('{{ $userAdmin->username }}')"
                        style="border: 0; color: red; background-color: transparent; text-transform: capitalize;">remove</button>
                </div>
            </div>
            
            <form action="{{ route('userAdmin.updateProfile', $userAdmin->id )}}" method="POST">
                @csrf
                @method('PUT')
                <h6 class="mb-4 mt-5 text-capitalize" style="font-weight: 700; opacity: 0.8;">personal details</h6>
                <div class="text-capitalize">
                    <div class="row">
                        <div class="col d-flex flex-column">
                            <label for="nama" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">nama
                                lengkap</label>
                            <input type="text" name="nama_lengkap" value="{{ $userAdmin->nama_lengkap }}"
                                class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;" id="">
                        </div>
                        <div class="col d-flex flex-column">
                            <label for="email" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">email</label>
                            <input type="email" name="email" value="{{ $userAdmin->email }}"
                                class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;" id="">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col d-flex flex-column">
                            <label for="hp" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">No HP</label>
                            <input type="text" name="no_hp" value="{{ $userAdmin->no_hp }}"
                                class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;" id="">
                        </div>
                        <div class="col d-flex flex-column">
                            <label for="alamat" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">alamat</label>
                            <input type="text" name="alamat" value="{{ $userAdmin->alamat }}"
                                class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;" id="">
                        </div>
                    </div>
                </div>
                <div class="bawah p-0 col-6">
                <div class="judulkanan">Additional Info</div>
                        <div class="form-group  col-4   p-2">
                            <label for="about">About</label>
                        </div>
                <div class="form-group form-floating">
                    <div class="col-12  ">
                        <textarea id="about" name="about" class="form-control " style="width:97%;" placeholder="{{ $userAdmin->about }}"></textarea>
                    </div>
                </div>
             </div>
                <div class="tombol d-flex flex gap-2  align-items-end justify-content-end">
                    <a href="{{ url('AdminSistem-Dashboard') }}" type="button" style="background-color: #02020259; color: white; padding: 8px 16px; border-radius: 8px; border: 0;">Cancel</a>
                    
                    <button type="submit" style="background-color: #A4161A; color: white; padding: 8px 16px; border-radius: 8px; border: 0;">Update</button>
                </div>
            </form>
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