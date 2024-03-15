@extends('layouts.user')

@section('content')
    <div class="login-layout">
        <div>
            <img src="{{ asset('assets/images/bg-login.png') }}" class="bg-login">
            <img src="{{ asset('assets/images/logo-login.png') }}" class="logo">
        </div>
        <div class="content-login">
            <h2 class="header-reg fw-bold text-uppercase text-center mt-2 pt-4">register</h2>
            <h2 class="header-reg1 fw-bold text-capitalize text-center mt-2 pt-4">register</h2>
            <form class="content-form text-capitalize">
                <label for="nama" class="mt-2 mb-2">nama lengkap<span class="text-danger">*</span></label>
                <div class="d-flex">
                    <input type="text" name="nama"
                        style="border: 0.5px solid #00000075; padding: 6px 10px; border-radius: 4px; width: 100%; font-size: 12px;"
                        placeholder="Masukkan username / email">
                </div>

                <label for="nim" class="mt-2 fw-5 mb-2">nomor induk mahasiswa<span class="text-danger">*</span></label>
                <div class="d-flex">
                    <input type="number" name="nim"
                        style="border: 0.5px solid #00000075; padding: 6px 10px; border-radius: 4px; width: 100%; font-size: 12px;"
                        placeholder="Contoh : 2000018046">
                </div>

                <label for="prodi" class="mt-2 fw-5 mb-2">program studi/jurusan<span class="text-danger">*</span></label>
                <div class="d-flex">
                    <input type="text" name="prodi"
                        style="border: 0.5px solid #00000075; padding: 6px 10px; border-radius: 4px; width: 100%; font-size: 12px;"
                        placeholder="Contoh : S1 Informatika">
                </div>

                <label for="email" class="mt-2 fw-5 mb-2">e-mail<span class="text-danger">*</span></label>
                <div class="d-flex">
                    <input type="email" name="email"
                        style="border: 0.5px solid #00000075; padding: 6px 10px; border-radius: 4px; width: 100%; font-size: 12px;"
                        placeholder="Contoh : raihan@gmail.com">
                </div>

                <label for="username" class="mt-2 fw-5 mb-2">username<span class="text-danger">*</span></label>
                <div class="d-flex">
                    <input type="text" name="username"
                        style="border: 0.5px solid #00000075; padding: 6px 10px; border-radius: 4px; width: 100%; font-size: 12px;"
                        placeholder="Contoh : raihan01">
                </div>

                <label for="hp" class="mt-2 fw-5 mb-2">no hp<span class="text-danger">*</span></label>
                <div class="d-flex">
                    <input type="number" name="hp"
                        style="border: 0.5px solid #00000075; padding: 6px 10px; border-radius: 4px; width: 100%; font-size: 12px;"
                        placeholder="Contoh : 08224113722">
                </div>

                <label for="password" class="mt-2 fw-5 mb-2">password</label>
                <div class="d-flex">
                    <input type="password" name="password"
                        style="border: 0.5px solid #00000075; padding: 6px 10px; border-radius: 4px; width: 100%; font-size: 12px;"
                        placeholder="Masukkan Password">
                </div>

                <label for="password" class="mt-2 fw-5 mb-2">konfirmasi password</label>
                <div class="d-flex">
                    <input type="password" name="password"
                        style="border: 0.5px solid #00000075; padding: 6px 10px; border-radius: 4px; width: 100%; font-size: 12px;"
                        placeholder="Konfirmasi password">
                </div>

                <div class="button-container text-center">
                    <button id="registerButton" class="reg-button border-0 mt-4 shadow fw-semibold" disabled>Daftar</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function checkInputs() {
            const inputs = document.querySelectorAll(
                'input[type="text"], input[type="number"], input[type="email"], input[type="password"]');
            let allFilled = true;

            inputs.forEach(input => {
                if (input.value.trim() === '') {
                    allFilled = false;
                }
            });

            const registerButton = document.getElementById('registerButton');
            registerButton.disabled = !allFilled;
        }

        document.addEventListener('DOMContentLoaded', function() {
            checkInputs();

            const inputs = document.querySelectorAll(
                'input[type="text"], input[type="number"], input[type="email"], input[type="password"]');

            inputs.forEach(input => {
                input.addEventListener('input', checkInputs);
            });
        });
    </script>
@endsection
