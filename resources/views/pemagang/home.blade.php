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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="header d-flex flex-column py-3">
        <div class="atas">
            <div class="kalender">
                <i class="fa-solid fa-calendar-days"></i>
                <span>{{ now()->isoFormat('dddd, D MMMM YYYY') }}</span>
            </div>
            <div id="jam" class="jam">{{ now()->format('H:i:s') }}</div>
        </div>
        <div class="tengah">
            <h3>"Change your life now for better future"</h3>
        </div>
        <div class="bawah mx-auto">
            <div class="judul d-flex flex-row justify-content-start">
                <div class="  tengah-judul d-flex flex-row align-items-center gap-3 ">
                    <div class="profil d-flex justify-content-center align-items-center "><i class="fa-solid fa-user"
                            style="color: #ffffff; font-size:20px;"></i></div>
                    <div class="kekanan  d-flex  flex-column gap-0 justify-content-start">
                        <p class="name fz9 m-0"><b>JAMES CLEAR</b></p>
                        <p class="nip fz9 m-0">NIP: MJ/UIUX/POLINES/AGST2023/06</p>
                    </div>
                </div>
            </div>
            <div class="logout">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
            </div>
        </div>
    </div>
    <div class="wadah">
        <div class="qr">
            <button class="btnqr">Lihat QR Code Saya</button>
        </div>
        <div class="konten">
            <div class="shif">
                <div class="judulshif toggle-shift">Shift Middle</div>
                <div style="padding-bottom: 10px">
                    <button class="masuk" id="masuk" type="button" onclick="showmodal()" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">masuk</button>
                </div>
                <div>
                    <button class="btn btn-istirahat">Izin</button>
                </div>
            </div>
            <div class="kanan">
                <div class="kananatas  justify-content-between">
                    <div class="cardatas d-flex flex-row ">
                        <div style="padding:10px 5px;"><i class="fa-solid fa-circle bundar-status1 ori-aktif"></i></div>
                        <div class="judulmasuk d-flex flex-column ">
                            <form action="{{ route('jamMasuk') }}" method="POST">
                                @csrf
                                <p>Masuk</p>
                                <div class="toggle-muncul hilang flex-column gap-0">
                                    <div>{{ now()->format('H:i:s') }}</div>
                                    <p class="text-danger m-0" style="font-size:50%;">-00.30.01</p>
                                </div>
                            </form>
                            <div class="jammasuk my-0 toggle-hilang">---</div>
                        </div>
                    </div>

                    <div class="cardatas d-flex flex-row ">
                        <div style="padding:10px 5px;"><i class="fa-solid fa-circle bundar-status2 ori-aktif"></i></div>
                        <div class="judulmasuk d-flex flex-column ">
                            <form action="{{ route('jamMulaiIstirahat') }}" method="POST">
                                @csrf
                                <p>Istirahat</p>
                                <div class="toggle-muncul hilang flex-column gap-0">
                                    <div>{{ now()->format('H:i:s') }}</div>
                                    <p class="text-danger m-0" style="font-size:50%;">-00.30.01</p>
                                </div>
                            </form>
                            <div class="jammasuk2 my-0">---</div>
                        </div>
                    </div>

                    <div class="cardatas d-flex flex-row ">
                        <div style="padding:10px 5px;"><i class="fa-solid fa-circle bundar-status3 ori-aktif "></i>
                        </div>
                        <div class="judulmasuk d-flex flex-column ">
                            <form action="{{ route('jamSelesaiIstirahat') }}" method="POST">
                                @csrf
                                <p>Kembali</p>
                                <div class="toggle-muncul hilang flex-column gap-0">
                                    <div>{{ now()->format('H:i:s') }}</div>
                                    <p class="text-danger m-0" style="font-size:50%;">-00.30.01</p>
                                </div>
                            </form>
                            <div class="jammasuk3 my-0">---</div>
                        </div>
                    </div>

                    <div class="cardatas d-flex flex-row ">
                        <div style="padding:10px 5px;"><i class="fa-solid fa-circle  bundar-status4 ori-aktif"></i>
                        </div>
                        <div class="judulmasuk d-flex flex-column ">
                            <form action="{{ route('jamPulang') }}" method="POST">
                                @csrf
                                <p>Pulang</p>
                                <div class="toggle-muncul hilang flex-column gap-0">
                                    <div>{{ now()->format('H:i:s') }}</div>
                                    <p class="text-danger m-0" style="font-size:50%;">-00.30.01</p>
                                </div>
                            </form>
                            <div class="jammasuk4 my-0">---</div>
                        </div>
                    </div>
                </div>

                <div class="kananbawah">
                    <div class="kebaikan border border-secondary mx-3">
                        <div class="sudah">Sudahkah Anda berbuat kebaikan hari ini? </div>
                        <textarea id="pesan" name="pesan" rows="6" cols="65"
                            placeholder="Tambahkan kebaikan apa hari ini yang telah anda lakukan" style="background-color: #E9ECEF;"></textarea>
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
                            <div class="kurangjam  bordermerah d-flex flex-column justify-content-center">
                                <div class="milik">Anda memiliki kekurangan jam kerja</div>
                                <div class="angkakurang m-auto">-14:01:53</div>
                                <div class="lihat">
                                    <a href="#">Lihat Detail </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="{{ url('/jamMasuk') }}" method="POST">
                        @csrf
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <input type="text" name="id" value="1">
                        <input type="text" name="jam_masuk" id="jamm">
                        <input type="text" name="hari" value="{{ date('Y-m-d') }}">
                        <input type="text" name="keterangan_status" value="null">
                        <input type="text" name="status_absensi" value="Button">
                        <input type="text" name="kebaikan" value="tidak ada">
                        <input type="text" name="status_kehadiran" value="Hadir">
                        <button type="submit" class="btn btn-primary" aria-label="Close">submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        // function showKeternganModal() {
        //     swal({
        //         title: "Keterangan",
        //         content: "input",
        //         button:"ok"
        //     });
        //     }
        function showmodal() {
            $('#exampleModal').modal('show');
        }

        function shift() {
            const masukButton = document.querySelector("#masuk");
            if (masukButton.innerHTML === "masuk") {
                document.querySelector(".toggle-muncul").classList.add('muncul');
                document.querySelector(".jammasuk").classList.add("hilang");
                document.querySelector(".bundar-status1").classList.add("merah-aktif");
                document.querySelector(".bundar-status1").classList.remove("ori-aktif");
                document.querySelector(".kurangjam").classList.add("borderijo");
                document.querySelector(".kurangjam").classList.remove("bordermerah");
                masukButton.innerHTML = "istirahat";
                masukButton.classList.remove("masuk");
                masukButton.classList.add("istirahat");
            } else if (masukButton.innerHTML === "istirahat") {
                document.querySelector(".toggle-muncul2").classList.add('muncul');
                document.querySelector(".jammasuk2").classList.add("hilang");
                document.querySelector(".bundar-status2").classList.add("merah-aktif");
                document.querySelector(".bundar-status2").classList.remove("ori-aktif");
                masukButton.innerHTML = "kembali";
                masukButton.classList.remove("istirahat");
                masukButton.classList.add("kembali");
            } else if (masukButton.innerHTML === "kembali") {
                document.querySelector(".toggle-muncul3").classList.add('muncul');
                document.querySelector(".jammasuk3").classList.add("hilang");
                document.querySelector(".bundar-status3").classList.add("merah-aktif");
                document.querySelector(".bundar-status3").classList.remove("ori-aktif");
                masukButton.innerHTML = "pulang";
                masukButton.classList.remove("kembali");
                masukButton.classList.add("pulang");
            } else if (masukButton.innerHTML === "pulang") {
                document.querySelector(".toggle-muncul4").classList.add('muncul');
                document.querySelector(".jammasuk4").classList.add("hilang");
                document.querySelector(".bundar-status4").classList.add("merah-aktif");
                document.querySelector(".bundar-status4").classList.remove("ori-aktif");
                masukButton.innerHTML = "log activity";
                masukButton.classList.remove("kembali");
                masukButton.classList.add("log");
            }
        }

        function updateClock() {
            var now = new Date();
            var jam = now.getHours();
            var menit = now.getMinutes();
            var detik = now.getSeconds();

            // Tambahkan nol di depan angka jika hanya satu digit
            jam = padZero(jam);
            menit = padZero(menit);
            detik = padZero(detik);

            document.getElementById('jam').innerHTML = jam + ":" + menit + ":" + detik;
            document.getElementById('jamm').value = jam + ":" + menit + ":" + detik;

            // Perbarui jam setiap detik
            setTimeout(updateClock, 1000);
        }

        function padZero(i) {
            return (i < 10) ? "0" + i : i;
        }

        // Panggil fungsi updateClock untuk pertama kali
        updateClock();
    </script>
</body>

</html>
