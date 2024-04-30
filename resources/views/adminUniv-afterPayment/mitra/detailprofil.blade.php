@extends('layouts.master')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('assets/css/presensi/datapresensisiswa.css') }}">
<div id="datapresensisiswa">
    <div class="container-fluid p-5 ml-2">
        <div class="row">
            <div class="col-md-12 parent-relative">
                <a href="/presensi" class="kekiri" style="color:#000"><i class="fs-1 fa-solid fa-chevron-left"></i></a>
                <div class="card">
                    <div class="card-header" style="display: grid; grid-template-columns: auto 1fr auto;">
                        <div style="overflow: hidden;">
                            <img src="{{ asset('assets/images/user.png') }}" class="user">
                        </div>
                        <div>
                            <h3 style="font-size: 50px; margin: 0;">{{ $datasiswa->nama_lengkap }}</h3>
                            <p style="margin: 0;">NIP :MJ {{ $datasiswa->nomor_induk }}</p>
                        </div>
                        <div style="align-self: center;">
                            <label for="search-input">Cari Mahasiswa</label>
                            <div class="input-group mb-3">
                                <input type="text" id="search-input" class="form-control" placeholder="     Cari Mahasiswa" aria-label="Cari Mahasiswa" aria-describedby="basic-addon2">
                                <i class="fa-solid fa-search" style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color:black"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="container-card">
                    <div class="masa">
                        <table>
                            <tbody>
                                <tr >
                                    <th>Masa</th>
                                    <td>{{ $datasiswa->tgl_masuk }}</td>
                                    <td>{{ $datasiswa->tgl_keluar }}</td>
                                </tr>
                                <tr>
                                    <th>Jam Default Masuk</th>
                                    <td>{{ $datasiswa->jam_default_masuk }}</td>
                                </tr>
                                <tr>
                                    <th>Jam Default Pulang</th>
                                    <td>{{  $datasiswa->jam_default_pulang }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="masa">
                        <table>
                            <tbody>
                                <tr>
                                    <th>Total jam masuk</th>
                                    <td><span class="masuk">{{ $datasiswa->presensi->total_jam_kerja }}</span></td>
                                </tr>
                                <tr>
                                    <th>total masuk</th>
                                    <td><span class="total">{{ $datasiswa->total_hari_masuk }} hari</span></td>
                                </tr>
                                <tr>
                                    <th>target</th>
                                    <td><span class="target">{{ $datasiswa->presensi->target }}</span></td>
                                </tr>
                                <tr>
                                    <th>sisa</th>
                                    <td><span class="sisa">{{ $datasiswasisa_jam }}</span></td>
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
                                <td><span class="total_terlambat">{{ $datasiswa->total_terlambat_masuk }} x</span></td>
                                <td>pulang</td>
                                <td><span class="total_terlambat">{{ $datasiswa->total_terlambat_pulang }} x</span></td>
                              </tr>
                              <tr>
                                <td>Istirahat keluar</td>
                                <td><span class="total_terlambat">{{ $datasiswa->total_terlambat_istirahat_keluar }} x</span></td>
                                <td>istirahat kembali</td>
                                <td><span class="total_terlambat">{{ $datasiswa->total_terlambat_istirahat_kembali }} x</span></td>
                              </tr>
                              <tr>
                                <td>Ijin keluar</td>
                                <td><span class="total_terlambat">{{ $datasiswa->total_terlambat_ijin_keluar }} x</span></td>
                                <td>ijin kembali</td>
                                <td><span class="total_terlambat">{{ $datasiswa->total_terlambat_ijin_kembali }} x</span></td>
                              </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <div class="container-card2" >
                    <button class="butongeser"><<<<</button>
                    <button class="butongeser">>>>></button>
                </div>
                <br>
                <!-- Tabel Data Presensi Siswa -->
                <table class="table" style="font-size: 10px;">
                    <thead>
                        <tr>
                          <th rowspan="2"><input type="checkbox"></th>
                          <th rowspan="2">No</th>
                          <th rowspan="2">Tanggal</th>
                          <th colspan="2" style="border-bottom: 1px solid black;">Jam Kerja</th>
                          <th colspan="2" style="border-bottom: 1px solid black;">Jam Istirahat</th>
                          <th colspan="2" style="border-bottom: 1px solid black;">Total Jam Kerja</th>
                          <th rowspan="2">Log Aktivitas</th>
                          <th rowspan="2">Status Kehadiran</th>
                          <th rowspan="2">Kebaikan</th>
                          <th rowspan="2">Catatan</th>
                          <th rowspan="2"></th>
                        </tr>
                        <tr>
                          <th>Masuk</th>
                          <th style="border-left: 1px solid black;" >Pulang</th>
                          <th>Mulai</th>
                          <th style="border-left: 1px solid black;">Selesai</th>
                          <th>Total Jam</th>
                          <th style="border-left: 1px solid black;">(+)(-)</th>
                        </tr>
                    </thead>
                    <tbody>
                 
                        @foreach($presensi as $index => $presensi)
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $presensi->presensi->hari }}</td>
                            <td>{{ $presensi->presensi->jam_masuk }}</td>
                            <td>{{ $presensi->presensi->jam_pulang }}</td>
                            <td>{{ $presensi->presensi->jam_mulai_istirahat}}</td>
                            <td>{{ $presensi->presensi->jam_selesai_istirahat }}</td>
                            <td>{{ $presensi->presensi->total_jam_kerja }}</td>
                            <td>{{ $presensi->presensi->log_aktivitas }}</td>
                            <td>{{ $presensi->presensi->status_kehadiran }}</td>
                            <td>{{ $presensi->presensi->kebaikan }}</td>
                            <td>{{ $presensi->presensi->catatan }}</td>
                            <td><i class="fa-regular fa-pen-to-square"></i></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- End Tabel Data Presensi Siswa -->

                <!-- Modal Jam Kerja -->
                <div class="modal fade" id="jamkerja">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <!-- Isi modal -->
                                <div class="keterangan">
                                    “Maaf saya telat datang dan absen dikarenakan macet saat perjalanan berangkat sebab terjadi sebuah perampokan dan saya berinisiatif untuk menolong korban”
                                </div>
                                <br>
                                <div style="text-align: center">
                                    <button class="btnkembali" data-bs-dismiss="modal">Kembali</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Status Kehadiran -->
                <div class="modal fade" id="statuskehadiran">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="padding-left: 40%;">
                                <h1>Izin</h1>
                            </div>
                            <div class="modal-body">
                                <!-- Isi modal -->
                                <div class="keterangan">
                                    “Maaf saya tidak dapat mengikuti magang untuk hari ini dikarenakan saya sedang tidak enak badan dan tubuh saya gatal karena saya jarang mandi”
                                </div>
                                <div class="linkdrive"></div>
                                <div class="keterangan2">kategori izin</div>
                                <br>
                                <div style="display: flex; justify-content: center;">
                                    <div style="background-color: #F2F2F2; padding: 5px;">ganti jam</div>
                                </div>
                                <br>
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
</div>
@endsection
