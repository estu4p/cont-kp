@extends('layouts.masterSistem')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/AdminSistem-Dashboard.css') }}">

<body>
  <div class="dashboard">
    <div class="kartu1 d-flex flex-column">
      <h3 class="kartu-judul">Jumlah Subcription</h3>
       <td class=>{{ $totalSubscription }}</td>
      
  

      <!-- <i class="bi bi-check2-circle text-dark icon1 col-12 d-flex justify-content-end py-2 px-4 "></i> -->

    </div>



    <div class=" kartu2 d-flex flex-column">
      <h2 class="kartu-judul">Aktif</h2>
      <td class=>{{ $totalAktif }}</td>
        <!-- <img src="assets/images/vectorr.png"alt="logoo" class="vectorr">
        <img src="assets/images/Vector3.png" alt="panah" class="panah"> -->


      <!-- <i class="bi bi-box-arrow-in-right text-dark icon2 col-12 d-flex justify-content-end py-2 px-4"></i> -->
    </div>

    <div class="kartu3 dm-flex flex-colum ">
      <h2 class="kartu-judul">Tidak aktif</h2>
        <td>{{ $totalTidakAktif }}</td>

      
      <!-- <i class="bi bi-app text-dark icon3 col-12 d-flex justify-content-end py-2 px-4">
        <i class="bi bi-x text-dark icon4 p-0"></i>
      </i> -->


    </div>
  </div>
</body>
@endsection