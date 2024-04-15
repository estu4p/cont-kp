<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('assets/css/contributorformitra/dashboard.css') }}">
    <!-- Tambahkan link CSS atau tambahkan eksternal CSS sesuai kebutuhan -->
</head>
<body>
<div class="dashboard">
    <div class="judul">
    SELAMAT DATANG<br>
    DI PANEL MITRA
    </div>
    <div style="display: flex ; margin-top: 5%">
        <div class="card">
            <div style="display: flex">
                <div>
                    <img src="/assets/images/groups_2.png" class="gambar">
                </div>
                <div class="jumlahsiswa">
                   <h1 style="font-size: 20px;">Jumlah Mahasiswa</h1>
                   <label style="font-size: 40px ; font-weight: bold ;">{{ $totalMahasiswa }}</label>
                </div>
            </div>
            <div class="bawahan">
                <div class="right">
                    View Detail
                </div>
                <div class="left">
                    <a href="#"><i class="fa-solid fa-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="card">
            <div style="display: flex">
                <div class="masuk">
                    <h1 style="font-size: 27px;">Masuk </h1>
                    <label style="font-size: 40px ; font-weight: bold ; color : #0F9F03">{{ $totalHadir }}</label>
                 </div>
                <div class="izin">
                   <h1 style="font-size: 27px;">Izin</h1>
                   <label style="font-size: 40px ; font-weight: bold ; color : #FF1E1E">{{ $totalIzin }}</label>
                </div>
            </div>
            <div class="bawahan2">
                <div class="right">
                    View Detail
                </div>
                <div class="left">
                    <a href="#"><i class="fa-solid fa-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
