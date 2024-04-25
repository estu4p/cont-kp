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
                    <li style="margin-left: 2rem;"><a href="/AdminUniv/setting/quotes"
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
        <button data-bs-toggle="modal" data-bs-target="#userModal" data-role="Guru" onclick="populateModal('add', 'Guru')"
            class="mt-4 rounded border-0 add-user-button guru-button"
            style="display: none; background-color: #A4161A; color: white; padding: 8px;">Add User</button>

        <button data-bs-toggle="modal" data-bs-target="#userModal" data-role="Mitra" onclick="populateModal('add', 'Mitra')"
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
                                    <span class="privilege-item" style="font-size: 10px; font-weight: 500;">{{ $privilege }}</span>
                                @endforeach
                            </div>
                        </div>
                        <div class="ms-auto">
                            <button data-bs-toggle="modal" data-bs-target="#userModal" data-role="{{ $user['role'] }}" onclick="populateModal('edit', '{{ $user['role'] }}')" class="btn btn-info me-2">Edit</button>
                            <button class="btn btn-danger" onclick="showAlert()">Hapus</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userModalLabel">Edit Guru</h5>
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
                            <label for="mahasiswa" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">
                                pilih mahasiswa</label>
                            <div class="d-flex">
                                <button id="pilihMetode" class="py-2 border-0 border-bottom"
                                    style="background-color: #F2F4F8; width: 100%;" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false"
                                    aria-controls="collapseExample"
                                    style="border: 2px solid #E9E9E9; padding: 15px; border-radius: 0px 8px 8px 0px; width: 100%;">
                                    Pilih Mahasiswa<i class="fa-solid fa-caret-down" style="padding-left: 70%;"></i>
                                </button>
                            </div>

                            <div class="collapse" id="collapseExample">
                                <div class="px-3 py-2 mt-2 border-0 border-bottom"
                                    style="background-color: #F2F4F8; width: 100%;">
                                    <div class="d-flex" style="width: 100%;">
                                        <p class="text-capitalize">available users</p>
                                        <button class="border-0 bg-transparent"
                                            style="margin-left: 70%; margin-top: -20px; right: 0;"
                                            onclick="toggleCollapse()">
                                            <i class="fa-solid fa-caret-up"></i>
                                        </button>
                                    </div>
                                    <div>
                                        <input type="text" name="search" id="search"
                                            placeholder="Cari berdasarkan NIM"
                                            class="px-2 py-1 border-0 border-bottom rounded mb-2"
                                            style="background-color: #ffffff; border: 0.5px solid #0000003f; font-size: 12px;">
                                        <table class="table table-bordered text-center"
                                            style="width: 100%; font-size: 12px;">
                                            <thead>
                                                <td><input type="checkbox" id="checkAll"></td>
                                                <td>NIM</td>
                                                <td>Nama</td>
                                                <td>Prodi</td>
                                                <td><button class="border-0 bg-transparent"
                                                        style="opacity: 0; pointer-event: none;"></button></td>
                                            </thead>
                                            <tbody id="tableBody">
                                            </tbody>
                                        </table>

                                        <p class="text-capitalize my-2">selected users</p>
                                        <table class="table table-bordered text-center"
                                            style="width: 100%; font-size: 12px;">
                                            <thead>
                                                <tr>
                                                    <td>NIM</td>
                                                    <td>Nama</td>
                                                    <td>Prodi</td>
                                                    <td><button class="border-0 bg-transparent"
                                                            style="opacity: 0; pointer-event: none;"></button></td>
                                                </tr>
                                            </thead>
                                            <tbody id="selectedDataBody" class="table-danger">
                                            </tbody>
                                        </table>
                                    </div>
                                    <div>

                                    </div>
                                </div>
                            </div>
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
        var data = [{
                nim: '647825343329',
                nama: 'rudi',
                prodi: 'TI'
            },
            {
                nim: '647825343330',
                nama: 'Almi',
                prodi: 'TI'
            },
            {
                nim: '647825343331',
                nama: 'Jaka',
                prodi: 'TI'
            },
            {
                nim: '647825343332',
                nama: 'Yessa Khoirunissa',
                prodi: 'TI'
            },
            {
                nim: '647825343333',
                nama: 'Febrian Adipurnowo',
                prodi: 'TI'
            },
        ];

        var tbody = document.getElementById('tableBody');
        var selectedDataBody = document.getElementById('selectedDataBody');
        var checkAllCheckbox = document.getElementById('checkAll');

        data.forEach(function(item) {
            var row = `<tr>
                            <td><input type="checkbox" style="color:#A4161A;"></td>
                            <td>${item.nim}</td>
                            <td>${item.nama}</td>
                            <td>${item.prodi}</td>
                            <td><button class="border-0 bg-transparent" style="color:#A4161A;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                    </svg>
                                </button>
                            </td>
                        </tr>`;
            tbody.innerHTML += row;
        });

        function handleCheckAll() {
            var checkboxes = document.querySelectorAll('#tableBody input[type="checkbox"]');
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = checkAllCheckbox.checked;
            });
            // Memperbarui data terpilih setelah semua checkbox diatur
            updateSelectedData();
        }

        // Event listener untuk checkbox "checkAll"
        checkAllCheckbox.addEventListener('change', handleCheckAll);

        function updateSelectedData() {
            selectedDataBody.innerHTML = ''; // Hapus data sebelumnya

            var checkboxes = document.querySelectorAll('#tableBody input[type="checkbox"]:checked');
            checkboxes.forEach(function(checkbox) {
                var row = checkbox.parentElement.parentElement.cloneNode(true);
                row.firstElementChild.remove(); // Hapus checkbox
                selectedDataBody.appendChild(row);
            });
        }

        // Tambahkan event listener untuk checkbox di tabel utama
        tbody.addEventListener('change', updateSelectedData);

        document.getElementById('search').addEventListener('input', function() {
            var searchTerm = this.value.toLowerCase();
            var rows = document.querySelectorAll('tbody tr');

            rows.forEach(function(row) {
                var nim = row.querySelector('td:nth-child(2)').textContent.toLowerCase();

                if (nim.includes(searchTerm)) {
                    row.style.display = 'table-row';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        function toggleCollapse() {
            var collapseElement = document.getElementById("collapseExample");
            var isCollapsed = collapseElement.classList.contains("show");

            if (isCollapsed) {
                collapseElement.classList.remove("show");
            }
        }

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

        function populateModal(action, role) {
        var modal = $('#userModal');
        var modalTitle = modal.find('.modal-title');
        var submitButton = modal.find('.modal-footer button');
        
        // Dynamically set title and submit button text based on action
        if (action === 'add') {
            modalTitle.text('Add ' + role);
            submitButton.text('Add');
        } else if (action === 'edit') {
            modalTitle.text('Edit ' + role);
            submitButton.text('Save Changes');
        }
        modal.modal('show');
    }
    </script>
@endsection
