@extends('layouts.masterAfterPay')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('assets/css/adminUniv-afterPayment/mitra/laporandetailtidakhadir.css') }}">
<div id="datapresensisiswatidakhadir">
    <div class="container-fluid p-5 ml-2">
        <div class="row">
            <div class="col-md-12 parent-relatife">
                <a href="/mitra-laporanpresensi" class="kekiri"><i class="fs-1 fa-solid fa-chevron-left"></i></a>
                <div class="card">
                    <div class="card-header" style="display: grid; grid-template-columns: auto 1fr auto;">
                        <div style="overflow: hidden;">
                            <img src="assets/images/user.jpg" class="user">
                        </div>
                        <div>
                            <h3 style="font-size: 50px; margin: 0;">Simpay</h3>
                            <p style="margin: 0;">NIP : MJ/UIUX/POLINES/AGST2023/06</p>
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
                                <tr>
                                    <th>Masa</th>
                                    <td>2023-08-21 - 2023-12-30</td>
                                </tr>
                                <tr>
                                    <th>Jam Default Masuk</th>
                                    <td>06:30:00</td>
                                </tr>
                                <tr>
                                    <th>Jam Default Pulang</th>
                                    <td>21:00:00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="masa">
                        <table>
                            <tbody>
                                <tr>
                                    <th>Total jam masuk</th>
                                    <td><span class="masuk">47:30:50</span></td>
                                </tr>
                                <tr>
                                    <th>total masuk</th>
                                    <td><span class="total">16 hari</td>
                                </tr>
                                <tr>
                                    <th>target</th>
                                    <td><span class="target">1100 jam</td>
                                </tr>
                                <tr>
                                    <th>sisa</th>
                                    <td><span class="sisa">152:30:10</td>
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
                                <td><span class="total_terlambat"  >0 x</span></td>
                              </tr>
                              <tr>
                                <td>Istirahat keluar</td>
                                <td><span class="total_terlambat"  >0 x</span></td>
                                <td>istirahat kembali</td>
                                <td><span class="total_terlambat"  >0 x</span></td>
                              </tr>
                              <tr>
                                <td>Ijin keluar</td>
                                <td><span class="total_terlambat"  >0 x</span></td>
                                <td>ijin kembali</td>
                                <td><span class="total_terlambat"  >0 x</span></td>
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
                          <tr>
                            <td><input type="checkbox"></td>
                            <td>1</td>
                            <td>Senin, 21-08-2023</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>tidak hadir  <i class="fas fa-info-circle" data-bs-toggle="modal" data-bs-target="#statuskehadiran"></i></td>
                            <td>ganti jam</td>
                          </tr>
                          <tr>
                            <td><input type="checkbox"></td>
                            <td>2</td>
                            <td>Senin, 21-08-2023</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>tidak hadir  <i class="fas fa-info-circle" data-bs-toggle="modal" data-bs-target="#statuskehadiran"></i></td>
                            <td>ganti jam</td>
                          </tr>
                          <tr>
                            <td><input type="checkbox"></td>
                            <td>3</td>
                            <td>Senin, 21-08-2023</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>tidak hadir  <i class="fas fa-info-circle" data-bs-toggle="modal" data-bs-target="#statuskehadiran"></i></td>
                            <td>ganti jam</td>
                          </tr>
                          <tr>
                            <td><input type="checkbox"></td>
                            <td>5</td>
                            <td>Senin, 21-08-2023</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td style="color: red">tidak hadir  <i class="fas fa-info-circle" data-bs-toggle="modal" data-bs-target="#statuskehadiran"></i></td>
                            <td>Ganti Jam</td>
                          </tr>

                        </tbody>
                        </table>
                        <button class="btnpdf"><i class="fas fa-download"></i> PDF</button>
                </div>
                <div class="modal fade" id="statuskehadiran">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="padding-left: 40%;" >
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
                                        <div style="background-color: #F2F2F2; padding: 5px;">ganti jam</div>
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
