@extends('layouts.master')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/profil-siswa.css') }}">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
        <div class="row w-100 gap-3 py-5 align-items-start ">
            <div class="card col-3  py-4 px-3">
                <card class="datadiri  ">
                    <div class="form-group ">
                        <label for="username">Nama lengkap</label>
                        <input class="input" type="text" class="form-control" id="name"
                        {{-- placeholder="james clear" --}}
                        value="{{$lihat->nama_lengkap}}" name="nama_lengkap" >
                    </div>
                    <div class="form-group">
                        <label for="nim">Nomor induk mahasiswa</label>
                        <input class="input" type="text" class="form-control" id="nim"
                        {{-- placeholder="2102****343" --}}
                        value="{{ $lihat->nomor_induk }}" name="nomor_induk">
                    </div>
                    <div class="form-group">
                        <label for="prodi">Program studi/ Jurusan</label>
                        <input class="input" type="text" class="form-control" id="prodi"
                        {{-- placeholder="D4 - Manajemen Transportasi Udara " --}}
                         value="{{ $lihat->jurusan }}" name="jurusan">
                    </div>
                    <div class="form-group">
                        <label for="tempatlahir">Tempat lahir</label>
                        <input class="input" type="text" class="form-control" id="tempatlahir"
                        {{-- placeholder="Atas kasur" --}}
                         value="{{ $lihat->kota }}" name="kota">
                    </div>
                    <div class="form-group">
                        <label for="tanggallahir">Tanggal lahir</label>
                        <input class="input" type="date" class="form-control" id="tanggallahir"
                        {{-- placeholder="" --}}
                         value="{{ $lihat->tgl_lahir }}" name="tgl_lahir">
                    <div class="form-group">
                        <label for="nohp">Nomor HP</label>
                        <input class="input" type="text" class="form-control" id="nohp"
                        {{-- placeholder="08644363464" --}}
                         value="{{ $lihat->no_hp }}" name="no_hp">
                    </div>
                </card>
            </div>
        </div>


        <div class="row col-3 align-items-center   ">
            <div class="card col-12 py-4 px-3">
                <card class="akun">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input class="input" type="text" class="form-control" id="Username"
                        {{-- placeholder="james123" --}}
                         value="{{ $lihat->username}}" name="username">
                    </div>
                    <div class="form-group">
                        <label for="email">E-Mail</label>
                        <input class="input" type="text" class="form-control" id="email"
                        {{-- placeholder="james123@gmail.com" --}}
                        value="{{ $lihat->email }}" name="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="input" type="text" class="form-control" id="password"
                        placeholder="isi jika ingin dirubah">
                    </div>
                    <div class="form-group">
                        <label for="konfirmasi">Ulangi password</label>
                        <input class="input" type="text" class="form-control" id="konfirmasi"
                        placeholder="ulangi password">
                    </div>
            </div>
        </div>
        <div class="row col-3 align-items-center   ">
            <div class="card col-12 py-4 px-3">
                <card class="masuk">
                    <div class="form-group">
                        <label for="tanggalmasuk">Tanggal masuk</label>
                        <input class="input" type="date" class="form-control" id="tanggalmasuk"
                        {{-- placeholder="" --}}
                        value="{{ $lihat->tgl_masuk }}" name="tgl_masuk">
                    </div>
                    <div class="form-group">
                        <label for="tanggalkeluar">Tanggal keluar</label>
                        <input class="input" type="date" class="form-control" id="tanggalkeluar"
                        {{-- placeholder="" --}}
                        value="{{$lihat->tgl_keluar }}" name="tgl_keluar">
                    </div>
                    <div class="form-group">
                        <label for="devisi">Devisi</label>
                        <div class="abu">{{ $divisi->nama_divisi }}</div>
                    </div>
                    <div class="form-group">
                        <label for="Project">Project</label>
                        <div class="abu">{{ $project->nama_project }} </div>
                    </div>
                    <div class="form-group">
                        <label for="Shift">Shift</label>
                        <div class="abu">{{ $Shift->nama_shift }}</div>
                    </div>
            </div>
        </div>
        <div class="row col-3 align-items-center  ">
            <div class="card col-12 py-4 px-3">
                <card class="tools">
                    <div class="form-group">
                        <label for="OS">OS</label>
                        <div class="abu">{{ $lihat->os }}</div>
                    </div>
                    <div class="form-group">
                        <label for="browser">Browser</label>
                        <div class="abu">{{ $lihat->browser}}</div>
                    </div>
                    <div class="form-group">
                        <label for="absen">Status absensi</label>
                        <div class="abu">{{ $lihat->status_absensi}}</div>
                        {{-- <select id="absen" name="absen" class="opsion">
                            {{-- <option value="apple">Pilih status absensi</option>
                            <option value="banana">Scan QR Code</option>
                            <option value="banana">Button (Klik Tombol)</option> --}}
                        {{-- </select> --}}
                    </div>
                    <div class="form-group">
                        <label for="status">Status akun</label>
                        <div class="abu">{{  $lihat->status_akun}}</div>
                    </div>
                    <div class="form-group">
                        <label for="konfirmasi">konfirmasi email</label>
                        <div class="abu">{{ $lihat->konfirmasi_email}}</div>
                    </div>
                </card>
            </div>
        </div>
        <div class="row col-3 align-items-center  ">
            <div class="card col-12 py-4 px-3">
                <card class="tools">
                    <div class="form-group">
                        <label for="jamker">Minimal kerja (Jumlah kerja)</label>
                        <div class="abu">{{$Shift->jml_jam_kerja}}</div>
                    </div>
                    <div class="form-group">
                        <label for="browser">Jam Default masuk</label>
                        <div class="abu">{{$Shift->jam_masuk}}</div>
                    </div>
                    <div class="form-group">
                        <label for="status">Jam Default pulang</label>
                        <div class="abu">{{$Shift->jam_pulang}}</div>
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
                        <div class="abu">{{ $presensi->hutang_presensi }}</div>
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
        <button class="button-bawah m-auto py-1" onclick="sukses()">Simpan</button>
    </div>
</div>
<script>
    function sukses(){
        swal({
        title: "Berhasil",
        text: "Profil mahasiswa berhasil diperbarui",
        icon: "success",
        buttons: false,
    });

    // Menghilangkan pesan swal setelah 2 detik
    setTimeout(function() {
        swal.close();
    }, 2000);
    }
</script>
@endsection
