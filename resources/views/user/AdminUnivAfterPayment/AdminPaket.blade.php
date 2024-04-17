
@extends('layouts.masterAfterPay')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/adminbeforepayment.css') }}">
<div class="tittle-container">
    <h1 style="padding: 20px;">Pilih Paket Website Presensi<br> Sesuai Kebutuhan Anda</h1>
    <div class="wadah">
<div class="container row d-flex flex-row p-md-2 p-lg-5 " style="box-sizing: border-box;">
    <div class="card col-md-5 col-lg-3">
        <div class="plan-title mt-2">Bronze</div>
        <div class="price" style="color:red">Rp 1.000.000</div>
        <div class="period">/tahun</div>
        <div class="features my-3">
            <table>
                <tr>
                    <td><i class="fa-regular fa-square-check"></i></td>
                    <td>Presensi Siswa/Mahasiswa</td>
                </tr>
                <tr>
                    <td><i class="fa-regular fa-square-check"></i></td>
                    <td>Penilaian Siswa/Mahasiswa</td>
                </tr>
                <tr>
                    <td><i class="fa-regular fa-square-check"></i></td>
                    <td>Pantau Siswa/Mahasiswa</td>
                </tr>
                <tr>
                    <td><i class="fa-regular fa-square-check"></i></td>
                    <td>Max User 500 Siswa/Mahasiswa</td>
                </tr>
            </table>
        </div>
        <a href="/CheckoutBronze">
            <button type="button" class="btn btn-outline-danger mb-4 rounded-pill">Upgrade</button>
        </a>

    </div>

    <div class="card col-md-5 col-lg-3">
        <div class="plan-title mt-2">Silver</div>
        <div class="price" style="color: blue">Rp 4.000.000</div>
        <div class="period">/tahun</div>
        <div class="features my-3">
            <table>
                <tr>
                    <td><i class="fa-regular fa-square-check"></i></td>
                    <td>Presensi Siswa/Mahasiswa</td>
                </tr>
                <tr>
                    <td><i class="fa-regular fa-square-check"></i></td>
                    <td>Penilaian Siswa/Mahasiswa</td>
                </tr>
                <tr>
                    <td><i class="fa-regular fa-square-check"></i></td>
                    <td>Pantau Siswa/Mahasiswa</td>
                </tr>
                <tr>
                    <td><i class="fa-regular fa-square-check"></i></td>
                    <td>Max User 1000 Siswa/Mahasiswa</td>
                </tr>
            </table>
        </div>
        <a href="/CheckoutSilver">
            <button type="button" class="btn btn-outline-primary mb-4 rounded-pill">Upgrade</button>
        </a>

    </div>

    <div class="card col-md-5 col-lg-3">
        <div class="plan-title mt-2">Gold</div>
        <div class="price" style="color: green">Rp 7.000.000</div>
        <div class="period">/tahun</div>
        <div class="features my-3">
            <table>
                <tr>
                    <td><i class="fa-regular fa-square-check"></i></td>
                    <td>Presensi Siswa/Mahasiswa</td>
                </tr>
                <tr>
                    <td><i class="fa-regular fa-square-check"></i></td>
                    <td>Penilaian Siswa/Mahasiswa</td>
                </tr>
                <tr>
                    <td><i class="fa-regular fa-square-check"></i></td>
                    <td>Pantau Siswa/Mahasiswa</td>
                </tr>
                <tr>
                    <td><i class="fa-regular fa-square-check"></i></td>
                    <td>Max User +1000 Siswa/Mahasiswa</td>
                </tr>
            </table>
        </div>
        <a href="/CheckoutGold">
            <button type="button" class="btn btn-outline-success mb-4 rounded-pill">Upgrade</button>
        </a>

    </div>

    <div class="card col-md-5 col-lg-3">
        <div class="plan-title mt-2">Platinum</div>
        <div class="price" style="color: purple">Rp 10.000.000</div>
         <div class="period">/tahun</div>
        <div class="features my-3">
            <table>
                <tr>
                    <td><i class="fa-regular fa-square-check"></i></td>
                    <td>Presensi Siswa/Mahasiswa</td>
                </tr>
                <tr>
                    <td><i class="fa-regular fa-square-check"></i></td>
                    <td>Penilaian Siswa/Mahasiswa</td>
                </tr>
                <tr>
                    <td><i class="fa-regular fa-square-check"></i></td>
                    <td>Pantau Siswa/Mahasiswa</td>
                </tr>
                <tr>
                    <td><i class="fa-regular fa-square-check"></i></td>
                    <td>Custom User Sesuai Kebutuhan</td>
                </tr>
            </table>

        </div>
        <a href="/CheckoutPlatinum">
            <button type="button" class="btn btn-outline-secondary mb-4 rounded-pill">Upgrade</button>
        </a>

    </div>
</div>
</div>
</body>
</html>
