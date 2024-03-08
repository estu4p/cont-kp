@extends('layouts.master')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('assets/css/laporandatapresensi.css') }}">
<div id="laporan-hasil-presensi">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
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
                    <table class="table table-sm table-bordered table-striped" style="font-size: 15px;">
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
                                <td>syalita widyadini</td>
                                <td>MJ/UIUX/POLINES/AGST2023/06</td>
                                <td>100</td>
                                <td>80</td>
                                <td>70</td>
                              </tr>
                              <tr>
                                <td><input type="checkbox" id="#" name=""></td>
                                <td>2</td>
                                <td>diah ayu narianti</td>
                                <td>MJ/UIUX/POLINES/AGST2023/06</td>
                                <td>100</td>
                                <td>80</td>
                                <td>70</td>

                              </tr>
                              <tr>
                                <td><input type="checkbox" id="#" name=""></td>
                                <td>3</td>
                                <td>indah puji astuti</td>
                                <td>MJ/UIUX/POLINES/AGST2023/06</td>
                                <td>100</td>
                                <td>80</td>
                                <td>70</td>

                              </tr>
                              <tr>
                                <td><input type="checkbox" id="#" name=""></td>
                                <td>4</td>
                                <td>achmad mucibin</td>
                                <td>MJ/UIUX/POLINES/AGST2023/06</td>
                                <td>100</td>
                                <td>80</td>
                                <td>70</td>

                              </tr>
                            </tbody>
                            </table>
                    </div>

            @endsection
