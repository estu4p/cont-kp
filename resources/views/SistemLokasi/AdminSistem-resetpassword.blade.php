<link rel="stylesheet" href="{{ asset('assets/css/AdminSistem/resetpassword.css') }}">
<div class="kembali">
    <a href="/user-AdminSistem/login"><img src="/assets/images/left.png"></a> Kembali ke halaman utama
</div>
<div class="hiding">
    <h1>Reset Password</h1>
    <p>Masukkan email yang ditautkan ke akun Anda. <br>
       Kami akan mengirimkan email konfirmasi untuk mengubah kata sandi Anda.</p>
</div>
<form action="{{ route('password.resetAdminSistem') }}" method="POST">
    @csrf
    <div class="konfirmasi-email">
        <input type="email" name="email" placeholder="Masukkan email Anda" class="inputt"  oninput="validateEmail()">
        @error('email')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="tombol-Continue">
        <button type="submit" class="botton" id="kirim-otp">Continue</button>
    </div>
</form>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
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
