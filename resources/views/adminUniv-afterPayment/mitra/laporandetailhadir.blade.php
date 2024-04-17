@extends('layouts.masterAfterPay')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/adminUniv-afterPayment/mitra/laporandetailhadir.css') }}">
    <div class="container-fluid p-5 ml-2">
        <div class="row">
            <div class="col-md-12 parent-relatife">
                <a href="/AdminUniv-mitra-laporanpresensi" class="kekiri"><i class="fs-1 fa-solid fa-chevron-left"></i></a>
                <div class="card">
                    <div class="card-header" style="display: grid; grid-template-columns: auto 1fr auto;">
                        <div style="overflow: hidden;">
                            <img src="assets/images/user.jpg" class="user">
                        </div>
                        <div>
                            <h3 style="font-size: 30px; margin: 0;">{{ $user->nama_lengkap }}</h3>
                            <p style="margin: 0;">NIP:
                                MJ/{{ $divisi->nama_divisi }}/{{ $sekolah->nama_sekolah }}/{{ $user->tgl_masuk }}/{{ $user->id }}
                            </p>
                        </div>
                        <div style="align-self: center;">
                            <label for="search-input">Cari Status Kehadiran</label>
                            <div class="input-group mb-3">
                                <input type="text" id="search-input" class="form-control" placeholder="     Pencarian"
                                    aria-label="Cari Mahasiswa" aria-describedby="basic-addon2">
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
                                    <td><span class="total">{{ $total_masuk }} hari</td>
                                </tr>
                                <tr>
                                    <th>target</th>
                                    <td><span class="target">{{ $target }} jam</td>
                                </tr>
                                <tr>
                                    <th>sisa</th>
                                    <td><span class="sisa">{{ $sisa }} jam</td>
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
                <table class="table  " style="font-size: 10px; ">
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
                        </tr>
                        <tr>
                            <th>masuk</th>
                            <th style="border-left: 1px solid black;">pulang</th>
                            <th>mulai</th>
                            <th style="border-left: 1px solid black;">selesai</th>
                            <th>total jam</th>
                            <th style="border-left: 1px solid black;">(+)(-)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($presensi as $no => $item)
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>{{ $no + 1 }}</td>
                                <td>{{ $item->hari }}</td>
                                <td>{{ $item->jam_masuk }}</td>
                                <td>{{ $item->jam_pulang }}</td>
                                <td>{{ $item->jam_mulai_istirahat }}</td>
                                <td>{{ $item->jam_selesai_istirahat }}</td>
                                <td>{{ $item->total_jam_kerja }}</td>
                                <td>{{ $item->hutang_presensi }}</td>
                                <td>{{ $item->log_aktivitas }}</td>
                                <td>{{ $item->status_kehadiran }}</td>
                                <td>{{ $item->kebaikan }}</td>
                                <td>{{ $item->keterangan_status }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <button class="btnpdf"><i class="fas fa-download"></i> PDF</button>
            </div>
        </div>
    </div>

    <div class="modal fade" id="jamkerja">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Isi dari modal -->
                <div class="modal-body">

                    <!-- Baris Ke-1 -->
                    <div class="keterangan">
                        “Maaf saya telat datang dan absen dikarenakan macet saat perjalanan berangkat sebab terjadi
                        sebuah perampokan dan saya berinisiatif untuk
                        menolong korban”
                    </div>
                    <BR></BR>
                    <div style="text-align: center">
                        <button class="btnkembali" data-bs-dismiss="modal">Kembali</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
