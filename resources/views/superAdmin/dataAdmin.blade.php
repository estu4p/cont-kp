@include('template.navbarSuper')
@extends('layouts.superAdmin')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/super-admin.css') }}">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <div class="p-5">
        <h4 class="text-capitalize fw-bold mb-4">data admin</h4>
        <button
            style="background-color: #A4161A; color: white; padding: 6px 10px; border-radius: 8px; border: 0; margin: 40px 0px 30px;"
            data-bs-toggle="modal" data-bs-target="#addUserModal">Add
            User</button>

        {{-- Modal Tambah --}}
        <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addUserModalLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="text-capitalize">
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
                                <input type="text" name="nama" placeholder="Nama"
                                    class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;"
                                    id="">
                            </div>
                            <div class="mt-3 d-flex flex-column">
                                <label for="username"
                                    style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">username</label>
                                <input type="text" name="username" placeholder="Username"
                                    class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;"
                                    id="">
                            </div>
                            <div class="mt-3 d-flex flex-column">
                                <label for="email" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">email
                                    address</label>
                                <input type="email" name="email" placeholder="E-Mail"
                                    class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;"
                                    id="">
                            </div>
                            <div class="mt-3 d-flex flex-column">
                                <label for="hp" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">No
                                    HP</label>
                                <input type="number" name="hp" placeholder="08328732777"
                                    class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;"
                                    id="">
                            </div>
                            <div class="d-flex gap-4">
                                <div class="mt-3 d-flex flex-column w-50">
                                    <label for="password"
                                        style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">password</label>
                                    <input type="password" name="password" placeholder="Masukkan Password"
                                        class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;"
                                        id="">
                                </div>
                                <div class="mt-3 d-flex flex-column w-50">
                                    <label for="konfirm" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">ulangi
                                        password</label>
                                    <input type="password" name="konfirm" placeholder="Ulangi Password"
                                        class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;"
                                        id="">
                                </div>
                            </div>
                            <div class="mt-3 d-flex flex-column">
                                <label for="lokasi"
                                    style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">lokasi</label>
                                <select name="lokasi" id="lokasi" class="form-select"
                                    style="background-color: #F2F4F8;">
                                    <option value="">Pilih Lokasi</option>
                                    <option value="yogyakarta">Yogyakarta</option>
                                    <option value="jawa tengah">Jawa Tengah</option>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button onclick="alert()" type="button"
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
                        <p style="line-height: 24px;">admin {{ $admin['id'] }} <br>nama: {{ $admin['nama'] }} <br>lokasi:
                            {{ $admin['lokasi'] }}</p>
                    </div>
                    <div style="margin-left: auto; margin-top: 28px;">
                        <button class="btn btn-info"
                            style="color: white; padding: 6px 12px; border-radius: 8px; border: 0; font-size: 14px;"
                            data-bs-toggle="modal" data-bs-target="#addUserModal">Edit</button>
                        <button onclick="showAlert()" class="btn btn-danger"
                            style="color: white; padding: 6px 12px; border-radius: 8px; border: 0; font-size: 14px;">Hapus</button>
                    </div>
                </div>
            </div>
        @endforeach
        {{-- {{ $admins->links() }} --}}
    </div>
    <script>
        function showAlert() {
            swal({
                    title: "Apakah Anda yakin ingin menghapus?",
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: "warning",
                    buttons: ["Batal", "Hapus"],
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("Data berhasil dihapus!", {
                            icon: "success",
                        });
                    } else {
                        swal("Data tidak jadi dihapus.");
                    }
                });
        }

        function alert() {
            swal("Data berhasil ditambahkan!", {
                icon: "success",
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
    </script>
@endsection
