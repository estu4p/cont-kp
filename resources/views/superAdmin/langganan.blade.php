@include('template.navbar-super', ['superAdmin', $superAdmin])
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
                    <form class="text-capitalize" id="form-edit" method="POST" action="">
                        @csrf
                        @method('PATCH')
                        <div class="row mb-3">
                            <div class="col d-flex flex-column">
                                <label for="id" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">ID</label>
                                <input type="number" name="id" placeholder="ID" class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;" id="id" disabled >
                            </div>
                            <div class="col d-flex flex-column">
                                <label for="paket" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">Paket</label>
                                <select name="nama_paket" class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;" id="paket">
                                    @foreach ($paket as $item)
                                        <option value="{{ $item->paket }}">{{ $item->paket }} - {{ $item->metode_bayar }}</option>
                                    @endforeach
                                    {{-- <option value="Bronze">Bronze</option>
                                    <option value="Silver">Silver</option>
                                    <option value="Gold">Gold</option>
                                    <option value="Platinum">Platinum</option> --}}
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col d-flex flex-column w-50">
                                <label for="nama" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">Nama</label>
                                <input type="text" name="nama_lengkap" placeholder="Nama" class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;" id="nama">
                            </div>
                            <div class="d-flex gap-2 w-50">
                                <div class="col d-flex flex-column w-50">
                                    <label for="start" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">Start Date</label>
                                    <input type="date" name="tgl_masuk" placeholder="Start Date" class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;" id="start">
                                </div>
                                <div class="col d-flex flex-column w-50">
                                    <label for="end" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">End Date</label>
                                    <input type="date" name="tgl_keluar" placeholder="End Date" class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;" id="end">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col d-flex flex-column">
                                <label for="email" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">Email</label>
                                <input type="email" name="email" placeholder="Email" class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;" id="email">
                            </div>
                            <div class="col d-flex flex-column">
                                <label for="harga" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">Harga</label>
                                <input type="number" name="harga" placeholder="Harga" class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;" id="harga">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col d-flex flex-column">
                                <label for="telepon" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">Telepon</label>
                                <input type="text" name="no_hp" placeholder="Telepon" class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;" id="telepon">
                            </div>
                            <div class="col d-flex flex-column">
                                <label for="pilihStatus" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">Status Berlangganan</label>
                                <select name="status_akun" class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;" id="pilihStatus">
                                    <option disabled>Pilih status</option>
                                    <option value="aktif">Aktif</option>
                                    <option value="alumni">Alumni</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col w-50 d-flex flex-column">
                                <label for="sekolah" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">Sekolah/Perguruan Tinggi</label>
                                {{-- <input type="text" name="sekolah" placeholder="Sekolah/Perguruan Tinggi" class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;" id="sekolah"> --}}
                                <select name="sekolah" id="sekolah" class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;">
                                    <option selected disabled>Pilih Sekolah</option>
                                    @foreach ($sekolah as $item)
                                    <option value="{{ $item->nama_sekolah }}">{{ $item->nama_sekolah }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col w-50"></div>
                        </div>
                        <div class="modal-footer" style="background-color: #F2F4F8; border-radius: 0 0 15px 15px;">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" style="background-color: #A4161A; color: white; padding: 8px 16px; border-radius: 8px; border: 0;">Simpan</button>
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
                    <option value="aktif">Aktif</option>
                    <option value="alumni">Alumni</option>
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
                    @foreach ($subscriptions as $subscription)
                        <tr>
                            <td class="align-middle">{{ $loop->iteration }}</td>
                            <td class="align-middle">{{ $subscription->user->nama_lengkap ?? '' }}</td>
                            <td class="align-middle text-lowercase">{{ $subscription->user->email ?? '' }}</td>
                            <td class="align-middle">{{ $subscription->user->perguruanTinggi->nama_sekolah ?? '' }}</td>
                            @if ($subscription->paket->paket === 'Bronze')
                                <td class="align-middle">
                                    <p
                                        style="background-color: #AF3333; color: white; border-radius: 20px; padding: 8px; width: 80%; margin: auto;">
                                        {{ $subscription->paket->paket }}</p>
                                </td>
                            @elseif ($subscription->paket->paket === 'Silver')
                                <td class="align-middle">
                                    <p
                                        style="background-color: #1A4CFF; color: white; border-radius: 20px; padding: 8px; width: 80%; margin: auto;">
                                        {{ $subscription->paket->paket }}</p>
                                </td>
                            @elseif ($subscription->paket->paket === 'Gold')
                                <td class="align-middle">
                                    <p
                                        style="background-color: #1AA158; color: white; border-radius: 20px; padding: 8px; width: 80%; margin: auto;">
                                        {{ $subscription->paket->paket }}</p>
                                </td>
                            @else
                                <td class="align-middle">
                                    <p
                                        style="background-color: #4A1A88; color: white; border-radius: 20px; padding: 8px; width: 80%; margin: auto;">
                                        {{ $subscription->paket->paket }}</p>
                                </td>
                            @endif
                            <td class="align-middle">{{ $subscription->user->kota ?? '' }}</td>
                            <td class="align-middle">{{ $subscription->user->status_akun ?? '' }}</td>
                            <td class="align-middle">
                                <button class="btn btn-sm btn-primary edit-button" data-id="{{ $subscription->id ?? '' }}"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                    </svg></button>
                                    <form id="formDeleteAdmin" action="" method="POST" style="display: none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                <button onclick="showAlert('{{ $subscription->id ?? '' }}', '{{ $subscription->user->nama_lengkap ?? '' }}')" class="btn btn-sm btn-danger"><svg xmlns="http://www.w3.org/2000/svg"
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
        function showAlert($id, $name) {
            swal({
                    title: "Apakah Anda yakin ingin menghapus?",
                    text: "Data subscription " + $name + " yang dihapus tidak dapat dikembalikan!",
                    icon: "warning",
                    buttons: ["Batal", "Hapus"],
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        var formDelete = document.getElementById('formDeleteAdmin');
                        formDelete.setAttribute('action', '/superAdmin/langganan/delete/' + $id);
                        formDelete.submit();
                    } else {
                        swal("Data subscription tidak jadi dihapus.");
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

        // menampilkan modal edit
        $('.edit-button').click(function() {
            let subsId = $(this).data('id');

            $.ajax({
                url: '/superAdmin/langganan/showAlertEdit/' + subsId,
                type: 'GET',
                success: function(response) {
                    $('#id').val(response.subscription.id);
                    $('#nama').val(response.subscription.user.nama_lengkap);
                    $('#email').val(response.subscription.user.email);
                    $('#telepon').val(response.subscription.user.no_hp);
                    $('#sekolah').val(response.subscription.user.perguruan_tinggi.nama_sekolah);
                    $('#paket').val(response.subscription.paket.paket);
                    $('#start').val(response.subscription.user.tgl_masuk);
                    $('#end').val(response.subscription.user.tgl_keluar);
                    $('#harga').val(response.subscription.harga);
                    $('#pilihStatus').val(response.subscription.user.status_akun);
                    $('#form-edit').attr('action', '/superAdmin/langganan/update/' + response.subscription.id);
                    $('#edit').modal('show');
                }
            });
        });
    </script>
@endsection
