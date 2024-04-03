@extends('layouts.master')

@section('content')

<link rel="stylesheet" href="{{ asset('assets/css/presensi/presensiharian.css') }}">
<div id="presentasi-harian">
                <div class="card">
                    <div class="card-header">
                        <h3 style="font-size: 50px;">Presensi Harian</h3>
                        <p>Data per tanggal 2023-09-04</p>
                    </div>
                </div>
            </div>
                    <div class="card-body">
                        <div class="row">
                            <div style=" display: flex; justify-content: space-between;">
                                <a class="btn" href="/laporandatapresensi">
                                    <i class="fa-solid fa-eye"></i>
                                  Lihat Laporan Presensi
                                </a>
                                <div>
                                    <div class="tgl-filter">
                                        <i class="kaca-pembesar fa-solid fa-magnifying-glass"></i><input type="date" class="tgl">
                                        <i class="filter fa-solid fa-filter"></i> Filter <i class="down fas fa-angle-down" class="collapse-btn" onclick="toggleCollapse()"></i>
                                          <div class="collapsed" id="collapseContent">
                                            asdasd
                                          </div>

                                </div>
                                </div>




                            </div>
                        </div>
                        <br>

                        <table class="table" style="font-size: 10px;">
                            <thead style="text-align: center;">
                                <tr>
                                    <th rowspan="2" style="vertical-align: middle;"><input type="checkbox" id="#" name="">&nbsp;No</th>
                                    <th rowspan="2" style="vertical-align: middle;">Nama</th>
                                    <th colspan="2" style="border-bottom: 1px solid black;">Jam Kerja</th>
                                    <th colspan="2" style="border-bottom: 1px solid black;">Jam Istirahat</th>
                                    <th colspan="2" style="border-bottom: 1px solid black;">Total Jam Kerja</th>
                                    <th colspan="2" style="border-bottom: 1px solid black;">Log Aktivitas</th>
                                    <th rowspan="2" >Status <br>Kehadiran</th>
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
                                  <td class="bates" href><a href="/datapresensisiswa">simpay</a></td>
                                  <td>06:25:00</td>
                                  <td>13:05:14</td>
                                  <td>06:25:00 </td>
                                  <td>13:05:14</td>
                                  <td>06:25:00 </td>
                                  <td>13:05:14</td>
                                  <td  class="bates">Membuat ributt anak gang sebelah</td>
                                  <td><input type="radio" id="check" name="button-toggle" class="toggle-button" />
                                    <label for="check" class="round-button-check" tabindex="1"><i class="fa-solid fa-check"></i></label>

                                    <input type="radio" id="cross" name="button-toggle" class="toggle-button" />
                                    <label for="cross" class="round-button-cross" tabindex="1"><i class="fa-solid fa-xmark"></i></label></td>
                                  <td>hadir</td>
                                  <td>merapikan parkiran motor</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" id="#" name=""> &nbsp; 2</td>
                                    <td  class="bates" >bono</td>
                                    <td>06:25:00</td>
                                    <td>13:05:14</td>
                                    <td>06:25:00 </td>
                                    <td>13:05:14</td>
                                    <td>06:25:00 </td>
                                    <td>13:05:14</td>
                                    <td  class="bates">Membuat onar di kantor</td>
                                    <td><input type="radio" id="check" name="button-toggle" class="toggle-button" />
                                        <label for="check" class="round-button-check" tabindex="1"><i class="fa-solid fa-check"></i></label>

                                        <input type="radio" id="cross" name="button-toggle" class="toggle-button" />
                                        <label for="cross" class="round-button-cross" tabindex="1"><i class="fa-solid fa-xmark"></i></label></td>
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
                                    <td  class="bates"></td>
                                    <td><input type="radio" id="check" name="button-toggle" class="toggle-button" />
                                        <label for="check" class="round-button-check" tabindex="1"><i class="fa-solid fa-check"></i></label>

                                        <input type="radio" id="cross" name="button-toggle" class="toggle-button" />
                                        <label for="cross" class="round-button-cross" tabindex="1"><i class="fa-solid fa-xmark"></i></label>
                                    </td>
                                    <td>tidak hadir <i class="fas fa-info-circle" data-bs-toggle="modal" data-bs-target="#statuskehadiran"></i></td>
                                    <td>--</td>
                                  </tr>
                                  <tr>
                                    <td><input type="checkbox" id="#" name=""> &nbsp; 4</td>
                                    <td>bodat</td>
                                    <td>07:25:00 <i class="fas fa-info-circle" data-bs-toggle="modal" data-bs-target="#jamkerja" style="color: red"></i></td>
                                    <td>14:05:14 <i class="fas fa-info-circle" data-bs-toggle="modal" data-bs-target="#jampulang" style="color: red"></i></td>
                                    <td>06:25:00 </td>
                                    <td>13:05:14</td>
                                    <td>06:25:00 </td>
                                    <td>13:05:14</td>
                                    <td  class="bates">Membuat ributt anak gang </td>
                                    <td><input type="radio" id="check" name="button-toggle" class="toggle-button" />
                                        <label for="check" class="round-button-check" tabindex="1"><i class="fa-solid fa-check"></i></label>

                                        <input type="radio" id="cross" name="button-toggle" class="toggle-button" />
                                        <label for="cross" class="round-button-cross" tabindex="1"><i class="fa-solid fa-xmark"></i></label></td>
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
                                        <!-- Baris Ke-2 -->
                                        Link Foto Gdrive
                                        <div class="linkdrive"></div>

                                        <!-- Break Line -->
                                        <!-- Baris Ke-3 -->
                                        kategori izin
                                        <div class="keterangan2"></div>




                                        <!-- Break Line -->
                                        <!-- End -->
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

<script>
    function toggleCollapse() {
      var content = document.getElementById('collapseContent');
      content.classList.toggle('collapsed');
    }
  </script>



@endsection
