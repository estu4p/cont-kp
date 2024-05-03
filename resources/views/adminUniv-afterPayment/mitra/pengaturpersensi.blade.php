@extends('layouts.masterAfterPay')

@section('content')
    <link href="/assets/css//pengaturpersensi.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/2632061c04.js" crossorigin="anonymous"></script> 
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <div id="kiri">
        
        <div class="wadah col-12 border p-5 m-5">
          <i class="fs-1 fa-solid fa-chevron-left abs-kiri"></i>
                  <div class="container-fluid p-0">
                <h3 style="font-size: 50px; margin: 0;">Pengatur Presensi</h3>
                <div class="p">
                <p>atur presensi di mitra/perusahaan ini menggunakan tombol buttom atau scan QR code</p>
        </div>
        <br>
        <div class="container">
          <form action="{{ route('adminunivafterpayment.Pengaturpersensi') }}" method="POST">
           @csrf
            <div class="round">
              <input type="checkbox" name="pilihan[]" value="klik_button" id="checkbox1">
              <label for="checkbox1" style="color: black">button (klik button)</label>
            </div>
          </div>
          
          <div class="container">
            <div class="round">

              <input type="checkbox" name="pilihan[]" value="scan_qr_code" id="checkbox2">
              <label for="checkbox2" style="color: black">scan QR Code</label>
            </div>
          </div>
    <br>

        <div class="simpan">
            <button type="submit" class="save"  onclick="showsukses()" style="background-color: rgb(255, 0, 13); color: white; padding: 3px; border-color:transparent; border-radius:10px;">simpan</button>


        </div>

        </form>
        <script>
            
        function showsukses() {
            swal("berhasil", "pengaturan presensi telah di simpan", "success");
        }
        </script>

