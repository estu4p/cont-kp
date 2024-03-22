@extends('layouts/masterAfterPayProfil')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/AdminUniv-EditProfile.css') }}">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <div class="wadah">

        <div class="propil">
            <img src="assets/images/Rectangle 22.png" alt="Profile Logo" class="gambarkiri">
            <div class="nama">{{ $user->nama_lengkap }}</div>
            <div class="email">{{ $user->email }}</div>
            <div class="about">About</div>
            <div class="keterangan">{{ $user->about }}</div>
        </div>
        <form action="{{ route('adminUniv.updateProfile') }}" method="POST">
            @csrf
            <div class="wadahedit d-flex">

                <div class="editprofil p-5">
                    <div class="atas d-flex flex-row  col-5">
                        <img src="assets/images/Rectangle 22.png" alt="Profile Logo" class="gambarkanan mx-0"
                            style="width:80px;">
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
                                    <input class="input form-control" type="text"id="name"
                                        value="{{ $user->nama_lengkap }}" name="nama_lengkap">
                                </div>
                            </div>
                            <div class="form-group  col-6   p-2">
                                <label for="NoHP">No HP</label>
                                <div class="input-group mb-3">
                                    <input class="input form-control" type="text"id="NoHP" value="{{ $user->no_hp }}"
                                        name="no_hp">
                                </div>
                            </div>
                            <div class="form-group  col-6   p-2">
                                <label for="email">Email</label>
                                <div class=" mb-3">
                                    <input class="input form-control" type="email"id="email" value="{{ $user->email }}"
                                        name="email">
                                </div>
                            </div>
                            <div class="form-group  col-6   p-2">
                                <label for="alamat">Alamat</label>
                                <div class="input-group mb-3">
                                    <input class="input form-control" type="text"id="alamat" value="{{ $user->kota }}"
                                        name="kota">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bawah p-0 col-6">
                        <div class="judulkanan">Additional Info</div>
                        <div class="form-group form-floating">
                            <!-- <label for="alamat">About</label> -->
                            <div class="col-12">
                                <textarea id="About" name="about" class="form-control " style="width:97%;" placeholder="{{ $user->about }}"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="tombol d-flex flex gap-2  align-items-end justify-content-end">
                        <a href="/AdminUniv-Dashboard"><button class="Cancel" type="button">Cancel</button></a>
                        <a href=""><button class="Update" onclick="showSuccessModal()" value="save"
                                type="submit">Update</button></a>
                    </div>
                </div>
            </div>
        </form>
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
