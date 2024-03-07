<!DOCTYPE html>
<html lang="id">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="{{ asset('assets/css/login.css') }}" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: sans-serif;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 750px;
            margin: 0 auto;
        }

        .card {
            margin-top: 50px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        .card-header {
            font-weight: bold;
            text-align: center;
            color: #333;
            /* background-color: #f7f7f7; */
            /* border-bottom: 1px solid #ccc; */
            padding: 10px;
            width: 100%;
            font-size: 30px;
        }

        form {
            margin-top: 20px;
            width: 100%;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            width: 100%;
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 14px;
            margin-top: 10px;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #999;
        }

        button {
            margin-top: 10px;
            padding: 10px 20px;
            font-weight: bold;
            border: 1px solid #ccc;
            border-radius: 5px;
            cursor: pointer;
            background-color: #286090;
            color: #fff;
        }

        button:hover {
            background-color: #6C757D;
        }

        a {
            text-decoration: none;
            color: #333;
        }

        a:hover {
            text-decoration: underline;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
        }

        @media (max-width: 768px) {
            .container {
                width: 100%;
            }
        }
    </style>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="/assets/css/login.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2632061c04.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header" style="color: #660708">
                        <ul><img src="/assets/icon-login.png" alt=></ul>Log In
                    </div>
                    <div class="card-body">
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="email">Username/Email</label>
                                <input id="email" type="text"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="password">Kata Sandi</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">
                            </div>
                            <div class="form-group d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember_me"
                                        id="remember_me">Ingatkan Saya
                                </div>
                                <div>
                                    Lupa Kata Sandi? <a class="btn btn-link" href="#"
                                        style="color: #660708;">Hubungi admin</a>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary">
                                    Login as Contributor
                                </button>
                            </div>
                        </form>

            <div class="col-md-8 row justify-content-center"> 
                <div class="card   col-7 p-0" data-aos="zoom-in" data-aos-duration="2000">
                    <div class="card-header d-flex flex-column justify-content-center  py-2 gap-2" style="color: #660708"  >
                        <i class="fa-solid fa-lock text-center"></i>
                        <p class=" text-center">Log In</p>
                    </div>
                    <div class="card-body row w-100 p-5 justify-content-center ">
                        <div class="container">
                            <form>
                                <div class="form-group">
                                    <label for="username">Username/Email</label>
                                    <input type="text" class="form-control" id="username" placeholder="Masukan Username / Email">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" placeholder="Masukan Password">
                                </div>
                                <div class="d-flex gap-0 justify-content-between row flex-row">
                                    <div class="form-check d-flex align-items-start col-5 gap-2  ">
                                        <input type="checkbox" class="form-check-input m-0" id="remember">
                                        <label class="form-check-label fz7 " for="remember">Ingatkan saya</label>
                                    </div>
                                    <div class="kanan d-flex align-items-start justify-content-end gap-2 flex-row col-7 ">
                                        <p class="fz7 ">   Lupa password? <a href="#" class="btn btn-link fz9 ">Hubungi admin</a> </p>
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>


</html>

</html>

