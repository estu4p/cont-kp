<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="/assets/css/UserHome.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2632061c04.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .masuk:disabled {
            opacity: 0.5;
        }
    </style>
</head>

<body>
    <div class="header d-flex flex-column py-3">
        <div class="atas">
            <div class="kalender">
                <i class="fa-solid fa-calendar-days"></i>
                <span class="kalender" id="kalender">Rabu, 23 Agustus 2023</span>
            </div>
            <div class="jam" id="jam"></div>
        </div>
        <div class="tengah">
            <h3>"Change your life now for better future"</h3>
        </div>
        <div class="bawah mx-auto">
            <div class="judul d-flex flex-row justify-content-start">
                <div class="  tengah-judul d-flex flex-row align-items-center gap-3 ">
                    <div class="profil d-flex justify-content-center align-items-center ">
                        <i class="fa-solid fa-user" style="color: #ffffff; font-size:20px;"></i>
                    </div>
                    <div class="kekanan  d-flex  flex-column gap-0 justify-content-start">
                        <p class="name fz9 m-0"><b>JAMES CLEAR</b></p>
                        <p class="nip fz9 m-0">NIP: MJ/UIUX/POLINES/AGST2023/06</p>
                    </div>
                </div>
            </div>
            <div class="logout">
                <a href="/user/login">
                    <i class="fa-solid fa-arrow-right-from-bracket" style="color: white;"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="wadah">
        <div class="qr">
            <button class="btnqr"><a href="/pemagang/MyQR" style="text-decoration: none;  color: #A4161A;">Lihat QR
                    Code Saya</a></button>
        </div>
        <div class="konten">
            <div class="shif">
                <div class="judulshif toggle-shift">Shift Middle</div>
                <div style="padding-bottom: 10px">
                    <button class="masuk" id="masuk" type="button" onclick="showmodal()" data-bs-toggle="modal"
                        data-bs-target="{{ $button == 'Log Activity' ? '#logactivity' : '#exampleModal' }}"
                        {{ $button == 'Log Activity' && isset($logActivitySubmitted) ? 'disabled' : '' }}>{{ $button }}</button>
                </div>
                <div>
                    <button type="button" class="btn izin" data-bs-toggle="modal" data-bs-target="#izin"
                        onclick="showmodalizin()" {{ $button == 'Log Activity' ? 'hidden' : '' }}>
                        Izin
                    </button>
                </div>
            </div>
            <div class="kanan" >
                <div class="kananatas  justify-content-between">
                    <div class="cardatas d-flex flex-row ">
                        <div style="padding:10px 5px;"><i class="fa-solid fa-circle bundar-status1 ori-aktif"></i></div>
                        <div class="judulmasuk d-flex flex-column ">
                            <p>Masuk</p>
                            <div class="toggle-muncul flex-column gap-0">
                                @if (isset($data))
                                    <div>{{ $data->jam_masuk }}</div>
                                    @php
                                        $waktu_default = $data->jam_masuk_default;
                                        $waktu_masuk = $data->jam_masuk;
                                        $selisih = strtotime($waktu_default) - strtotime($waktu_masuk);
                                        $selisih_waktu = gmdate('H:i:s', abs($selisih));
                                        if ($selisih < 0) {
                                            $selisih_waktu = '-' . $selisih_waktu;
                                        }
                                    @endphp
                                    <p class="text-danger m-0" style="font-size:50%;"> {{ $selisih_waktu }}</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="cardatas d-flex flex-row ">
                        <div style="padding:10px 5px;"><i class="fa-solid fa-circle bundar-status2 ori-aktif"></i></div>
                        <div class="judulmasuk d-flex flex-column ">
                            <p>Istirahat</p>
                            <div class="toggle-muncul flex-column gap-0">
                                @if (isset($data))
                                    <div>{{ $data->jam_mulai_istirahat }}</div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="cardatas d-flex flex-row ">
                        <div style="padding:10px 5px;"><i class="fa-solid fa-circle bundar-status3 ori-aktif "></i>
                        </div>
                        <div class="judulmasuk d-flex flex-column ">
                            <p>Kembali</p>
                            <div class="toggle-muncul flex-column gap-0">
                                @if (isset($data))
                                    <div>{{ $data->jam_selesai_istirahat }}</div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="cardatas d-flex flex-row ">
                        <div style="padding:10px 5px;"><i class="fa-solid fa-circle  bundar-status4 ori-aktif"></i>
                        </div>
                        <div class="judulmasuk d-flex flex-column ">
                            <p>Pulang</p>
                            <div class="toggle-muncul flex-column gap-0">
                                @if (isset($data))
                                    <div>{{ $data->jam_pulang }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="kananbawah">

                    <div class="kebaikan border border-secondary mx-3">
                        <form action="{{ route('kebaikan') }}" method="POST">
                            @csrf
                            <div class="sudah">Sudahkah Anda berbuat kebaikan hari ini? </div>
                            <textarea id="pesan" name="kebaikan" rows="6"
                                placeholder="Tambahkan kebaikan apa hari ini yang telah anda lakukan"
                                style="background-color: #E9ECEF; width: 95%;"></textarea>
                            <div class="grubbuton">
                                <button class="batal">Batal</button>
                                <button class="tambahkan" type="submit">Tambahkan</button>
                            </div>
                        </form>

                    <div class="kebaikan border border-secondary ">
                        <div class="sudah">Sudahkah Anda berbuat kebaikan hari ini? </div>
                        <textarea id="pesan" class="textarea" name="pesan" rows="6" placeholder="Tambahkan kebaikan apa hari ini yang telah anda lakukan" style="background-color: #E9ECEF; width: 95%;"></textarea>
                        <div class="grubbuton">
                            <button class="batal">Batal</button>
                            <button class="tambahkan">Tambahkan</button>
                        </div>

                    </div>
                    <div class="perhatian">
                        <div>
                            <div class="judulperhatian">Attention !</div>
                        </div>
                        <div class="kontenperhatian">

                            <div class="keterangan border border-danger">Kemarin anda absen pulang di kost jangan
                                diulang!</div>

                            <div class="keterangan border border-danger m">Kemarin anda absen pulang di kost jangan diulang!</div>
                            <div class="kurangjam  bordermerah d-flex flex-column justify-content-center">
                                <div class="milik">Anda memiliki kekurangan jam kerja</div>
                                <div class="angkakurang m-auto">-14:01:53</div>
                                <div class="lihat">
                                    <a href="/pemagang/detail/{nama_lengkap}">Lihat Detail </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" id="izin" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="  d-flex justify-content-between align-items-center p-3">
                    <div></div>
                    <h5 class="modal-title">Izin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <hr style="width:100%;">
                <form action="{{ route('catatIzin', ['nama_lengkap' => 1]) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="grupinput">
                            <p class="judulinput">Alasan izin</p>
                            <textarea id="pesan" name="keterangan_status" rows="6" cols="60" placeholder="Ketik alasan"></textarea>
                        </div>
                        <div class="grupinput">
                            <label for="PemecahanMasalah" class="judulinput" style="padding-top: 30px;">Bukti
                                foto</label>
                            <div>
                                <input class="input inputt" type="text" id="PemecahanMasalah"
                                    name="bukti_foto_izin" placeholder="Masukan link Gdrive">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger" onclick="izin()" aria-label="Close"
                            data-bs-dismiss="modal">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content " style="text-align: center;">
                <form action="{{ $route ?? null }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <h1 class="modal-title fs-5 judulmodal" id="exampleModalLabel">Keterangan</h1>
                        <textarea id="pesan" name="keterangan" rows="6" cols="60"
                            placeholder="Tuliskan keterengan (opsional)" style="background-color: #E9ECEF" ;></textarea>
                        <div class="bawahmodal">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                            <input type="hidden" name="id" value="1">
                            <input type="text" name="jam" id="jam"
                                value="{{ now()->format('H:i:s') }}">
                            <input type="hidden" name="hari" value="{{ date('Y-m-d') }}">
                            <input type="hidden" name="status_kehadiran" value="Hadir">
                            <input type="hidden" name="status_ganti_jam" value="Tidak Ganti Jam">
                            <button type="submit" class="btn btn-danger submitmodal" data-bs-dismiss="modal"
                                aria-label="Close">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" id="logactivity" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="  d-flex justify-content-between align-items-center p-3">
                    <div></div>
                    <h5 class="modal-title">Activity Log</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <hr style="width:100%;">
                <form action="{{ route('catatLogAktivity') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="grupinput">
                            <textarea id="pesan" name="log_aktivitas" rows="6" cols="60" placeholder="Ketik alasan"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger" aria-label="Close"
                                data-bs-dismiss="modal">Submit</button>
                        </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function showmodal() {
            $('#exampleModal').modal('show');
        }

        function showmodalizin() {
            $('#izin').modal('show');
        }

        function showmodalLogActivity() {
            $('#logactivity').modal('show');
        }
        
        </script>
    </body>
</html>
