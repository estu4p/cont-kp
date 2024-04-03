
@extends('layouts.master')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('assets/css/laporanpresensi.css') }}">
<div id="laporan-hasil-presensi">
    <div class="container-fluid p-5 ml-2">
        <div class="row">
            <div class="col-md-12 parent-relatife">
                <a href="/presensi" class="kekiri"><i class="fs-1 fa-solid fa-chevron-left"></i></a>
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
                        <div style="display: flex; justify-content: flex-end ; align-items: center; margin: 10px;">
                            <input type="date" name="date" id="date-input">
                            <input type="date" name="date" id="date-input">
                            <div style="margin: 0 10px;">
                                <div class="dropdown">
                                    <button class="dropbtn"><i class="fa-solid fa-filter"></i>Filter<i class="fa-solid fa-chevron-down"></i></button>
                                    <div class="dropdown-content">
                                        <div style="border-bottom: 1px solid #000;">
                                            <label for="checkbox1">Shift</label><br>
                                            <input type="checkbox" id="checkbox2">
                                            <label for="checkbox2">Shift pagi</label><br>
                                            <input type="checkbox" id="checkbox3">
                                            <label for="checkbox3">Shift Middle</label><br>
                                            <input type="checkbox" id="checkbox3">
                                            <label for="checkbox3">Shift Siang</label><br>
                                        </div>
                                        <div style="border-bottom: 1px solid #000;">
                                        <label for="checkbox1">Kantor</label><br>
                                        <input type="checkbox" id="checkbox2">
                                        <label for="checkbox2">Kantor1</label><br>
                                        <input type="checkbox" id="checkbox3">
                                        <label for="checkbox3">Kantor2</label><br>
                                        <input type="checkbox" id="checkbox3">
                                        <label for="checkbox3">Kantor3</label><br>
                                    </div>
                                </div>
                                <button class="search"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                        </div>

                </div>
                <br>
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
                                <td>100 &nbsp; <a href="/datapresensi" class="fa-solid fa-circle-info" style="color: #000"></td>
                                  <td style="color: orange">80  &nbsp; <a href="/datapresensi" class="fa-solid fa-circle-info" style="color: #000"></td>
                                  <td style="color: red">70  &nbsp; <a href="/datapresensi" class="fa-solid fa-circle-info" style="color: #000"></td>
                              </tr>
                              <tr>
                                <td><input type="checkbox" id="#" name=""></td>
                                <td>2</td>
                                <td>bono</td>
                                <td>MJ/UIUX/POLINES/AGST2023/06</td>
                                <td>100 &nbsp; <a href="/datapresensi" class="fa-solid fa-circle-info" style="color: #000"></td>
                                  <td style="color: orange">80  &nbsp; <a href="/datapresensi" class="fa-solid fa-circle-info" style="color: #000"></td>
                                  <td style="color: red">70  &nbsp; <a href="/datapresensi" class="fa-solid fa-circle-info" style="color: #000"></td>

                              </tr>
                              <tr>
                                <td><input type="checkbox" id="#" name=""></td>
                                <td>3</td>
                                <td>udin nganga</td>
                                <td>MJ/UIUX/POLINES/AGST2023/06</td>
                                <td>100 &nbsp; <a href="/datapresensi" class="fa-solid fa-circle-info" style="color: #000"></td>
                                  <td style="color: orange">80  &nbsp; <a href="/datapresensi" class="fa-solid fa-circle-info" style="color: #000"></td>
                                  <td style="color: red">70  &nbsp; <a href="/datapresensi" class="fa-solid fa-circle-info" style="color: #000"></td>

                              </tr>
                              <tr>
                                <td><input type="checkbox" id="#" name=""></td>
                                <td>4</td>
                                <td>aufff</td>
                                <td>MJ/UIUX/POLINES/AGST2023/06</td>
                                <td>100 &nbsp; <a href="/datapresensi" class="fa-solid fa-circle-info" style="color: #000"></td>
                                  <td style="color: orange">80  &nbsp; <a href="/datapresensi" class="fa-solid fa-circle-info" style="color: #000"></td>
                                  <td style="color: red">70  &nbsp; <a href="/datapresensi" class="fa-solid fa-circle-info" style="color: #000"></td>
                              </tr>
                            </tbody>
                            </table>
                    </div>

            @endsection
