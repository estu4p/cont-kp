<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mitra presensi scanbarcode</title>
    <link href="/assets/css/scanbarcode.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2632061c04.js" crossorigin="anonymous"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://kit.fontawesome.com/2632061c04.js" crossorigin="anonymous"></script>
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
    </div>
    <div class="bawah mx-auto">
        <div class="judul d-flex flex-row justify-content-start">
            <div class="  tengah-judul d-flex flex-row align-items-center gap-3 ">

                <div class="kekanan  d-flex  flex-column gap-0 justify-content-start">
                </div>
            </div>
        </div>
    </div>
    </div>
    <br>
    <br>
    <div class=" px-5 col-12 row justify-content-between">
        <div class="kiri col-4 overflow-hidden">
            <div>
                <ul class="nav nav-tabs">
                    <li class="nav-item"><a style="font-size: 80%;" class="nav-link bg-secondary-subtle text-dark"
                            href="/UserScanBarcode"><b>Scan Presensi Harian</b></a></li>
                    <li class="nav-item active"><a style="font-size: 80%;" class="nav-link active"
                            href="/UserPresensi"><b>Scan Ganti Jam</b></a></li>
                </ul>
            </div>
            <div class=" border border-top-0 ">
                <br>
                <p style="text-align: center;">Scan Barcode Anda</p>
                <div>
                    <video style="width: 100%" id="preview"></video>
                </div>
                <form action="{{ route('barcode.jam-pulang') }}" method="POST" id="form">
                    @csrf
                    <input type="hidden" id="nama_lengkap" name="nama_lengkap">
                </form>
                <p style="text-align: center;" class="p1"><i class="ikon bi bi-exclamation-triangle-fill"></i>
                    arahkan Barcode pada kamera</p>
            </div>
        </div>
        <div class=" d-flex py-0 flex-column col-4">
            <h3 class="my-0 text-center" style="text-align: center;">Shift Middle</h3>

            <table class="tabel">
                <tbody>
                    <tr>
                        <td class="keterangan"><i class="bi bi-person-fill"></i> Nama</td>
                        <td class="isi">{{ $presensi->user->nama_lengkap }}</td>
                    </tr>
                    <tr>
                        <td class="keterangan"><i class="bi bi-person-fill"></i> Nim</td>
                        <td class="isi">{{ $presensi->user->nomor_induk }}</td>
                    </tr>
                    <tr>
                        <td class="keterangan"><i class="bi bi-clock"></i> Jam Masuk</td>
                        <td class="isi">{{ $presensi->jam_masuk }}</td>
                    </tr>
                    <tr>
                        <td class="keterangan"><i class="bi bi-clock"></i> Jam Istirahat</td>
                        <td class="isi">{{ $presensi->jam_mulai_istirahat }}</td>
                    </tr>
                    <tr>
                        <td class="keterangan"><i class="bi bi-clock"></i> Jam Kembali</td>
                        <td class="isi">{{ $presensi->jam_selesai_istirahat }}</td>
                    </tr>
                    <tr>
                        <td class="keterangan"><i class="bi bi-clock"></i> Jam Pulang</td>
                        <td class="isi">{{ $presensi->jam_pulang }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="kanan col-3">
            <h3>Aktifitas Terbaru</h3>
            <br>
            <div class="status">
                <i class="ikon bi bi-person-fill"></i> Fairuza istirahat <span>10 menit yang lalu</span>
            </div>
            <div class="status">
                <i class="ikon bi bi-person-fill"></i> Indah mendaftarkan diri <span>11 menit yang lalu</span>
            </div>
            <div class="status">
                <i class="ikon bi bi-person-fill"></i> Febrian log out <span>15 menit yang lalu</span>
            </div>
            <div class="status">
                <i class="ikon bi bi-person-fill"></i> Gio log out <span>15 menit yang lalu</span>
            </div>
            <div class="status">
                <i class="ikon bi bi-person-fill"></i> Nandi log in <span>20 menit yang lalu</span>
            </div>
            <div class="status">
                <i class="ikon bi bi-person-fill"></i> Jesika log out <span> 20 menit yang lalu</span>
            </div>
            <div class="status">
                <i class="ikon bi bi-person-fill"></i> Nanda isterahat <span> 21 menit yang lalu</span>
            </div>
            <div class="status">
                <i class="ikon bi bi-person-fill"></i> Lala mendaftarkan diri<span> 31 menit yang lalu</span>
            </div>
            <div class="status">
                <i class="ikon bi bi-person-fill"></i> Attar login <span> 40 menit yang lalu</span>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>
<script>
    function updateTime() {
        var now = new Date();
        var hours = now.getHours().toString().padStart(2, '0');
        var minutes = now.getMinutes().toString().padStart(2, '0');
        var seconds = now.getSeconds().toString().padStart(2, '0');
        var timeString = hours + ":" + minutes + ":" + seconds;
        document.getElementById('jam').innerText = timeString;

        var days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober',
            'November', 'Desember'
        ];
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

</html>
<script>
    function updateTime() {
        var now = new Date();
        var hours = now.getHours().toString().padStart(2, '0');
        var minutes = now.getMinutes().toString().padStart(2, '0');
        var seconds = now.getSeconds().toString().padStart(2, '0');
        var timeString = hours + ":" + minutes + ":" + seconds;
        document.getElementById('jam').innerText = timeString;

        var days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober',
            'November', 'Desember'
        ];
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
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var isis = document.querySelectorAll('.isi');
        for (var i = 0; i < isis.length; i++) {
            if (isis[i].textContent.trim() !== '') {
                isis[i].classList.add('non-empty');
            }
        }
    });
</script>
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

<script type="text/javascript">
    let scanner = new Instascan.Scanner({
        video: document.getElementById('preview')
    });
    scanner.addListener('scan', function(content) {
        console.log(content);
    });
    Instascan.Camera.getCameras().then(function(cameras) {
        if (cameras.length > 0) {
            scanner.start(cameras[0]);
        } else {
            console.error('No cameras found.');
        }
    }).catch(function(e) {
        console.error(e);
    });

    scanner.addListener('scan', function(c) {
        document.getElementById('nama_lengkap').value = c
        document.getElementById('form').submit();
    })
</script>

</html>
