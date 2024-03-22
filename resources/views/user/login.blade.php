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
            <form class="content-form" action="{{ route('user.login') }}" method="POST">
                @csrf
                <label for="email" class="label-form">Username/Email</label>
                <div style="height: 36px;">
                    <input type="email" name="email"
                        style="border: 0.5px solid #00000075; padding: 8px 10px; border-radius: 4px; width: 100%;"
                        placeholder="Masukkan username / email" value="">
                    <small id="warn-email" class="text-warning bg-warning-subtle py-1 px-2 text-capitalize d-none"
                        style="font-size: 12px; border-radius: 40px;"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                            height="16" fill="currentColor" class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4m.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2" />
                        </svg>  email tidak diketahui</small>
                </div>

                <label for="password" class="label-form">Password</label>
                <div style="height: 40px;">
                    <input type="password" name="password"
                        style="border: 0.5px solid #00000075; padding: 8px 10px; border-radius: 4px; width: 100%;"
                        placeholder="Masukkan password">
                        <small id="warn-password" class="text-danger bg-danger-subtle py-1 px-2 text-capitalize d-none"
                        style="font-size: 12px; border-radius: 40px;"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                            height="16" fill="currentColor" class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4m.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2" />
                        </svg>  password harus lebih dari 8 karakter</small>
                </div>

                <div class="remember">
                    <div class="d-flex"><input type="checkbox" name="remember" id="remember" class="me-2"
                            style="color: #A61C1CE5;">
                        <label for="remember" class="mb-0">Ingat Saya</label>
                    </div>
                    <p class="ms-auto mb-0">Lupa kata sandi? <a href="/user/reset-password" class="text-decoration-none"
                            style="color:#A61C1CE5;">Reset</a></p>
                </div>

                <div class="button-container text-center">
                    <button type="submit" class="reg-button border-0 my-4 shadow fw-semibold">Log In</button>
                    <p style="margin-bottom: -20px; font-size: 12px; font-weight: 400;">Belum punya akun? <a href="/user/register"
                            class="text-decoration-none fw-bold" style="color: #A61C1CE5;">Daftar</a></p>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const emailInput = document.querySelector('input[name="email"]');
            const warnEmail = document.getElementById('warn-email');
            const passwordInput = document.querySelector('input[name="password"]');
            const warnPassword = document.getElementById('warn-password');

            emailInput.addEventListener('input', function () {
                const enteredEmail = this.value.trim();
                const correctEmail = "{{ $email }}";

                if (enteredEmail !== correctEmail) {
                    warnEmail.classList.remove('d-none');
                } else {
                    warnEmail.classList.add('d-none');
                }
            });

            passwordInput.addEventListener('input', function () {
                const enteredPassword = this.value.trim();

                if (enteredPassword.length < 8) {
                    warnPassword.classList.remove('d-none');
                } else {
                    warnPassword.classList.add('d-none');
                }
            });
        });
    </script>
@endsection
