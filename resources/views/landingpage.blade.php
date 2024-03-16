<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran</title>
    <link rel="stylesheet" href="{{ asset('css/daftar.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

    </style>
</head>
<body>
    <div class="container">
    <div class= "input">
        <h1>Daftarkan Kampus/Sekolah Anda </h1>
        <form action="/api/daftar" method="POST">
            <div class= "box-input">
                <label for="username">Nama</label>
                <i class="fas fa-user"></i>
                <input type= "text" id="fullname" name="fullname" placeholder="Full Name">
            </div>
            <div class= "box-input">
                <label for="username">Sekolah/Perguruan tinggi</label>
                <i class="fas fa-graduation-cap"></i>
                <input type= "text" id="sekolah" name="sekolah" placeholder="Nama Sekolah/Perguruan Tinggi">
            </div>
            <div class= "box-input">
                <label for="username">Email</label>
                <i class="fas fa-envelope-open-text"></i>
                <input type= "text" id="email" name="email" placeholder="Email">
            </div>
            <div class= "box-input">
                <label for="username">Telephone</label>
                <i class="fas fa-phone"></i>
                <input type= "text" id="telephone" name="telephone" placeholder="Telephone">

            <div class= "box-input">
                <label for="username">Password</label>
                <i class="fas fa-lock"></i>
                <input type= "text" id="password" name="password" placeholder="Password">
            </div>
            <button type="submit" class="btn-input">
                Daftar
            </button>
        </form>
    </div>
    </div>
</body>

<script>
function signup() {
    var name = document.getElementById('fullname').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var sekolah = document.getElementById('sekolah').value;
    var telephone = document.getElementById('telephone').value;
    console.log("Name:", name);
            console.log("Email:", email);
            console.log("Password:", password);
            console.log("Sekolah:", sekolah);
            console.log("Telephone:", telephone);
}

</script>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form method="POST" action="/api/loginpage">
        @csrf
        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <button type="submit">Login</button>
    </form>
</body>


</html>
@extends('layouts.master')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/adminbeforepayment.css') }}">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Paket Website Presensi Sesuai Kebutuhan Anda</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="tittle-container">
        <h1 style="padding: 20px;">Pilih Paket Website Presensi Sesuai Kebutuhan Anda</h1>
    <div class="container d-flex flex-row p-5" style="box-sizing: border-box;">
        <div class="card col-3">
            <div class="plan-title">Bronze</div>
            <div class="price" style="color:red">Rp 1.000.000</div>
            <div class="period">/tahun</div>
            <div class="features">
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
            <button type="button" class="btn btn-outline-danger">Coba Sekarang</button>
        </div>

        <div class="card col-3">
            <div class="plan-title">Silver</div>
            <div class="price" style="color: blue">Rp 4.000.000</div>
            <div class="period">/tahun</div>
            <div class="features">
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
            <button type="button" class="btn btn-outline-primary">Coba Sekarang</button>
        </div>

        <div class="card col-3">
            <div class="plan-title">Gold</div>
            <div class="price" style="color: green">Rp 7.000.000</div>
            <div class="period">/tahun</div>
            <div class="features">
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
            <button type="button" class="btn btn-outline-success">Coba Sekarang</button>
        </div>

        <div class="card col-3">
            <div class="plan-title">Platinum</div>
            <div class="price" style="color: purple">Rp 10.000.000</div>
            <div class="period">/tahun</div>

            <div class="features">
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
            <button type="button" class="btn btn-outline-secondary">Coba Sekarang</button>
        </div>
    </div>
</body>
</html>
@extends('layouts.landing')

@section('content')
    <div class="modal fade" id="modalCheckout" tabindex="-1" role="dialog" aria-labelledby="modalCheckout" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="my-5 d-flex flex-column justify-content-center">
                    <p class="text-capitalize text-center fs-5 alert-hapus fw-medium ">Yakin memilih paket ini?</p>
                    <div class="mx-auto d-flex gap-2">
                        <button type="button" class="btn mb-3 btn-danger px-5" data-bs-dismiss="modal"
                            data-bs-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-success mb-3 px-5" id="yakinBtn">Yakin</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="text-capitalize p-5" style="background-color: #F2F4F7; max-height: 100%;">
        <h4 class="text-center fw-bold">selesaikan pembayaran anda</h4>
        <div class="checkout mt-5">
            <form class="fw-medium">
                <label for="paket" class="mt-4">paket<span class="text-danger">*</span></label>
                <div class="d-flex">
                    <div style="background-color: #E9E9E9; padding: 16px 20px 16px 20px;" class="label-img"><img
                            src="{{ asset('assets/images/icon/paket.png') }}" /></div>
                    {{-- <script>
                        var currentUrl = window.location.pathname;
                        var urlParts = currentUrl.split('/');
                        var packageName = urlParts[urlParts.length - 1];
                    </script> --}}
                    <input type="text" name="paket"
                        style="border: 2px solid #E9E9E9; color:#5e5e5e; padding: 12px; border-radius: 0px 8px 8px 0px; width: 100%;"
                        value="Bronze" disabled>
                </div>

                <label for="bayar" class="mt-4">metode pembayaran<span class="text-danger">*</span></label>
                <div class="d-flex">
                    <div style="background-color: #E9E9E9; padding: 16px 18px 16px 18px;" class="label-img"><img
                            src="{{ asset('assets/images/icon/bayar.png') }}" /></div>
                    <select style="border: 2px solid #E9E9E9; padding: 16px; border-radius: 0px 8px 8px 0px; width: 100%;"
                        id="bayar">
                        <option value="">Pilih Metode Pembayaran</option>
                        <option value="mandiri">Mandiri Virtual Account</option>
                        <option value="bca">BCA Virtual Account</option>
                        <option value="bri">BRI Virtual Account</option>
                        <option value="BNI">BNI Virtual Account</option>
                        <option value="shopeepay">Shopeepay</option>
                        <option value="gopay">Gopay</option>
                    </select>
                </div>

                <label for="kota" class="mt-4">kota<span class="text-danger">*</span></label>
                <div class="d-flex">
                    <div style="background-color: #E9E9E9; padding: 16px 20px 16px 20px;" class="label-img"><img
                            src="{{ asset('assets/images/icon/paket.png') }}" /></div>
                    <select type="email" name="kota"
                        style="border: 2px solid #E9E9E9; padding: 16px; border-radius: 0px 8px 8px 0px; width: 100%;">
                        <option value="">Pilih Kota Anda</option>
                        <option value="yogyakarta">Yogyakarta</option>
                        <option value="jawa tengah">Jawa Tengah</option>
                        <option value="jawa barat">Jawa Barat</option>
                        <option value="jawa timur">Jawa Timur</option>
                    </select>
                </div>

                <div class="button-container">
                    <button class="border-0 mt-5 fs-5 fw-semibold"
                        style="background-color: #A61C1CE5; color: white; padding: 12px 32px; border-radius: 20px;"
                        type="button" data-bs-toggle="modal" data-bs-target="#modalCheckout">Check
                        Out</button>
                </div>
            </form>
        </div>
    </div>

    <footer style="background-color: #A61C1CE5; margin-bottom: -48px; position: absolute; bottom: 0; width: 100%;">
        <p class="text-center text-uppercase fs-6 my-auto py-2 text-white">
            <span class="fs-3 fw-bold" style="vertical-align: middle;">&copy;</span> 2023 pt.seven inc
        </p>
    </footer>

    <script>
        document.getElementById("yakinBtn").addEventListener("click", function() {
            window.location.href = "/after-checkout";
        });
    </script>
@endsection
