<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>QRCode</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('assets/css/QRCode.css') }}">
</head>
<body>
  <div class="container col-lg-4 py-5">
    {{-- Scanner --}}
    <div class="card bg-white shadow rounded-3 p-3 border-0">
      {{--scanner--}}
      <div class="table-resposive mt-5">
        <table class="table table borered table-hover">
          <tr>
            <th>Nama</th>
            <th>Hari</th>
            <th>jam masuk</th>
            <th>jam istirahat</th>
            <th>jam kembali</th>
            <th>jam pulang</th>
          </tr>
        </table>
      </div>
    </div>
  </div>
 
      @if (session()->has('gagal'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>{{ session()->get('gagal') }}</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      
      @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>{{ session()->get('success') }}</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      <div class="wrapper"></div>
      <div class="scanner"></div>
      <video id="preview"></video>
   

  {{-- Form --}}
  <form id="form" action="{{ route('scanner') }}" method="POST">
  @csrf
  <input type="hidden" name="barcode" id="barcode">
  <button type="submit">qr code</button>
</form>

  <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
  <script type="text/javascript">
    let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
    scanner.addListener('scan', function(content) {
      console.log(content);
    }); 
    Instascan.Camera.getCameras().then(function(cameras) {
      if (cameras.length > 0) {
        scanner.start(cameras[0]);
      } else {
        console.error('No cameras found.');
      }
    }).catch(function(e) {
      console.error(e);
    });

    scanner.addListener('scan', function(c) {
      document.getElementById('barcode').value = c;
      document.getElementById('form').submit();
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
