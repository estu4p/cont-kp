@extends('layouts.landing')

@section('content')
    <div class="register text-capitalize">
        <h2 class="text-center fw-bold" style="color: #A61C1CE5;">daftarkan kampus/sekolah anda</h2>
        <div class="box-form mt-5">
            <form action="{{ route('register-landingpage') }}" method="POST" class="fw-medium">
                @csrf
                <label for="nama">nama lengkap<span class="text-danger">*</span></label>
                <div class="d-flex">
                    <div style="background-color: #E9E9E9; padding: 16px;" class="label-img"><img src="assets/images/icon/nama.png" /></div>
                    <input type="text" name="nama_lengkap"
                        style="border: 2px solid #E9E9E9; padding: 12px; border-radius: 0px 8px 8px 0px; width: 100%;"
                        placeholder="Masukkan Nama">
                </div>

                <label for="sekolah" class="mt-4">sekolah/perguruan tinggi<span class="text-danger">*</span></label>
                <div class="d-flex">
                    <div style="background-color: #E9E9E9; padding: 16px 12px 16px 12px;" class="label-img"><img
                            src="assets/images/icon/sekolah.png" /></div>
                    <input type="text" name="nama_sekolah"
                        style="border: 2px solid #E9E9E9; padding: 12px; border-radius: 0px 8px 8px 0px; width: 100%;"
                        placeholder="Masukkan Sekolah/Perguruan Tinggi">
                </div>

                <label for="email" class="mt-4">Email<span class="text-danger">*</span></label>
                <div class="d-flex">
                    <div style="background-color: #E9E9E9; padding: 16px 18px 16px 18px;" class="label-img"><img
                            src="assets/images/icon/mail.png" /></div>
                    <input type="email" name="email"
                        style="border: 2px solid #E9E9E9; padding: 12px; border-radius: 0px 8px 8px 0px; width: 100%;"
                        placeholder="Masukkan E-Mail Anda">
                </div>

                <label for="telepon" class="mt-4">telepon<span class="text-danger">*</span></label>
                <div class="d-flex">
                    <div style="background-color: #E9E9E9; padding: 16px 18px 16px 18px;" class="label-img"><img
                            src="assets/images/icon/telp.png" /></div>
                    <input type="number" name="no_hp"
                        style="border: 2px solid #E9E9E9; padding: 12px; border-radius: 0px 8px 8px 0px; width: 100%;"
                        placeholder="Masukkan No Handphone">
                </div>

                <label for="password" class="mt-4">password<span class="text-danger">*</span></label>
                <div class="d-flex">
                    <div style="background-color: #E9E9E9; padding: 16px 18px 16px 18px;" class="label-img"><img
                            src="assets/images/icon/pass.png" /></div>
                    <input type="password"
                        style="border: 2px solid #E9E9E9; padding: 12px; border-radius: 0px 8px 8px 0px; width: 100%;"
                        placeholder="Masukkan Password">
                </div>

                <div class="button-container">
                    <button class="border-0 mt-5 fw-semibold"
                        style="background-color: #A61C1CE5; color: white; padding: 8px 20px; border-radius: 8px;">Daftar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
