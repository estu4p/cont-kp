@extends('layouts.landing')

@section('content')
    <div class="modal fade" id="modalCheckout" tabindex="-1" role="dialog" aria-labelledby="modalCheckout" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="my-5 d-flex flex-column justify-content-center">
                    <p class="text-capitalize text-center fs-5 alert-hapus fw-medium ">Yakin memilih paket ini?</p>
                    <div class="mx-auto d-flex gap-2">
                        <button type="button" class="btn mb-3 btn-danger px-5" data-bs-dismiss="modal"
                            data-bs-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-success mb-3 px-5" id="yakinBtn">Yakin</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="text-capitalize p-5" style="background-color: #F2F4F7; max-height: 100%;">
        <h4 class="text-center fw-bold">selesaikan pembayaran anda</h4>
        <div class="checkout mt-5">
            <form class="fw-medium">
                <label for="paket" class="mt-4">paket<span class="text-danger">*</span></label>
                <div class="d-flex">
                    <div style="background-color: #E9E9E9; padding: 12px 15px 12px 15px;" class="label-img">
                        <img src="{{ asset('assets/images/icon/paket.png') }}" style="width: 25px" class="icon-labelinput">
                    </div>
                    {{-- <script>
                        var currentUrl = window.location.pathname;
                        var urlParts = currentUrl.split('/');
                        var packageName = urlParts[urlParts.length - 1];
                    </script> --}}
                    <input type="text" name="paket"
                        style="border: 2px solid #E9E9E9; color:#5e5e5e; padding: 12px; border-radius: 0px 8px 8px 0px; width: 100%;"
                        value="Bronze" disabled>
                </div>

                <label for="bayar" class="mt-4">metode pembayaran<span class="text-danger">*</span></label>
                <div class="d-flex">
                    <div style="background-color: #E9E9E9; padding: 14px 15px 17px 14px;" class="label-img"><img
                            src="{{ asset('assets/images/icon/bayar.png') }}" style="width: 25px" class="icon-labelinput">
                    </div>
                    {{-- <select style="border: 2px solid #E9E9E9; padding: 16px; border-radius: 0px 8px 8px 0px; width: 100%;"
                        id="bayar">
                        <option value="">Pilih Metode Pembayaran</option> --}}
                    <select id="selectKota" type="email" name="kota"
                        style="border: 2px solid #E9E9E9; padding: 16px; border-radius: 0px 8px 8px 0px; width: 100%;">
                        <option value="" selected disabled hidden>Pilih Metode Pembayaran</option>
                        <option value="mandiri">Mandiri Virtual Account</option>
                        <option value="bca">BCA Virtual Account</option>
                        <option value="bri">BRI Virtual Account</option>
                        <option value="BNI">BNI Virtual Account</option>
                        <option value="shopeepay">Shopeepay</option>
                        <option value="gopay">Gopay</option>
                    </select>
                </div>

                <label for="kota" class="mt-4">kota<span class="text-danger">*</span></label>
                <div class="d-flex">
                    <div style="background-color: #E9E9E9; padding: 14px 15px 17px 14px;" class="label-img"><img
                            src="{{ asset('assets/images/icon/kota.png') }}" style="width: 25px" class="icon-labelinput">
                    </div>
                    <select id="selectKota" type="email" name="kota"
                        style="border: 2px solid #E9E9E9; padding: 16px; border-radius: 0px 8px 8px 0px; width: 100%;">
                        <option value="" selected disabled hidden>Pilih Kota</option>
                        <option value="yogyakarta" type="radio">Yogyakarta</option>
                        <option value="jawa tengah">Jawa Tengah</option>
                        <option value="jawa barat">Jawa Barat</option>
                        <option value="jawa timur">Jawa Timur</option>
                    </select>
                </div>

                <div class="button-container">
                    <button class="border-0 mt-5 fs-5 fw-semibold"
                        style="background-color: #A61C1CE5; color: white; padding: 12px 32px; border-radius: 20px;"
                        type="button" data-bs-toggle="modal" data-bs-target="#modalCheckout">Check
                        Out</button>
                </div>
            </form>
        </div>
        <div style="text-align: center">
        <p>Dengan melakukan checkout, maka Anda setuju dengan<br><p style="color: red">Ketentuan Penggunaan kami</p>dan mengonfirmasi bahwa<br>Anda telah membaca<p style="color:red">Kebijakan Privasi</p>kami.</p>
    </div>
    </div>

    <footer style="background-color: #A61C1CE5; margin-bottom: -48px; position: absolute; bottom: 0; width: 100%;">
        <p class="text-center text-uppercase fs-6 my-auto py-2 text-white">
            <span class="fs-3 fw-bold" style="vertical-align: middle;">&copy;</span> 2023 pt.seven inc
        </p>
    </footer>

    <script>
        document.getElementById("yakinBtn").addEventListener("click", function() {
            window.location.href = "/after-checkout";
        });
    </script>
@endsection
