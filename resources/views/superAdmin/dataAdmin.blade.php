@include('template.navbar-super', ['superAdmin', $superAdmin])
@extends('layouts.superadmin')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/super-admin.css') }}">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <div class="p-5">
        <h4 class="text-capitalize fw-bold mb-4">data admin</h4>
        <button
            id="addAdmin"
            style="background-color: #A4161A; color: white; padding: 6px 10px; border-radius: 8px; border: 0; margin: 40px 0px 30px;"
            style="background-color: #A4161A; color: white; padding: 6px 10px; border-radius: 8px; border: 0; margin: 40px 0px 30px;"
            onclick="showModal()">
            Add User
        </button>

        {{-- Modal Tambah --}}
        <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addUserModalLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="form-addUser" class="text-capitalize" method="POST" action="{{ route('super-admin.add-admin') }}">
                            @csrf
                            <div style="border: 0.5px solid #00000030; padding: 12px; text-transform: capitalize;">
                                <h6>profile photo</h6>
                                <div class="d-flex gap-4">
                                    <img id="previewImage" src="{{ asset('assets/images/User Thumb.png') }}" width="80"
                                        class="mt-2" alt="Preview Image">
                                    <div class="my-auto d-flex flex-column" style="flex-direction: row;">
                                        <label for="photoInput"
                                            style="border: 2px solid #A4161A; border-radius: 6px; background-color: white; color: #000000; font-size: 12px; font-weight: 600; padding: 8px 12px; text-transform: capitalize;">
                                            Add Photo
                                            <input type="file" id="photoInput" accept="image/*" style="display:none;">
                                        </label>
                                        <button
                                            style="border: 0; color: red; background-color: transparent; text-transform: capitalize;"
                                            onclick="removePhoto()">Remove</button>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3 d-flex flex-column">
                                <label for="nama"
                                    style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">nama</label>
                                <input type="text" name="nama_lengkap" placeholder="Nama" required
                                    class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;"
                                    id="nama_lengkap">
                            </div>
                            <div class="mt-3 d-flex flex-column">
                                <label for="username"
                                    style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">username</label>
                                <input type="text" name="username" placeholder="Username" required
                                    class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;"
                                    id="username">
                            </div>
                            <div class="mt-3 d-flex flex-column">
                                <label for="email" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">email
                                    address</label>
                                <input type="email" name="email" placeholder="E-Mail" required
                                    class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;"
                                    id="email">
                            </div>
                            <div class="mt-3 d-flex flex-column">
                                <label for="hp" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">No
                                    HP</label>
                                <input type="text" name="no_hp" placeholder="08328732777" required
                                    class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;"
                                    id="no_hp">
                            </div>
                            <div class="d-flex gap-4">
                                <div class="mt-3 d-flex flex-column w-50">
                                    <label for="password"
                                        style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">password</label>
                                    <input type="password" name="password" placeholder="Masukkan Password" required
                                        class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;"
                                        id="password">
                                </div>
                                <div class="mt-3 d-flex flex-column w-50">
                                    <label for="password_confirmation" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">ulangi
                                        password</label>
                                    <input type="text" name="password_confirmation" placeholder="Ulangi Password" required
                                        class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;"
                                        id="password_confirmation">
                                </div>
                            </div>
                            <div class="mt-3 d-flex flex-column">
                                <label for="lokasi"
                                    style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">lokasi</label>
                                <select name="kota" id="lokasi" class="form-select" style="background-color: #F2F4F8;" required>
                                    <option value="">Pilih Lokasi</option>
                                    <option value="Kota Surabaya">Kota Surabaya</option>
                                    <option value="Kota Semarang">Kota Semarang</option>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="submit"
                                    style="background-color: #A4161A; border: 0; border-radius: 8px; color: white; padding: 6px 10px;">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @foreach ($admins as $admin)
            <div
                style="background-color: white; border-radius: 10px; border: 0.2px solid #00000050; padding: 1.2rem; width: 75%; margin-bottom: 8px;">
                <div class="d-flex gap-4">
                    <img src="{{ asset('assets/images/User Thumb.png') }}" width="80" height="80" alt="">
                    <div class="d-flex flex-column text-capitalize text-left fw-semibold"
                        style="font-size: 12px; margin-top: 4px;">
                        <p style="line-height: 24px;">admin {{ $admin->id }} <br>nama: {{ $admin->nama_lengkap }} <br>lokasi:
                            {{ $admin->kota }}</p> {{-- lokasi --}}
                    </div>
                    <div style="margin-left: auto; margin-top: 28px;">
                        <button class="btn btn-info edit-button"
                            style="color: white; padding: 6px 12px; border-radius: 8px; border: 0; font-size: 14px;"
                            data-bs-toggle="modal" data-id="{{ $admin->id }}">Edit</button>
                        {{-- form delete admin --}}
                        <form id="formDeleteAdmin" action="" method="POST" style="display: none">
                            @csrf
                            @method('DELETE')
                        </form>
                        <button onclick="showAlert('{{ $admin->username }}', '{{ $admin->nama_lengkap }}')" class="btn btn-danger"
                            style="color: white; padding: 6px 12px; border-radius: 8px; border: 0; font-size: 14px;">Hapus</button>
                    </div>
                </div>
            </div>
        @endforeach
        {{-- <div class="d-flex justify-content-center mt-4">
            {{ $admins->links() }}
        </div> --}}
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
        // Alert delete admin
        function showAlert(username, namaAdmin) {
            swal({
                    title: "Apakah Anda yakin ingin menghapus data " + namaAdmin + "?",
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: "warning",
                    buttons: ["Batal", "Hapus"],
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        var formDelete = document.getElementById('formDeleteAdmin');
                        formDelete.setAttribute('action', '/super-admin/data-admin/delete/' + username);
                        formDelete.submit();
                    } else {
                        swal("Data tidak jadi dihapus.");
                    }
                });
        }

        function previewPhoto(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#previewImage').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // Convert to base64 string
            }
        }

        // Trigger preview function when file input changes
        $("#photoInput").change(function() {
            previewPhoto(this);
        });

        // Function to remove photo preview
        function removePhoto() {
            $('#photoInput').val(null); // Clear file input
            $('#previewImage').attr('src', '{{ asset('assets/images/User Thumb.png') }}'); // Set default image
        }

        // Fungsi untuk menambahkan @method('PATCH') ke dalam form
        function addPatchMethod(method) {
            var form = document.getElementById('form-addUser');
            var patchInput = document.createElement('input');
            patchInput.setAttribute('type', 'hidden');
            patchInput.setAttribute('name', '_method');
            patchInput.setAttribute('value', method);
            form.appendChild(patchInput);
        }

        // Show Alert Edit
        $('.edit-button').click(function() {
            let adminId = $(this).data('id');

            $.ajax({
                url: '/super-admin/data-admin/showAlertEdit/' + adminId,
                type: 'GET',
                success: function (response) {
                    $('#nama_lengkap').val(response.admin.nama_lengkap);
                    $('#username').val(response.admin.username);
                    $('#email').val(response.admin.email);
                    $('#no_hp').val(response.admin.no_hp);
                    $('#lokasi').val(response.admin.kota);
                    $('#password').removeAttr('required');
                    $('#password_confirmation').removeAttr('required');
                    $('#form-addUser').attr('action', '/super-admin/data-admin/update/' + response.admin.username);
                    addPatchMethod('PATCH');
                    $('#addUserModal').modal('show');
                }
            });
        });

        function showModal() {
            // $('#addUserModal').on('hidden.bs.modal', function () { 
                $('#nama_lengkap').val('');
                $('#username').val('');
                $('#email').val('');
                $('#no_hp').val('');
                $('#lokasi').val('');
                $('#password').val('');
                $('#password_confirmation').val('');
                $('#form-addUser').attr('action', '/super-admin/data-admin/add');
                addPatchMethod('POST');
                $('#addUserModal').modal('show');
            // });
        }
    </script>
@endsection
