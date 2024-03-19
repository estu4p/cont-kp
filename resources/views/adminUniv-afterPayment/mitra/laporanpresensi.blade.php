@extends('layouts.masterAfterPay')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/adminUniv-afterPayment/mitra/laporandatapresensi.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<div class="container-fluid p-3 ml-2">
    <div class="d-flex align-items-center">
        <a href="#" class="kekiri mr-2"><i class="fas fa-chevron-left"></i></a>
        <div class="header" style="display: grid; grid-template-columns: 1fr auto;" >
            <div style="margin: 15px">
                <h3 style="font-size: 50px; ">Laporan Data Presensi</h3>
                <p>Data per tanggal 2023-09-01 s/d 2023-09-30</p>
            </div>
            <div style="align-self: center;">
                <label class="label" >Cari Mahasiswa</label>
                <div class="input-group mb-5">
                    <input type="text" id="search-input" class="form-control" placeholder="     Pencarian">
                    <i class="fa-solid fa-search" style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color:black"></i>
                </div>
            </div>
        </div>
    </div>

    <div style="display: flex; justify-content: flex-end ; align-items: center;   " >
        <input type="date" name="date" id="date-input">
        <input type="date" name="date" id="date-input">
        <div style="margin: 10px;">
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
      <tr>
        <td><input type="checkbox" id="#" name=""></td>
        <td>1</td>
        <td><a href="#">Syalita Widyandini</a></td>
        <td>MJ/UIUX/POLINES/AGST2023/06</td>
        <td>100 &nbsp; <a href="/mitra-laporanpresensi-detaihadir" class="fa-solid fa-circle-info" style="color: #000"></td>
        <td style="color: orange">30  &nbsp; <a href="/mitra-laporanpresensi-detailizin" class="fa-solid fa-circle-info" style="color: #000"></td>
        <td style="color: red">9  &nbsp; <a href="/mitra-laporanpresensi-detailtidakhadir" class="fa-solid fa-circle-info" style="color: #000"></td>
      </tr>
      <tr>
        <td><input type="checkbox" id="#" name=""></td>
        <td>2</td>
        <td><a href="#">Diah Ayu Nariant</a>i</td>
        <td>MJ/UIUX/UAD/AGST2023/06</td>
        <td>19 &nbsp; <a href="/mitra-laporanpresensi-detaihadir" class="fa-solid fa-circle-info" style="color: #000"></td>
        <td style="color: orange">20  &nbsp; <a href="/mitra-laporanpresensi-detailizin" class="fa-solid fa-circle-info" style="color: #000"></td>
        <td style="color: red">0  &nbsp; <a href="/mitra-laporanpresensi-detailtidakhadir" class="fa-solid fa-circle-info" style="color: #000"></td>

      </tr>
      <tr>
        <td><input type="checkbox" id="#" name=""></td>
        <td>3</td>
        <td><a href="#">Indah Puji Astutik</a></td>
        <td>MJ/UIUX/UAD/AGST2023/06</td>
        <td>25 &nbsp; <a href="/mitra-laporanpresensi-detaihadir" class="fa-solid fa-circle-info" style="color: #000"></td>
        <td style="color: orange">20  &nbsp; <a href="/mitra-laporanpresensi-detailizin" class="fa-solid fa-circle-info" style="color: #000"></td>
        <td style="color: red">5  &nbsp; <a href="/mitra-laporanpresensi-detailtidakhadir" class="fa-solid fa-circle-info" style="color: #000"></td>

      </tr>
      <tr>
        <td><input type="checkbox" id="#" name=""></td>
        <td>4</td>
        <td><a href="#">Achmad Muchibin</a></td>
        <td>MJ/UIUX/UAD/AGST2023/06</td>
        <td>90 &nbsp; <a href="/mitra-laporanpresensi-detaihadir" class="fa-solid fa-circle-info" style="color: #000"></td>
        <td style="color: orange">10  &nbsp; <a href="/mitra-laporanpresensi-detailizin" class="fa-solid fa-circle-info" style="color: #000"></td>
        <td style="color: red">5  &nbsp; <a href="/mitra-laporanpresensi-detailtidakhadir" class="fa-solid fa-circle-info" style="color: #000"></td>
      </tr>
      <tr>
        <td><input type="checkbox" id="#" name=""></td>
        <td>5</td>
        <td><a href="#">Peter Parker</a></td>
        <td>MJ/UIUX/UAD/AGST2023/06</td>
        <td>19 &nbsp; <a href="/mitra-laporanpresensi-detaihadir" class="fa-solid fa-circle-info" style="color: #000"></td>
        <td style="color: orange">0  &nbsp; <a href="/mitra-laporanpresensi-detailizin" class="fa-solid fa-circle-info" style="color: #000"></td>
        <td style="color: red">5  &nbsp; <a href="/mitra-laporanpresensi-detailtidakhadir" class="fa-solid fa-circle-info" style="color: #000"></td>
      </tr>
      <tr>
        <td><input type="checkbox" id="#" name=""></td>
        <td>6</td>
        <td><a href="#">Donni Tata Predita</a></td>
        <td>MJ/UIUX/UAD/AGST2023/06</td>
        <td>80 &nbsp; <a href="/mitra-laporanpresensi-detaihadir" class="fa-solid fa-circle-info" style="color: #000"></td>
        <td style="color: orange">10  &nbsp; <a href="/mitra-laporanpresensi-detailizin" class="fa-solid fa-circle-info" style="color: #000"></td>
        <td style="color: red">20  &nbsp; <a href="/mitra-laporanpresensi-detailtidakhadir" class="fa-solid fa-circle-info" style="color: #000"></td>
      </tr>
      <tr>
        <td><input type="checkbox" id="#" name=""></td>
        <td>7</td>
        <td><a href="#">Intanie Salsabiela</a></td>
        <td>MJ/UIUX/UAD/AGST2023/06</td>
        <td>80 &nbsp; <a href="/mitra-laporanpresensi-detaihadir" class="fa-solid fa-circle-info" style="color: #000"></td>
        <td style="color: orange">10  &nbsp; <a href="/mitra-laporanpresensi-detailizin" class="fa-solid fa-circle-info" style="color: #000"></td>
        <td style="color: red">5  &nbsp; <a href="/mitra-laporanpresensi-detailtidakhadir" class="fa-solid fa-circle-info" style="color: #000"></td>
      </tr>
      <tr>
        <td><input type="checkbox" id="#" name=""></td>
        <td>8</td>
        <td><a href="#">Putri Syafira</a></td>
        <td>MJ/UIUX/UAD/AGST2023/06</td>
        <td>80 &nbsp; <a href="/mitra-laporanpresensi-detaihadir" class="fa-solid fa-circle-info" style="color: #000"></td>
        <td style="color: orange">2  &nbsp; <a href="/mitra-laporanpresensi-detailizin" class="fa-solid fa-circle-info" style="color: #000"></td>
        <td style="color: red">20  &nbsp; <a href="/mitra-laporanpresensi-detailtidakhadir" class="fa-solid fa-circle-info" style="color: #000"></td>
      </tr>
      <tr>
        <td><input type="checkbox" id="#" name=""></td>
        <td>9</td>
        <td><a href="#">Rico Simanjuntak</a></td>
        <td>MJ/UIUX/UAD/AGST2023/06</td>
        <td>80 &nbsp; <a href="/mitra-laporanpresensi-detaihadir" class="fa-solid fa-circle-info" style="color: #000"></td>
        <td style="color: orange">20  &nbsp; <a href="/mitra-laporanpresensi-detailizin" class="fa-solid fa-circle-info" style="color: #000"></td>
        <td style="color: red">20  &nbsp; <a href="/mitra-laporanpresensi-detailtidakhadir" class="fa-solid fa-circle-info" style="color: #000"></td>
      </tr>
      <tr>
        <td><input type="checkbox" id="#" name=""></td>
        <td>10</td>
        <td><a href="#">Prazz Teguh</a></td>
        <td>MJ/UIUX/UAD/AGST2023/06</td>
        <td>80 &nbsp; <a href="/mitra-laporanpresensi-detaihadir" class="fa-solid fa-circle-info" style="color: #000"></td>
        <td style="color: orange">20  &nbsp; <a href="/mitra-laporanpresensi-detailizin" class="fa-solid fa-circle-info" style="color: #000"></td>
        <td style="color: red">20  &nbsp; <a href="/mitra-laporanpresensi-detailtidakhadir" class="fa-solid fa-circle-info" style="color: #000"></td>
      </tr>
      <tr>
        <td><input type="checkbox" id="#" name=""></td>
        <td>11</td>
        <td><a href="#">Fadhel Abdillah</a></td>
        <td>MJ/UIUX/UAD/AGST2023/06</td>
        <td>10 &nbsp; <a href="/mitra-laporanpresensi-detaihadir" class="fa-solid fa-circle-info" style="color: #000"></td>
        <td style="color: orange">0  &nbsp; <a href="/mitra-laporanpresensi-detailizin" class="fa-solid fa-circle-info" style="color: #000"></td>
        <td style="color: red">0  &nbsp; <a href="/mitra-laporanpresensi-detailtidakhadir" class="fa-solid fa-circle-info" style="color: #000"></td>
      </tr>
      <tr>
        <td><input type="checkbox" id="#" name=""></td>
        <td>11</td>
        <td><a href="#">Adrian Rifai</a></td>
        <td>MJ/UIUX/UAD/AGST2023/06</td>
        <td>100 &nbsp; <a href="/mitra-laporanpresensi-detaihadir" class="fa-solid fa-circle-info" style="color: #000"></td>
        <td style="color: orange">0  &nbsp; <a href="/mitra-laporanpresensi-detailizin" class="fa-solid fa-circle-info" style="color: #000"></td>
        <td style="color: red">0  &nbsp; <a href="/mitra-laporanpresensi-detailtidakhadir" class="fa-solid fa-circle-info" style="color: #000"></td>
      </tr>
      <tr>
        <td><input type="checkbox" id="#" name=""></td>
        <td>14</td>
        <td><a href="#">Wikan Jati Pamungkas</a></td>
        <td>MJ/UIUX/UAD/AGST2023/06</td>
        <td>11 &nbsp; <a href="/mitra-laporanpresensi-detaihadir" class="fa-solid fa-circle-info" style="color: #000"></td>
        <td style="color: orange">0  &nbsp; <a href="/mitra-laporanpresensi-detailizin" class="fa-solid fa-circle-info" style="color: #000"></td>
        <td style="color: red">0  &nbsp; <a href="/mitra-laporanpresensi-detailtidakhadir" class="fa-solid fa-circle-info" style="color: #000"></td>
      </tr>
    </tbody>
    </table>
</div>
</div>


@endsection
