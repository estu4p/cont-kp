@extends('layouts.landing')

@section('content')
<div class="modal fade" id="modalCheckout" tabindex="-1" role="dialog" aria-labelledby="modalCheckout" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="my-5 d-flex flex-column justify-content-center">
                <p class="text-capitalize text-center fs-5 alert-hapus fw-medium ">Yakin memilih paket ini?</p>
                <div class="mx-auto d-flex gap-2">
                    <button type="button" class="btn mb-3 btn-danger px-5" data-bs-dismiss="modal" data-bs-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-success mb-3 px-5" id="yakinBtn">Yakin</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="text-capitalize p-4 " style="background-color: #F2F4F7; max-height: 100%;">
    <h4 class="text-center fw-bold" style="padding-bottom: 3px;">selesaikan pembayaran anda</h4>
    <div class="checkout mt-2  max582">
        <form class="fw-medium  ">
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
                <input type="text" name="paket" style="border: 2px solid #E9E9E9; color:#5e5e5e; padding: 12px; border-radius: 0px 8px 8px 0px; width: 100%;" value="Bronze" disabled>
            </div>

            <label for="bayar" class="mt-4">metode pembayaran<span class="text-danger">*</span></label>

            <div class="d-flex">
                <div style="background-color: #E9E9E9; padding: 14px 15px 17px 14px;" class="label-img"><img src="{{ asset('assets/images/icon/bayar.png') }}" style="width: 25px" class="icon-labelinput">
                </div>
                <button id="pilihMetode" class="btn" type="button" style="border: 2px solid #E9E9E9; padding: 15px; border-radius: 0px 8px 8px 0px; width: 100%;">
                    Pilih Metode Pembayaran<i class="fa-solid fa-caret-down" style="padding-left: 53%;z-index:20;"></i>
                </button>

            </div>

            <div class="collapse " id="collapseExample" style="position: absolute; width:32.5%;">

                <div class="dalam  w-100 border border-none d-flex justify-content-center gap-2" style="display: flex; border:none !important;">
                    <div class="dalamchild">
                        <div class="list-pembayaran"><input type="radio" class="radio " name="metode" value="Mandiri Virtual Account"> Mandiri Virtual Account
                            <img src="/assets/images/icon/mandiri.png">
                        </div>
                        <div class="list-pembayaran"><input type="radio" class="radio" name="metode" value="BNI Virtual Account"> BNI Virtual Account
                            <img src="/assets/images/icon/bni.png">
                        </div>
                        <div class="list-pembayaran"><input type="radio" class="radio" name="metode" value="Shopee Pay"> Shopee Pay <img src="/assets/images/icon/shopeePay.png"></div>
                    </div>
                    <div class="dalamchild">
                        <div class="list-pembayaran"><input type="radio" class="radio" name="metode" value="BCA Virtual Account"> BCA Virtual Account <img src="/assets/images/icon/bca.png"></div>
                        <div class="list-pembayaran"><input type="radio" class="radio" name="metode" value="BRI Virtual Account"> BRI Virtual Account <img src="/assets/images/icon/bri.png"></div>
                        <div class="list-pembayaran"><input type="radio" class="radio" name="metode" value="GoPay"> GoPay <img src="/assets/images/icon/gopay.png"></div>
                    </div>
                </div>
            </div>


            <label for="kota" class="mt-4">lokasi<span class="text-danger">*</span></label>
            <div class="d-flex">
                <div style="background-color: #E9E9E9; padding: 14px 15px 17px 14px;" class="label-img"><img src="{{ asset('assets/images/icon/kota.png') }}" style="width: 25px" class="icon-labelinput">
                </div>

                <button id="pilihKotaButton" class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExamplee" style="border: 2px solid #E9E9E9; padding: 15px; border-radius: 0px 8px 8px 0px; width: 100%;">
                    Pilih Kota Anda<i class="fa-solid fa-caret-down" style="padding-left: 71%;z-index:20;"></i>
                </button>
            </div>
            <div class="collapse" id="collapseExamplee" style="position: absolute; width:32.5%;">
                <div class="dalam2 card-body border">

                    @foreach($data as $item)
                    <div class="tes">
                        {{$item['name']}}<input type="radio" name="option" value="{{$item['name']}}" style="float: Right;">
                    </div>
                    
                    <hr>
                    @endforeach
                </div>
            </div>


            <div class="mx-auto d-flex flex-wrap justify-content-center gap-2">
                <button class="border-0 mt-5 fs-5 fw-semibold" style="background-color: #A61C1CE5; color: white; padding: 12px 32px; border-radius: 20px;" type="button" data-bs-toggle="modal" data-bs-target="#modalCheckout">Check
                    Out</button>
            </div>
        </form>
    </div>
    <br>
    <div style="text-align: center">
        <span>Dengan melakukan checkout, maka Anda setuju dengan<br>
            <span style="color: red;">Ketentuan Penggunaan kami</span> dan mengonfirmasi bahwa<br>
            Anda telah membaca<span style="color: red;"> Kebijakan Privasi</span> kami.
        </span>
    </div>
