<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My QR Code</title>
    <meta charset="UTF-8">
    <link href="/assets/css/myqr.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2632061c04.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        
    </style>
</head>

<body>
    <form action="{{ route('scan-barcode', ['id' => Auth::id()]) }}" method="POST">
        @csrf
        <div class="wadah">
            <div class="text-container">
                 <?php
                    use App\Models\Presensi;
                    use App\Models\User;
                    use Illuminate\Support\Facades\Auth;

                    $id = Auth::user()->id;

                    $presensi = Presensi::join('users', 'presensi.nama_lengkap', '=', 'users.id')
                                        ->select('users.nama_lengkap as nama')
                                        ->where('presensi.id', $id)
                                        ->first(); 

                    if ($presensi) {
                        $nama = $presensi->nama; 
                    } else {
                        $nama = "Nama Pengguna";
                    }
                ?>
                 <h3>{{ $nama }}'s QR Code</h3 >
                {{-- <h3>Iqra's QR Code</h3 > --}}
            </div>
            <div class="qr-container">
                {{-- <img src="{{ asset('assets/images/qrlinkedin.png') }}" alt="" class="qr-image"> --}}
                <img src="{{ asset('barcodes/qrcode_' . Auth::id() . '.svg') }}" alt="QR Code">
            </div>
        </div>
        <div class="button-container">
            <button class="btnqr"><a href="/pemagang/home" style="text-decoration: none;" class="kembali"> <i class="fa-solid fa-angle-left"></i>Kembal</a></button>
        </div>
    </form>
</body>

</html>