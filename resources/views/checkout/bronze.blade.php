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
                    <button id="pilihMetode" class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="border: 2px solid #E9E9E9; padding: 15px; border-radius: 0px 8px 8px 0px; width: 100%;">
                        Pilih Metode Pembayaran<i class="fa-solid fa-caret-down" style="padding-left: 40%"></i>
                      </button>
                </div>

                <div class="collapse" id="collapseExample">
                    <div class="dalam card-body" style="display: flex">
                      <div>
                        <div class="list-pembayaran"><input type="radio" class="radio" name="metode" value="Mandiri Virtual Account"> Mandiri Virtual Account <img src="/assets/images/icon/mandiri.png" > </div>
                        <div class="list-pembayaran"><input type="radio" class="radio" name="metode" value="BNI Virtual Account"> BNI Virtual Account <img src="/assets/images/icon/bni.png"></div>
                        <div class="list-pembayaran" ><input type="radio" class="radio" name="metode" value="Shopee Pay"> Shopee Pay <img src="/assets/images/icon/shopeePay.png" ></div>
                      </div>
                      <div>
                        <div class="list-pembayaran"><input type="radio" class="radio" name="metode" value="BCA Virtual Account"> BCA Virtual Account <img src="/assets/images/icon/bca.png" ></div>
                        <div class="list-pembayaran"><input type="radio" class="radio" name="metode" value="BRI Virtual Account"> BRI Virtual Account <img src="/assets/images/icon/bri.png" ></div>
                        <div class="list-pembayaran"><input type="radio" class="radio" name="metode" value="GoPay"> GoPay <img src="/assets/images/icon/gopay.png" ></div>
                      </div>
                    </div>
                  </div>


                <label for="kota" class="mt-4">lokasi<span class="text-danger">*</span></label>
                <div class="d-flex">
                    <div style="background-color: #E9E9E9; padding: 14px 15px 17px 14px;" class="label-img"><img
                            src="{{ asset('assets/images/icon/kota.png') }}" style="width: 25px" class="icon-labelinput">
                    </div>

                    <button id="pilihKotaButton" class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample" style="border: 2px solid #E9E9E9; padding: 15px; border-radius: 0px 8px 8px 0px; width: 100%;">
                        Pilih Kota Anda
                    </button>
                </div>
                <div class="collapse" id="collapseExample2">
                    <div class="dalam2 card-body">
                        Yogyakarta <input type="radio" name="option" value="Yogyakarta" style="float: Right;"><br>
                        Jawa Tengah <input type="radio" name="option" value="Jawa Tengah" style="float: Right;"><br>
                        Jawa Barat <input type="radio" name="option" value="Jawa Barat" style="float: Right;"><br>
                        Jawa Timur <input type="radio" name="option" value="Jawa Timur" style="float: Right;"><br>
                    </div>
                </div>



                <div class="button-container">
                    <button class="border-0 mt-5 fs-5 fw-semibold"
                        style="background-color: #A61C1CE5; color: white; padding: 12px 32px; border-radius: 20px;"
                        type="button" data-bs-toggle="modal" data-bs-target="#modalCheckout">Check
                        Out</button>
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
            collapseExample.classList.remove('show'); // Menghilangkan kelas 'show' dari elemen collapse
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

@endsection
