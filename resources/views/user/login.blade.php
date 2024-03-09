@extends('layouts.user')

@section('content')
    <div class="login-layout">
        <div>
            <img src="{{ asset('assets/images/bg-login.png') }}" class="bg-login">
            <img src="{{ asset('assets/images/logo-login.png') }}" class="logo">
        </div>
        <div class="content-login">
            <div class="form-login">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    class="bi bi-lock-fill" viewBox="0 0 16 16">
                    <path
                        d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2" />
                </svg>
                <h2 class="heading-login">Log In</h2>
                <h5 class="heading-login1">Hi Welcome Back</h5>
                <h5 class="subhead">Log in to continue</h5>
            </div>
            <form class="content-form">
                <label for="email" class="label-form">Username/Email</label>
                <div class="d-flex">
                    <input type="email" name="email"
                        style="border: 0.5px solid #00000075; padding: 10px; border-radius: 4px; width: 100%;"
                        placeholder="Masukkan username / email">
                </div>

                <label for="password" class="label-form">Password</label>
                <div class="d-flex">
                    <input type="password" name="password"
                        style="border: 0.5px solid #00000075; padding: 10px; border-radius: 4px; width: 100%;"
                        placeholder="Masukkan password">
                </div>

                <div class="remember">
                    <div class="d-flex"><input type="checkbox" name="remember" id="remember" class="me-2"
                            style="color: #A61C1CE5;">
                        <label for="remember" class="mb-0">Ingat saya</label>
                    </div>
                    <p class="ms-auto mb-0">Lupa kata sandi? <a href="/user/reset-password" class="text-decoration-none"
                            style="color:#A61C1CE5;">Reset</a></p>
                </div>

                <div class="button-container text-center">
                    <button class="reg-button border-0 my-4 shadow fw-semibold">Log In</button>
                    <p style="margin-bottom: -20px; font-size: 12px">Belum punya akun? <a href="/user/register"
                            class="text-decoration-none" style="color: #A61C1CE5;">Daftar</a></p>
                </div>
            </form>
        </div>
    </div>
@endsection
