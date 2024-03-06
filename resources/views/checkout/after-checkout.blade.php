@extends('layouts.landing')

@section('content')
    <div class="register text-capitalize">
        <div class="position-relative">
            <img src="assets/images/checkout.png" alt="" class="img-checkout">
            <div class="after-checkout mt-5 text-center text-capitalize">
                <h5 class="fw-bold" style="font-size: 20px;">lanjutkan pembayaran anda</h5>
                <p class="fw-semibold pt-3">total harga: 1.000.000</p>
                <p class="fw-medium">no tujuan rekening : 384720392378247343</p>
                <p class="fw-medium" style="font-size: 12px; margin: -8px 0px 8px;">batas tanggal pembayaran 30/10/2023</p>
                <p class="fw-bold">silahkan check e-mail untuk invoice</p>
                <button class="border-0 mt-3 fs-5 fw-semibold"
                    style="background-color: #00C844; color: white; padding: 8px 40px; border-radius: 12px;" type="button"
                    data-bs-toggle="modal" data-bs-target="#">Selesai</button>
            </div>
        </div>
    </div>
@endsection
