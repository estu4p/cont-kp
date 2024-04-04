<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="/assets/css/gantiJam.css" rel="stylesheet">
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
                        <p class="name fz9 m-0"><b>Yu Zhong</b></p>
                        <p class="nip fz9 m-0">NIP: MJ/UIUX/POLINES/AGST2023/06</p>
                    </div>
                </div>
            </div>
            <div class="logout">
                <button onclick="showSweet()" style="background-color: transparent; border: none;"><i
                        class="fa-solid text-white fa-arrow-right-from-bracket"></i>
            </div>
        </div>
    </div>
    <div class="wadah">
        <div style="display: flex; align-items: center; justify-content: space-between;  ">
            <a href="/pemagang/home" style="color: black;">
                <i class="fa-solid fa-chevron-left" style="font-size: 30px;"></i>
            </a>
            <div class="tittle-container">
                <h1 style="padding: 20px; text-align: center; font-size: 20px; margin: 0 auto;" class="datahari">Data
                    Hari Mengganti Jam</h1>
            </div>
            <div class=""></div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped tabel1">
                <thead>
                    <tr class="tangah">
                        <th scope="col">No</th>
                        <th scope="col">Hari</th>
                        <th scope="col">Keterangan Izin</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table align-middle">
                        <th class="tangah" class="tangah">1</th>
                        <td class="tes">Selasa 31-10-2023</td>
                        <td class="fixed-width">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde consectetur eaque quo eius expedita, labore accusamus voluptatibus iste, non, dolor optio qui pariatur voluptates natus earum debitis dolorum alias totam.</td>
                        <td style="color :red;" class="tangah">Ganti jam</td>
                        <td class="tangah"><button type="button" class="btn btn-info" style="color: #ffffff;">Lihat Bukti</button></td>
                    </tr>
                    <tr>
                        <th scope="row" class="tangah">2</th>
                        <td>Senin 30-10-2023</td>
                        <td class="fixed-width">Push Rank sampai Mythical Immortal</td>
                        <td style="color :red;" class="tangah">Ganti jam</td>
                        <td class="tangah"><button type="button" class="btn btn-info" style="color: #ffffff;">Lihat Bukti</button></td>
                    </tr>
                    <tr>
                        <th scope="row" class="tangah">3</th>
                        <td>Senin 5-10-2023</td>
                        <td class="fixed-width">Nolongin nenek nenek nyebrang biar mak bangga</td>
                        <td style="color :red;" class="tangah">Ganti jam</td>
                        <td class="tangah"><button type="button" class="btn btn-info" style="color: #ffffff;">Lihat Bukti</button></td>
                    </tr>
                    <tr>
                        <th scope="row" class="tangah">4</th>
                        <td>Senin 17-10-2023</td>
                        <td class="fixed-width">Begadang</td>
                        <td style="color :red;" class="tangah">Ganti jam</td>
                        <td class="tangah"><button type="button" class="btn btn-info" style="color: #ffffff;">Lihat Bukti</button></td>
                    </tr>
                    <tr>
                        <th scope="row" class="tangah">4</th>
                        <td>Senin 30-10-2023</td>
                        <td class="fixed-width">Gak Dibangunin Temen Kos</td>
                        <td style="color :red;" class="tangah">Ganti jam</td>
                        <td class="tangah"><button type="button" class="btn btn-info" style="color: #ffffff;">Lihat Bukti</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>



    <script>
        
    </script>
</body>

</html>
