@extends('layouts.masterMitra')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="/assets/css//mitrapresensi.css" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <div id="presentasi-harian">
        <i class="fs-1 fa-solid fa-chevron-left"></i>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 style="font-size: 50px;">Presensi Harian</h3>
                            <p>Data per tanggal 2023-09-04</p>
                        </div>
                    </div>
                </div>
                <div class="date">
                    <div class="menu">
                            <button class="btn btn-secondary dropdown-toggle tes" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Pilih Menu Presensi
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Scan Barcode</a></li>
                                <li><a class="dropdown-item" href="#">Lihat laporan presensi</a></li>
                            </ul>
                    </div>
                    <div class=" cari">
                        <div style="float:left;">
                            <div style="position: relative;">
                                <i class="fa-solid fa-search"
                                    style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%);"></i>
                                <input type="date" name="date" id="date-input" class="search">
                                <p id="date-text"></p>
                            </div>
                        </div>
                        <div class="dropdown">
                            <button class="dropbtn"><i class="fa-solid fa-filter"></i>Filter<i
                                    class="fa-solid fa-chevron-down"></i></button>
                            <div class="dropdown-content">
                                <div style="border-bottom: 1px solid #000;">
                                    <label>Status</label><br>
                                    <input type="checkbox" id="checkbox1">
                                    <label for="checkbox1">Hadir</label><br>
                                    <input type="checkbox" id="checkbox2">
                                    <label for="checkbox2">Izin</label><br>
                                    <input type="checkbox" id="checkbox3">
                                    <label for="checkbox3">Izin</label><br>
                                </div>
                                <label for="checkbox1">Shift</label><br>
                                <input type="checkbox" id="checkbox2">
                                <label for="checkbox2">Shift pagi</label><br>
                                <input type="checkbox" id="checkbox3">
                                <label for="checkbox3">Shift Middle</label><br>
                                <input type="checkbox" id="checkbox3">
                                <label for="checkbox3">Shift Siang</label><br>
                            </div>
                        </div>
                    </div>
               
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 text-right">
    </div>
    </div>
    <br>
    <table class="table" style="font-size: 10px;">
        <thead style="text-align: center;">
            <tr>
                <th rowspan="2" style="vertical-align: middle;"><input type="checkbox" id="#"
                        name="">&nbsp;No</th>
                <th rowspan="2" style="vertical-align: middle;">Nama</th>
                <th colspan="2" style="border-bottom: 1px solid black;">Jam Kerja</th>
                <th colspan="2" style="border-bottom: 1px solid black;">Jam Istirahat</th>
                <th colspan="2" style="border-bottom: 1px solid black;">Total Jam Kerja</th>
                <th colspan="2" style="border-bottom: 1px solid black;">Log Aktivitas</th>
                <th rowspan="2">Status <br>Kehadiran</th>
                <th rowspan="2" style="vertical-align: middle;">Kebaikan</th>
            </tr>
            <tr>
                <th>Masuk</th>
                <th style="border-left: 1px solid black;">Pulang</th>
                <th>Mulai</th>
                <th style="border-left: 1px solid black;">Selesai</th>
                <th>Total Jam</th>
                <th style="border-left: 1px solid black;">(-)(+)</th>
                <th class="bates">Log Aktivitas</th>
                <th style="border-left: 1px solid black;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input type="checkbox" id="#" name=""> &nbsp; 1</td>
                <td class="bates" href><a href="/mitra-detailprofil">simpay</a></td>
                <td><a class="text-danger" data-bs-toggle="modal" data-bs-target="#modaljam" style="text-decoration: none">06:25:00</a></td>
                <td>13:05:14</td>
                <td>06:25:00 </td>
                <td>13:05:14</td>
                <td>06:25:00 </td>
                <td>13:05:14</td>
                <td class="bates">Membuat ributt anak gang sebelah</td>
                <td><input type="radio" id="check" name="button-toggle" class="toggle-button" />
                    <label for="check" class="round-button-check" tabindex="1">
                        <i class="fa-solid fa-check"></i>
                    </label>

                    <input type="radio" id="cross" name="button-toggle" class="toggle-button" />
                    <label for="cross" class="round-button-cross" tabindex="1"> <a class='text-light' data-bs-toggle="modal" data-bs-target="#silang" href="#" ><i
                            class="fa-solid fa-xmark"></i></a></label>
                </td>
                <td>hadir</td>
                <td>merapikan parkiran motor</td>
            </tr>
            <tr>
                <td><input type="checkbox" id="#" name=""> &nbsp; 2</td>
                <td class="bates">bono</td>
                <td>06:25:00 <i class="fas fa-info-circle" data-bs-toggle="modal" data-bs-target="#jamkerja"
                    style="color: red"></i></td>
                <td>13:05:14</td>
                <td>06:25:00 </td>
                <td>13:05:14</td>
                <td>06:25:00 </td>
                <td>13:05:14</td>
                <td class="bates">Membuat onar di kantor</td>
                <td><input type="radio" id="check" name="button-toggle" class="toggle-button" />
                    <label for="check" class="round-button-check" tabindex="1"><i
                            class="fa-solid fa-check"></i></label>

                    <input type="radio" id="cross" name="button-toggle" class="toggle-button" />
                    <label for="cross" class="round-button-cross" tabindex="1"><i
                            class="fa-solid fa-xmark"></i></label>
                </td>
                <td>hadir</td>
                <td>merapikan parkiran motor</td>
            </tr>
            <tr>
                <td><input type="checkbox" id="#" name=""> &nbsp; 3</td>
                <td>udin nganga</td>
                <td>--</td>
                <td>--</td>
                <td>-- </td>
                <td>--</td>
                <td>--</td>
                <td>--</td>
                <td class="bates"></td>
                <td><input type="radio" id="check" name="button-toggle" class="toggle-button" />
                    <label for="check" class="round-button-check" tabindex="1"><i
                            class="fa-solid fa-check"></i></label>

                    <input type="radio" id="cross" name="button-toggle" class="toggle-button" />
                    <label for="cross" class="round-button-cross" tabindex="1"><i
                            class="fa-solid fa-xmark"></i></label>
                </td>
                <td>tidak hadir <i class="fas fa-info-circle" data-bs-toggle="modal"
                        data-bs-target="#statuskehadiran"></i></td>
                <td>--</td>
            </tr>
            <tr>
                <td><input type="checkbox" id="#" name=""> &nbsp; 4</td>
                <td>bodat</td>
                <td>07:25:00 <i class="fas fa-info-circle" data-bs-toggle="modal" data-bs-target="#jamkerja"
                        style="color: red"></i></td>
                <td>14:05:14 <i class="fas fa-info-circle" data-bs-toggle="modal" data-bs-target="#jampulang"
                        style="color: red"></i></td>
                <td>06:25:00 </td>
                <td>13:05:14</td>
                <td>06:25:00 </td>
                <td>13:05:14</td>
                <td class="bates">Membuat ributt anak gang </td>
                <td><input type="radio" id="check" name="button-toggle" class="toggle-button" />
                    <label for="check" class="round-button-check" tabindex="1"><i
                            class="fa-solid fa-check"></i></label>

                    <input type="radio" id="cross" name="button-toggle" class="toggle-button" />
                    <label for="cross" class="round-button-cross" tabindex="1"><i
                            class="fa-solid fa-xmark"></i></label>
                </td>
                <td>hadir</td>
                <td>merapikan parkiran motor</td>
            </tr>
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
                    <!-- Baris Ke-2 -->
                    Link Foto Gdrive
                    <div class="linkdrive"></div>

                    <!-- Break Line -->
                    <!-- Baris Ke-3 -->
                    kategori izin
                    <div class="keterangan2"></div>




                    <!-- Break Line -->
                    <!-- End -->
                    <div>

                        <div class="d-grid gap-2 d-md-block">
                            <button id="button1" class="btn btn-primary d-grid" type="button" onclick="handleButtonClick(1)">Button 1</button>
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
                    <div style="text-align: center">
                        <button class="btnkembali" data-bs-dismiss="modal">Kembali</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

