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
</head>

<body>

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
                <div class="modal-footer border-0 d-grid justify-content-center">
                    <!-- Menambahkan kelas d-grid dan properti CSS justify-content -->
                    <a href="/AdminPaket"><button type="button" class="btn btn-success"><b>Selesai</b></button></a>
                </div>
            </div>
        </div>
    </div>

    <div class="text-capitalize p-5" style="background-color: #F2F4F7; max-height: 100%;">
        <h4 class="text-center fw-bold">selesaikan pembayaran anda</h4>
        <div class="checkout mt-5">
            <form class="fw-medium" id="form-pembayaran" action="{{ route('checkout.bronze.adminUnivPost') }}"
                method="POST">
                @csrf
                <label for="paket" class="mt-4">paket<span class="text-danger">*</span></label>
                <div class="d-flex">
                    <div style="background-color: #E9E9E9; padding: 12px 15px 12px 15px;" class="label-img">
                        <img src="{{ asset('assets/images/icon/paket.png') }}" style="width: 25px"
                            class="icon-labelinput">
                    </div>
                    {{-- <script>
                            var currentUrl = window.location.pathname;
                            var urlParts = currentUrl.split('/');
                            var packageName = urlParts[urlParts.length - 1];
                        </script> --}}
                    <input type="text" name="nama_paket"
                        style="border: 2px solid #E9E9E9; color:#5e5e5e; padding: 12px; border-radius: 0px 8px 8px 0px; width: 100%;"
                        value="Bronze" readonly>

                </div>

                <label for="bayar" class="mt-4">metode pembayaran<span class="text-danger">*</span></label>
                <div class="d-flex">
                    <div style="background-color: #E9E9E9; padding: 14px 15px 17px 14px;" class="label-img"><img
                            src="{{ asset('assets/images/icon/bayar.png') }}" style="width: 25px"
                            class="icon-labelinput">
                    </div>
                    <button id="pilihMetode" class="btn" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"
                        style="border: 2px solid #E9E9E9; padding: 15px; border-radius: 0px 8px 8px 0px; width: 100%;">
                        Pilih Metode Pembayaran<i class="fa-solid fa-caret-down" style="padding-left: 40%"></i>
                    </button>
                </div>

                <div class="collapse" id="collapseExample">
                    <div class="dalam card-body" style="display: flex">
                        <div>
                            <div class="list-pembayaran">
                                <input type="radio" class="radio" name="metode_bayar"
                                    value="Mandiri Virtual Account"> Mandiri Virtual Account <img
                                    src="/assets/images/icon/mandiri.png">
                            </div>
                            <div class="list-pembayaran">
                                <input type="radio" class="radio" name="metode_bayar" value="BNI Virtual Account">
                                BNI Virtual Account <img src="/assets/images/icon/bni.png">
                            </div>
                            <div class="list-pembayaran">
                                <input type="radio" class="radio" name="metode_bayar" value="Shopee Pay"> Shopee Pay
                                <img src="/assets/images/icon/shopeePay.png">
                            </div>
                        </div>
                        <div>
                            <div class="list-pembayaran">
                                <input type="radio" class="radio" name="metode_bayar" value="BCA Virtual Account">
                                BCA Virtual Account <img src="/assets/images/icon/bca.png">
                            </div>
                            <div class="list-pembayaran">
                                <input type="radio" class="radio" name="metode_bayar" value="BRI Virtual Account">
                                BRI Virtual Account <img src="/assets/images/icon/bri.png">
                            </div>
                            <div class="list-pembayaran">
                                <input type="radio" class="radio" name="metode_bayar" value="GoPay"> GoPay <img
                                    src="/assets/images/icon/gopay.png">
                            </div>
                        </div>
                    </div>
                </div>


                <label for="kota" class="mt-4">lokasi<span class="text-danger">*</span></label>
                <div class="d-flex">
                    <div style="background-color: #E9E9E9; padding: 14px 15px 17px 14px;" class="label-img"><img
                            src="{{ asset('assets/images/icon/kota.png') }}" style="width: 25px"
                            class="icon-labelinput">
                    </div>

                    <button id="pilihKotaButton" class="btn" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample"
                        style="border: 2px solid #E9E9E9; padding: 15px; border-radius: 0px 8px 8px 0px; width: 100%;">
                        Pilih Kota Anda
                    </button>
                </div>
                <div class="collapse" id="collapseExample2">
                    <div class="dalam2 card-body">
                        Yogyakarta <input type="radio" name="option" value="Yogyakarta"
                            style="float: Right;"><br>
                        Jawa Tengah <input type="radio" name="option" value="Jawa Tengah"
                            style="float: Right;"><br>
                        Jawa Barat <input type="radio" name="option" value="Jawa Barat"
                            style="float: Right;"><br>
                        Jawa Timur <input type="radio" name="option" value="Jawa Timur"
                            style="float: Right;"><br>
                    </div>
                </div>



                <div class="button-container">
                    <button id="openModalBtn" type="submit" class="checkout-button" data-bs-toggle="modal"
                        data-bs-target="#checkoutModal"
                        style="background-color: #A61C1CE5; color: white; padding: 12px 32px; border-radius: 20px;"><b>Check
                            Out</b></button>
                </div>
            </form>
        </div>
        <br>
        <div style="text-align: center">
            <p>Dengan melakukan checkout, maka Anda setuju dengan<br>
                <span style="color: red;">Ketentuan Penggunaan kami</span> dan mengonfirmasi bahwa<br>
                Anda telah membaca<span style="color: red;"> Kebijakan Privasi</span> kami.
            </p>
        </div>
    </div>

    <footer style="background-color: #A61C1CE5; width: 100%;">
        <div class="text-center text-uppercase fs-6 my-auto py-2 text-white">
            <span class="fs-3 fw-bold" style="vertical-align: middle;">&copy;</span> 2023 pt.seven inc
        </div>
    </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        document.getElementById("yakinBtn").addEventListener("click", function() {
            window.location.href = "/after-checkout";
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const radios = document.querySelectorAll('.radio');
            const button = document.getElementById('pilihMetode');
            const collapseExample = document.getElementById('collapseExample');

            radios.forEach(radio => {
                radio.addEventListener('change', function() {
                    if (this.checked) {
                        button.textContent = ' ' + this.value;
                        collapseExample.classList.remove(
                            'show'); // Menghilangkan kelas 'show' dari elemen collapse
                    }
                });
            });
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const pilihKotaButton = document.getElementById('pilihKotaButton');
            const radios = document.getElementsByName('option');
            const collapseExample = document.getElementById('collapseExample2');

            radios.forEach(radio => {
                radio.addEventListener('change', function() {
                    if (this.checked) {
                        pilihKotaButton.innerText = this.value;
                        collapseExample.classList.remove('show');
                    }
                });
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mengambil elemen formulir
            var formPembayaran = document.getElementById('form-pembayaran');

            // Menambahkan event listener untuk pengiriman formulir
            formPembayaran.addEventListener('submit', function(event) {
                // Mengambil semua radio button metode pembayaran
                var metodePembayaran = document.querySelectorAll('input[name="metode_bayar"]');

                // Menginisialisasi variabel untuk memeriksa apakah setidaknya satu metode pembayaran dipilih
                var metodePembayaranTerpilih = false;

                // Memeriksa apakah setidaknya satu radio button metode pembayaran dipilih
                metodePembayaran.forEach(function(radio) {
                    if (radio.checked) {
                        metodePembayaranTerpilih = true;
                    }
                });

                // Jika tidak ada metode pembayaran yang dipilih, munculkan alert
                if (!metodePembayaranTerpilih) {
                    event.preventDefault(); // Mencegah pengiriman formulir
                    alert('Silakan pilih metode pembayaran.'); // Munculkan alert
                }
            });
        });
    </script>

</body>

</html>
