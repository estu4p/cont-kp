<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loginsuperadmin</title>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="/assets/css/AdminUniv-Login.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2632061c04.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-md-8 row justify-content-center">
                <p class=" text-center login">Log In</p>
                <div class="card   col-7 p-0" data-aos="zoom-in" data-aos-duration="1000">
                    <div class="logo">
                        <img src="/assets/images/logo.png" alt="Logo" class="logo">
                    </div>

                    <div class="card-body row w-100 px-md-4 py-md-0 px-lg-4 py-lg-4  justify-content-center ">
                        <div class="container">
                            <form action="{{ route('login.admin') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="email" class="email">Email<span class="red-star">*</span></label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i
                                                class="fa-regular fa-envelope icon"></i></span>
                                        <input type="email" class="form-control" placeholder="Email"
                                            aria-label="email" aria-describedby="addon-wrapping" name="email">
                                        </div>
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                @foreach ($errors->all() as $error)
                                                    <p>{{ $error }}</p>
                                                @endforeach

                                            </div>
                                        @endif
                                    <label for="password">Password<span class="red-star">*</span></label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i
                                                class="fa-solid fa-lock icon"></i></span>
                                        <input type="password" class="form-control" placeholder="Password"
                                            aria-label="password" aria-describedby="addon-wrapping" name="password">
                                    </div>
                                </div>
                                <div class="d-flex gap-0 justify-content-between row flex-row">
                                    <div class="form-check d-flex align-items-start col-5 gap-2  ">
                                        <input type="checkbox" class="form-check-input cekbok m-0" id="remember">
                                        <label class="form-check-label fz7 " for="remember">Ingatkan saya</label>
                                    </div>
                                    <div
                                        class="kanan d-flex align-items-start justify-content-end gap-2 flex-row col-7 ">
                                        <p class="fz7 "> Lupa password? <a href="/superAdmin/login/reset"
                                                class="btn btn-link fz9  " style="text-decoration: none;">reset</a> </p>
                                    </div>
                                </div>
                                <div class="form-group text-center">

                                    <button id="login-btn" type="submit" class="btn btn-secondary">
                                        Login as Super Admin
                                    </button>
                                    <div id="role-error" class="alert alert-danger" style="display: none;">
                                        Anda tidak diizinkan untuk melakukan login.
                                    </div>

                                    <div class="d">
                                        Belum punya akun? <a href="#" class="daftar">Daftar</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <script>
        document.getElementById('login-btn').addEventListener('click', function(event) {
            var role_id = {{ Auth::check() ? Auth::user()->role_id : -1 }};
            if (role_id == 3 || role_id == 2 || role_id == 4 || role_id == 5 || role_id == 6) {
                document.getElementById('role-error').style.display = 'block';
                event.preventDefault(); // Mencegah formulir untuk disubmit
            }
        });
    </script>
</body>

</html>
