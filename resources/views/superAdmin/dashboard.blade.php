@include('template.navbar-super', ['superAdmin' => $superAdmin])
@extends('layouts.superadmin')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/super-admin.css') }}">
    <div class="d-flex p-5 mt-4 gap-4">
        <div class="bg-primary shadow"
            style="border-radius: 15px; color: white; position: relative; padding: 20px 20px 40px; width: 14rem; height: 14rem;">
            <h6 class="text-capitalize" style="font-size: 18px;">jumlah subscription</h6>
            <h1 class="mt-3">{{ $subscription }}</h1>
            <p class="position-absolute bottom-0 end-0" style="color: black; opacity: 0.2;">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor"
                    class="bi bi-check2-circle" viewBox="0 0 16 16" style="bottom: 10px; right: 10px;">
                    <path
                        d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0" />
                    <path
                        d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z" />
                </svg>
            </p>
        </div>
        <div class="shadow"
            style="border-radius: 15px; background-color: #169423; color: white; position: relative; padding: 20px 20px 40px;  width: 14rem;">
            <h6 class="text-capitalize" style="font-size: 18px;">jumlah admin sistem</h6>
            <h1 class="mt-3">{{ $admin_sistem }}</h1>
            <p class="position-absolute bottom-0 end-0" style="color: black; opacity: 0.2;">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor"
                    class="bi bi-person" viewBox="0 0 16 16" style="bottom: 10px; right: 10px;">
                    <path
                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                </svg>
            </p>
        </div>
    </div>
@endsection
