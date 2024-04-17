@extends('layouts.master')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/lihat.css') }}">
<div class="wadah">
    <div class="container-fluid border row justify-content-center mt-5">
        <div class="card border col-11 d-flex flex-column p-0">
            <div class="atas border w-100 row justify-content-start align-items-center p-2 m-0 bg-black">
                <div class="gambar-atas d-flex justify-content-center align-items-center">
                    <i class="text-white fs-2 fa-solid fa-user"></i>
                </div>
                <div class="identitas d-flex p-3 flex-column col-4">
                    <p class="m-0 text-white"><b>MALAS JAGO</b></p>
                    <p class="m-0 text-white"><b>NIP:MJ/UIUX/POLINES/AGST2023/06</b></p>
                </div>
            </div>
            <div class="bawah w-100 d-flex flex-column p-5">
                <div class="bawah-satu w-100 row">
                    <div class="bawah-satu-kiri col-7 d-flex flex-column">
                        <div class="pengetahuan w-100 d-flex flex-column p-3 py-0">
                            <h5>Pengetahuan</h5>
                            <br>
                            <div class="pemahaman-topik w-100 row">
                                <p class="col-8 m-0">Pemahaman Topik Magang</p>
                                <p class="col-3 d-flex justify-content-center border-2 rounded border border-dark px-5 py-0" style="background-color: #DCDCDC">10</p>
                            </div>
                            <div class="pemahaman-topik w-100 row">
                                <p class="col-8 m-0">Pemahaman ruang lingkup magang</p>
                                <p class="col-3 d-flex justify-content-center border-2 rounded border border-dark px-5 py-0" style="background-color: #DCDCDC">10</p>
                            </div>
                        </div>
                        <div class="keterampilan w-100 d-flex flex-column p-3">
                            <h5>Keterampilan</h5>
                            <br>
                            <div class="pemahaman-topik w-100 row ">
                                <p class="col-8 m-0">Identifikasi masalah</p>
                                <p class="col-3 d-flex justify-content-center border-2 rounded border border-dark px-5 py-0" style="background-color: #DCDCDC">10</p>
                            </div>
                            <div class="pemahaman-topik w-100 row">
                                <p class="col-8 m-0">Pemecahan masalah</p>
                                <p class="col-3 d-flex justify-content-center border-2 rounded border border-dark px-5 py-0" style="background-color: #DCDCDC">10</p>
                            </div>
                            <div class="pemahaman-topik w-100 row">
                                <p class="col-8 m-0">Hasil kerja</p>
                                <p class="col-3 d-flex justify-content-center border-2 rounded border border-dark px-5 py-0" style="background-color: #DCDCDC">10</p>
                            </div>
                        </div>
                    </div>
                    <div class="lainnya col-5 d-flex flex-column p-3 py-0">
                        <h5 class="+ m-0">Lainnya</h5>
                        <br>
                        <div class="pemahaman-topik w-100 row ">
                            <p class="col-8 m-0">Partisipasi</p>
                            <p class="col-3 d-flex justify-content-center border-2 rounded border border-dark px-5 py-0" style="background-color: #DCDCDC">10</p>
                        </div>
                        <div class="pemahaman-topik w-100 row">
                            <p class="col-8 m-0">Kejujuran</p>
                            <p class="col-3 d-flex justify-content-center border-2 rounded border border-dark px-5 py-0" style="background-color: #DCDCDC">10</p>
                        </div>
                        <div class="pemahaman-topik w-100 row">
                            <p class="col-8 m-0">Kedisiplinan</p>
                            <p class="col-3 d-flex justify-content-center border-2 rounded border border-dark px-5 py-0" style="background-color: #DCDCDC">10</p>
                        </div>
                        <div class="pemahaman-topik w-100 row">
                            <p class="col-8 m-0">Tangung jawab</p>
                            <p class="col-3 d-flex justify-content-center border-2 rounded border border-dark px-5 py-0" style="background-color: #DCDCDC">10</p>
                        </div>
                        <div class="pemahaman-topik w-100 row">
                            <p class="col-8 m-0">Inisiatif</p>
                            <p class="col-3 d-flex justify-content-center border-2 rounded border border-dark px-5 py-0" style="background-color: #DCDCDC">10</p>
                        </div>
                    </div>
                    <div class="bawah-dua w-100 p-5 gap-3" style="margin-left: -20px">
                        <h5 class="my-3">Kritik Saran</h5>
                        <div class="form-floating col-12" style="text-align: left;">
                            <textarea class="ta" placeholder="Kerja Bagus." id="floatingTextarea2" style="height: 200px; background-color:#DCDCDC; "></textarea>
                        </div>
                        <br>
                        <button type="button" class="btn btn-primary">Download</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
</div>
