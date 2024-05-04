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
                    Lihat team “{{ $users->nama_lengkap }}”
                </h1>
                <h2>
                    {{ $users->jurusan }} ({{ $users->nomor_induk }})
                </h2>

            </div>
        </div>
        <form action="{{ route('mitra.editProfile', $users->id) }}" method="POST">
            @csrf
            <div class="row gap-5 p-5">
                <div class="data_diri col-3" style="box-sizing: border-box;">
                    <br>
                    <label>Nama Lengkap</label>
                    <input type="text" value="S{{ $users->nama_lengkap }}" class="input">
                    <label>Nomor Induk Mahasiswa</label>
                    <input type="text" value="{{ $users->nomor_induk }}" class="input">
                    <label>Program Studi/Jurusan</label>
                    <input type="text" value="{{ $users->jurusan }}" class="input">
                    <label>Nomor HP</label>
                    <input type="text" value="{{ $users->no_hp }}" class="input">
                </div>

                <div class="prosesmagang col-3 ">
                    <br>

                    <label>Tanggal Masuk</label>
                    <input type="date" class="input2" name="tgl_masuk" value="{{ $users->tgl_masuk }}">

                    <div>
                        <label>Tanggal keluar</label>
                        <input type="date" class="input2" name="tgl_keluar" value="{{ $users->tgl_keluar }}">
                    </div>

                    <div>
                        <label>Divisi</label>
                        <br>
                        <select class="form-select tombolpilihan " aria-label="Default select example" name="divisi_id">
                            <option selected value="{{ $users->divisi_id }}">Pilih Divisi</option>
                            @foreach ($divisi as $item)
                                <option value="{{ $item->divisi->id }}">{{ $item->divisi->nama_divisi }}</option>
                            @endforeach
                        </select>
                    </div>

                    <br>
                    <br>

                    <div>
                        <label>project</label>
                        <input class="form-control input2" type="text" value="{{ $users->project }}"
                            aria-label="default input example" name="project">
                    </div>


                    <label>shift</label>
                    <br>
                    <select class="form-select tombolpilihan" name="shift_id" aria-label="Default select example">
                        <option selected value="{{ $users->shift_id }}">Pilih Shift</option>
                        @foreach ($shift as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_shift }}</option>
                        @endforeach
                    </select>


                </div>
                <div class="akun col-3">
                    <br>

                    <div>
                        <label>OS</label>
                        <br>
                        <select class="form-select tombolpilihan" name="os" aria-label="Default select example"
                            data-bs-toggle="dropdown">
                            <option selected value="{{ $users->os }}">Pilih OS </option>
                            <option value="Windows">Windows</option>
                            <option value="Mac OS">Mac OS</option>
                            <option value="linux">linux</option>

                        </select>
                        <br>
                        <br>
                    </div>

                    <div>
                        <label>Browser</label>
                        <br>
                        <select class="form-select tombolpilihan" name="browser" aria-label="Default select example">
                            <option selected value="{{ $users->browser }}">Pilih Browser</option>
                            <option value="Chrome">Chrome</option>
                            <option value="Edge">Edge</option>
                        </select>
                    </div>

                    <br>
                    <br>

                    <div>
                        <label for="">Status Absensi</label>
                        <select class="form-select tombolpilihan" name="status_absensi" aria-label="Default select example">
                            <option selected value="{{ $users->status_absensi }}">Pilih Status Absensi</option>
                            <option value="Scan QR Code">Scan QR Code</option>
                            <option value="Button">Button (Klik Tombol)</option>
                        </select>
                    </div>

                    <br>
                    <br>

                    <div>
                        <label>Status Akun</label>
                        <select class="form-select tombolpilihan" aria-label="Default select example" name="status_akun">
                            <option selected value="{{ $users->status_akun }}">Pilih Status Akun</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Belum Aktif">Belum Aktif</option>
                            <option value="Done">Done</option>
                        </select>
                    </div>

                    <br>
                    <br>

                    <div>
                        <label>Konfirmasi Email</label>
                        <br>
                        <select class="form-select tombolpilihan" aria-label="Default select example"
                            name="konfirmasi_email">
                            <option selected value="{{ $users->konfirmasi_email }}">Pilih Konfirmasi Email</option>
                            <option value="Belum">Belum</option>
                            <option value="Sudah">Sudah</option>
                        </select>
                    </div>

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
                <button id="btnSimpan" class="buttonsimpan btn-primary" type="submit">Simpan</button>
            </div>
        </form>


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
        document.getElementById('btnSimpan').addEventListener('click', function() {
            $('#successModal').modal('show');
            setTimeout(function() {
                $('#successModal').modal('hide');
            }, 1000);
        });
    </script>
@endsection
