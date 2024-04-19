<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <div class="table-responsive container pt-5">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>jam masuk</th>
                    <th>pulang</th>
                </tr>
            </thead>
            @foreach ($presensi as $item)
                <tr>
                    <td>{{ $item->user->nama_lengkap }}</td>
                    <td>{{ $item->hari }}</td>
                    <td>{{ $item->jam_masuk }}</td>
                    <td>{{ $item->jam_pulang }}</td>
                </tr>
            @endforeach

        </table>
    </div>
    <div>
        <form action="{{ route('presensi.keluar') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Keluar</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
