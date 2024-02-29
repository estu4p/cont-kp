<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
            background-color: #f7f7f7;
            border-bottom: 1px solid #ccc;
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
            border-radius: 5px;
            font-size: 16px;
            margin-top: 5px;
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
            background-color: #6C757D;
            color: #fff;
        }

        button:hover {
            background-color: #286090;
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
</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="color: #660708" >Log In</div>
                    <div class="card-body">
                        <form action="" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="username_email">Username/Email</label>
                                <input id="username_email" type="text" class="form-control @error('username_email') is-invalid @enderror" name="username_email" value="{{ old('username_email') }}" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="password">Kata Sandi</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            </div>
                            <div class="form-group d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember_me" id="remember_me">
                                    <label class="form-check-label" for="remember_me">
                                        Ingat Saya
                                    </label>
                                </div>
                                <div>
                                    Lupa Kata Sandi? <a class="btn btn-link" href="#" style="color: #660708;" >Hubungi admin</a>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">
                            Login as Contributor
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
