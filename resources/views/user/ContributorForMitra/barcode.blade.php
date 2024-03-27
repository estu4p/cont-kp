<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/user.css') }}"> --}}
    <style>
        html,
        body {
            background-color: #212529;
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .barcode-box {
            background-color: #FFFFFF;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            margin-bottom: 12px;
        }

        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: transparent;
            color: white;
            border: none;
            font-size: 18px;
            font-weight: 600;
            text-transform: capitalize;
            display: flex;
            align-items: center;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <a href="/user/" class="back-button">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
            class="bi bi-arrow-left-short" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5" />
        </svg>
    </a>
    <div class="container">
        <div class="barcode-box">
            <h6 class="text-uppercase">{{ $nama }}'s qr code</h6>
            <div id="reader" width="600px"></div>
            {{-- {!! QrCode::size(200)->generate($nama) !!} --}}
            <img src="/assets/images/Barcode.png" width="180px" alt="">
        </div>


        <input type="" id="result" name="result">


        <button
            style="border: none; background-color: transparent; color: white; text-transform: capitalize; font-size: 18px; font-weight: 600;"><svg
                xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                class="bi bi-download me-2" viewBox="0 0 16 16">
                <path
                    d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5" />
                <path
                    d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z" />
            </svg>simpan</button>
    </div>
</body>
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    // $('#result').val('test');
    function onScanSuccess(decodedText, decodedResult) {
        // alert(decodedText);

        console.log(`Code scanned = ${decodedText}`, decodedResult);

        $('#result').val(decodedText);

        let id = decodedText;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: "{{ route('mitra.validasi') }}",
            data: {
                id: decodedText
            },
            success: function(response) {
                if (response.presensi) {
                    // Tampilkan data presensi jika ditemukan
                    console.log(response.presensi);
                } else {
                    console.log(response.message); // Barcode tidak ditemukan
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });

    }

    function onScanFailure(error) {
        // handle scan failure, usually better to ignore and keep scanning.
        // for example:
        // console.warn(`Code scan error = ${error}`);
    }

    let html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", {
            fps: 10,
            qrbox: {
                width: 250,
                height: 250
            }
        },
        /* verbose= */
        false);
    html5QrcodeScanner.render(onScanSuccess, onScanFailure);
</script>


</html>
