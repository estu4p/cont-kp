@extends('layouts.master')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('assets/css/presensitidakhadir.css') }}">
<div id="datapresensisiswatidakhadir">
    <div class="container-fluid p-5 ml-2">
        <div class="row">
            <div class="col-md-12 parent-relatife">
                <a href="/laporandatapresensi" class="kekiri"><i class="fs-1 fa-solid fa-chevron-left"></i></a>
                <div class="card">
                    <div class="card-header" style="display: grid; grid-template-columns: auto 1fr auto;">
                        <div style="overflow: hidden;">
                            <img src="assets/images/user.png" class="user">
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
                                    <td class="masuk">47:30:50</td>
                                </tr>
                                <tr>
                                    <th>total masuk</th>
                                    <td class="total">16 hari</td>
                                </tr>
                                <tr>
                                    <th>target</th>
                                    <td class="target">1100 jam</td>
                                </tr>
                                <tr>
                                    <th>sisa</th>
                                    <td class="sisa">152:30:10</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="masa">
                        <table class="tg">
                            <thead>
                              <tr>
                                <th class="tg-0lax" colspan="4">Total terlambat (ditandai)</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td class="tg-0pky">Masuk</td>
                                <td class="tg-0pky"><span style="color:#FFF;background-color:#000 ; border-radius: 8px;">0 x</span></td>
                                <td class="tg-0lax">pulang</td>
                                <td class="tg-0lax"><span style="color:#FFF;background-color:#333 ; border-radius: 8px;">0 x</span></td>
                              </tr>
                              <tr>
                                <td class="tg-0lax">Istirahat keluar</td>
                                <td class="tg-0lax"><span style="color:#FFF;background-color:#333 ; border-radius: 8px;">0 x</span></td>
                                <td class="tg-0lax">istirahat kembali</td>
                                <td class="tg-0lax"><span style="color:#FFF;background-color:#333 ; border-radius: 8px;">0 x</span></td>
                              </tr>
                              <tr>
                                <td class="tg-0lax">Ijin keluar</td>
                                <td class="tg-0lax"><span style="color:#FFF;background-color:#333 ; border-radius: 8px;">0 x</span></td>
                                <td class="tg-0lax">ijin kembali</td>
                                <td class="tg-0lax"><span style="color:#FFF;background-color:#333 ; border-radius: 8px;">0 x</span></td>
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
                <table class="table table-sm" style="font-size: 10px;">
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
                            <td>tidak hadir <i class="fa-solid fa-circle-info"></i></td>
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
                            <td>tidak hadir <i class="fa-solid fa-circle-info"></i></td>
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
                            <td>tidak hadir <i class="fa-solid fa-circle-info"></i></td>
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
                            <td style="color: red">tidak hadir <i class="fa-solid fa-circle-info"></i></td>
                            <td>Ganti Jam</td>
                          </tr>

                        </tbody>
                        </table>
                        <button class="btnpdf"><i class="fas fa-download"></i> PDF</button>
                </div>







@endsection
