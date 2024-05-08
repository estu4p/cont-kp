@extends('layouts.masterSistem')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/AdminSistem-Dashboard.css') }}">

<body>
    <div class="dashboard flex-md-column">
        <div class=" gap-5  p-5 d-flex  flex-lg-row flex-md-column flex-sm-column  flex-column">
            <div class="kartu1 m-lg-0 m-md-auto m-sm-auto my-md-3">
                <h2 class="kartu-judul">Jumlah Subcription</h2>
                <td>{{ $totalSubscription }}</td>
                <!-- <i class="bi bi-check2-circle text-dark icon1 col-12 d-flex justify-content-end py-2 px-4 "></i> -->
            </div>
            <div class="kartu2 m-lg-0 m-md-auto m-sm-auto my-md-3">
                <h2 class="kartu-judul">Aktif</h2>
                <td>{{ $totalAktif }}</td>
                <!-- <img src="assets/images/vectorr.png"alt="logoo" class="vectorr">
        <img src="assets/images/Vector3.png" alt="panah" class="panah"> -->
                <!-- <i class="bi bi-box-arrow-in-right text-dark icon2 col-12 d-flex justify-content-end py-2 px-4"></i> -->
            </div>
            <div class="kartu3 m-lg-0 m-md-auto m-sm-auto my-md-3">
                <h2 class="kartu-judul">Tidak aktif</h2>
                <td>{{ $totalTidakAktif }}</td>
                <!-- <i class="bi bi-app text-dark icon3 col-12 d-flex justify-content-end py-2 px-4">
        <i class="bi bi-x text-dark icon4 p-0"></i>
      </i> -->
            </div>
        </div>
    </div>
</body>
@endsection