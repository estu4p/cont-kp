@extends('layouts.masterAfterPay')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/edd6108211.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ asset('assets/css/adminUniv-afterPayment/Riwayat.css') }}">
    <div class="kiri-putih p-5">
        <a href="/RiwayatJangkaWaktu" style="text-decoration: none;">
            <button class="button-with-icon jangkawaktu {{ Request::is('RiwayatJangkaWaktu') ? 'active' : '' }}"><i class="fas fa-history"></i> Jangka Waktu</button>
        </a>
        <a href="/RiwayatPembelian" style="text-decoration: none;">
            <button class="button-with-icon riwayatpembelian"><i class="fas fa-history"></i> Riwayat Pembelian</button>
        </a>

    </div>
    <div class="isie">
        <h3 style="padding-left : 50%; padding-top : 5%"> Jangka Waktu </h3>
        @foreach ($paket as $item)
            <div class="kartu">
                <p class="pkt"><b>Paket {{ $item->nama_paket }}</b></p>
                <p class="thn">1 tahun</p>
                <p class="lns"><img src="assets/images/new_releases.png" class="gambar">Sudah Lunas</p>
                <p class="tb">Tanggal Beli</p>
                <p class="ttb">{{ $item->tanggal }}</p>
                <p class="tbr">Tanggal Berakhir</p>
                <p class="ttbr">{{ $item->tanggal_berakhir }}</p>
                <a href="/CheckoutBronze">
                    <button class="blue-button">Perpanjang</button>
                </a>
            </div>
        @endforeach



    </div>
