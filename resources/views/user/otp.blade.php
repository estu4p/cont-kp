@extends('layouts.user')

@section('content')
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="box-reset">
            <a href="/user/login" class="close-button">
                <div
                    style="background-color: #A61C1CE5; width: 30px; height: 30px; border-radius: 50%; display: flex; justify-content: center; align-items: center;">
                    <i class="fas fa-times" style="color: white; font-size: 20px;"></i>
                </div>
            </a>
            <h2 class="fw-bold text-capitalize" style="color: #A61C1CE5">verifikasi code</h2>
            <p class="w-75 mx-auto fw-semibold mt-4 fs-6 mb-5">Masukan 4 digit kode OTP yang dikirimkan melalui E-Mail</p>
            <form method="POST" action="{{ route('otp.verify') }}">
                @csrf
                <div class="d-flex justify-content-center">
                    <input type="text" name="digit1" maxlength="1" class="form-control text-center shadow-sm"
                        style="width: 3.2rem; height: 3.2rem; margin: 0 12px; text-align: center; font-size: 1.2rem; background-color: #eceff2; border: 0;"
                        id="otp1" oninput="moveToNext(this); validateOTP()" />
                    <input type="text" name="digit2" maxlength="1" class="form-control text-center shadow-sm"
                        style="width: 3.2rem; height: 3.2rem; margin: 0 12px; text-align: center; font-size: 1.2rem; background-color: #eceff2; border: 0;"
                        id="otp2" oninput="moveToNext(this); validateOTP()" />
                    <input type="text" name="digit3" maxlength="1" class="form-control text-center shadow-sm"
                        style="width: 3.2rem; height: 3.2rem; margin: 0 12px; text-align: center; font-size: 1.2rem; background-color: #eceff2; border: 0;"
                        id="otp3" oninput="moveToNext(this); validateOTP()" />
                    <input type="text" name="digit4" maxlength="1" class="form-control text-center shadow-sm"
                        style="width: 3.2rem; height: 3.2rem; margin: 0 12px; text-align: center; font-size: 1.2rem; background-color: #eceff2; border: 0;"
                        id="otp4" oninput="validateOTP()" />
                </div>
                <div class="alert"
                    style="font-family: 'Times New Roman', Times, serif; font-size: 15px; max-width: 400px; margin: 0 auto;">
                    {{ session('error') }}
                </div>
                <div class="button-container text-center">
                    <div class="mt-5">
                        <button id="kirim-otp" type="submit"
                            class="reg-button border-0 shadow fw-semibold text-decoration-none"
                            style="background-color: #A61C1CE5; padding: 15px 80px; pointer-events: none; opacity: 0.5;">Kirim
                            OTP</button>
                        <p class="mt-5 fw-medium" style="margin-bottom: -20px;">Belum menerima email? <a
                                href="/user/reset-password" class="text-decoration-none" style="color: #A61C1CE5;">Kirim
                                ulang</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <script>
        function moveToNext(input) {
            // Get the current input's length
            const length = input.value.length;

            // If the input is filled, move focus to the next input
            if (length === 1) {
                const nextId = input.id.substring(0, input.id.length - 1) + (parseInt(input.id.slice(-1)) + 1);
                const nextInput = document.getElementById(nextId);

                if (nextInput) {
                    nextInput.focus();
                }
            }
        }

        function validateOTP() {
            var otp1 = document.getElementById('otp1').value;
            var otp2 = document.getElementById('otp2').value;
            var otp3 = document.getElementById('otp3').value;
            var otp4 = document.getElementById('otp4').value;
            var kirimOtpButton = document.getElementById('kirim-otp');

            if (otp1 && otp2 && otp3 && otp4) {
                kirimOtpButton.removeAttribute('disabled');
                kirimOtpButton.style.pointerEvents = 'auto'; // enable click event
                kirimOtpButton.style.opacity = '1'; // reset opacity
            } else {
                kirimOtpButton.setAttribute('disabled', true);
                kirimOtpButton.style.pointerEvents = 'none'; // disable click event
                kirimOtpButton.style.opacity = '0.5'; // reduce opacity
            }
        }
    </script>
@endsection
