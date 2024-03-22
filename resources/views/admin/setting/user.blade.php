@extends('layouts.admin')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/adminAfter.css') }}">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <aside>
        <div class="sidebar" style="left: 250px; background-color: white;">
            <h5 class="text-capitalize mb-5" style="margin-left: -4rem;">pengaturan</h5>
            <div style="margin-left: -28px;">
                <h6 class="text-uppercase fw-normal" style="font-size: 14px;">pengaturan utama</h6>
                <ul class="text-capitalize fw-normal sub-menu" style="font-size: 14px;">
                    <li style="margin-left: 2rem;"><a href="/admin/setting/quotes"
                            class="text-black text-decoration-none">quotes</a></li>
                </ul>
                <hr class="line" />
                <h6 class="text-uppercase fw-normal mt-4" style="font-size: 14px;">panel administrator</h6>
                <ul class="text-capitalize fw-normal sub-menu" style="font-size: 14px;">
                    <li style="margin-left: 2rem;"><a href="/admin/setting/user"
                            class="text-black text-decoration-none">user & organization</a></li>
                </ul>
            </div>
        </div>
    </aside>

    <div style="margin-left: 18rem; margin-top: 5%;">
        <h5 class="text-capitalize">user & organization</h5>
        <p class="mt-4 text-left mb-5">Informasi tentang user guru atau dosen pembimbing dan mitra</p>
        <button data-bs-toggle="modal" data-bs-target="#addGuruModal" data-role="Guru"
            class="mt-4 rounded border-0 add-user-button guru-button"
            style="display: none; background-color: #A4161A; color: white; padding: 8px;">Add User</button>

        <button data-bs-toggle="modal" data-bs-target="#addMitraModal" data-role="Mitra"
            class="mt-4 rounded border-0 add-user-button mitra-button"
            style="display: none; background-color: #A4161A; color: white; padding: 8px;">Add User</button>

        <!-- Role filter buttons -->
        <div class="d-flex mt-4">
            <button onclick="filterUsers('Guru')" id="btnGuru" class="btn btn-info" style="color: black;">Guru</button>
            <button onclick="filterUsers('Mitra')" id="btnMitra" class="btn btn-info" style="color: black;">Mitra</button>
        </div>

        <div class="my-4 mb-5 me-5" id="userList">
            @foreach ($users as $user)
                <div class="user-item-{{ $user['role'] }} bg-white border mb-3 p-3" style="border-radius: 12px;">
                    <div class="d-flex align-items-center gap-4">
                        <img src="{{ asset('assets/images/userAfter.png') }}" width="80" height="80" alt="">
                        <div class="flex-grow-1">
                            <p class="fw-semibold mb-1">{{ $user['username'] }}</p>
                            <p class="mb-1">Name: {{ $user['nama'] }}</p>
                            <div class="d-flex flex-wrap">Privilege:
                                @foreach ($user['privilege'] as $privilege)
                                    <span class="privilege-item">{{ $privilege }}</span>
                                @endforeach
                            </div>
                        </div>
                        <div class="ms-auto">
                            @php
                                $modalTarget = $user['role'] === 'Guru' ? '#editGuruModal' : '#editMitraModal';
                            @endphp
                            <button class="btn btn-info me-2" data-bs-toggle="modal"
                                data-bs-target="{{ $modalTarget }}">Edit</button>
                            <button class="btn btn-danger" onclick="showAlert()">Hapus</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Add Guru Modal --}}
    <div class="modal fade" id="addGuruModal" tabindex="-1" aria-labelledby="addGuruModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addGuruModalLabel">Add Guru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="text-capitalize">
                        <div style="border: 0.5px solid #00000030; padding: 12px; text-transform: capitalize;">
                            <h6>profile photo</h6>
                            <div class="d-flex gap-4">
                                <img id="previewImage" src="{{ asset('assets/images/userAfter.png') }}" width="80"
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
                            <label for="nama" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">nama</label>
                            <input type="text" name="nama" placeholder="Guru"
                                class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;"
                                id="">
                        </div>
                        <div class="mt-3 d-flex flex-column">
                            <label for="username"
                                style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">username</label>
                            <input type="text" name="username" placeholder="Pembimbing"
                                class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;"
                                id="">
                        </div>
                        <div class="mt-3 d-flex flex-column">
                            <label for="email" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">email
                                address</label>
                            <input type="email" name="email" placeholder="guru123@gmail.com"
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
                            <label for="siswa" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">siswa</label>
                            <select name="siswa" id="siswa" class="form-select"
                                style="background-color: #F2F4F8;">
                                <option value="">Tambah mahasiswa</option>
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

    {{-- Edit Guru Modal --}}
    <div class="modal fade" id="editGuruModal" tabindex="-1" aria-labelledby="editGuruModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editGuruModalLabel">Edit Guru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="text-capitalize">
                        <div style="border: 0.5px solid #00000030; padding: 12px; text-transform: capitalize;">
                            <h6>profile photo</h6>
                            <div class="d-flex gap-4">
                                <img id="previewImage" src="{{ asset('assets/images/userAfter.png') }}" width="80"
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
                            <label for="nama" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">nama</label>
                            <input type="text" name="nama" placeholder="Guru"
                                class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;"
                                id="">
                        </div>
                        <div class="mt-3 d-flex flex-column">
                            <label for="username"
                                style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">username</label>
                            <input type="text" name="username" placeholder="Pembimbing"
                                class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;"
                                id="">
                        </div>
                        <div class="mt-3 d-flex flex-column">
                            <label for="email" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">email
                                address</label>
                            <input type="email" name="email" placeholder="guru123@gmail.com"
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
                            <label for="siswa" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">siswa</label>
                            <select name="siswa" id="siswa" class="form-select"
                                style="background-color: #F2F4F8;">
                                <option value="">Tambah mahasiswa</option>
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

    {{-- Add Mitra Modal --}}
    <div class="modal fade" id="addMitraModal" tabindex="-1" aria-labelledby="addMitraModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addMitraModalLabel"> Add Mitra</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="text-capitalize">
                        <div style="border: 0.5px solid #00000030; padding: 12px; text-transform: capitalize;">
                            <h6>profile photo</h6>
                            <div class="d-flex gap-4">
                                <img id="previewImage" src="{{ asset('assets/images/userAfter.png') }}" width="80"
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
                            <label for="nama" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">nama</label>
                            <input type="text" name="nama" placeholder="Mentor"
                                class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;"
                                id="">
                        </div>
                        <div class="mt-3 d-flex flex-column">
                            <label for="username"
                                style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">username</label>
                            <input type="text" name="username" placeholder="Mentor Mitra"
                                class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;"
                                id="">
                        </div>
                        <div class="mt-3 d-flex flex-column">
                            <label for="email" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">email
                                address</label>
                            <input type="email" name="email" placeholder="mentor123@gmail.com"
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
                            <label for="siswa" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">siswa</label>
                            <select name="siswa" id="siswa" class="form-select"
                                style="background-color: #F2F4F8;">
                                <option value="">Tambah mahasiswa</option>
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

    {{-- Edit Mitra Modal --}}
    <div class="modal fade" id="editMitraModal" tabindex="-1" aria-labelledby="editMitraModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editMitraModalLabel">Edit Mitra</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="text-capitalize">
                        <div style="border: 0.5px solid #00000030; padding: 12px; text-transform: capitalize;">
                            <h6>profile photo</h6>
                            <div class="d-flex gap-4">
                                <img id="previewImage" src="{{ asset('assets/images/userAfter.png') }}" width="80"
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
                            <label for="nama" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">nama</label>
                            <input type="text" name="nama" placeholder="Mentor"
                                class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;"
                                id="">
                        </div>
                        <div class="mt-3 d-flex flex-column">
                            <label for="username"
                                style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">username</label>
                            <input type="text" name="username" placeholder="Mentor Mitra"
                                class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;"
                                id="">
                        </div>
                        <div class="mt-3 d-flex flex-column">
                            <label for="email" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">email
                                address</label>
                            <input type="email" name="email" placeholder="mentor123@gmail.com"
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
                            <label for="siswa" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">siswa</label>
                            <select name="siswa" id="siswa" class="form-select"
                                style="background-color: #F2F4F8;">
                                <option value="">Tambah mahasiswa</option>
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

    <script>
        function filterUsers(role) {
            const userItems = document.querySelectorAll('.user-item-' + role);
            const allUserItems = document.querySelectorAll('[class^="user-item-"]');
            const guruButton = document.getElementById('btnGuru');
            const mitraButton = document.getElementById('btnMitra');
            const guruAddButton = document.querySelector('.guru-button');
            const mitraAddButton = document.querySelector('.mitra-button');
            if (role === 'Guru') {
                guruButton.classList.add('btn-info');
                guruButton.classList.remove('btn-secondary');
                mitraButton.classList.remove('btn-info');
                guruAddButton.style.display = 'block';
                mitraAddButton.style.display = 'none';
            } else if (role === 'Mitra') {
                mitraButton.classList.add('btn-info');
                mitraButton.classList.remove('btn-secondary');
                guruButton.classList.remove('btn-info');
                guruAddButton.style.display = 'none';
                mitraAddButton.style.display = 'block';
            }
            allUserItems.forEach(item => item.style.display = 'none');
            userItems.forEach(item => item.style.display = 'block');

            document.querySelectorAll('[id^="btn"]').forEach(btn => btn.classList.remove('btn-info'));

            document.getElementById('btn' + role).classList.add('btn-info');
        }

        filterUsers('Guru');

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

        document.addEventListener('DOMContentLoaded', function() {
            // Mengambil pathname saat ini
            var currentPath = window.location.pathname;

            // Mengambil semua tautan di dalam sub-menu
            var menuLinks = document.querySelectorAll('.sub-menu a');

            // Loop melalui setiap tautan
            menuLinks.forEach(function(link) {
                // Memeriksa jika href dari tautan sama dengan pathname saat ini
                if (link.getAttribute('href') === currentPath) {
                    // Menambahkan kelas 'active' ke tautan yang sesuai
                    link.classList.add('active');
                }
            });
        });
    </script>
@endsection
