<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Mahasiswa</th>
                    <th scope="col">Jam Masuk</th>
                    <th scope="col">Jam pulang</th>
                    <th scope="col">Jam mulai istirahat</th>
                    <th scope="col">Jam selesai istirahat</th>
                    <th scope="col">Total Jam Kerja</th>
                    <th scope="col">Log Aktivitas</th>
                    <th scope="col">Aksi</th>
                    <th scope="col">Status Kehadiran</th>
                    <th scope="col">Kebaikan</th>
                </tr>
            </thead>
            <tbody>
                <h2>{{ $presensi->nama_mitra }}</h2>
                @foreach ($presensi as $item)
                    <div>
                        <tr>
                            <td>{{ $item->nama_lengkap }}</td>
                            <td>cek</td>
                            <td>cek</td>
                            <td>cek</td>
                            <td>cek</td>
                            <td>cek</td>
                            <td>cek</td>
                            <td>cek</td>
                            <td>cek</td>
                            <td>cek</td>
                            <td>cek</td>
                        </tr>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
