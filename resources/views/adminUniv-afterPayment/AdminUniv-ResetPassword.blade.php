<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset</title>
    <link href="/assets/css/resetPass.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2632061c04.js" crossorigin="anonymous"></script>
</head>

<body>
    <a href="/AdminUniv-Login"><button class="kembali"><i class="fa-solid fa-angle-left"></i>Kembali ke halaman
            utama</button></a>
    <div class="wadah justify-content-center">
        <div class="judul">Reset Password</div>
        <div class="teks">
            <div class="">Masukkan email yang ditautkan ke akun Anda.</div>
            <div class="">Kami akan mengirimkan email konfirmasi untuk mengubah kata sandi Anda.</div>
        </div>

        <form action="{{ route('login.admin.reset') }}" method="POST">
            @csrf
            <input type="text" name="email" id="email" placeholder="masukkan email" oninput="validateEmail()">
            <div class="bawah">
                <a href="/AdminUniv-InputOTP" style="text-decoration: none;" id="kirim-otp" type="submit"><button
                        class="continue">
                        Continue</button></a>
            </div>
        </form>


    </div>

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
</body>

</html>
