@extends('layouts.masterMitra')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/mitrapresensihadir.css') }}">
    <div id="datapresensisiswahadir">
        <div class="container-fluid p-5 ml-2">
            <div class="row">
                <div class="col-md-12 parent-relatife ">
                    <a href="/mitra/laporanpresensi" class="kekiri"><i class="fs-1 fa-solid fa-chevron-left"></i></a>
                    <div class="card">
                        <div class="card-header" style="display: grid; grid-template-columns: auto 1fr auto;">
                            <div style="overflow: hidden;">
                                <img src="assets/images/user.png" class="user">
                            </div>
                            <div>
                                <h3 style="font-size: 40px; margin: 0;">{{ $user->nama_lengkap}}</h3>
                                <p style="margin: 10px;">NIP : MJ/{{ $divisi->nama_divisi }}/POLINES/{{ $user->tgl_masuk }}/{{ $user->id }}</p>
                            </div>
                            <div style="align-self: center;">
                                <label for="search-input">Cari Mahasiswa</label>
                                <div class="input-group mb-3">
                                    <input type="text" id="search-input" class="form-control"
                                        placeholder="     Cari Mahasiswa" aria-label="Cari Mahasiswa"
                                        aria-describedby="basic-addon2">
                                    <i class="fa-solid fa-search"
                                        style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color:black"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="container-card mx-auto p-0 row justify-content-between gap-0 d-flex flex-row ">
                        <div class="col-12 d-flex p-0 mx-auto row justify-content-between gap-0 flex-row">
                            <div class="masa col-3 mx-0 p-3">
                                <div class="row m-0 d-flex justify-content-between ">
                                    <b class="fz8 col-3 p-0">Masa</b>
                                    <p class="fz7 col-8  d-flex justify-content-end p-0" style="white-space: nowrap">
                                        2023-08-21
                                        - 2023-12-30</p>

                                </div>
                                <hr class="m-0 mb-2">
                                <div class="row m-0 d-flex flex-row justify-content-between">
                                    <b class="fz8 col-7 p-0" style="white-space: nowrap;"> Jam Default Masuk</b>
                                    <p class="fz7 col-5 d-flex justify-content-end p-0">06:30:00</p>

                                </div>
                                <hr class="m-0 mb-2">
                                <div class="row m-0 d-flex  flex-row justify-content-between">
                                    <b class="fz8 col-8  p-0" style="white-space: nowrap">Jam Default Pulang</b>
                                    <p class="fz7 col-4 d-flex justify-content-end p-0">21:00:00</p>

                                </div>
                            </div>
                            <div class="masa col-2">
                                <div class=" m-0 py-2 d-flex align-items-center flex-row justify-content-between">
                                    <b class="fz7">Total jam masuk</b>
                                    <p class="masuk fz6 my-auto px-1 py-0">{{ $totalJamMasuk }}</p>
                                </div>
                                <hr class="m-0">
                                <div class=" m-0 d-flex   py-2 align-items-center  flex-row justify-content-between">
                                    <b class="fz7">total masuk</b>
                                    <p class="total fz6 my-auto px-1 py-0">{{ $totalMasukHari}} hari</p>
                                </div>
                                <hr class="m-0">
                                <div class=" m-0 d-flex  py-2  align-items-center  flex-row justify-content-between">
                                    <b class="fz7">target</b>
                                    <p class="target fz6 my-auto px-1 py-01">{{ $target }} jam</p>
                                </div>
                                <hr class="m-0">
                                <div class=" m-0 d-flex   py-2  align-items-center flex-row justify-content-between">
                                    <b class="fz7">sisa</b>
                                    <p class="sisa fz6 my-auto  px-1 py-0">{{ $sisaFormatted }}</p>
                                </div>
                            </div>
                            <div class="masa col-3">

                                <h3 class="tg-0lax m-2 fz7 text-center">Total terlambat (ditandai)</h3>

                                <hr class="m-0">
                                <div class="justify-content-center  gap-0 row flex-column">
                                    <div class="  py-2  row mx-auto d-flex flex-row  align-items-center">
                                        <div class="d-flex flex-row p-0  col-6 justify-content-between">
                                            <b class="tg-0pky mx-0 fz6  ">Masuk</b>
                                            <span class=" py-0 px-1 fz6 mx-1"
                                                style="color:#FFF;background-color:#000 ; border-radius: 8px;">0 x</span>

                                        </div>
                                        <div
                                            class="d-flex col-6 flex-row flex-row justify-content-between p-0 align-items-center">
                                            <b class="tg-0lax fz6">pulang</b>
                                            <span class=" py-0 px-1 fz6 "
                                                style="color:#FFF;background-color:#333 ; border-radius: 8px;">0
                                                x</span>
                                        </div>

                                    </div>
                                    <hr class="m-0">
                                    {{-- q --}}
                                    <div class="  py-2  row mx-auto d-flex flex-row  align-items-center">
                                        <div class="d-flex flex-row p-0 col-6 justify-content-between">
                                            <b class="tg-0lax mx-0 fz6 mx-0">Istirahat keluar</b>
                                            <span class=" py-0 px-1 fz6 mx-1"
                                                style="color:#FFF;background-color:#333 ; border-radius: 8px;">0
                                                x</span>
                                        </div>
                                        <div
                                            class="d-flex col-6 flex-row flex-row justify-content-between p-0 \align-items-center">
                                            <b class="tg-0lax mx-0 fz6 mx-0">istirahat kembali</b>
                                            <span class=" py-0 px-1 fz6 "
                                                style="color:#FFF;background-color:#333 ; border-radius: 8px;">0
                                                x</span>
                                        </div>
                                    </div>
                                    <hr class="m-0">

                                    {{-- \ --}}
                                    <div class=" py-3  row mx-auto d-flex flex-row  align-items-center">
                                        <div class="d-flex flex-row p-0 col-6 justify-content-between"><b
                                                class="tg-0lax mx-0 fz6 mx-0">Ijin keluar</b>
                                            <span class=" py-0 px-1 fz6 mx-1"
                                                style="color:#FFF;background-color:#333 ; border-radius: 8px;">0
                                                x</span>
                                        </div>
                                        <div
                                            class="d-flex col-6 flex-row flex-row justify-content-between p-0 align-items-center">
                                            <b class="tg-0lax mx-0 fz6 mx-0">ijin kembali</b>
                                            <span class=" py-0 px-1 fz6 "
                                                style="color:#FFF;background-color:#333 ; border-radius: 8px;">0
                                                x</span>
                                        </div>
                                    </div>


                                </div>

                            </div>
                            <div class="col-3 border mx-0 d-flex flex-column gap-3">
                                <textarea class="form-control fz8 w-100" placeholder="Tambahkan Catatan Untuk User" id="floatingTextarea2"
                                    style="height: 50px; background-color:#E9E9E9;"></textarea>
                                <div class="w-100 d-flex justify-content-end">
                                    <button type="button" class="btn btn-danger w-20" id="btn-tambah">Tambahkan</button>
                                </div>
                            </div>
                        </div>


                        <br>
                        <div class="container-card2">
                            <button class="butongeser">
                                <<<< <button class="butongeser">>>>>
                            </button>
                        </div>

                        <div class="cubo w-100  p-0">
                            <br>
                            <table class="table table  col-12 m-0 " style="font-size: 10px; ">

                                <thead>
                                    <tr>
                                        <th rowspan="2"><input type="checkbox"></th>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">tanggal</th>
                                        <th colspan="2" style="border-bottom: 1px solid black;">jam kerja</th>
                                        <th colspan="2" style="border-bottom: 1px solid black;">jam istirahat</th>
                                        <th colspan="2" style="border-bottom: 1px solid black;">total jam kerja</th>
                                        <th rowspan="2">log aktivitas</th>
                                        <th rowspan="2">status kehadiran</th>
                                        <th rowspan="2">kebaikan</th>
                                        <th rowspan="2">catatan</th>


                                    <tr class="">
                                        <th>masuk</th>
                                        <th style="border-left: 0.5px solid black;">pulang</th>
                                        <th>mulai</th>
                                        <th style="border-left: 0.5px solid black;">selesai</th>
                                        <th>total jam</th>
                                        <th style="border-left: 0.5px solid black;">(+)(-)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($presensi as $item)
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$item->hari}}</td>
                                        <td>{{$item->jam_masuk}}</td>
                                        <td>{{$item->jam_pulang}}</td>
                                        <td>{{$item->jam_mulai_istirahat}}</td>
                                        <td>{{$item->jam_selesai_istirahat}}</td>
                                        <td>{{ $item->total_jam_kerja }}</td>
                                        <td>{{ $item->hutang_presensi }}</td>
                                        <td>{{$item->log_aktivitas}}</td>
                                        <td>{{$item->status_kehadiran}}</td>
                                        <td>{{$item->kebaikan}}</td>
                                        <td>{{$item->keterangan_status}}</td>

                                    </tr>
                                    @endforeach
                                     
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <br>
                    <button class="btnpdf"><i class="fas fa-download"></i> PDF</button>
                </div>

                <div class="modal fade" id="jamkerja">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Isi dari modal -->
                            <div class="modal-body">
                                <div class="row">
                                    <!-- Baris Ke-1 -->
                                    <div class="keterangan">

                                    </div>
                                    <div style="text-align: center">
                                        <button class="btnkembali" data-bs-dismiss="modal">Kembali</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            const btnTambah = document.getElementById('btn-tambah');

            btnTambah.addEventListener('click', function() {
                swal("Berhasil!!", "Catatan berhasil ditambahkan", "success");
            })
        </script>
    @endsection