=======
@extends('layouts.masterAfterPay')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/adminUniv-afterPayment/mitra/laporandatapresensi.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <div class="container-fluid p-3 ml-2">
        <div class="d-flex align-items-center">
            <a href="#" class="kekiri mr-2"><i class="fas fa-chevron-left"></i></a>
            <div class="header" style="display: grid; grid-template-columns: 1fr auto;">
                <div style="margin: 15px">
                    <h3 style="font-size: 50px; ">Laporan Data Presensi</h3>
                    <p>Data per tanggal 2023-09-01 s/d 2023-09-30</p>
                </div>
                <div style="align-self: center;">
                    <label class="label">Cari Mahasiswa</label>
                    <div class="input-group mb-5">
                        <input type="text" id="search-input" class="form-control" placeholder="     Pencarian">
                        <i class="fa-solid fa-search"
                            style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color:black"></i>
                    </div>
                </div>
            </div>
        </div>

        <div style="display: flex; justify-content: flex-end ; align-items: center;   ">
            <input type="date" name="date" id="date-input">
            <input type="date" name="date" id="date-input">
            <div style="margin: 10px;">
                <div class="dropdown">
                    <button class="dropbtn"><i class="fa-solid fa-filter"></i>Filter<i
                            class="fa-solid fa-chevron-down"></i></button>
                    <div class="dropdown-content">
                        <div style="border-bottom: 1px solid #000;">
                            <label for="checkbox1">Shift</label><br>
                            <input type="checkbox" id="checkbox2">
                            <label for="checkbox2">Shift pagi</label><br>
                            <input type="checkbox" id="checkbox3">
                            <label for="checkbox3">Shift Middle</label><br>
                            <input type="checkbox" id="checkbox3">
                            <label for="checkbox3">Shift Siang</label><br>
                        </div>
                        <div style="border-bottom: 1px solid #000;">
                            <label for="checkbox1">Kantor</label><br>
                            <input type="checkbox" id="checkbox2">
                            <label for="checkbox2">Kantor1</label><br>
                            <input type="checkbox" id="checkbox3">
                            <label for="checkbox3">Kantor2</label><br>
                            <input type="checkbox" id="checkbox3">
                            <label for="checkbox3">Kantor4</label><br>
                        </div>
                    </div>
                    <button class="search"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </div>
        </div>
        <br>
        <div class="table-container">
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

                    @foreach ($kehadiran as $no => $item)
                        <tr>
                            <td><input type="checkbox" id="#" name=""></td>
                            <td>{{ $no + 1 }}</td>
                            <td><a href="">{{ $item->user->nama_lengkap }}</a></td>
                            <td>MJ/UIUX/{{ $item->user->sekolah }}/{{ $item->user->nomor_induk }}/AGST2023/06</td>
                            <td>{{ $item->total_kehadiran }} &nbsp; <a
                                    href="{{route('cont.mitrapresensi', $item->nama_lengkap)}}"
                                    class="fa-solid fa-circle-info" style="color: #000"></td>
                            <td style="color: orange">{{ $item->total_izin + $item->total_sakit}} &nbsp; <a
                                href="{{ route('cont.mitrapresensi.detailizin', ['nama_lengkap' => $item->nama_lengkap]) }}"
                                class="fa-solid fa-circle-info" style="color: #000"></td>
                            <td style="color: red">{{ $item->total_ketidakhadiran }} &nbsp; <a
                                    href="{{ route('cont.mitrapresensi.detailtidakhadir', ['nama_lengkap' => $item->nama_lengkap]) }}"
                                    class="fa-solid fa-circle-info" style="color: #000"></td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
@endsection
