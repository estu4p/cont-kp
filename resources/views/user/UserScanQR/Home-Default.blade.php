<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="/assets/css/UserScanQR.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2632061c04.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
.btn-red {
    background-color: red !important;
    color: white !important;
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
                    <div class="profil d-flex justify-content-center align-items-center "><i class="fa-solid fa-user" style="color: #ffffff; font-size:20px;"></i></div>
                    <div class="kekanan  d-flex  flex-column gap-0 justify-content-start">
                        <p class="name fz9 m-0"><b>PIQRI</b></p>
                        <p class="nip fz9 m-0">NIP: MJ/UIUX/POLINES/AGST2023/06</p>
                    </div>
                </div>
            </div>
            <div class="logout">
                <button  onclick="showSweet()" style="background-color: transparent; border: none;"><i class="fa-solid text-white fa-arrow-right-from-bracket"></i>
            </div>
        </div>
    </div>
    <div class="wadah">
        <div class="qr">
             <a href="/Scanqr" class="btnqr">Lihat Barcode Saya</a>
        </div>
        <div class="konten">
            <div class="shif">
                <div class="judulshif toggle-shift">Shift Middle</div>
                <div style="padding-bottom: 10px">
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
                            <p>Istirahat</p>
                            <div class=" flex-column gap-0">
                                <div class="jammasuk2 my-0 ">---</div>
                                <!-- <p class="text-danger hilang toggle-muncul2 m-0" style="font-size:60%;">-00.30.01</p> -->
                            </div>
                        </div>

                    </div>
                    <div class="cardatas d-flex flex-row ">
                        <div style="padding:10px 5px;"><i class="fa-solid fa-circle bundar-status3 ori-aktif "></i></div>
                        <div class="judulmasuk d-flex flex-column ">
                            <p>Kembali</p>
                            <div class=" flex-column gap-0">
                                <div class="jammasuk3 my-0 ">---</div>
                                <!-- <p class="text-danger hilang toggle-muncul3 m-0" style="font-size:60%;">-00.30.01</p> -->
                            </div>
                        </div>

                    </div>
                    <div class="cardatas d-flex flex-row ">
                        <div style="padding:10px 5px;"><i class="fa-solid fa-circle  bundar-status4 ori-aktif"></i></div>
                        <div class="judulmasuk d-flex flex-column ">
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
                        <textarea id="pesan" name="pesan" rows="6" placeholder="Tambahkan kebaikan apa hari ini yang telah anda lakukan" style="background-color: #E9ECEF;"></textarea>
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
                            <div class="keterangan border border-danger">Kemarin anda absen pulang di kost jangan diulang!</div>
                            <div class="kurangjam  bordermerah d-flex flex-column justify-content-center">
                                <div class="milik">Anda memiliki kekurangan jam kerja</div>
                                <div class="angkakurang m-auto">-14:01:53</div>
                                <div class="lihat">
                                    <a href="/TableGantiJam">Lihat Detail </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="izin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content ">
                <div class="modal-body">
                    <div style="text-align: center;">
                        <h1 class="modal-title fs-5 judulmodal" id="exampleModalLabel">Izin</h1>
                    </div>

                    <div class="grupinput">
                        <p class="judulinput">Alasan izin</p>
                        <textarea id="pesan" name="pesan" rows="6" cols="60" placeholder="Ketik alasan"></textarea>
                    </div>
                    <div class="grupinput">
                        <label for="PemecahanMasalah" class="judulinput">Bukti foto</label>
                        <div>
                            <input class="input inputt" type="text" id="PemecahanMasalah" placeholder="Masukan link Gdrive">
                        </div>

                    </div>

                    <div class="bawahmodal">
                        <button type="button" class="btn btn-danger submitmodal" data-bs-dismiss="modal" onclick="izin()" aria-label="Close">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content " style="text-align: center;">
                <div class="modal-body">
                    <h1 class="modal-title fs-5 judulmodal" id="exampleModalLabel">Keterangan</h1>
                    <textarea id="pesan" name="pesan" rows="6" cols="60" placeholder="Tuliskan keterengan (opsional)" style="background-color: #E9ECEF;"></textarea>
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

        function izin() {
            const izinButton = document.querySelector(".btn.izin");
            if (izinButton) {
                izinButton.style.display = "none";

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

        function showSweet() {
            swal({
    title: "Log Out",
    text: "Apa anda yakin ingin keluar?",
    buttons: {
        cancel: {
            text: "Tidak",
            value: false,
            visible: true,
            className: "",
            closeModal: true,
        },
        confirm: {
            text: "Ya",
            value: true,
            visible: true,
            className: "btn-red",
            closeModal: true
        }
    }
}).then((willLogout) => {
    if (willLogout) {
        window.location.href = "/user/login";
    }
});

}
    </script>

</body>


</html>
