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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2632061c04.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="header d-flex flex-column py-3">
        <div class="atas">
            <div class="kalender">
                <i class="fa-solid fa-calendar-days"></i>
                <span>Rabu, 23 Agustus 2023</span>
            </div>
            <div class="jam">09:30:01</div>
        </div>
        <div class="tengah">
            <h3>"Change your life now for better future"</h3>
        </div>
        <div class="bawah mx-auto">
            <div class="judul d-flex flex-row justify-content-start">
                <div class="  tengah-judul d-flex flex-row align-items-center gap-3 ">
                    <div class="profil d-flex justify-content-center align-items-center "><i class="fa-solid fa-user" style="color: #ffffff; font-size:20px;"></i></div>
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
                <div class="judulshif">Shift Middle</div>
                <div style="padding-bottom: 10px">
                    <button class="masuk">Masuk</button>
                </div>
                <div>
                    <button class="istirahat">Istirahat</button>
                </div>
            </div>
            <div class="kanan">
                <div class="kananatas  justify-content-between">
                    <div class="cardatas d-flex flex-row ">
                        <div style="padding:10px 5px;"><i class="fa-solid fa-circle " style="color: #b8b8b8;"></i></div>
                        <div class="judulmasuk d-flex flex-column "><p>Masuk</p>
                        <div class="jammasuk my-0">---</div></div>
                        
                    </div>
                    <div class="cardatas d-flex flex-row ">
                        <div style="padding:10px 5px;"><i class="fa-solid fa-circle " style="color: #b8b8b8;"></i></div>
                        <div class="judulmasuk d-flex flex-column "><p>Istirahat</p>
                        <div class="jammasuk my-0">---</div></div>
                        
                    </div>
                    <div class="cardatas d-flex flex-row ">
                        <div style="padding:10px 5px;"><i class="fa-solid fa-circle " style="color: #b8b8b8;"></i></div>
                        <div class="judulmasuk d-flex flex-column "><p>Kembali</p>
                        <div class="jammasuk my-0">---</div></div>
                        
                    </div>
                    <div class="cardatas d-flex flex-row ">
                        <div style="padding:10px 5px;"><i class="fa-solid fa-circle " style="color: #b8b8b8;"></i></div>
                        <div class="judulmasuk d-flex flex-column "><p>Pulang</p>
                        <div class="jammasuk my-0">---</div></div>
                        
                    </div>
                </div>
                <div class="kananbawah">
                    <div class="kebaikan border border-secondary mx-3">
                        <div class="sudah">Sudahkah Anda berbuat kebaikan hari ini? </div>
                        <textarea id="pesan" name="pesan" rows="6" cols="65" placeholder="Tambahkan kebaikan apa hari ini yang telah anda lakukan" style="background-color: #E9ECEF;"></textarea>
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
                            <div class="kurangjam  border border-danger d-flex flex-column justify-content-center">
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
</body>

</html>