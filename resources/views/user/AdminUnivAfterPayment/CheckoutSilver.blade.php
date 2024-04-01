<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/edd6108211.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/adminUniv-afterPayment/Checkout.css') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page</title>
    <style>

    </style>
    <h2 class="checkout-header" style="font-size: 20px"><b>Selesaikan Pembayaran Anda</b></h2>

</head>

<body>

    <div class="checkout-container">


        <div class="checkout-group">
            <label for="paket" class="checkout-label">Paket</label>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-bag-shopping" style="color: #AF3333"></i></span>
                <input type="text" class="form-control" placeholder="Silver" aria-label="Silver" aria-describedby="basic-addon1" style="color: black" readonly>
              </div>


        </div>

        <label for="metode-pembayaran" class="checkout-label">Metode Pembayaran</label>
        <div class="input-group mb-3">
            <label class="input-group-text" for="metode"><i class="fa-solid fa-wallet" style="color: #AF3333"></i></i></label>
            <select class="form-select" id="metode-pembayaran" name="metode-pembayaran">
                <option value="" style="font-size: 13px">Pilih Metode Pembayaran</option>
                <option value="mandiri" style="font-size: 13px">Mandiri Virtual Account</option>
                <option value="bni" style="font-size: 13px">BNI Virtual Account</option>
                <option value="shopee" style="font-size: 13px">Shopee Pay</option>
                <option value="bca" style="font-size: 13px">BCA Virtual Account</option>
                <option value="bri" style="font-size: 13px">BRI Virtual Account</option>
                <option value="gopay" style="font-size: 13px">Gopay</option>
            </select>
        </div>

        <label for="kota" class="checkout-label">Kota</label>
        <div class="input-group mb-3">
            <label class="input-group-text" for="kota"><i class="fa-solid fa-location-dot" style="color: #AF3333"></i></label>
            <select class="form-select" id="kota" name="kota">
                <option selected>Pilih Kota Anda</option>
                <option value="jakarta">Jakarta</option>
                <option value="bandung">Bandung</option>
                <option value="surabaya">Surabaya</option>
                <option value="padang">Padang</option>
                <option value="yogyakarta">Yogyakarta</option>
                <option value="pekanbaru">Pekanbaru</option>
            </select>
        </div>

        <!-- Modal -->

        <div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0">
                    <div class="modal-header border-0">
                        <!-- Gambar di dalam header -->
                        <img src="assets/images/Frame 2447.png" alt="Gambar Header" class="img-fluid">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <b>Lanjutkan Pembayaran Anda</b>
                        <br>Total Harga : 1.000.000
                        <br>No Tujuan Rekening : 38764567098712
                        <br>Batas Tanggal : 30/10/2024
                        <br><b>Silahkan Cek E-mail Untuk Invoice</b>
                    </div>
                    <div class="modal-footer border-0 text-center">
                        <a href="/AdminPaket"><button type="button" class="btn btn-success"><b>Selesai</b></button></a>

                    </div>
                </div>
            </div>
        </div>



        <button id="openModalBtn" type="button" class="checkout-button" data-bs-toggle="modal" data-bs-target="#checkoutModal"><b>Check Out</b></button>

        <div class="checkout-terms">
            Dengan melakukan checkout, maka Anda setuju dengan<br><b><span style="color: #AF3333">Ketentuan
                    Penggunaan kami</span></b> dan mengonfirmasi bahwa<br> Anda telah membaca <b><span
                    style="color:#AF3333">Kebijakan Privasi kami</span></b>.
        </div>
        <div>
        </div>

        <div>
            <img src="assets/images/Frame 2436.png" alt="Profile Logo">
        </div>

    </div>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
