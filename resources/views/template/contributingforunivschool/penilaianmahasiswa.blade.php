@extends('layouts.sidebarUser')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/penilaianmahasiswa.css') }}">

    <div class="wadah p-5 row m-0 d-flex flex-column justify-content-center">
        <div class="search-container ml-auto mr-0 mb-3">
            <form action="" method="GET">
                <input type="text" placeholder="Cari nama mahasiswa" />
        </div>
        <h1 class="w-100 text-center">Penilaian Mahasiswa</h1>
        <div class="gruppage">
            <select name="page" class="page" id="page">
                <option class="tampil" value="page">page 1 of 1</style>
                </option>
            </select>
            <select name="item" class="item">
                <option value="item">5 item per page</option>
            </select>
        </div>

        <div class="wadah-tabel m-auto mt-5 p-0" style="width:90% !important;">
            <table class="table table-striped" id="mahasiswa-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>Divisi</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mahasiswa as $key => $mhs)
                        <tr class="{{ $key % 2 == 0 ? 'abu' : 'putih' }}">
                            {{-- @dd($mhs) --}}
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $mhs->nama_lengkap }}</td>
                            <td>{{ $mhs->nomor_induk }}</td>
                            <td>{{ $mhs->divisi->nama_divisi }}</td>
                            <td>
                                <div class="{{ $mhs['status_akun'] }}">{{ $mhs->status_akun }}</div>
                            </td>
                            {{-- <td><a href="/lihat,['id' => $mhs->id]"> <i class="fa-solid fa-file-lines"></i></a></td> --}}
                            <td><a href="{{ route('penilaian', ['id' => $mhs->id])}}"><i class="fa-solid fa-file-lines"></i></a></td>
                            {{-- <td><a href="{{ route('penilaian', ['nama_lengkap' => $nama_lengkap])}}"><i class="fa-solid fa-file-lines"></i></a></td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="pagination-container bg-none text-center"></div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var table = document.getElementById('mahasiswa-table');
            var rows = table.getElementsByTagName('tr');
            var itemPerPage = 5;
            var currentPage = 0;

            function showPage(page) {
                for (var i = 0; i < rows.length; i++) {
                    if (i >= page * itemPerPage && i < (page + 1) * itemPerPage) {
                        rows[i].style.display = '';
                    } else {
                        rows[i].style.display = 'none';
                    }
                }
            }

            function setupPagination() {
                var pageCount = Math.ceil(rows.length / itemPerPage);
                var selectPage = document.querySelector('.page');
                selectPage.innerHTML = '';

                for (var i = 0; i < pageCount; i++) {
                    var option = document.createElement('option');
                    option.value = i;
                    option.text = 'Page ' + (i + 1) + ' of ' + pageCount;
                    selectPage.appendChild(option);
                }

                selectPage.addEventListener('change', function(e) {
                    var selectedIndex = e.target.selectedIndex;
                    var selectedOption = e.target.options[selectedIndex];
                    var selectedPageText = selectedOption.innerText;
                    document.querySelector('.tampil').innerText = selectedPageText;
                    handlePaginationClick(parseInt(e.target.value) + 1);
                });

                var paginationContainer = document.querySelector('.pagination-container');
                paginationContainer.innerHTML = '';

                var currentPageNumber = currentPage + 1;
                var totalPages = pageCount;

                var pagination = '';
                if (totalPages > 1) {
                    if (currentPageNumber > 1) {
                        pagination += '<button class="pagination-button" onclick="handlePaginationClick(' + (
                            currentPageNumber - 1) + ')"></button>';
                    }

                    if (currentPageNumber > 3) {
                        pagination +=
                            '<button class="pagination-button" onclick="handlePaginationClick(1)">1</button>';
                        if (currentPageNumber > 4) {
                            pagination += '<span class="pagination-button"></span>';
                        }
                    }

                    for (var i = currentPageNumber - 2; i <= currentPageNumber + 2; i++) {
                        if (i > 0 && i <= totalPages) {
                            if (i === currentPageNumber) {
                                pagination +=
                                    '<button class="pagination-button actived" onclick="handlePaginationClick(' +
                                    i +
                                    ')"><b><u>' + i + '</u></b></button>';
                            } else {
                                pagination += '<button class="pagination-button" onclick="handlePaginationClick(' +
                                    i + ')">' + i + '</button>';
                            }
                        }
                    }

                    if (currentPageNumber < totalPages - 2) {
                        if (currentPageNumber < totalPages - 3) {
                            pagination += '<span class="pagination-button"></span>';
                        }
                        pagination += '<button class="pagination-button" onclick="handlePaginationClick(' +
                            totalPages + ')">' + totalPages + '</button>';
                    }

                    if (currentPageNumber < totalPages) {
                        pagination += '<button class="pagination-button" onclick="handlePaginationClick(' + (
                            currentPageNumber + 1) + ')"></button>';
                    }
                }

                paginationContainer.innerHTML = pagination;
            }

            function handlePaginationClick(pageNumber) {
                currentPage = pageNumber - 1;
                showPage(currentPage);
                setupPagination();
            }

            document.querySelector('.page').addEventListener('change', function(e) {
                handlePaginationClick(parseInt(e.target.value) + 1);
            });

            showPage(currentPage);
            setupPagination();
        });
    </script>
@endsection
