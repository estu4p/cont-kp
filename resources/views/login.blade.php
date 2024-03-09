<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="/assets/css/login.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2632061c04.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-md-8 row justify-content-center">
                <div class="card   col-7 p-0" data-aos="zoom-in" data-aos-duration="1000">
                    <div class="card-header d-flex flex-column justify-content-center  py-2 gap-2" style="color: #660708">
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
                                        <p class="fz7 "> Lupa password? <a href="#" class="btn btn-link fz9 ">Hubungi admin</a> </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <a href="/dashboard">
                            <button type="submit" class="btn btn-primary">
                                Login as Contributor
                            </button>
                        </a>
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