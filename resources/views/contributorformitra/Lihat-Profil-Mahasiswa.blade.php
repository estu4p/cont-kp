@extends('layouts.masterMitra')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/contributorformitra/lihatprofile.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
 <div class="ruangan">
    <div class="topconten">
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
    <div class="row gap-5   p-5">
        <div class="data_diri col-3" style="box-sizing: border-box;">
            <br>
            <label>Nama Lengkap</label>
            <input type="text" value="Syalita Widyandini" class="input">
            <label>Nomor Induk Mahasiswa</label>
            <input type="text" value="33421323" class="input">
            <label>Program Studi/Jurusan</label>
            <input type="text" value="D3-Teknik Informatika" class="input">
            <label>Nomor HP</label>
            <input type="text" value="081234567890" class="input">
        </div>
        <div class="prosesmagang col-3 ">
            <br>
            <label>Tanggal Masuk</label>
            <input type="date" class="input2">
            <label>Tanggal keluar</label>
            <input type="date" class="input2">
            <label>Divisi</label>
            <br><button class="dropdown-toggle tombolpilihan" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Pilih Divisi
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item">UI/UX Desaigner</a></li>
                <li><a class="dropdown-item">Another action</a></li>
                <li><a class="dropdown-item">Something else here</a></li>
            </ul>
            <br>
            <br>
            <label>project</label>
            <input type="text" value="Titipsini.com" class="input2">
            <label>shift</label>
            <br>
            <button class="dropdown-toggle tombolpilihan" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Pilih Shift
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item">Shift Pagi</a></li>
                <li><a class="dropdown-item">Shift Middile</a></li>
                <li><a class="dropdown-item">Shift Siang</a></li>
            </ul>


        </div>
        <div class="akun col-3">
            <br>
            <label>OS</label>
            <br><button class="dropdown-toggle tombolpilihan" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Pilih OS
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item">Windows</a></li>
                <li><a class="dropdown-item">Macitos</a></li>
            </ul>
            <br>
            <br>
            <label>Browser</label>
            <br><button class="dropdown-toggle tombolpilihan" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Pilih Browser
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item">Chrome</a></li>
                <li><a class="dropdown-item">Edge</a></li>
            </ul>
            <br>
            <br>
            <label>Status Absensi</label>
            <br><button class="dropdown-toggle tombolpilihan" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Pilih Status Presensi
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item">Scan QR Code</a></li>
                <li><a class="dropdown-item">Button (Klik tombol) </a></li>
            </ul>
            <br>
            <br>
            <label>Status Akun</label>
            <br><button class="dropdown-toggle tombolpilihan" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Pilih Status Akun
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item">Aktif</a></li>
                <li><a class="dropdown-item">Belum Aktif </a></li>
            </ul>
            <br>
            <br>
            <label>Konfirmasi Email</label>
            <br><button class="dropdown-toggle tombolpilihan" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Pilih Konfirmasi Email
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item">Sudah</a></li>
                <li><a class="dropdown-item">Belum </a></li>
            </ul>
        </div>
            <div class="jamkerja col-3">
                <br>
                <label>Minimal kerja (jumlah kerja)</label>
                <input type="text" value="06:45:00" class="input2">
                <label>Jam Default masuk</label>
                <input type="text" value="06:30:00" class="input2">
                <label>jam default pulang</label>
                <input type="text" value="21:00:00" class="input2">
            </div>
    </div>
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
<br>
<br>
    <div class="container">
        <button id="btnSimpan" class="buttonsimpan btn-primary">Simpan</button>
    </div>
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

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



<script>
    document.getElementById('btnSimpan').addEventListener('click', function () {
        $('#successModal').modal('show');
        setTimeout(function () {
            $('#successModal').modal('hide');
        }, 1000);
    });
</script>

@endsection
