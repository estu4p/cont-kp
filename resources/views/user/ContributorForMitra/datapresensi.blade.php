@extends('layouts.masterMitra')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link href="/assets/css//datapresensi.css" rel="stylesheet">
<div id="datapresensisiswa">
    <div class="container-fluid p-5 ml-2">
        <div class="row">
            <div class="col-md-12 parent-relatife">
                <a href="/mitra-optionpresensi" class="kekiri" style="color:#000"><i class="fs-1 fa-solid fa-chevron-left"></i></a>
                <div class="card">
                    <div class="card-header" style="display: grid; grid-template-columns: auto 1fr auto;">
                        <div style="overflow: hidden;">
                            <img src="assets/images/user.png" class="user">
                        </div>
                        <div style="padding-left: 25px;">
                            
                            <h3 style="font-size: 20px; margin: 0;">Simpay</h3>
                            <p style="margin: 10;">NIP : MJ/UIUX/POLINES/AGST2023/06</p>
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
                    <div class="masa">
                        <table class="tg">
                         
                            
                            <tbody>
                              <tr>
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                    <label for="floatingTextarea">Comments</label>
                                  </div>
                                  <br>
                                  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-primary me-md-2" type="button">tambahkan</button>
                                  </div>
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
                          <th rowspan="2"></th>
                        </tr>
                        <tr>
                          <th>masuk</th>
                          <th style="border-left: 1px solid black;" >pulang</th>
                          <th>mulai</th>
                          <th style="border-left: 1px solid black;">selesai</th>
                          <th>total jam</th>
                          <th style="border-left: 1px solid black;">(+)(-)</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>1</td>
                            <td>Selasa, 22-08-2023</td>
                            <td>08:52:30 <i class="fas fa-info-circle" data-bs-toggle="modal" data-bs-target="#jamkerja"></td>
                            <td>17:02:55</td>
                            <td>12:15:00</td>
                            <td>13:00:00</td>
                            <td>05:10:23 </td>
                            <td>-02:30:53</td>
                            <td>Membuat tampilan admin w ebsite...</td>
                            <td>Hadir</td>
                            <td>Mengangkat galon</td>
                            <td>Semangat jangan putus asa</td>
                            <td><i class="fa-regular fa-pen-to-square"></i></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>2</td>
                            <td>Rabu, 23-08-2023</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>izin <i class="fas fa-info-circle" data-bs-toggle="modal" data-bs-target="#statuskehadiran"></td>
                            <td>--</td>
                            <td>--</td>
                            <td><i class="fa-regular fa-pen-to-square"></i></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>3</td>
                            <td>kamis, 24-08-2023</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>tidak hadir <i class="fas fa-info-circle" data-bs-toggle="modal" data-bs-target="#statuskehadiran"></td>
                            <td>--</td>
                            <td>--</td>
                            <td><i class="fa-regular fa-pen-to-square"></i></td>
                          </tr>
                          <tr>
                            <td><input type="checkbox"></td>
                            <td>3</td>
                            <td>kamis, 24-08-2023</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>tidak hadir <i class="fas fa-info-circle" data-bs-toggle="modal" data-bs-target="#statuskehadiran"></td>
                            <td>--</td>
                            <td>--</td>
                            <td><i class="fa-regular fa-pen-to-square"></i></td>
                          </tr>

                          <tr>
                            <td><input type="checkbox"></td>
                            <td>3</td>
                            <td>kamis, 24-08-2023</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>tidak hadir <i class="fas fa-info-circle" data-bs-toggle="modal" data-bs-target="#statuskehadiran"></td>
                            <td>--</td>
                            <td>--</td>
                            <td><i class="fa-regular fa-pen-to-square"></i></td>
                          </tr>
                          <tr>
                            <td><input type="checkbox"></td>
                            <td>3</td>
                            <td>kamis, 24-08-2023</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>tidak hadir <i class="fas fa-info-circle" data-bs-toggle="modal" data-bs-target="#statuskehadiran"></td>
                            <td>--</td>
                            <td>--</td>
                            <td><i class="fa-regular fa-pen-to-square"></i></td>
                          </tr>
                          <tr>
                            <td><input type="checkbox"></td>
                            <td>3</td>
                            <td>kamis, 24-08-2023</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>tidak hadir <i class="fas fa-info-circle" data-bs-toggle="modal" data-bs-target="#statuskehadiran"></td>
                            <td>--</td>
                            <td>--</td>
                            <td><i class="fa-regular fa-pen-to-square"></i></td>
                          </tr>
                          <tr>
                            <td><input type="checkbox"></td>
                            <td>3</td>
                            <td>kamis, 24-08-2023</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>tidak hadir <i class="fas fa-info-circle" data-bs-toggle="modal" data-bs-target="#statuskehadiran"></td>
                            <td>--</td>
                            <td>--</td>
                            <td><i class="fa-regular fa-pen-to-square"></i></td>
                          </tr>
                          <tr>
                            <td><input type="checkbox"></td>
                            <td>3</td>
                            <td>kamis, 24-08-2023</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>tidak hadir <i class="fas fa-info-circle" data-bs-toggle="modal" data-bs-target="#statuskehadiran"></td>
                            <td>--</td>
                            <td>--</td>
                            <td><i class="fa-regular fa-pen-to-square"></i></td>
                          </tr>
                      </tbody>
                      </table>
                      <button class="btnpdf"><i class="fas fa-download"></i> PDF</button>
                    
                      <div class="modal fade" id="statuskehadiran">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header" style="padding-left: 100%;">
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
                                    <!-- Baris Ke-2 -->
                                    Link Foto Gdrive
                                    <div class="linkdrive"><div class="mb-3">
                                        <div class="input-group">
                                          <span class="input-group-text" id="basic-addon3"></span>
                                          <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3 basic-addon4">
                                        </div></div>
                
                                    <!-- Break Line -->
                                    <!-- Baris Ke-3 -->
                                    kategori izin
                                   
                                        <div class="dropdown">
                                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                          Dropdown link
                                        </a>
                                      
                                        <ul class="dropdown-menu">
                                          <li><a class="dropdown-item" href="#">Action</a></li>
                                          <li><a class="dropdown-item" href="#">Another action</a></li>
                                          <li><a class="dropdown-item" href="#">Something else here</a></li>
                                        </ul>
                                      </div></div>
                                    
                
                
                
                
                                    <!-- Break Line -->
                                    <!-- End -->
                                    <div class="b">
                                        <div class="d-grid gap-2 d-md-block">
                                            <button id="button1" class="btn btn-primary d-grid" type="button" onclick="handleButtonClick(1)">Button 1</button>
                                        </div>
                                        <div class="d-grid gap-2 d-md-block">
                                            <button id="button2" class="btn btn-primary gap-2" type="button" onclick="handleButtonClick(2)">Button 2</button>
                                        </div>
                                    </div>
                                    <div style="text-align: center">
                                        <button class="btnkembali" data-bs-dismiss="modal">simpan</button>
                                    </div>
                                </div>
                
                            </div>
        </div>

</div>
                </div>







@endsection
