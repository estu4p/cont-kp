@extends('layouts.master')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/profil-siswa.css') }}">
<div class="wadah">


    <div class="judul d-flex flex-column justify-content-start">
        <a href="/jumlah-mahasiswa"> <i class="fa-solid text-dark ikon-kiri fa-chevron-left icon fs-1 p-2"></i></a>
        <img src="/assets/images/gear.png" class="gear">
        <div class="tengah-judul d-flex my-auto flex-column">
            <h1 class="">Lihat Team "JAMES CLEAR"</h1>
            <p class="">MJ/UIUX/POLINES/AGST2023/06</p>
        </div>
    </div>

    <div class="container-fluid  align-items-start d-flex flex-row wadah-card row gap-4">
        <div class="row col-3 align-items-center  ">
            <div class="card col-12 py-4 px-3">
                <card class="datadiri">
                    <div class="form-group">
                        <label for="username">Nama lengkap</label>
                        <input class="input" type="text" class="form-control" id="name" placeholder="james clear">
                    </div>
                    <div class="form-group">
                        <label for="nim">Nomor induk mahasiswa</label>
                        <input class="input" type="text" class="form-control" id="nim" placeholder="2102****343">
                    </div>
                    <div class="form-group">
                        <label for="prodi">Program studi/ Jurusan</label>
                        <input class="input" type="text" class="form-control" id="prodi" placeholder="D4 - Manajemen Transportasi Udara ">
                    </div>
                    <div class="form-group">
                        <label for="tempatlahir">Tempat lahir</label>
                        <input class="input" type="text" class="form-control" id="tempatlahir" placeholder="Atas kasur">
                    </div>
                    <div class="form-group">
                        <label for="tanggallahir">Tanggal lahir</label>
                        <input class="input" type="date" class="form-control" id="tanggallahir" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="nohp">Nomor HP</label>
                        <input class="input" type="text" class="form-control" id="nohp" placeholder="08644363464">
                    </div>
                </card>
            </div>
        </div>


        <div class="row col-3 align-items-center  ">
            <div class="card col-12 py-4 px-3">
                <card class="akun">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input class="input" type="text" class="form-control" id="Username" placeholder="james123">
                    </div>
                    <div class="form-group">
                        <label for="email">E-Mail</label>
                        <input class="input" type="text" class="form-control" id="email" placeholder="james123@gmail.com">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="input" type="text" class="form-control" id="password" placeholder="isi jika ingin dirubah">
                    </div>
                    <div class="form-group">
                        <label for="konfirmasi">Ulangi password</label>
                        <input class="input" type="text" class="form-control" id="konfirmasi" placeholder="ulangi password">
                    </div>
            </div>
        </div>
        <div class="row col-3 align-items-center  ">
            <div class="card col-12 py-4 px-3">
                <card class="masuk">
                    <div class="form-group">
                        <label for="tanggalmasuk">Tanggal masuk</label>
                        <input class="input" type="date" class="form-control" id="tanggalmasuk" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="tanggalkeluar">Tanggal keluar</label>
                        <input class="input" type="date" class="form-control" id="tanggalkeluar" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="devisi">Devisi</label>
                        <div class="abu">programer</div>
                    </div>
                    <div class="form-group">
                        <label for="Project">Project</label>
                        <div class="abu">controlling magang</div>
                    </div>
                    <div class="form-group">
                        <label for="Shift">Shift</label>
                        <div class="abu">Shift Pagi (06.30 - 13.00)</div>
                    </div>
            </div>
        </div>
        <div class="row col-3 align-items-center ">
            <div class="card col-12 py-4 px-3">
                <card class="tools">
                    <div class="form-group">
                        <label for="OS">OS</label>
                        <div class="abu">Windows</div>
                    </div>
                    <div class="form-group">
                        <label for="browser">Browser</label>
                        <div class="abu">Crome</div>
                    </div>
                    <div class="form-group">
                        <label for="absen">Status absensi</label>
                        <select id="absen" name="absen">
                            <option value="apple">Pilih status absensi</option>
                            <option value="banana">Scan QR Code</option>
                            <option value="banana">Button (Klik Tombol)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Status akun</label>
                        <div class="abu">Aktif</div>
                    </div>
                    <div class="form-group">
                        <label for="konfirmasi">konfirmasi email</label>
                        <div class="abu">Sudah konfirmasi</div>
                    </div>
                </card>
            </div>
        </div>
        <div class="row col-3 align-items-center ">
            <div class="card col-12 py-4 px-3">
                <card class="tools">
                    <div class="form-group">
                        <label for="jamker">Minimal kerja (Jumlah kerja)</label>
                        <div class="abu">06:45:00</div>
                    </div>
                    <div class="form-group">
                        <label for="browser">Jam Default masuk</label>
                        <div class="abu">06:30:00</div>
                    </div>
                    <div class="form-group">
                        <label for="status">Jam Default pulang</label>
                        <div class="abu">21:00:00</div>
                    </div>
                </card>
            </div>
        </div>
        <div class="peringatan">
            <h5>Lihat Hutang Jam Siswa/Mahasiswa</h5>
            <p>Klik pada link untuk melihat sertifikat dan penilaian siswa/mahasiswa</p>
        </div>
        <div class="row col-3 align-items-center ">
            <div class="card col-12 py-4 px-3">
                <card class="tools">
                    <div class="form-group">
                        <label for="status">Hutang jam</label>
                        <div class="abu">hhh:mm:ss</div>
                    </div>
                    <div class="warning">*hhh:maks 999, mm&ss:maks 59</div>
                </card>
            </div>
        </div>
        <div class="peringatan">
            <h5>Lihat Sertifikat dan Penilaian Siswa/Mahasiswa</h5>
            <p>Klik pada link untuk melihat sertifikat dan penilaian siswa/mahasiswa</p>
        </div>
        <div class="card lengkung p-0 col-3">
            <div class="card-header d-flex align-items-center justify-content-between p-3 atas">
                <div class="d-flex  flex-column  h-100 mx-2">
                    <h5 class="card-title m-0 d-flex justify-content-end fs-6">Sertifikat</h5>
                </div>
            </div>
            <div class="card-body ">
                <p>Link G-Drive</p>
                <div class="abu">https://drive.google.com/</div>
            </div>
        </div>
        <div class="card lengkung p-0 col-3">
            <div class="card-header d-flex align-items-center justify-content-between p-3 atas">
                <div class="d-flex  flex-column  h-100 mx-2">
                    <h5 class="card-title m-0 d-flex justify-content-end fs-6">Penilaian Magang</h5>
                </div>
            </div>
            <div class="card-body ">
                <p>Link G-Drive</p>
                <div class="abu">https://drive.google.com/</div>
            </div>
        </div>

    </div>
    <div class="tengah-button w-100 d-flex justify-content-center p-4">
        <button class="button-bawah m-auto py-1">Simpan</button>
    </div>
</div>
@endsection