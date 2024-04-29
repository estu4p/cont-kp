<link rel="stylesheet" href="{{ asset('assets/css/AdminSistem/AdminSistem-login.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<div class="Rectangle">
    <div class="ikon"><img src="/assets/images/gembok.png"></div>
    <div class="heading">
        <p class="style_heading">Log In</p>
    </div>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p class="text-danger">{{ $error }}</p>
        @endforeach
        @endif

        <div style=" display: flex; flex-direction: column;">
            <label class="username">Username/Email</label>
            <input type="text" class="inputt" name="email" placeholder="Masukkan username / email">

        </div>
        <br>
        <div style=" display: flex; flex-direction: column;">
            <label class="username">Password</label>
            <input type="password" class="inputt" name="password" placeholder="Masukkan password">

        </div>
        <br>
        <div style="display: flex; justify-content: space-between;">
            <div class="pengingat">
                <input type="checkbox" name="remember">
                <p> ingatkan saya</p>
            </div>
            <div class="resetsandi">
                <p>Lupa kata sandi? <a href="/user-AdminSistem/resetpassword" style="color: #660708">Reset</a></p>
            </div>
        </div>
        <br>
        <div style="text-align:center">
            <button type="submit" class="TombolLogin">Login as Administrator</button>
        </div>
    </form>
    <div class="daftarakun">
        <p>Belum punya akun? <a href="#" style="color: #660708">Daftar</a> </p>
    </div>
</div>
