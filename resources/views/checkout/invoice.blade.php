@extends('layouts.landing')

@section('content')
    <div class="invoice">
        <div>
            <p style="text-align: right;">MM/DD/YYYY, hh:mm:ss</p>
            <img src="{{ asset('assets/images/logo.png') }}" width="48px" alt="">
            <h4 class="fw-bold text-capitalize">seven inc</h4>
            <p class="fw-medium" style="font-size: 11px; width: 80%; margin: auto; padding: 12px 0px 12px;">Jalan Raya Janti,
                Gang Arjuna Nomor 59,
                Karangjambe, Banguntapan, Bantul
                Regency, Special Region of Yogyakarta 55198</p>
            <p class="text-uppercase fw-bold text-decoration-underline">invoice</p>
        </div>
        <hr class="line" />
        <div class="container" style="font-size: 14px; text-align: left; padding: 0px 44px 0px;">
            <div class="row mb-2">
                <div class="col">
                    Nama
                </div>
                <div class="col">
                    : (nama)
                </div>
            </div>
            <div class="row mb-2">
                <div class="col">
                    Email
                </div>
                <div class="col">
                    : (email)
                </div>
            </div>
            <div class="row mb-2">
                <div class="col">
                    Nomor Telepon
                </div>
                <div class="col">
                    : (telp)
                </div>
            </div>
            <div class="row">
                <div class="col">
                    Sekolah/Perguruan Tinggi
                </div>
                <div class="col">
                    : (sekolah)
                </div>
            </div>
        </div>
        <hr class="line" />
        <p class="text-uppercase fw-bold mb-4" style="font-size: 15px">jumlah yang harus dibayar</p>
        <div class="container pb-5" style="font-size: 14px; text-align: left; padding: 0px 44px 0px;">
            <div class="row mb-2">
                <div class="col">
                    No Rekening Tujuan
                </div>
                <div class="col">
                    : (rekening - nama)
                </div>
            </div>
            <div class="row mb-2">
                <div class="col">
                    Paket
                </div>
                <div class="col">
                    : (paket)
                </div>
            </div>
            <div class="row mb-2">
                <div class="col">
                    Metode Pembayaran
                </div>
                <div class="col">
                    : (metode)
                </div>
            </div>
            <div class="row fw-semibold">
                <div class="col">
                    Total Pembayaran
                </div>
                <div class="col">
                    : Rp (total)
                </div>
            </div>
        </div>
    </div>
@endsection
