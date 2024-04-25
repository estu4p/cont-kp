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
    <a href="/superAdmin/login/reset"><button class="kembali"><i class="fa-solid fa-angle-left"></i></button></a>
    <div class="wadah justify-content-center">
        <div class="judul">
            <i class="fa-solid fa-clock-rotate-left iconreset"></i>
        </div>
        <div class="teks">
            <div class="">Masukkan 4 digit kode OTP yang telah kami kirimkan ke email Anda.</div>
        </div>
        <form action="{{ route('otp.verifySuperAdmin') }}" method="POST">
            @csrf
            <div class="form-group otp-container">
                <input type="text" name="digit1" class="form-control otp-input" id="otp1" maxlength="1"
                    oninput="moveToNextInput(this, 'otp2')" required>
                <input type="text" name="digit2" class="form-control otp-input" id="otp2" maxlength="1"
                    oninput="moveToNextInput(this, 'otp3')" required>
                <input type="text" name="digit3" class="form-control otp-input" id="otp3" maxlength="1"
                    oninput="moveToNextInput(this, 'otp4')" required>
                <input type="text" name="digit4" class="form-control otp-input" id="otp4" maxlength="1"
                    oninput="moveToNextInput(this, null)" required>
            </div>
            <div class="alert"
                style="font-family: 'Times New Roman', Times, serif; font-size: 15px; max-width: 400px; margin: 0 auto;">
                {{ session('error') }}
            </div>
            <div class="bawah">
                <button type="submit" style="text-decoration: none;"
                    class="continue">Verify Now</button>
            </div>
            <div class="belum">
                Belum menerima email? <span class="ulang">Kirim ulang</span>
            </div>
        </form>
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
