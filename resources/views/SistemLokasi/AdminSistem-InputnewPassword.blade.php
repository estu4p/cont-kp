<link rel="stylesheet" href="{{ asset('assets/css/AdminSistem/AdminSistem-inputnewpassword.css') }}">
<div class="content">
    <h1>Buat Password baru</h1>
    <p>Password baru harus berbeda dari password sebelumnya.</p>
</div>
<div class="inputan">
    <form method="POST" action="{{ route('password.newAdminSistem') }}" onsubmit="return validatePassword()">
        @csrf
        <input id="password" type="password" placeholder="Ketikkan password baru" name="password" class="passwordbaru"><br>
        <input id="password_confirmation" type="password" placeholder="Konfirmasi password baru" name="password_confirmation" class="passwordbaru"><br>
        <p id="passwordMatchError" style="color: red; display: none;">Password dan konfirmasi password harus sama.</p>
        <p id="passwordLengthError" style="color: red; display: none;">Password harus memiliki panjang minimal 8 karakter.</p>
        <br>
        <button type="submit" class="botton">Reset Password</button>
    </form>
</div>

<script>
    function validatePassword() {
        var passwordInput = document.getElementById('password').value;
        var konfirmInput = document.getElementById('password_confirmation').value;
        var errorTextMatch = document.getElementById('passwordMatchError');
        var errorTextLength = document.getElementById('passwordLengthError');

        // Periksa panjang password
        if (passwordInput.length < 8) {
            errorTextLength.style.display = 'block';
            errorTextMatch.style.display = 'none'; // Sembunyikan pesan kesalahan kecocokan password jika ada
            return false; // Mencegah pengiriman formulir jika password kurang dari 8 karakter
        } else {
            errorTextLength.style.display = 'none'; // Sembunyikan pesan kesalahan panjang password jika ada
        }

        // Periksa kesamaan password dan konfirmasi password
        if (passwordInput !== konfirmInput) {
            errorTextMatch.style.display = 'block';
            return false; // Mencegah pengiriman formulir jika password tidak cocok
        } else {
            errorTextMatch.style.display = 'none'; // Sembunyikan pesan kesalahan kecocokan password jika ada
            showSuccessModal(); // Panggil modal sukses jika password cocok
            return true; // Lanjutkan pengiriman formulir jika password cocok
        }
    }

    function showSuccessModal() {
        swal({
            title: "Berhasil!",
            text: "Password berhasil diubah silahkan login kembali",
            icon: "success",
            buttons: false // Tidak menampilkan tombol OK
        });
        setTimeout(function() {
            const urlLoginAdmin = "{{ route('login') }}"
            window.location.href = urlLoginAdmin
        }, 2000);
    }
</script>
