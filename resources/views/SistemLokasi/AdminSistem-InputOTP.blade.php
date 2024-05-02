<link rel="stylesheet" href="{{ asset('assets/css/AdminSistem/AdminSistem-inputOTP.css') }}">
<div class="kembali">
    <a href="/user-AdminSistem/resetpassword"><img src="/assets/images/left.png"></a>
</div>
<div class="gambarreload">
    <img src="/assets/images/reload.png">
</div>
<div class="perintah">
    <p>Masukkan 4 digit kode OTP yang telah kami kirimkan ke email Anda.</p>
</div>
<form action="{{ route('otp.verifyAdminSistem') }}" method="POST">
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
<div class="tombol-Continue">
    <button type="submit" class="botton">Verify Now</button>
</div>
</form>

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

