@extends('layouts.master')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('assets/css/presensiharian.css') }}">
<div id="presentasi-harian">
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
                    <div class="card-body"  >
                        <div class="row">
                            <div style=" display: flex; justify-content: space-between;">
                                <a class="btn" href="/laporandatapresensi">
                                  <i class="fa-regular fa-eye"></i>
                                  Lihat Laporan Presensi
                                </a>
                                <div>
                                <div style="float:left;">
                                    <div style="position: relative;">
                                        <i class="fa-solid fa-search" style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%);"></i>
                                        <input type="date" name="date" id="date-input" class="search">
                                        <p id="date-text"></p>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <button class="dropbtn"><i class="fa-solid fa-filter"></i>Filter<i class="fa-solid fa-chevron-down"></i></button>
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
                           <div class="col-md-6 text-right">
                            </div>
                        </div>
                        <br>
                        <table class="table table-sm table-bordered table-striped" style="font-size: 10px;">
                            <thead>
                                <tr>
                                <th rowspan="2"><input type="checkbox" id="#" name="">&nbsp;No</th>
                                  <th rowspan="2">Nama</th>
                                  <th colspan="2">Jam Kerja</th>
                                  <th colspan="2">Jam istirahat </th>
                                  <th colspan="2">total jam kerja</th>
                                  <th colspan="2">Log Aktivitas</th>
                                  <th rowspan="2">Status <br>Kehadiran</th>
                                  <th rowspan="2">Kebaikan</th>
                                </tr>
                                <tr>
                                  <th>masuk</th>
                                  <th>pulang</th>
                                  <th>mulai</th>
                                  <th>selesai</th>
                                  <th>total jam</th>
                                  <th>(-)(+)</th>
                                  <th class="bates">Log Aktivitas</th>
                                  <th>aksi</th>
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
                                  <td><button class="round-button-check">&check;</button><button class="round-button-cross">&#x2717;</button></td>
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
                                    <td><button class="round-button-check">&check;</button><button class="round-button-cross">&#x2717;</button></td>
                                    <td>hadir</td>
                                    <td>merapikan parkiran motor</td>
                                  </tr>
                                  <tr>
                                    <td><input type="checkbox" id="#" name=""> &nbsp; 3</td>
                                    <td>udin nganga</td>
                                    <td>06:25:00</td>
                                    <td>13:05:14</td>
                                    <td>06:25:00 </td>
                                    <td>13:05:14</td>
                                    <td>06:25:00 </td>
                                    <td>13:05:14</td>
                                    <td  class="bates">Membuat rusush</td>
                                    <td><button class="round-button-check">&check;</button><button class="round-button-cross">&#x2717;</button></td>
                                    <td>hadir</td>
                                    <td>merapikan parkiran motor</td>
                                  </tr>
                                  <tr>
                                    <td><input type="checkbox" id="#" name=""> &nbsp; 4</td>
                                    <td>syalita widyandini</td>
                                    <td>06:25:00</td>
                                    <td>13:05:14</td>
                                    <td>06:25:00 </td>
                                    <td>13:05:14</td>
                                    <td>06:25:00 </td>
                                    <td>13:05:14</td>
                                    <td  class="bates">Membuat ributt anak gang sebelahhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</td>
                                    <td><button class="round-button-check">&check;</button><button class="round-button-cross">&#x2717;</button></td>
                                    <td>hadir</td>
                                    <td>merapikan parkiran motor</td>
                                  </tr>
                              </tbody>
                         </table>
                         <button class="btnpdf"><i class="fas fa-download"></i> PDF</button>
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>
@endsection

