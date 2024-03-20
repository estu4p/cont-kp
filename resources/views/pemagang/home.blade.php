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
                    <button class="masuk" id="masuk" type="button" onclick="showmodal()" data-bs-toggle="modal" data-bs-target="#exampleModal">Masuk</button>
                </div>
                <div>
                    <button type="button" class="btn izin" data-bs-toggle="modal" data-bs-target="#izin" onclick="showmodalizin()">
                        Izin
                    </button>
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
                            <p>Masuk</p>
                            <div class=" flex-column gap-0">
                                <div class="jammasuk my-0 ">---</div>
                                <p class="text-danger hilang toggle-muncul m-0" style="font-size:75%;">-00.30.01</p>
                            </div>
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
                            <p>Istirahat</p>
                            <div class=" flex-column gap-0">
                                <div class="jammasuk2 my-0 ">---</div>
                                <!-- <p class="text-danger hilang toggle-muncul2 m-0" style="font-size:60%;">-00.30.01</p> -->
                            </div>
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
                            <p>Kembali</p>
                            <div class=" flex-column gap-0">
                                <div class="jammasuk3 my-0 ">---</div>
                                <!-- <p class="text-danger hilang toggle-muncul3 m-0" style="font-size:60%;">-00.30.01</p> -->
                            </div>
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
                            <p>Pulang</p>
                            <div class=" flex-column gap-0">
                                <div class="jammasuk4 my-0 ">---</div>
                                <!-- <p class="text-danger hilang toggle-muncul4 m-0" style="font-size:60%;">-00.30.01</p> -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="kananbawah">
                    <div class="kebaikan border border-secondary mx-3">
                        <div class="sudah">Sudahkah Anda berbuat kebaikan hari ini? </div>
                        <textarea id="pesan" name="pesan" rows="6" cols="65"
                            placeholder="Tambahkan kebaikan apa hari ini yang telah anda lakukan" style="background-color: #E9ECEF;"></textarea>
                        <textarea id="pesan" name="pesan" rows="6" placeholder="Tambahkan kebaikan apa hari ini yang telah anda lakukan" style="background-color: #E9ECEF; width: 95%;"></textarea>
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
    <div class="modal" tabindex="-1" id="izin" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="  d-flex justify-content-between align-items-center p-3" >
                <div></div>
                    <h5 class="modal-title" >Izin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <hr style="width:100%;">
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
                <div class="grupinput">
                        <p class="judulinput">Alasan izin</p>
                        <textarea id="pesan" name="pesan" rows="6" cols="60" placeholder="Ketik alasan"></textarea>
                    </div>
                    <div class="grupinput">
                        <label for="PemecahanMasalah" class="judulinput" style="padding-top: 30px;">Bukti foto</label>
                        <div>
                            <input class="input inputt" type="text" id="PemecahanMasalah" placeholder="Masukan link Gdrive">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" onclick="izin()" aria-label="Close" data-bs-dismiss="modal">Submit</button>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content " style="text-align: center;">
                <div class="modal-body">
                    <h1 class="modal-title fs-5 judulmodal" id="exampleModalLabel">Keterangan</h1>
                    <textarea id="pesan" name="pesan" rows="6" cols="60" placeholder="Tuliskan keterengan (opsional)" style="background-color: #E9ECEF";></textarea>
                    <div class="bawahmodal">
                        <button type="button" class="btn btn-danger submitmodal" data-bs-dismiss="modal" onclick="shift()" aria-label="Close">Submit</button>
                    </div>
                </div>
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

        function shift() {
            var now = new Date();
            var hours = now.getHours().toString().padStart(2, '0');
            var minutes = now.getMinutes().toString().padStart(2, '0');
            var seconds = now.getSeconds().toString().padStart(2, '0');
            var timeString = hours + ":" + minutes + ":" + seconds;


            var middle = new Date();
            middle.setHours(9, 0, 0, 0); // Set jam mulai
            var selisihMillis = middle - now; // Selisih waktu dalam milidetik

            // Menentukan apakah selisih waktunya negatif
            var isNegatif = selisihMillis < 0;
            if (isNegatif) {
                selisihMillis *= -1; // Mengonversi menjadi positif untuk perhitungan selanjutnya
            }

            var selisihJam = Math.floor(selisihMillis / (1000 * 60 * 60)); // Konversi ke jam
            var selisihMenit = Math.floor((selisihMillis % (1000 * 60 * 60)) / (1000 * 60)); // Konversi ke menit
            var selisihDetik = Math.floor((selisihMillis % (1000 * 60)) / 1000); // Konversi ke detik

            var minus = (isNegatif ? "-" : "") +
                selisihJam.toString().padStart(2, '0') + ":" +
                selisihMenit.toString().padStart(2, '0') + ":" +
                selisihDetik.toString().padStart(2, '0');


            const masukButton = document.querySelector("#masuk");
            if (masukButton.innerHTML === "Masuk") {
                document.querySelector('.jammasuk').innerText = timeString;
                document.querySelector(".toggle-muncul").innerText = minus;
                document.querySelector(".toggle-muncul").classList.remove("hilang"); // Menghapus kelas 'hilang' untuk menampilkan elemen
                document.querySelector(".bundar-status1").classList.add("merah-aktif");
                document.querySelector(".bundar-status1").classList.remove("ori-aktif");
                document.querySelector(".kurangjam").classList.add("borderijo");
                document.querySelector(".kurangjam").classList.remove("bordermerah");
                masukButton.innerHTML = "Istirahat";
                masukButton.classList.remove("Masuk");
                masukButton.classList.add("Istirahat");
            } else if (masukButton.innerHTML === "Istirahat") {
                document.querySelector('.jammasuk2').innerText = timeString;
                document.querySelector(".bundar-status2").classList.add("merah-aktif");
                document.querySelector(".bundar-status2").classList.remove("ori-aktif");
                masukButton.innerHTML = "Kembali";
                masukButton.classList.remove("Istirahat");
                masukButton.classList.add("Kembali");
            } else if (masukButton.innerHTML === "Kembali") {
                document.querySelector('.jammasuk3').innerText = timeString;
                document.querySelector(".bundar-status3").classList.add("merah-aktif");
                document.querySelector(".bundar-status3").classList.remove("ori-aktif");
                masukButton.innerHTML = "Pulang";
                masukButton.classList.remove("Kembali");
                masukButton.classList.add("Pulang");
            } else if (masukButton.innerHTML === "Pulang") {
                document.querySelector('.jammasuk4').innerText = timeString;
                document.querySelector(".bundar-status4").classList.add("merah-aktif");
                document.querySelector(".bundar-status4").classList.remove("ori-aktif");
                masukButton.innerHTML = "Log Activity";
                masukButton.classList.remove("Pulang");
                masukButton.classList.remove("btn-istirahat");
                masukButton.classList.add("Log");
                document.querySelector(".izin").classList.add("izin-hilang");
            } else if (masukButton.innerHTML === "Log Activity") {
                masukButton.style.background = "#CBD3D6";
                masukButton.style.color = "#a4a4a4";


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
        function izin() {
            const izinButton = document.querySelector(".btn.izin");
            if (izinButton) {

                izinButton.innerHTML = "Telah Izin";

            }
            ubahTombolMasuk();
        }

        function ubahTombolMasuk() {
            const masukButton = document.querySelector("#masuk");
            if (masukButton) {
                masukButton.innerHTML = "Izin";
                masukButton.style.backgroundColor = "#CBD3D6";
                masukButton.style.color = "#2d2d2d";
            }
        }



        function updateTime() {
            var now = new Date();
            var hours = now.getHours().toString().padStart(2, '0');
            var minutes = now.getMinutes().toString().padStart(2, '0');
            var seconds = now.getSeconds().toString().padStart(2, '0');
            var timeString = hours + ":" + minutes + ":" + seconds;
            document.getElementById('jam').innerText = timeString;

            var days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            var day = days[now.getDay()];
            var date = now.getDate();
            var month = months[now.getMonth()];
            var year = now.getFullYear();
            var dateString = day + ', ' + date + ' ' + month + ' ' + year;
            document.getElementById('kalender').innerText = dateString;
        }

        // Panggil updateTime setiap detik
        setInterval(updateTime, 1000);

        // Panggil updateTime sekali untuk menetapkan waktu awal
        updateTime()
    </script>

</body>

</html>