{{-- modallllllllllllllllllllllllllll --}}


    <div class="modal fade" id="jampulang">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Isi dari modal -->
                <div class="modal-body">

                    <!-- Baris Ke-1 -->
                    <div class="keterangan">
                        “Maaf saya lupa pencet tombol pulang jadi
                        saya mencet di kost”
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

    <div class="modal fade" id="modaljam" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-jam">
          <div class="modal-content modal-content-jam">
            <div class="modal-header  justify-content-center">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Presensi</h1>
            </div>

            <div class="modal-body row p-5">
              <div class="col-12 p-3 " style="background-color:pink; " >Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorum necessitatibus enim rem delectus eaque? Iure corporis earum commodi aliquam, quos, consequuntur rem, reiciendis quia in sit autem odio praesentium mollitia.</div>
            </div>
            <div style="float:left;">
                <div style="position: relative;">
                    <i class
                        style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%);"></i>
                        <div class="tanggal">
                    <input type="date" name="date" id="date-input" class="search">
                    <p id="date-text"></p>
                    <P style="padding-left: 10px">keterangan</P>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                        <label for="floatingTextarea2">
                            
                        </label>
                      </div>
            <div class="modal-footer p-5">
                <div class="keluar">
              <button type="button" class="btn btn-secondary close " data-bs-dismiss="modal">Close</button>
                </div>
              <button type="button" class="btn btn-primary save" onclick="showsukses()">Save</button>
            </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
        </div>
    </div>
    <div class="modal fade " id="silang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-jam">
            <div class="modal-content modal-content-jam">
              <div class="modal-header  justify-content-center">
                <h1 class="modal-title fs-5" id="exampleModalLabel">log activity</h1>
              </div>
              <P style="padding-left: 10px">mengedit riwayat proses</P>
              <div class="form-floating">
                  <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                  <label for="floatingTextarea2">
                      
                  </label>
                </div>
  
              
              
                      <P style="padding-left: 10px">keterangan.......</P>
                      <div class="form-floating">
                          <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                          <label for="floatingTextarea2">
                              
                          </label>
                        </div>
              <div class="modal-footer p-5">
                
                <button type="button" class="btn btn-primary p-1">Save</button>
              </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
          </div>
      </div>
    <script>
        const checkButton = document.getElementById('check-button');
        const crossButton = document.getElementById('cross-button');

        checkButton.addEventListener('click', function() {
            checkButton.classList.add('active');
            crossButton.classList.remove('active');
        });

        crossButton.addEventListener('click', function() {
            crossButton.classList.add('active');
            checkButton.classList.remove('active');
        });

        function showsukses(){
            swal("berhasil", "perubahan waktu berhasil disimpan", "success");
        }

    
        function handleButtonClick(buttonNumber) {
        var buttonId = 'button' + buttonNumber;
        var button = document.getElementById(buttonId);
        if (!button.classList.contains('btn-with-checkmark')) {
            button.classList.add('btn-with-checkmark');
        } else {
            button.classList.remove('btn-with-checkmark');
        }
        // Isi fungsi disini sesuai dengan aksi yang ingin dilakukan ketika tombol diklik
    }

    </script>
@endsection
