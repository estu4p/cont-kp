@extends('layouts.masterMitraprofile')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/contributorformitra/editprofile.css') }}">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="wadah">

    <div class="propil">
        <img src="assets/images/assets/images/Rectangle 22.png" alt="Profile Logo" class="gambarkiri">
        <div class="nama">{{ $userMitra->nama_lengkap }}</div>
        <div class="email">{{ $userMitra->email }}</div>
        <div class="about">About</div>
        <div class="keterangan">{{ $userMitra->about }}</div>
    </div>

    <div id="preview" class="preview"></div>
    <div class="wadahedit d-flex">
        <div class="editprofil p-5">
            <form action="{{ route('contributorformitra/editprofile') }}" method="POST">
                @csrf
                <div class="atas d-flex flex-row  col-5">
                    <div id="previewZone">
                        <img src="assets/images/Rectangle 22.png" alt="Profile Logo" class="gambarkanan">
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
                            <label for="name">Nama lengkap</label>
                            <div class="input-group mb-3">
                                <input class="input form-control" type="text" id="name" name="nama_lengkap" value="{{ $userMitra->nama_lengkap }}">
                            </div>
                        </div>
                        <div class="form-group  col-6   p-2">
                            <label for="NoHP">No HP</label>
                            <div class="input-group mb-3">
                                <input class="input form-control" type="text" id="NoHP" name="no_hp" value="{{ $userMitra->no_hp }}">
                            </div>
                        </div>
                        <div class="form-group  col-6   p-2">
                            <label for="email">Email</label>
                            <div class="input-group mb-3">
                                <input class="input form-control" type="email" id="email" name="email" value="{{ $userMitra->email }}">
                            </div>
                        </div>
                        <div class="form-group  col-6   p-2">
                            <label for="alamat">Alamat</label>
                            <div class="input-group mb-3">
                                <input class="input form-control" type="text" id="alamat" name="alamat" value="{{ $userMitra->alamat }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bawah p-0 col-6">
                    <div class="judulkanan">Additional Info</div>
                    <div class="form-group form-floating">
                        <!-- <label for="alamat">About</label> -->
                        <div class="col-12  ">
                            <textarea id="About" name="about" class="form-control " style="width:97%;" placeholder="text
...">{{ $user->about }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="tombol d-flex flex gap-2  align-items-end justify-content-end">
                    <a href="{{ url('/contributorformitra-dashboard') }}" class="btn btn-edit btn-sm">Cancel</a>
                    <button type="submit" class="Update">Update</button>
                </div>
            </form>
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
@endsection
