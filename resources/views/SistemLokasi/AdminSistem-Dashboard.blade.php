@extends('layouts.masterSistem')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/AdminSistem-Dashboard.css') }}">

<body>
  <div class="dashboard">
    <div class="kartu1 d-flex flex-column">
      <h3 class="kartu-judul">Jumlah Subcription</h3>
       <td class=>300</td>
  

      <i class="bi bi-check2-circle text-dark icon1 col-12 d-flex justify-content-end py-2 px-4 "></i>

    </div>



    <div class=" kartu2 d-flex flex-column">
      <h2 class="kartu-judul">Aktif</h2>
      <td class=>200</td>
      <!-- <img src="assets/images/icon log in outline.png" alt="Logo1" class="logo1">
        <img src="assets/images/Vector3.png" alt="Logo1" class=""> -->


      <i class="bi bi-box-arrow-in-right text-dark icon2 col-12 d-flex justify-content-end py-2 px-4"></i>
    </div>

    <div class="kartu3 dm-flex flex-colum ">
      <h2 class="kartu-judul">Tidak aktif</h2>
      <tr>
        <td>100</td>

      </tr>
      <i class="bi bi-app text-dark icon3 col-12 d-flex justify-content-end py-2 px-4">
        <i class="bi bi-x text-dark icon4 p-0"></i>
      </i>
    </div>
  </div>
</body>
@endsection