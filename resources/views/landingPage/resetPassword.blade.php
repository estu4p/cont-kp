@extends('layouts.landing')

@section('content')
    <div class="register text-capitalize">
        <h2 class="text-center fw-bold" style="color: #A61C1CE5;">reset password</h2>
        <div class="box-form mt-5">

            <form action="{{ route('login') }}" method="POST" class="fw-medium">
                @csrf
                <label for="email" class="mt-4">Email<span class="text-danger">*</span></label>
                <div class="d-flex">

                    <input type="email" name="email"
                        style="border: 2px solid #E9E9E9; padding: 12px; border-radius: 0px 8px 8px 0px; width: 100%;"
                        placeholder="Masukkan Email" readonly>
                </div>

                <div class="button-container fw-semibold">
                    <button type="submit" class="border-0 mt-3"
                        style="background-color: #A61C1CE5; color: white; padding: 8px 20px; border-radius: 8px;">Kirim
                        OTP</button>
                    <p class="mt-3" style="margin-bottom: -20px;">Belum punya akun? <a href="/register"
                            class="text-decoration-none" style="color: #A61C1CE5;">Daftar</a></p>
                </div>
            </form>
        </div>
    </div>
@endsection
