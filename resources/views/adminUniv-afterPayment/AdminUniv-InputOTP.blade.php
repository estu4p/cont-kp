<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input OTP</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/AdminUniv-InputOTP.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/2632061c04.js" crossorigin="anonymous"></script>
</head>

<body>
    <a href="/AdminUniv-ResetPassword"><button class="kembali"><i class="fa-solid fa-angle-left"></i></button></a>
    <div class="wadah justify-content-center">
        <div class="judul">
            <i class="fa-solid fa-clock-rotate-left iconreset"></i>
        </div>
        <div class="teks">
            <div class="">Masukkan 4 digit kode OTP yang telah kami kirimkan ke email Anda.</div>
        </div>

        <div class="form-group otp-container">
            <input type="text" class="form-control otp-input" id="otp1" maxlength="1"
                oninput="moveToNextInput(this, 'otp2')" required>
            <input type="text" class="form-control otp-input" id="otp2" maxlength="1"
                oninput="moveToNextInput(this, 'otp3')" required>
            <input type="text" class="form-control otp-input" id="otp3" maxlength="1"
                oninput="moveToNextInput(this, 'otp4')" required>
            <input type="text" class="form-control otp-input" id="otp4" maxlength="1"
                oninput="moveToNextInput(this, null)" required>
        </div>
        <div class="bawah">
            <a href="/AdminUniv-InputNewPassword" style="text-decoration: none;"><button class="continue">Verify
                    Now</button></a>
        </div>
        <div class="belum">
            Belum menerima email? <a href="/AdminUniv-ResetPassword"><span class="ulang">Kirim ulang</span> </a>
        </div>
    </div>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function moveToNextInput(currentInput, nextInputId) {
            var maxLength = parseInt(currentInput.getAttribute('maxlength'));
            var currentLength = currentInput.value.length;

            if (currentLength >= maxLength) {
                if (nextInputId) {
                    document.getElementById(nextInputId).focus();
                } else {
                    currentInput.blur(); // Optional: Blur the last input when all digits are entered
                }
            }
        }
    </script>

</body>

</html>
