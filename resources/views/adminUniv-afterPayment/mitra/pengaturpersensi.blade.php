@extends('layouts.masterAfterPay')

@section('content')
    <link href="/assets/css//pengaturpersensi.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/2632061c04.js" crossorigin="anonymous"></script>

    <div id="kiri">
        
        <div class="wadah col-12 border p-5 m-5">
          <i class="fs-1 fa-solid fa-chevron-left abs-kiri"></i>
                  <div class="container-fluid p-0">
                <h3 style="font-size: 50px; margin: 0;">Pengatur Presensi</h3>
                <div class="p">
                <p>atur presensi di mitra/perusahaan ini menggunakan tombol buttom atau scan QR code</p>
        </div>
        <br>
        <div class="form-check  ">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
                botton (klik tombol)
            </label>
        </div>
        <br>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
                scan Qr code
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Sign in</button>
        </div>

        </form>
