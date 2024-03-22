@include('template.navbar-super')
@extends('layouts.superadmin')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/super-admin.css') }}">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #F2F4F8; border-radius: 15px 15px 0 0;">
                    <h5 class="modal-title" id="editLabel">Edit Subscription</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="text-capitalize">
                        <div class="row mb-3">
                            <div class="col d-flex flex-column">
                                <label for="id" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">ID</label>
                                <input type="number" name="id" placeholder="ID" class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;" id="">
                            </div>
                            <div class="col d-flex flex-column">
                                <label for="paket" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">Paket</label>
                                <select name="paket" class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;" id="">
                                    <option value="Bronze">Bronze</option>
                                    <option value="Silver">Silver</option>
                                    <option value="Gold">Gold</option>
                                    <option value="Platinum">Platinum</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col d-flex flex-column w-50">
                                <label for="nama" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">Nama</label>
                                <input type="text" name="nama" placeholder="Nama" class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;" id="">
                            </div>
                            <div class="d-flex gap-2 w-50">
                                <div class="col d-flex flex-column w-50">
                                    <label for="start" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">Start Date</label>
                                    <input type="date" name="start" placeholder="Start Date" class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;" id="">
                                </div>
                                <div class="col d-flex flex-column w-50">
                                    <label for="end" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">End Date</label>
                                    <input type="date" name="end" placeholder="End Date" class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;" id="">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col d-flex flex-column">
                                <label for="email" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">Email</label>
                                <input type="email" name="email" placeholder="Email" class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;" id="">
                            </div>
                            <div class="col d-flex flex-column">
                                <label for="harga" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">Harga</label>
                                <input type="number" name="harga" placeholder="Harga" class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;" id="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col d-flex flex-column">
                                <label for="telepon" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">Telepon</label>
                                <input type="number" name="telepon" placeholder="Telepon" class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;" id="">
                            </div>
                            <div class="col d-flex flex-column">
                                <label for="status" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">Status Berlangganan</label>
                                <select name="status" class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;" id="">
                                    <option value="">Pilih status</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col w-50 d-flex flex-column">
                                <label for="pt" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">Sekolah/Perguruan Tinggi</label>
                                <input type="text" name="pt" placeholder="Sekolah/Perguruan Tinggi" class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;" id="">
                            </div>
                            <div class="col w-50"></div>
                        </div>
                        <div class="modal-footer" style="background-color: #F2F4F8; border-radius: 0 0 15px 15px;">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button onclick="alert()" type="button" style="background-color: #A4161A; color: white; padding: 8px 16px; border-radius: 8px; border: 0;">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="p-5 text-capitalize">
        <h3 class="fw-bold mb-4">subscription</h3>
        <div class="float-end">
            <h5>cari data subscription</h5>
            <div class="d-flex gap-2">
                <input type="text" name="search" id="search" placeholder="Pencarian"
                    class="form-control shadow-sm">
                <input type="text" name="search" id="search-loc" placeholder="Cari Berdasarkan Lokasi"
                    class="form-control shadow-sm">
            </div>
        </div>
        <div class="mt-5 pt-5">
            <div class="d-flex gap-3">
                <select name="page" id="page" class="form-control">
                    <option value="1">page 1 of 2</option>
                    <option value="2">page 2 of 2</option>
                </select>
                <select name="int" id="int" class="form-control">
                    <option value="5" selected>5 item per page</option>
                    <option value="10">10 item per page</option>
                </select>
                <select name="status" id="status" class="form-control">
                    <option value="">Status berlangganan</option>
                    <option value="Aktif">Aktif</option>
                    <option value="Tidak Aktif">Tidak Aktif</option>
                </select>
            </div>
            <table class="mt-4 table table-striped">
                <thead class="text-center">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Perguruan Tinggi</th>
                        <th scope="col">Paket Berlangganan</th>
                        <th scope="col">Lokasi</th>
                        <th scope="col">Status Berlangganan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center" style="font-size: 13px;">
                    @foreach ($members as $member)
                        <tr>
                            <td class="align-middle">{{ $member['id'] }}</td>
                            <td class="align-middle">{{ $member['nama'] }}</td>
                            <td class="align-middle text-lowercase">{{ $member['email'] }}</td>
                            <td class="align-middle">{{ $member['pt'] }}</td>
                            @if ($member['paket'] === 'Bronze')
                                <td class="align-middle">
                                    <p
                                        style="background-color: #AF3333; color: white; border-radius: 20px; padding: 8px; width: 80%; margin: auto;">
                                        {{ $member['paket'] }}</p>
                                </td>
                            @elseif ($member['paket'] === 'Silver')
                                <td class="align-middle">
                                    <p
                                        style="background-color: #1A4CFF; color: white; border-radius: 20px; padding: 8px; width: 80%; margin: auto;">
                                        {{ $member['paket'] }}</p>
                                </td>
                            @elseif ($member['paket'] === 'Gold')
                                <td class="align-middle">
                                    <p
                                        style="background-color: #1AA158; color: white; border-radius: 20px; padding: 8px; width: 80%; margin: auto;">
                                        {{ $member['paket'] }}</p>
                                </td>
                            @else
                                <td class="align-middle">
                                    <p
                                        style="background-color: #4A1A88; color: white; border-radius: 20px; padding: 8px; width: 80%; margin: auto;">
                                        {{ $member['paket'] }}</p>
                                </td>
                            @endif
                            <td class="align-middle">{{ $member['lokasi'] }}</td>
                            <td class="align-middle">{{ $member['status'] }}</td>
                            <td class="align-middle">
                                <button data-bs-toggle="modal" data-bs-target="#edit" class="btn btn-sm btn-primary"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                    </svg></button>
                                <button onclick="showAlert()" class="btn btn-sm btn-danger"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="16" height="16" fill="currentColor" class="bi bi-trash"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                        <path
                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                    </svg></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function alert() {
            swal("Data berhasil diubah!", {
                icon: "success",
            });
        }
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
        document.getElementById('status').addEventListener('change', function() {
            var selectedStatus = this.value;

            var rows = document.querySelectorAll('tbody tr');
            rows.forEach(function(row) {
                var statusCell = row.querySelector('td:nth-child(7)').textContent.trim();
                if (selectedStatus === '' || selectedStatus === statusCell) {
                    row.style.display = 'table-row';
                } else {
                    row.style.display = 'none';
                }
            });
        });
        handleItemsPerPageChange();

        document.getElementById('page').addEventListener('change', function() {
            var selectedPage = this.value;
            var rows = document.querySelectorAll('tbody tr');
            var firstRowIndex = (selectedPage - 1) * getSelectedItemsPerPage();
            var lastRowIndex = firstRowIndex + getSelectedItemsPerPage();

            rows.forEach(function(row, index) {
                if (index >= firstRowIndex && index < lastRowIndex) {
                    row.style.display = 'table-row';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        document.getElementById('int').addEventListener('change', function() {
            handleItemsPerPageChange();
            handlePageChange();
        });

        function handleItemsPerPageChange() {
            var selectedInt = getSelectedItemsPerPage();
            var rows = document.querySelectorAll('tbody tr');
            rows.forEach(function(row, index) {
                if (index < selectedInt) {
                    row.style.display = 'table-row';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        function getSelectedItemsPerPage() {
            return parseInt(document.getElementById('int').value);
        }

        function handlePageChange() {
            var selectedPage = document.getElementById('page').value;
            var rows = document.querySelectorAll('tbody tr');

            var firstRowIndex = (selectedPage - 1) * getSelectedItemsPerPage();
            var lastRowIndex = firstRowIndex + getSelectedItemsPerPage();

            rows.forEach(function(row, index) {
                if (index >= firstRowIndex && index < lastRowIndex) {
                    row.style.display = 'table-row';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        document.getElementById('search').addEventListener('input', function() {
            var searchTerm = this.value.toLowerCase();
            var rows = document.querySelectorAll('tbody tr');

            rows.forEach(function(row) {
                var nama = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                var email = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
                var pt = row.querySelector('td:nth-child(4)').textContent.toLowerCase();
                var paket = row.querySelector('td:nth-child(5)').textContent.toLowerCase();
                var lokasi = row.querySelector('td:nth-child(6)').textContent.toLowerCase();

                if (nama.includes(searchTerm) || email.includes(searchTerm) || pt.includes(searchTerm) ||
                    paket.includes(searchTerm) || lokasi.includes(searchTerm)) {
                    row.style.display = 'table-row';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        document.getElementById('search-loc').addEventListener('input', function() {
            var searchLocTerm = this.value.toLowerCase();
            var rows = document.querySelectorAll('tbody tr');

            rows.forEach(function(row) {
                var lokasi = row.querySelector('td:nth-child(6)').textContent.toLowerCase();

                if (lokasi.includes(searchLocTerm)) {
                    row.style.display = 'table-row';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
@endsection
