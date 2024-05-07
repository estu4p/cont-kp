@extends('layouts.masterAfterPay')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/edd6108211.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ asset('assets/css/adminUniv-afterPayment/Riwayat.css') }}">
    <div class="kiri-putih p-5">
        <a href="/RiwayatJangkaWaktu" style="text-decoration: none;">
            <button class="button-with-icon jangkawaktu"><i class="fas fa-history"></i> Jangka Waktu</button>
        </a>
        <a href="/RiwayatPembelian" style="text-decoration: none;" >
            <button class="button-with-icon riwayatpembelian {{ Request::is('RiwayatPembelian') ? 'active' : '' }}"><i class="fas fa-history"></i> Riwayat Pembelian</button>
        </a>
    </div>
    <div class="isie">
        <h3 style="padding-left: 21%">Riwayat Pembelian</h3>
        @foreach ($paket as $data)
            <div class="kartu">
                <p class="stt">Status</p>
                <p class="aktif">
                    @if ($data->status == 'Aktif')
                        <img src="assets/images/check_circle.png" class="ceklis">
                    @else
                        <img src="assets/images/cancel.png" class="ceklis">
                    @endif
                    <b>{{ $data->status }}</b>
                </p>
                <p class="np">No Pesanan</p>
                <p class="nnp"><b>{{ $data->no_pesanan }}</b></p>
                <p class="H">Harga</p>
                <p class="jt"><b>Rp. {{ $data->harga }}</b></p>
                <p class="pkt2">Paket</p>
                <p class="brz"><b>{{ $data->paket }}</b></p>
                <p class="tgl">Tanggal</p>
                <p class="ttgl"><b>{{ $data->tanggal }}</b></p>
                <p class="mp">Metode Pembayaran</p>
                <p class="mtp"><img src="{{ asset('assets/images/' . $data->metode_bayar . '.png') }}" alt="{{$data->metode_bayar . '.png'}}"
                        class="lb"><b>{{ $data->metode_bayar }}</b></p>
                <p class="acr"><img src="assets/images/arrow_circle_right.png" style="margin-top: -12px">
            </div>
        @endforeach
    </div>
@endsection
