@extends('layouts.masterAfterPay')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/adminUniv-afterPayment/mitra/laporandetailizin.css') }}">
    <div id="datapresensisiswaizin">
        <div class="container-fluid p-5 ml-2">
            <div class="row">
                <div class="col-md-12 parent-relatife">
                    <a href="/AdminUniv-mitra-laporanpresensi" class="kekiri"><i
                            class="fs-1 fa-solid fa-chevron-left"></i></a>
                    <div class="card">
                        <div class="card-header" style="display: grid; grid-template-columns: auto 1fr auto;">
                            <div style="overflow: hidden;">
                                <img src="assets/images/user.jpg" class="user">
                            </div>
                            <div>
                                <h3 style="font-size: 30px;">{{ $user->nama_lengkap }}</h3>
                                <p style="margin: 0;">NIP:
                                    MJ/{{ $divisi->nama_divisi }}/{{ $sekolah->nama_sekolah }}/{{ $user->tgl_masuk }}/{{ $user->id }}
                                </p>
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
                    <div class="container-card">
                        <div class="masa">
                            <table>
                                <tbody>
                                    <tr>
                                        <th>Masa</th>
                                        <td>2023-08-21 - 2023-12-30</td>
                                    </tr>
                                    <tr>
                                        <th>Jam Default Masuk</th>
                                        <td>{{ $jam_default->jam_default_masuk }}</td>
                                    </tr>
                                    <tr>
                                        <th>Jam Default Pulang</th>
                                        <td>{{ $jam_default->jam_default_pulang }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="masa">
                            <table>
                                <tbody>
                                    <tr>
                                        <th>Total jam masuk</th>
                                        <td><span class="masuk">{{ $total_jam_masuk->total_jam_masuk }}</span></td>
                                    </tr>
                                    <tr>
                                        <th>total masuk</th>
                                        <td><span class="total">{{ $total_masuk }} Hari</td>
                                    </tr>
                                    <tr>
                                        <th>target</th>
                                        <td><span class="target">{{ $target }} Jam</td>
                                    </tr>
                                    <tr>
                                        <th>sisa</th>
                                        <td><span class="sisa">{{ $sisa }} Jam</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="masa">
                            <table class="tg">
                                <thead>
                                    <tr>
                                        <th colspan="4">Total terlambat (ditandai)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Masuk</td>
                                        <td><span class="total_terlambat">0 x</span></td>
                                        <td>pulang</td>
                                        <td><span class="total_terlambat">0 x</span></td>
                                    </tr>
                                    <tr>
                                        <td>Istirahat keluar</td>
                                        <td><span class="total_terlambat">0 x</span></td>
                                        <td>istirahat kembali</td>
                                        <td><span class="total_terlambat">0 x</span></td>
                                    </tr>
                                    <tr>
                                        <td>Ijin keluar</td>
                                        <td><span class="total_terlambat">0 x</span></td>
                                        <td>ijin kembali</td>
                                        <td><span class="total_terlambat">0 x</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <br>
                    <div class="container-card2">
                        <button class="butongeser">
                            <<<<</button>
                                <button class="butongeser">>>>></button>
                    </div>
                    <br>
                    <table class="table" style="font-size: 10px;">
                        <thead>
                            <tr>
                                <th rowspan="2"></th>
                                <th rowspan="2">no</th>
                                <th rowspan="2">tanggal</th>
                                <th colspan="2">Jam kerja</th>
                                <th colspan="2">jam istirahat</th>
                                <th colspan="2">total jam kerja</th>
                                <th rowspan="2">status kehadiran</th>
                                <th rowspan="2">status ganti jam</th>
                            </tr>
                            <tr>
                                <th>masuk</th>
                                <th>Pulang</th>
                                <th>mulai</th>
                                <th>selesai</th>
                                <th>total jam</th>
                                <th>(+)(-)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($presensi as $no => $item)
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>{{ $no + 1 }}</td>
                                    <td>Senin, {{ $item->hari }}</td>
                                    <td>--</td>
                                    <td>--</td>
                                    <td>--</td>
                                    <td>--</td>
                                    <td>--</td>
                                    <td>--</td>
                                    <td>izin <i class="fas fa-info-circle" data-bs-toggle="modal"
                                            data-bs-target="#statuskehadiran"></i>
                                    </td>
                                    <td>{{ $item->status_ganti_jam }}</td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                    <button class="btnpdf"><i class="fas fa-download"></i> PDF</button>
                </div>
                <div class="modal fade" id="statuskehadiran">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="padding-left: 40%;">
                                <h1>Izin</h1>
                            </div>
                            <!-- Isi dari modal -->
                            <div class="modal-body">

                                <!-- Baris Ke-1 -->
                                <div class="keterangan">
                                    “ Maaf saya tidak dapat mengikuti magang untuk
                                    hari ini dikarenakan saya sedang tidak enak
                                    badan dan tubuh saya gatal karena saya jarang
                                    mandi ”
                                </div>
                                <!-- Break Line -->
                                <div class="line-hr-1"></div>
                                <!-- Baris Ke-2 -->
                                Link Foto Gdrive
                                <div class="linkdrive"></div>

                                <!-- Break Line -->
                                <div class="line-hr-1"></div>
                                <!-- Baris Ke-3 -->
                                kategori izin
                                <div class="keterangan2"></div>
                                <!-- Break Line -->
                                <div class="line-hr-1"></div>
                                <!-- End -->
                                <br>
                                <div style="display: flex; justify-content: center;">
                                    <div style="background-color: #F2F2F2; padding: 5px;">tidak ganti jam</div>
                                </div>
                            </div>
                            <div style="text-align: center">
                                <button class="btnkembali" data-bs-dismiss="modal">Kembali</button>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    @endsection
