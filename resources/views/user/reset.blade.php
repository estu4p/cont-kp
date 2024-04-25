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
            <h2 class="fw-bold text-capitalize" style="color: #A61C1CE5">reset password</h2>
            <p>Masukan alamat E-Mail anda untuk melakukan proses reset password</p>
            <form method="POST" action="{{ route('password.reset') }}">
                @csrf
                <input type="text" name="email" id="email" placeholder="Masukan alamat E-Mail"
                    oninput="validateEmail()">
                @if (session('error'))
                <div class="alert alert-danger"
                    style="font-family: 'Times New Roman', Times, serif; font-size: 15px; max-width: 400px; margin: 0 auto;">
                    {{ session('error') }}
                </div>
                @endif
                <div class="button-container text-center">
                    <div class="mt-5">
                        <button id="kirim-otp" type="submit"
                            class="reg-button border-0 shadow fw-semibold text-decoration-none"
                            style="background-color: #A61C1CE5; padding: 15px 80px; pointer-events: none; opacity: 0.5;">Kirim
                            OTP</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <script>
        function validateEmail() {
            var emailInput = document.getElementById('email').value;
            var kirimOtpButton = document.getElementById('kirim-otp');

            if (emailInput.trim() === '') {
                kirimOtpButton.setAttribute('disabled', true);
                kirimOtpButton.style.pointerEvents = 'none'; // disable click event
                kirimOtpButton.style.opacity = '0.5'; // reduce opacity
            } else {
                kirimOtpButton.removeAttribute('disabled');
                kirimOtpButton.style.pointerEvents = 'auto'; // enable click event
                kirimOtpButton.style.opacity = '1'; // reset opacity
            }
        }
    </script>
@endsection
