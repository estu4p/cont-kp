@extends('layouts.master')

@section('content')

<link rel="stylesheet" href="{{ asset('assets/css/presensi/laporandatapresensi.css') }}">
<div id="laporan-hasil-presensi">
    <div class="container-fluid p-5 ml-2">
        <div class="row">
            <div class="col-md-12 parent-relatife">
                <a href="/presensi-contributor-univ" class="kekiri"><i class="fs-1 fa-solid fa-chevron-left"></i></a>
                <div class="card">
                    <div class="card-header" style="display: grid; grid-template-columns: 1fr auto;">
                        <div>
                            <h3 style="font-size: 50px; margin: 0;">Laporan Data Presensi</h3>
                            <p>Data per tanggal 2023-09-01 s/d 2023-09-30</p>
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
                <div class="date-filter">

                        <input type="date" class="date1">
                        <input type="date" class="date2">
                        <div class="tombolfilter">
                            <i class="filter fa-solid fa-filter"></i> Filter <i class="down fas fa-angle-down collapse-btn" onclick="toggleCollapse(this)"></i>
                        </div>
                        <button class="tombolsearch"><i class="fa-solid fa-search"></i></button>
                </div>

                <div class="collapsed" id="collapseContent">
                    <div class="status-shift">
                     <div class="isistatus-shift">
                         <label>Status</label>
                         <br>
                         <input type="checkbox"> Hadir
                         <br>
                         <input type="checkbox"> Izin
                         <br>
                         <input type="checkbox"> Tidak Hadir
                         <br>
                         <hr>
                         <label>Shift</label>
                         <br>
                         <input type="checkbox"> Shift Pagi
                         <br>
                         <input type="checkbox"> Shift Middle
                         <br>
                         <input type="checkbox"> Shift Siang
                     </div>
                     </div>

                   </div>
                    <table class="table" style="font-size: 15px;">
                            <thead>
                              <tr>
                                <th><input type="checkbox" id="#" name=""></th>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Nip</th>
                                <th>total kehadiran</th>
                                <th>total izin</th>
                                <th>total ketidakhadiran</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td><input type="checkbox" id="#" name=""></td>
                                <td>1</td>
                                <td><a href="/datapresensisiswa">simpay</a></td>
                                <td>MJ/UIUX/POLINES/AGST2023/06</td>
                                <td>100 &nbsp; <a href="/presensihadir" class="fa-solid fa-circle-info" style="color: #000"></td>
                                <td style="color: orange">80  &nbsp; <a href="/presensiizin" class="fa-solid fa-circle-info" style="color: #000"></td>
                                <td style="color: red">70  &nbsp; <a href="/presensitidakhadir" class="fa-solid fa-circle-info" style="color: #000"></td>
                              </tr>
                              <tr>
                                <td><input type="checkbox" id="#" name=""></td>
                                <td>2</td>
                                <td>bono</td>
                                <td>MJ/UIUX/POLINES/AGST2023/06</td>
                                <td>100</td>
                                <td>80</td>
                                <td>70</td>

                              </tr>
                              <tr>
                                <td><input type="checkbox" id="#" name=""></td>
                                <td>3</td>
                                <td>udin nganga</td>
                                <td>MJ/UIUX/POLINES/AGST2023/06</td>
                                <td>100</td>
                                <td>80</td>
                                <td>70</td>

                              </tr>
                              <tr>
                                <td><input type="checkbox" id="#" name=""></td>
                                <td>4</td>
                                <td>aufff</td>
                                <td>MJ/UIUX/POLINES/AGST2023/06</td>
                                <td>100</td>
                                <td>80</td>
                                <td>70</td>
                              </tr>
                            </tbody>
                            </table>
                    </div>

                    <script>
                        function toggleCollapse(icon) {
                            var content = document.getElementById('collapseContent');
                            content.classList.toggle('collapsed');

                            // Mengubah ikon
                            if (content.classList.contains('collapsed')) {
                                icon.classList.remove('fa-angle-up');
                                icon.classList.add('fa-angle-down');
                            } else {
                                icon.classList.remove('fa-angle-down');
                                icon.classList.add('fa-angle-up');
                            }
                        }
                    </script>

            @endsection
