<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Input dengan Icon Mata Menggunakan Bootstrap Icons</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="/assets/css/AdminUniv-InputNewPassword.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2632061c04.js" crossorigin="anonymous"></script>
    <style>
        .error-message {
            color: #dc3545;
            font-size: 80%;
            display: none;
        }
    </style>
</head>

<body>
    <div class="wadah justify-content-center">
        <form action="{{ route('password.newSuperAdmin') }}" method="POST" onsubmit="return validatePassword()">
            @csrf
            <div class="judul">Buat Password Baru</div>
            <div class="teks">
                <div class="">Password baru harus berbeda dari password sebelumnya.</div>
            </div>

            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="input-group">
                            <input type="password" id="password" class="form-control" name="password"
                                placeholder="Ketikkan password baru">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary toggle-password" type="button">
                                    <span class="eye-icon bi bi-eye"></span>
                                </button>
                            </div>
                        </div>
                        <div class="input-group atas">
                            <input type="password" id="konfirm" class="form-control" name="password_confirmation"
                                placeholder="Konfirmasi password">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary toggle-password" type="button">
                                    <span class="eye-icon bi bi-eye"></span>
                                </button>
                            </div>
                        </div>
                        <!-- Tambahkan pesan kesalahan -->
                        <div class="error-message" id="passwordMatchError">Password dan konfirmasi password harus sama.
                        </div>
                    </div>
                </div>
            </div>
            <div class="bawah">
                <button type="submit" class="continue">Reset Password</button>
            </div>
        </form>
    </div>

    <script>
        const togglePasswordButtons = document.querySelectorAll('.toggle-password');

        togglePasswordButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                const passwordField = button.parentElement.previousElementSibling;

                if (passwordField.type === 'password') {
                    passwordField.type = 'text';
                    button.querySelector('.eye-icon').classList.remove('bi-eye');
                    button.querySelector('.eye-icon').classList.add('bi-eye-slash');
                } else {
                    passwordField.type = 'password';
                    button.querySelector('.eye-icon').classList.remove('bi-eye-slash');
                    button.querySelector('.eye-icon').classList.add('bi-eye');
                }
            });
        });

        function validatePassword() {
            var passwordInput = document.getElementById('password').value;
            var konfirmInput = document.getElementById('konfirm').value;
            var errorText = document.getElementById('passwordMatchError');

            // Periksa panjang password
            if (passwordInput.length < 8) {
                errorText.innerText = "Password harus memiliki panjang minimal 8 karakter.";
                errorText.style.display = 'block';
                return false; // Mencegah pengiriman formulir jika password kurang dari 8 karakter
            }

            // Periksa kesamaan password dan konfirmasi password
            if (passwordInput !== konfirmInput) {
                errorText.innerText = "Password dan konfirmasi password harus sama.";
                errorText.style.display = 'block';
                return false; // Mencegah pengiriman formulir jika password tidak cocok
            } else {
                errorText.style.display = 'none';
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
                const urlLoginAdmin = "{{ route('login.superadmin') }}"
                window.location.href = urlLoginAdmin
            }, 2000);
        }
    </script>

</body>

</html>
