@extends('layouts.user')

@section('content')
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="box-reset">
        <a href="/user/login" class="close-button">
            <div style="background-color: #A61C1CE5; width: 30px; height: 30px; border-radius: 50%; display: flex; justify-content: center; align-items: center;">
                <i class="fas fa-times" style="color: white; font-size: 20px;"></i>
            </div>
        </a>
        <h2 class="fw-bold text-capitalize" style="color: #A61C1CE5">buat password baru</h2>
        <p>Buat password baru untuk akunmu</p>
        <form method="POST" action="{{ route('password.new') }}">
            @csrf
            <input type="password" name="password" id="password" placeholder="Password baru" oninput="validatePassword()">
            <input type="password" name="password_confirmation" id="konfirm" placeholder="Konfirmasi Password baru" style="margin-top: 0; margin-bottom: 0;" oninput="validatePassword()">
            <small id="passwordMatchError" class="text-danger" style="display: none;">Password dan konfirmasi password harus sama!</small>
            <div class="button-container text-center">
                <div class="my-5">
                    <button id="change" type="submit" class="reg-button border-0 shadow fw-semibold text-decoration-none" style="background-color: #A61C1CE5; padding: 15px 60px; pointer-events: none; opacity: 0.5;">Reset Password</button>
                </div>
            </div>  
        </form>
    </div>
</div>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

<script>
    function validatePassword() {
        var passwordInput = document.getElementById('password').value;
        var konfirmInput = document.getElementById('konfirm').value;
        var resetButton = document.getElementById('change');
        var errorText = document.getElementById('passwordMatchError');

        if (passwordInput.length >= 8 && konfirmInput.length >= 8 && passwordInput === konfirmInput) {
            resetButton.removeAttribute('disabled');
            resetButton.style.pointerEvents = 'auto';
            resetButton.style.opacity = '1';
            document.getElementById('password').style.border = '0.5px solid #000000';
            document.getElementById('konfirm').style.border = '0.5px solid #000000';
            errorText.style.display = 'none';
        } else {
            resetButton.setAttribute('disabled', true);
            resetButton.style.pointerEvents = 'none';
            resetButton.style.opacity = '0.5';
            if (konfirmInput.length >= 8 && passwordInput !== konfirmInput) {
                errorText.style.display = 'block';
            } else {
                errorText.style.display = 'none';
            }
        }
    }
</script>
@endsection
