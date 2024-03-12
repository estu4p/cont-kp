@extends('layouts.master')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/lihat.css') }}">


    <div class="container-fluid border  row justify-content-center">
        <div class="card border col-11 d-flex flex-column p-0">
            <div class="atas border w-100 row justify-content-start align-items-center p-2 m-0 bg-black">
                <div class="gambar-atas d-flex justify-content-center align-items-center">
                    <i class="text-white fs-2 fa-solid fa-user"></i>

                </div>
                <div class="identitas d-flex p-3 flex-column col-4">
                    <p style="margin: 0; color: white;"><b>MALAS JAGO</b></p>
                    <p style="margin: 0; color: white;"><b>NIP:MJ/UIUX/POLINES/AGST2023/06</b></p>

                </div>
            </div>
            <div class="bawah w-100 d-flex flex-column p-5">
                <div class="bawah-satu w-100 row">
                    <div class="bawah-satu-kiri col-7 d-flex flex-column">
                        <div class="pengetahuan w-100 d-flex flex-column p-3 py-0">
                            <h5 >Pengetahuan</h5>
                            <div class="pemahaman-topik w-100 row">
                                <p class="col-8">Pemahaman Topik Magang</p>
                                <p class="col-3  d-flex justify-content-center border-2 rounded border border-dark px-5 py-0"
                                    style="background-color: #DCDCDC">10</p>
                            </div>
                            <div class="pemahaman-topik w-100 row">
                                <p class="col-8">Pemahaman Topik Magang</p>
                                <p class="col-3  d-flex justify-content-center border-2 rounded border border-dark px-5 py-0"
                                    style="background-color: #DCDCDC">10</p>
                            </div>
                        </div>
                        <div class="keterampilan w-100 d-flex flex-column p-3">
                            <h5>Pengetahuan</h5>
                            <div class="pemahaman-topik w-100 row ">
                                <p class="col-8">Pemahaman Topik Magang</p>
                                <p class="col-3  d-flex justify-content-center border-2 rounded border border-dark px-5 py-0"
                                    style="background-color: #DCDCDC">10</p>
                            </div>
                            <div class="pemahaman-topik w-100 row">
                                <p class="col-8">Pemahaman Topik Magang</p>
                                <p class="col-3  d-flex justify-content-center border-2 rounded border border-dark px-5 py-0"
                                    style="background-color: #DCDCDC">10</p>
                            </div>
                            <div class="pemahaman-topik w-100 row">
                                <p class="col-8">Pemahaman Topik Magang</p>
                                <p class="col-3  d-flex justify-content-center border-2 rounded border border-dark px-5 py-0"
                                    style="background-color: #DCDCDC">10</p>
                            </div>
                        </div>
                    </div>
                    <div class="lainnya col-5 d-flex flex-column p-3 py-0">
                        <h5 class="+ ">Pengetahuan</h5>
                        <div class="pemahaman-topik w-100 row ">
                            <p class="col-8">Pemahaman Topik Magang</p>
                            <p class="col-3  d-flex justify-content-center border-2 rounded border border-dark px-5 py-0"
                                style="background-color: #DCDCDC">10</p>
                        </div>
                        <div class="pemahaman-topik w-100 row">
                            <p class="col-8">Pemahaman Topik Magang</p>
                            <p class="col-3  d-flex justify-content-center border-2 rounded border border-dark px-5 py-0"
                                style="background-color: #DCDCDC">10</p>
                        </div>
                        <div class="pemahaman-topik w-100 row">
                            <p class="col-8">Pemahaman Topik Magang</p>
                            <p class="col-3  d-flex justify-content-center border-2 rounded border border-dark px-5 py-0"
                                style="background-color: #DCDCDC">10</p>
                        </div>
                        <div class="pemahaman-topik w-100 row">
                            <p class="col-8">Pemahaman Topik Magang</p>
                            <p class="col-3  d-flex justify-content-center border-2 rounded border border-dark px-5 py-0"
                                style="background-color: #DCDCDC">10</p>
                        </div>
                        <div class="pemahaman-topik w-100 row">
                            <p class="col-8">Pemahaman Topik Magang</p>
                            <p class="col-3  d-flex justify-content-center border-2 rounded border border-dark px-5 py-0"
                                style="background-color: #DCDCDC">10</p>
                        </div>
                    </div>
                </div>
                <div class="bawah-dua w-100 p-5 gap-3">
                    <h5 class="my-3">Kritik Saran</h5>
                    <div class="form-floating col-12">
                        <p style="background-color: rgb(185, 185, 185)"></p>
                        <textarea class="form-control w-100" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 200px; background-color:#DCDCDC;"></textarea>


                    </div>
                    <br>
                    <button type="button" class="btn btn-primary">Download</button>
                </div>
            </div>
        </div>
    </div>
@endsection
