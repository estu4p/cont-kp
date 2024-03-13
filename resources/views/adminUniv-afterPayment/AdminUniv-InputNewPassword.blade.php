<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Input dengan Icon Mata Menggunakan Bootstrap Icons</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="/assets/css/AdminUniv-InputNewPassword.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2632061c04.js" crossorigin="anonymous"></script>
</head>

<body>


    <div class="wadah justify-content-center">
        <div class="judul">Buat Password Baru</div>
        <div class="teks">
            <div class="">Password baru harus berbeda dari password sebelumnya.</div>
        </div>

        <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="input-group">
                    <input type="password" id="password" class="form-control" placeholder="Ketikkan password baru">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                            <span id="eyeIcon" class="bi bi-eye"></span>
                        </button>
                    </div>
                </div>
                <div class="input-group atas">
                    <input type="password" id="password" class="form-control" placeholder="Konfirmasi password">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                            <span id="eyeIcon" class="bi bi-eye"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div> 
        <div class="bawah">
            <button class="continue">Reset Password</button>
        </div>

    </div>
    
    <script>
        const eyeIcon = document.getElementById('eyeIcon');
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordField = document.getElementById('password');

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.classList.remove('bi-eye');
                eyeIcon.classList.add('bi-eye-slash');
            } else {
                passwordField.type = 'password';
                eyeIcon.classList.remove('bi-eye-slash');
                eyeIcon.classList.add('bi-eye');
            }
        });
    </script>
</body>

</html>