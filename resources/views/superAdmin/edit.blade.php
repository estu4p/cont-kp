@extends('layouts.superadmin')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/super-admin.css') }}">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <div class="d-flex untukmobile mt-0 mb-5 px-2 row  justify-content-evenly gap-lg-0 gap-md-3 ">
        <div class="bg-white rounded text-center tes col-xl-3 col-lg-3 col-md-11 col-sm-9 " style="padding: 50px 0px 0px;">
            <div>
                @if ($superAdmin->foto_profil)
                    <img src="{{ asset('storage/' . $superAdmin->foto_profil) }}" width="180" alt="Foto Profil">
                @else
                    <img src="{{ asset('assets/images/default-fotoProfil.png') }}" width="180" alt="Foto Profil">
                @endif
                <h4 class="mt-4 text-capitalize" style="opacity: 0.8; font-size: 20px; font-weight: 700;">{{ $superAdmin->nama_lengkap }}
                </h4>
                <p class=" fw-light ">{{ $superAdmin->email }}</p>
            </div>
            <div>
                <h5 style="opacity: 0.8; font-size: 20px; font-weight: 700; margin-top: 6rem;">About</h5>
                <p class="fw-light" style="margin-top: 20px; line-height: 1.3; font-size: 14px;">{{ $superAdmin->about }}</p>
            </div>
        </div>
        <div class="bg-white p-4 rounded  tes col-xl-7 col-lg-7 col-md-11  col-sm-9  " style="">
            <div class="d-flex gap-4">
                @if ($superAdmin->foto_profil)
                    <img src="{{ asset('storage/' . $superAdmin->foto_profil) }}" width="80" alt="Foto Profil">
                @else
                    <img src="{{ asset('assets/images/default-fotoProfil.png') }}" width="80" alt="Foto Profil">
                @endif
                <div class="my-auto d-flex flex-column" style="flex-direction: row;">
                    <form action="{{ route('superAdmin.updateFoto', $superAdmin->username) }}" method="POST" enctype="multipart/form-data">
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
                    <button onclick="showAlertDeleteProfile('{{ $superAdmin->username }}')"
                        style="border: 0; color: red; background-color: transparent; text-transform: capitalize;">remove</button>
                </div>
            </div>
            <form action="{{ route('superAdmin.updateProfile', $superAdmin->username )}}" method="POST">
                @csrf
                @method('PATCH')
                <h6 class="mb-4 mt-5 text-capitalize" style="font-weight: 700; opacity: 0.8;">personal details</h6>
                <div class="text-capitalize">
                    <div class="row">
                        <div class="col d-flex flex-column">
                            <label for="nama" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">nama
                                lengkap</label>
                            <input type="text" name="nama_lengkap" value="{{ $superAdmin->nama_lengkap }}"
                                class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;" id="">
                        </div>
                        <div class="col d-flex flex-column">
                            <label for="email" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">email</label>
                            <input type="email" name="email" value="{{ $superAdmin->email }}"
                                class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;" id="">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col d-flex flex-column">
                            <label for="hp" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">No HP</label>
                            <input type="text" name="no_hp" value="{{ $superAdmin->no_hp }}"
                                class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;" id="">
                        </div>
                        <div class="col d-flex flex-column">
                            <label for="alamat" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">alamat</label>
                            <input type="text" name="alamat" value="{{ $superAdmin->alamat }}"
                                class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;" id="">
                        </div>
                    </div>
                </div>
                <h6 class="mb-4 mt-5 text-capitalize" style="font-weight: 700; opacity: 0.8;">additional info</h6>
                <div class="col d-flex flex-column text-capitalize w-50">
                    <label for="nama" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">about</label>
                    <textarea name="about" id="alamat" cols="30" rows="4" class="px-3 py-2 border-0 border-bottom"
                        style="background-color: #F2F4F8;">{{ $superAdmin->about }}</textarea>
                </div>
                <div class="d-flex gap-3 mt-4">
                    <button
                        type="button" onclick="window.location.href='{{ route('superAdmin.dashboard') }}'"
                        style="background-color: #02020259; color: white; padding: 8px 16px; border-radius: 8px; border: 0; margin-left: auto;">Cancel</button>
                    <button
                        type="submit"
                        style="background-color: #A4161A; color: white; padding: 8px 16px; border-radius: 8px; border: 0;"
                        >Update</button>
                </div>
            </form>
        </div>
    </div>
    @if (session('success'))
        <script>
            successMessage = "{{ session('success') }}";
            swal(successMessage, {
                icon: "success",
            });
        </script>
    @elseif (session('error'))
        <script>
            errorMessage = "{{ session('error') }}";
            swal({
                title: "Data Gagal Diperbaharui!",
                text: errorMessage,
                icon: "error",
                button: "OK!",
                });
        </script>
    @endif
    <script>
        // alert delete foto profile
        function showAlertDeleteProfile($username) {
            swal({
                text: "Hapus Foto Profil?",
                icon: "warning",
                buttons: ["Batal", "Hapus"],
                dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        var formDelete = document.getElementById('deleteFoto');
                        formDelete.setAttribute('action', '/superAdmin/langganan/fotoProfil/' + $username);
                        formDelete.submit();
                    } else {
                        swal("Data subscription tidak jadi dihapus.");
                    }
                });
        }

        function uploadFile() {
            document.getElementById('uploadFoto').form.submit();
        }
    </script>
@endsection
