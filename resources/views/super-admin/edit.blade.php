@extends('layouts.superadmin')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/super-admin.css') }}">
    <div class="d-flex gap-4 mt-0 mb-5 px-5">
        <div class="bg-white rounded text-center" style="padding: 80px 50px 40px; width: 30%;">
            <div>
                <img src="{{ asset('assets/images/User Thumb.png') }}" width="180" alt="">
                <h4 class="mt-4 text-capitalize" style="opacity: 0.8; font-size: 20px; font-weight: 700;">{{ $nama }}</h4>
                <p class=" fw-light ">{{ $email }}</p>
            </div>
            <div>
                <h5 style="opacity: 0.8; font-size: 20px; font-weight: 700; margin-top: 6rem;">About</h5>
                <p class="fw-light" style="margin-top: 20px; line-height: 1.3; font-size: 14px;">{{$about}}</p>
            </div>
        </div>
        <div class="bg-white rounded" style="padding: 80px 80px 40px; width: 70%;">
            <div class="d-flex gap-4">
                <img src="{{ asset('assets/images/User Thumb.png') }}" width="80" alt="">
                <div class="my-auto d-flex flex-column" style="flex-direction: row;">
                    <button
                        style="border: 2px solid #00000080; border-radius: 6px; background-color: white; color: #00000080; font-size: 12px; font-weight: 600; padding: 8px 12px; text-transform: capitalize;">change
                        photo</button>
                    <button
                        style="border: 0; color: red; background-color: transparent; text-transform: capitalize;">remove</button>
                </div>
            </div>
            <form>
                <h6 class="mb-4 mt-5 text-capitalize" style="font-weight: 700; opacity: 0.8;">personal details</h6>
                <div class="text-capitalize">
                    <div class="row">
                        <div class="col d-flex flex-column">
                            <label for="nama" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">nama
                                lengkap</label>
                            <input type="text" name="nama" placeholder="{{ $nama }}"
                                class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;" id="">
                        </div>
                        <div class="col d-flex flex-column">
                            <label for="email" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">email</label>
                            <input type="email" name="email" placeholder="{{ $email }}"
                                class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;" id="">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col d-flex flex-column">
                            <label for="hp" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">No HP</label>
                            <input type="number" name="hp" placeholder="{{ $hp }}"
                                class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;" id="">
                        </div>
                        <div class="col d-flex flex-column">
                            <label for="alamat" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">alamat</label>
                            <input type="text" name="alamat" placeholder="{{ $alamat }}"
                                class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;" id="">
                        </div>
                    </div>
                </div>
                <h6 class="mb-4 mt-5 text-capitalize" style="font-weight: 700; opacity: 0.8;">additional info</h6>
                <div class="col d-flex flex-column text-capitalize w-50">
                    <label for="nama" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">about</label>
                    <textarea name="alamat" id="alamat" cols="30" rows="4" class="px-3 py-2 border-0 border-bottom"
                        style="background-color: #F2F4F8;" placeholder="{{ $about }}"></textarea>
                </div>
                <div class="d-flex gap-3 mt-4">
                    <button style="background-color: #02020259; color: white; padding: 8px 16px; border-radius: 8px; border: 0; margin-left: auto;">Cancel</button>
                    <button style="background-color: #A4161A; color: white; padding: 8px 16px; border-radius: 8px; border: 0;">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
