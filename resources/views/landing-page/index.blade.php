@extends('layouts.landing')

@section('content')
    <nav class="px-5 pt-3 pb-2 shadow bg-white sticky-top z-auto">
        <ul class="d-flex list-unstyled text-capitalize ">
            <li><img src="assets/images/logo.png" width="60px" class="ms-2"></li>
            <div class="d-flex gap-5 fs-4 fw-semibold m-auto">
                <li><a href="#fitur" class="menu-navbar">fitur</a></li>
                <li><a href="#paket" class="menu-navbar">harga</a></li>
                <li><a href="#footer" class="menu-navbar">tentang kami</a></li>
            </div>
            <div class="d-flex fs-4 fw-semibold my-auto gap-5">
                <li><a href="/register" class="menu-reg">daftar</a></li>
                <li><a href="/loginpage" class="menu-reg">login</a></li>
            </div>
        </ul>
    </nav>

    <section id="header" class="header-landing">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <div class="py-5 mt-5">
                        <h1 class="fs-1 fw-bold text-uppercase">manajemen sistem pengelolaan siswa/mahasiswa magang</h1>
                        <div class="fw-semibold fs-5 mt-5">
                            <p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-check-circle-fill text-primary me-2" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                </svg>
                                Website pengelolaan siswa/mahasiswa magang yang responsive</p>
                            <p class="mb-5"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-check-circle-fill text-primary me-3"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                </svg>Jaminan keamanan sistem tersertifikasi dengan akses kontrol yang fleksibel</p>
                            <a href="#fitur" class="btn-header text-capitalize fs-4 rounded-md">selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-center mb-4 mt-5 mt-md-0 pt-4 d-none d-sm-block">
                    <img src="assets/images/landing.png" class="img-fluid mt-5 mt-md-0" width="600px" alt="">
                </div>
            </div>
        </div>
    </section>

    <section id="fitur" class="fitur">
        <p class="title-fitur text-capitalize fw-semibold mx-auto">fitur aplikasi kami</p>
        <div class="container text-center py-5" style="padding: 20px 60px 10px 60px;">
            <div class="row align-items-center gap-5">
                <div class="col">
                    <div class="card px-2 py-5 shadow border-0" style="width: 22rem; border-radius: 16px;">
                        <img src="assets/images/fitur/1.png" class="mx-auto my-4" width="108px" alt="...">
                        <div class="card-body mt-2">
                            <h5 class="fw-bolder" style="font-size: 18px; height: 48px;">Presensi Bagi Siswa/Mahasiswa
                            </h5>
                            <p class="card-text px-3" style="font-size: 15px; line-height: 1.2; height: 60px;">Dengan
                                aplikasi kami, presensi untuk siswa/mahasiswa dapat dilakukan melalui aplikasi </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card px-2 py-5 shadow border-0" style="width: 22rem; border-radius: 16px;">
                        <img src="assets/images/fitur/2.png" class="mx-auto my-4" width="108px" alt="...">
                        <div class="card-body mt-2">
                            <h5 class="fw-bolder" style="font-size: 18px; height: 48px;">Penilaian Magang bagi
                                Siswa/Mahasiswa</h5>
                            <p class="card-text px-3" style="font-size: 15px; line-height: 1.2; height: 60px;">Penilaian
                                magang dilakukan oleh mitra di aplikasi ketika siswa selesai melaksanakan magang</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card px-2 py-5 shadow border-0" style="width: 22rem; border-radius: 16px;">
                        <img src="assets/images/fitur/1.png" class="mx-auto my-4" width="108px" alt="...">
                        <div class="card-body mt-2">
                            <h5 class="fw-bolder" style="font-size: 18px; height: 48px;">Pantau Aktivitas Siswa/Mahasiwa
                            </h5>
                            <p class="card-text px-3" style="font-size: 15px; line-height: 1.2; height: 60px;">Pantau
                                aktivitas Siswa/Mahasiswa dengan menggunakan Log Activity</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-center gap-5 mt-5">
                <div class="col">
                    <div class="card px-2 py-5 shadow border-0" style="width: 22rem; border-radius: 16px;">
                        <img src="assets/images/fitur/4.png" class="mx-auto my-4" width="96px" alt="...">
                        <div class="card-body">
                            <h5 class="fw-bolder" style="font-size: 18px; height: 30px;">Web yang Responsive</h5>
                            <p class="card-text px-3" style="font-size: 15px; line-height: 1.2; height: 60px;">Sistem
                                merupakan website yang responsif sehingga lebih fleksibel, dapat diakses melalui desktop
                                maupun perangkat mobile. </p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card px-2 py-5 shadow border-0" style="width: 22rem; border-radius: 16px;">
                        <img src="assets/images/fitur/5.png" class="mx-auto my-4" width="108px" alt="...">
                        <div class="card-body mt-2">
                            <h5 class="fw-bolder" style="font-size: 18px; height: 48px;">Pengelolaan Izin
                                Siswa/Mahasiswa</h5>
                            <p class="card-text px-3" style="font-size: 15px; line-height: 1.2; height: 60px;">
                                Pengololaan izin untuk siswa/mahasiswa dengan mudah</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card px-2 py-5 shadow border-0" style="width: 22rem; border-radius: 16px;">
                        <img src="assets/images/fitur/6.png" class="mx-auto my-4" width="108px"
                            style="padding-top: 40px; padding-bottom: 28px;" alt="...">
                        <div class="card-body mt-2">
                            <h5 class="fw-bolder" style="font-size: 18px; height: 48px;">Pengaturan Team Magang</h5>
                            <p class="card-text px-3" style="font-size: 15px; line-height: 1.2; height: 60px;">Kelola
                                team magang siswa/mahasiwa serta informasi dengan mudah </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-center gap-5 mt-5 mb-4">
                <div class="col"></div>
                <div class="col">
                    <div class="card px-2 py-5 shadow border-0" style="width: 22rem; border-radius: 16px;">
                        <img src="assets/images/fitur/7.png" class="mx-auto my-4" width="108px" alt="...">
                        <div class="card-body mt-2">
                            <h5 class="fw-bolder" style="font-size: 18px; height: 56px;">Tesedia fitur Presensi
                                menggunakan QR Code </h5>
                            <p class="card-text px-3" style="font-size: 15px; line-height: 1.2; height: 52px;">
                                Presensi bisa dilakukan melalui QR Code untuk Siswa/Mahasiswa</p>
                        </div>
                    </div>
                </div>
                <div class="col"></div>
            </div>
        </div>
        </div>
    </section>

    <section id="paket" class="py-5">
        <h1 class="text-capitalize fs-2 text-center mt-4">pilih paket sesuai kebutuhan anda</h1>
        <div class="container text-center py-5">
            <div class="row align-items-center">
                <div class="col-3">
                    <div class="card-paket card p-2 pb-4" style="width: 19rem; border-radius: 16px;">
                        <div class="card-body mt-2">
                            <h5 class="fw-bolder text-uppercase" style="font-size: 24px;">bronze
                            </h5>
                            <h4 class="fw-bolder text-uppercase fs-2"
                                style="color: #A61C1CE5; opacity: 90%; margin-top: 36px;">Rp 1.000.000
                            </h4>
                            <p class="card-text px-3" style="font-size: 18px; opacity: 70%;">/tahun</p>
                            <div class="mt-4 mb-5" style="line-height: 1.2; text-align: start;">
                                <p><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" class="bi bi-check2-square me-2" style="color: #A61C1CE5;"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5z" />
                                        <path
                                            d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0" />
                                    </svg>Presensi Siswa/Mahasiswa</p>
                                <p><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" class="bi bi-check2-square me-2" style="color: #A61C1CE5;"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5z" />
                                        <path
                                            d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0" />
                                    </svg>Penilaian Siswa/Mahasiswa</p>
                                <p><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" class="bi bi-check2-square me-2" style="color: #A61C1CE5;"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5z" />
                                        <path
                                            d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0" />
                                    </svg>Pantau Siswa/Mahasiswa</p>
                                <p><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" class="bi bi-check2-square me-2" style="color: #A61C1CE5;"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5z" />
                                        <path
                                            d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0" />
                                    </svg>Max User 500 Siswa/Mahasiswa</p>
                            </div>
                            <a href="/checkout/bronze" class="text-capitalize fw-bold text-decoration-none"
                                style="border: 1.5px solid #A61C1CE5; color: #A61C1CE5; border-radius: 30px; font-size: 14px; padding: 12px 24px 12px 24px; transition: all 0.3s;"
                                onmouseover="this.style.backgroundColor='#A61C1CE5'; this.style.color='#ffffff'; this.style.transition='all 0.3s'; document.querySelector('.bi-arrow-right-circle').style.color='#ffffff';"
                                onmouseout="this.style.backgroundColor='transparent'; this.style.color='#A61C1CE5'; this.style.transition='all 0.3s'; document.querySelector('.bi-arrow-right-circle').style.color='#A61C1CE5';">
                                coba sekarang
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-arrow-right-circle ms-2" style="color: #A61C1CE5;"
                                    viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z" />
                                </svg>
                            </a>

                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card-paket card p-2 pb-4" style="width: 19rem; border-radius: 16px;">
                        <div class="card-body mt-2">
                            <h5 class="fw-bolder text-uppercase" style="font-size: 24px;">silver
                            </h5>
                            <h4 class="fw-bolder text-uppercase fs-2"
                                style="color: #0038FFE5; opacity: 90%; margin-top: 36px;">Rp 4.000.000
                            </h4>
                            <p class="card-text px-3" style="font-size: 18px; opacity: 70%;">/tahun</p>
                            <div class="mt-4 mb-5" style="line-height: 1.2; text-align: start;">
                                <p><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" class="bi bi-check2-square me-2" style="color: #0038FFE5;"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5z" />
                                        <path
                                            d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0" />
                                    </svg>Presensi Siswa/Mahasiswa</p>
                                <p><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" class="bi bi-check2-square me-2" style="color: #0038FFE5;"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5z" />
                                        <path
                                            d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0" />
                                    </svg>Penilaian Siswa/Mahasiswa</p>
                                <p><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" class="bi bi-check2-square me-2" style="color: #0038FFE5;"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5z" />
                                        <path
                                            d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0" />
                                    </svg>Pantau Siswa/Mahasiswa</p>
                                <p><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" class="bi bi-check2-square me-2" style="color: #0038FFE5;"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5z" />
                                        <path
                                            d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0" />
                                    </svg>Max User 1000 Siswa/Mahasiswa</p>
                            </div>
                            <a href="/checkout/silver" class="text-capitalize fw-bold text-decoration-none"
                                style="border: 1.5px solid #0038FFE5; color: #0038FFE5; border-radius: 30px; font-size: 14px; padding: 12px 24px 12px 24px; transition: all 0.3s;"
                                onmouseover="this.style.backgroundColor='#0038FFE5'; this.style.color='#ffffff'; this.querySelector('svg').style.color='#ffffff';"
                                onmouseout="this.style.backgroundColor='transparent'; this.style.color='#0038FFE5'; this.querySelector('svg').style.color='#0038FFE5';">
                                coba sekarang
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-arrow-right-circle ms-2" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z" />
                                </svg>
                            </a>

                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card-paket card p-2 pb-4" style="width: 19rem; border-radius: 16px;">
                        <div class="card-body mt-2">
                            <h5 class="fw-bolder text-uppercase" style="font-size: 24px;">gold
                            </h5>
                            <h4 class="fw-bolder text-uppercase fs-2"
                                style="color: #009745E5; opacity: 90%; margin-top: 36px;">Rp 7.000.000
                            </h4>
                            <p class="card-text px-3" style="font-size: 18px; opacity: 70%;">/tahun</p>
                            <div class="mt-4 mb-5" style="line-height: 1.2; text-align: start;">
                                <p><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" class="bi bi-check2-square me-2" style="color: #009745E5;"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5z" />
                                        <path
                                            d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0" />
                                    </svg>Presensi Siswa/Mahasiswa</p>
                                <p><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" class="bi bi-check2-square me-2" style="color: #009745E5;"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5z" />
                                        <path
                                            d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0" />
                                    </svg>Penilaian Siswa/Mahasiswa</p>
                                <p><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" class="bi bi-check2-square me-2" style="color: #009745E5;"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5z" />
                                        <path
                                            d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0" />
                                    </svg>Pantau Siswa/Mahasiswa</p>
                                <p><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" class="bi bi-check2-square me-2" style="color: #009745E5;"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5z" />
                                        <path
                                            d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0" />
                                    </svg>Max User +1000 Siswa/Mahasiswa</p>
                            </div>
                            <a href="/checkout/gold" class="text-capitalize fw-bold text-decoration-none"
                                style="border: 1.5px solid #009745E5; color: #009745E5; border-radius: 30px; font-size: 14px; padding: 12px 24px 12px 24px; transition: all 0.3s;"
                                onmouseover="this.style.backgroundColor='#009745E5'; this.style.color='#ffffff'; this.querySelector('svg').style.color='#ffffff';"
                                onmouseout="this.style.backgroundColor='transparent'; this.style.color='#009745E5'; this.querySelector('svg').style.color='#009745E5';">
                                coba sekarang
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-arrow-right-circle ms-2" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z" />
                                </svg>
                            </a>

                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card-paket card p-2 pb-4" style="width: 19rem; border-radius: 16px;">
                        <div class="card-body mt-2">
                            <h5 class="fw-bolder text-uppercase" style="font-size: 24px;">platinum
                            </h5>
                            <h4 class="fw-bolder text-uppercase fs-2"
                                style="color: #36007BE5; opacity: 90%; margin-top: 36px;">Rp 10.000.000
                            </h4>
                            <p class="card-text px-3" style="font-size: 18px; opacity: 70%;">/tahun</p>
                            <div class="mt-4 mb-5" style="line-height: 1.2; text-align: start;">
                                <p><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" class="bi bi-check2-square me-2" style="color: #36007BE5;"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5z" />
                                        <path
                                            d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0" />
                                    </svg>Presensi Siswa/Mahasiswa</p>
                                <p><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" class="bi bi-check2-square me-2" style="color: #36007BE5;"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5z" />
                                        <path
                                            d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0" />
                                    </svg>Penilaian Siswa/Mahasiswa</p>
                                <p><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" class="bi bi-check2-square me-2" style="color: #36007BE5;"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5z" />
                                        <path
                                            d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0" />
                                    </svg>Pantau Siswa/Mahasiswa</p>
                                <p><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" class="bi bi-check2-square me-2" style="color: #36007BE5;"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5z" />
                                        <path
                                            d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0" />
                                    </svg>Custom user sesuai kebutuhan</p>
                            </div>
                            <a href="/checkout/platinum" class="text-capitalize fw-bold text-decoration-none"
                                style="border: 1.5px solid #36007BE5; color: #36007BE5; border-radius: 30px; font-size: 14px; padding: 12px 24px 12px 24px; transition: all 0.3s;"
                                onmouseover="this.style.backgroundColor='#36007BE5'; this.style.color='#ffffff'; this.querySelector('svg').style.color='#ffffff';"
                                onmouseout="this.style.backgroundColor='transparent'; this.style.color='#36007BE5'; this.querySelector('svg').style.color='#36007BE5';">
                                coba sekarang
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-arrow-right-circle ms-2" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z" />
                                </svg>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer id="footer" class="bg-white">
        <div class="text-white py-4" style="background-color: #A61C1CE5;">
            <div class="container container-footer">
                <div class="row align-items-center">
                    <div class="col-4">
                        <div class="d-flex">
                            <img src="assets/images/logo.png" width="70px" />
                            <h4 class="text-uppercase my-auto ms-3 fw-bold">seven.inc</h4>
                        </div>
                        <p class="mt-4">+6282934397492</p>
                        <p class="flex-wrap" style="margin-top: -12px;">Jalan Raya Janti, Gang Arjuna Nomor 59,
                            Karangjambe, Banguntapan, Bantul
                            Regency, Special Region of Yogyakarta 55198</p>
                        <div class="d-flex gap-2">
                            <a href=""
                                style="color: #A61C1CE5; background-color: white; width: 28px; height: 28px; border-radius: 100%; text-align: center;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                    <path
                                        d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                                </svg>
                            </a>
                            <a href=""
                                style="color: #A61C1CE5; background-color: white; width: 28px; height: 28px; border-radius: 100%; text-align: center;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
                                    <path
                                        d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z" />
                                </svg>
                            </a>
                            <a href=""
                                style="color: #A61C1CE5; background-color: white; width: 28px; height: 28px; border-radius: 100%; text-align: center;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                    <path
                                        d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                                </svg>
                            </a>
                            <a href=""
                                style="background-color: #A61C1CE5; border-radius: 100%; text-align: center;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                    fill="currentColor" class="bi bi-facebook" style="color: white;" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                                </svg>
                            </a>
                            <a href=""
                                style="background-color: #A61C1CE5; text-align: center;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                    fill="currentColor" class="bi bi-linkedin" style="color: white; border-radius: 100%;" viewBox="0 0 16 16">
                                    <path
                                        d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="col-2"></div>
                    <div class="col-2 text-capitalize">
                        <h3 class="mb-4">fitur</h3>
                        <p>presensi siswa</p>
                        <p>penilaian siswa</p>
                        <p>pantau siswa</p>
                        <p>pengaturan team</p>
                    </div>
                    <div class="col-2 text-capitalize">
                        <h3 class="mb-4">harga</h3>
                        <p>bronze</p>
                        <p>silver</p>
                        <p>gold</p>
                        <p>platinum</p>
                    </div>
                    <div class="col-2 text-capitalize">
                        <h3 class="mb-4">tools bisnis</h3>
                        <p>presensi siswa</p>
                    </div>
                </div>
            </div>
        </div>
        <p class="text-center text-uppercase fs-6 fw-semibold py-2" style="color: #A61C1CE5; margin-bottom: -48px;">
            <span class="fs-3 fw-bold" style="vertical-align: middle;">&copy;</span> 2023 pt.seven inc
        </p>
    </footer>
@endsection
