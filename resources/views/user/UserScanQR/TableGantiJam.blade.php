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
    <style>
        .btn-red {
            background-color: red !important;
            color: white !important;
        }

        .wadah {
            margin-left: 10px
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
                    <div class="profil d-flex justify-content-center align-items-center "><i class="fa-solid fa-user"
                            style="color: #ffffff; font-size:20px;"></i></div>
                    <div class="kekanan  d-flex  flex-column gap-0 justify-content-start">
                        <p class="name fz9 m-0"><b>PIQRI</b></p>
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

            <a href="/UserScanQRDefault" style=""><i class="fa-solid fa-chevron-left" style="font-size: 30px;"></i></a>
            <div class="tittle-container">
                <h1 style="padding: 20px; text-align: center; font-size: 20px;" class="datahari">
                    Data Hari Mengganti Jam</h1>
            </div>
            <div class=""></div>
            

        </div>
    </div>

    <div class="px-5 ">
        <table class="table border border-black text-center table-striped">
            <thead class="table-borderless">
                <tr class="align-middle table-light">
                    <th scope="col">No</th>
                    <th scope="col">Hari</th>
                    <th scope="col">Keterangan Izin</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody class="table-borderless table-group-divider">
                <tr>
                    <th class="align-middle">1</th>
                    <td class="align-middle">Selasa 31-10-2023</td>
                    <td class="align-middle">Sakit Badan</td>
                    <td class="align-middle" style="color :red;">Ganti jam</td>
                    <td><button type="button" class="btn btn-info" style="color: #ffffff;">Lihat Bukti</button></td>
                </tr>
                <tr>
                    <th class="align-middle">2</th>
                    <td class="align-middle">Senin 30-10-2023</td>
                    <td class="align-middle">Kepentingan Mendadak</td>
                    <td class="align-middle" style="color :red;">Ganti jam</td>
                    <td><button type="button" class="btn btn-info" style="color: #ffffff;">Lihat Bukti</button></td>
                </tr>
                <tr>
                    <th class="align-middle">3</th>
                    <td class="align-middle">Senin 5-10-2023</td>
                    <td class="align-middle">Acara Keluarga</td>
                    <td class="align-middle" style="color :red;">Ganti jam</td>
                    <td class="align-middle"><button type="button" class="btn btn-info" style="color: #ffffff;">Lihat Bukti</button></td>
                </tr>
                <tr>
                    <th class="align-middle">4</th>
                    <td class="align-middle">Senin 17-10-2023</td>
                    <td class="align-middle">Begadang</td>
                    <td class="align-middle" style="color :red;">Ganti jam</td>
                    <td class="align-middle"><button type="button" class="btn btn-info" style="color: #ffffff;">Lihat Bukti</button></td>
                </tr>
                <tr>
                    <th class="align-middle">5</th>
                    <td class="align-middle">Senin 30-10-2023</td>
                    <td class="align-middle">Gak Dibangunin Temen Kos</td>
                    <td class="align-middle" style="color :red;">Ganti jam</td>
                    <td><button type="button" class="btn btn-info" style="color: #ffffff;">Lihat Bukti</button></td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>

    <script>
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
