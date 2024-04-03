@extends('layouts.landing')

@section('content')
    <div class="register text-capitalize">
        <h2 class="text-center fw-bold" style="color: #A61C1CE5;">log in</h2>
        <div class="box-form mt-5">
            <img src="assets/images/logo.png" class="img-container image-fluid mx-auto" />
            <form action="/loginpage" method="POST" class="fw-medium">
                @csrf
                <label for="email" class="mt-4">Email<span class="text-danger">*</span></label>
                <div class="d-flex">
                    <div style="background-color: #E9E9E9; padding: 16px 18px 16px 18px;" class="label-img"><img
                            src="assets/images/icon/mail.png" /></div>
                    <input type="email" name="email"
                        style="border: 2px solid #E9E9E9; padding: 12px; border-radius: 0px 8px 8px 0px; width: 100%;"
                        placeholder="Masukkan Email">
                </div>

                <label for="password" class="mt-4">password<span class="text-danger">*</span></label>
                <div class="d-flex">
                    <div style="background-color: #E9E9E9; padding: 16px 18px 16px 18px;" class="label-img"><img
                            src="assets/images/icon/pass.png" /></div>
                    <input type="password"
                        style="border: 2px solid #E9E9E9; padding: 12px; border-radius: 0px 8px 8px 0px; width: 100%;"
                        placeholder="Masukkan Password" name="password">
                </div>

                <div class="remember d-flex mt-4 fs-6 fw-medium align-items-center">
                    <div class="d-flex"><input type="checkbox" name="remember" id="remember" class="me-2"
                            style="color: #A61C1CE5;">
                        <label for="remember" class="mb-0">Ingat saya</label>
                    </div>
                    <p class="ms-auto mb-0">Lupa kata sandi? <a href="/reset-password" class="text-decoration-none"
                            style="color:#A61C1CE5;">Reset</a></p>
                </div>

                <div class="button-container fw-semibold">
                    <button type="submit" class="border-0 mt-3 fw-semibold"
                        style="background-color: #A61C1CE5; color: white; padding: 8px 20px; border-radius: 8px;">Log
                        In</button>
                    <p class="mt-3" style="margin-bottom: -20px;">Belum punya akun? <a href="/register"
                            class="text-decoration-none" style="color: #A61C1CE5;">Daftar</a></p>
                </div>
            </form>
        </div>
    </div>
@endsection