</div>

<footer style="background-color: #A61C1CE5; width: 100%;">
    <div class="text-center text-uppercase fs-6 my-auto py-2 text-white">
        <span class="fs-3 fw-bold" style="vertical-align: middle;">&copy;</span> 2023 pt.seven inc
    </div>
</footer>


<script>
    document.getElementById("yakinBtn").addEventListener("click", function() {
        window.location.href = "/after-checkout";
    });
</script>


<script>
    // Script untuk menangani tampilan dan perilaku interaktif "Pilih Metode Pembayaran"
    document.addEventListener('DOMContentLoaded', function() {
        const radios = document.querySelectorAll('.radio'); // Memilih semua radio button dengan kelas .radio
        const button = document.getElementById('pilihMetode'); // Memilih tombol "Pilih Metode Pembayaran"
        const collapseExample = document.getElementById('collapseExample'); // Memilih elemen yang berisi pilihan metode pembayaran

        // Menambahkan event listener untuk setiap radio button
        radios.forEach(radio => {
            radio.addEventListener('change', function() {
                if (this.checked) {
                    button.textContent = ' ' + this.value; // Memperbarui teks pada tombol dengan nilai radio button yang dipilih
                    collapseExample.classList.remove('show'); // Menyembunyikan pilihan metode pembayaran ketika radio button dipilih
                }
            });
        });

        // Menambahkan event listener untuk tombol "Pilih Metode Pembayaran"
        button.addEventListener('click', function() {
            if (collapseExample.classList.contains('show')) {
                collapseExample.classList.remove('show'); // Menyembunyikan pilihan metode pembayaran jika sudah terlihat
            } else {
                collapseExample.classList.add('show'); // Menampilkan pilihan metode pembayaran jika belum terlihat
                collapseExample.style.marginBottom = "0px"; // Menetapkan margin bottom untuk styling
            }
        });
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const radios = document.querySelectorAll('[name="option"]');
        const button = document.getElementById('pilihKotaButton');
        const collapseExamplee = document.getElementById('collapseExamplee');

        radios.forEach(radio => {
            radio.addEventListener('change', function() {
                if (this.checked) {
                    button.textContent = ' ' + this.value;
                    collapseExamplee.classList.remove('show');
                }
            });
        });

        // Menambahkan event listener untuk tombol "Pilih Kota Anda"
        button.addEventListener('click', function() {
            if (collapseExamplee.classList.contains('show')) {
                collapseExamplee.classList.remove('show'); // Menutup pilihan kota jika sudah terlihat
            } else {
                collapseExamplee.classList.add('show'); // Menampilkan pilihan kota jika belum terlihat
                collapseExamplee.style.marginBottom = "0px"; // Menetapkan margin bottom untuk styling
            }
        });
    });
</script>

@endsection