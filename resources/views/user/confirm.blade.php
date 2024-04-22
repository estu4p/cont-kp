@extends('layouts.user')

@section('content')

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="box-reset">
        <a href="/user/login" class="close-button">
            <div style="background-color: #A61C1CE5; width: 30px; height: 30px; border-radius: 50%; display: flex; justify-content: center; align-items: center;">
                <i class="fas fa-times" style="color: white; font-size: 20px;"></i>
            </div>
        </a>
        <h4 class="fw-bold text-capitalize mb-5">yakin reset password?</h4>
        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="#A61C1CE5" class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4m.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2"/>
          </svg>
        <div class="button-container text-center">
            <div class="mt-5 d-flex gap-3">
                <a href="/user/login" class="btn btn-outline-primary fw-semibold text-decoration-none" style="padding: 10px; width: 50%;">Batal</a>
                <button type="submit" onclick="location.href='{{ url('user/login') }}'" data-bs-toggle="modal"  class="btn btn-outline-primary fw-semibold text-decoration-none" style="padding: 10px; width: 50%;">Yakin</button>
            </div>
        </div>  
    </div>
</div>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
@endsection
