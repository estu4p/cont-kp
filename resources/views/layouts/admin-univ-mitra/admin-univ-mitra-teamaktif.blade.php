@extends('layouts.masterMitra')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/coba.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/adminUniv-afterPayment/adminunivmitra.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <div class="w-auto overflow-auto ">
        <div class="ruangan">
            <div class="topconten overflow-x-auto ">
                <div>
                    <a href="/contributorformitra-devisi-Seeallteams"><i class="icon fa-solid fa-angle-left"></i></a>
                </div>
                <div class="header">
                    <h1>
                        Lihat team “Syalita Widyandini”
                    </h1>
                    <h2>
                        D3-Teknik Informatika (3.34.21.3.23)
                    </h2>

                </div>
            </div>
            <div style="display: flex " >
                <div class="data_diri col-4" style="box-sizing: border-box;">
                    <br>
                    <label>Nama Lengkap</label>
                    <input type="text" value="Syalita Widyandini" class="input">
                    <label>Nomor Induk Mahasiswa</label>
                    <input type="text" value="33421323" class="input">
                    <label>Program Studi/Jurusan</label>
                    <input type="text" value="D3-Teknik Informatika" class="input">
                    <label>Tempat Lahir</label>
                    <input type="text" value="Solo" class="input">
                    <label>Tanggal Lahir</label>
                    <input type="date" class="input2">
                    <label>Nomor HP</label>
                    <input type="text" value="081234567890" class="input">
                </div>
                <div class="prosesmagang col-3 ">
                    <br>
                    <label>User Name</label>
                    <input type="text" value="Syalita Widyandini" class="input">
                    <label>E-mail</label>
                    <input type="text" value="syalitaw@gmail.com" class="input">
                    <label>Password</label>
                    <input type="text" value="12345678" class="input">
                    <label>Ulangi Password</label>
                    <input type="text" value="ulangi password" class="input">

                </div>
                <div class="data-diri akun col-4">
                    <br>

                    <label>Tanggal Masuk</label>
                    <input type="date" class="input2">
                    <br>
                    <label>Tanggal Keluar</label>
                    <input type="date" class="input2">
                    </ul>
                    <br>
                    <label>Divisi</label>
                    <br>
                    <div class="input-group mb-3 tombolpilihan  ">
                        <select class="form-select bg-transparent py-1" id="inputGroupSelect01">
                        <option selected>Pilih Divisi</option>
                        <option value="1">UI/UX Designer</option>
                        <option value="2">Design Grafis</option>
                        <option value="3">Programmer</option>
                        </select>
                    </div>
                    <label>Project</label>
                    <br>
                    <input type="text" value="titipsini" class="input">
                    <label>Shift</label>
                    <input type="text" value="pagi" class="input">


                </div>
                <div class="akun col-4 ">
                    <br>

                    <label>OS</label>
                    <input type="text" value="Windows" class="input">
                    <br>
                    <label>Browser</label>
                    <input type="text" value="Chrome" class="input">
                    </ul>
                    <br>
                    <label>Status Absensi</label>
                    <br>
                    <div class="input-group mb-3 tombolpilihan  ">
                        <select class="form-select bg-transparent py-1" id="inputGroupSelect01">
                            <option selected>Pilih Status Absenis</option>
                            <option value="1">Scan QR Code</option>
                            <option value="2">Button (Klik tombol) </option>
                        </select>
                    </div>

                    <label class="label-status-akun">Status Akun</label>
                    <div class="input-group mb-3 tombolpilihan">
                        <select class="form-select bg-transparent py-1" id="inputGroupSelect01">
                            <option selected>Pilih Status Akun</option>
                            <option value="1">Aktif</option>
                            <option value="2">Belum Aktif</option>
                        </select>
                    </div>

                    <label>Konfirmasi Email</label>
                    <br>
                    <div class="input-group mb-3 tombolpilihan  ">
                        <select class="form-select bg-transparent py-1" id="inputGroupSelect01">
                            <option selected>Pilih Konfirmasi Email</option>
                            <option value="1">Sudah</option>
                            <option value="2">Belum</option>
                        </select>
                    </div>

                </div>
            </div>
            <div class="jamkerja col-4">
                <br>
                <label>Minimal kerja (jumlah kerja)</label>
                <input type="text" value="06:45:00" class="input2">
                <label>Jam Default masuk</label>
                <input type="text" value="06:30:00" class="input2">
                <label>jam default pulang</label>
                <input type="text" value="21:00:00" class="input2">
            </div>
            <br>
            <br>

            <div class="lihathutangjam">
                <div class="isinya">
                    <p style="font-size: 30px">Lihat Hutang Jam Siswa/Mahasiswa</p>
                    <p style="margin-top: -2%">Klik pada link untuk melihat sertifikat dan penilaian siswa/mahasiswa</p>
                </div>
            </div>
            <br>
            <br>

            <div class="hutangjam">
                <br>
                <label>hutang Jam</label>
                <input type="text" value="hhh:mm:ss" class="input2">
                <label class="note"> *hhh:maks 999, mm&ss:maks 59</label>
            </div>

        </div>
        <div class="lihathutangjam2" style="">
            <div class="isinya2">
                <p style="font-size: 30px">Lihat Sertifikat dan Penilaian Siswa/Mahasiswa</p>
                <p style="margin-top: -2%">Klik pada link untuk melihat sertifikat dan penilaian siswa/mahasiswa</p>
            </div>
        </div>
        <div style="display: flex">
            <div class="sertifikat">
                <p style="text-align: center ; padding-top:3%">Sertifikat</p>
                <hr>
                <label>Link Gdrive</label>
                <input type="text" value="https://drive.google.com/file/sertifikat-ma..." class="input2">

            </div>
            <div class="sertifikat">
                <p style="text-align: center ; padding-top:3%">Penilaian Magang</p>
                <hr>
                <label>Link Gdrive</label>
                <input type="text" value="https://drive.google.com/file/sertifikat-ma..." class="input2">
            </div>
        </div>


        <div class="container">
            <button id="btnSimpan" class="buttonsimpan btn-primary">Simpan</button>
        </div>

        <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="successModalLabel">Berhasil !</h5>
                    </div>
                    <div>
                        <img src="assets/images/berhasil.png" class="berhasil">
                    </div>
                    <br>

                    <div class="modal-body">
                        Profil mahasiswa berhasil diperbarui
                    </div>
                </div>
            </div>
        </div>
    </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



        <script>
            document.getElementById('btnSimpan').addEventListener('click', function() {
                $('#successModal').modal('show');
                setTimeout(function() {
                    $('#successModal').modal('hide');
                }, 1000);
            });
        </script>
    @endsection
