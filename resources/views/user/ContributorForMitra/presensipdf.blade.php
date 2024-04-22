<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- bootsrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    {{-- font open sans --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    {{-- font poopins --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    {{-- font montserat --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Open+Sans:wght@400;500;600;700&family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    {{-- link online font awesome version 6.4.2 --}}
    <script src="https://kit.fontawesome.com/3aff193c83.js" crossorigin="anonymous"></script>

    {{-- jquery --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <style>
    * {
        font-family: "poppins";
    }
    p {
        margin-bottom: 0;
    }

    td {
        font-size: 10px;
        font-weight: 500;
        color: #5e6470 !important;
    }
    th {
        font-weight: 600;
        font-size: 10px;
        color: #1a1c21;
    }
    .sub-title {
        font-size: 15px;
        text-align: right;
        padding-right: 25px;
    }
    </style>
</head>

<body>
    <div class="d-flex justify-content-center pt-5">
        <div class="card  shadow " style="max-width: 900px; min-width:595px;">
            <div class="d-flex justify-content-between align-items-center px-5 py-4" style="background-color: #F9FAFC;">
                <div style="text-align: left; flex-grow: 1; margin-right: 16px; padding-left: 20px;">
                    <p class="lh-1 fw-bold" style="font-size: 30px;font-weight: 500;">DATA PRESENSI</p>
                    <p class="fw-medium" style="font-size: 22px; color: #4C63ED; font-weight: 250;">{{ $user->nama_lengkap }}</p>
                    <p class="medium-title" style="color: #b9bbc0;">No. Induk</p>
                    <p class="fw-medium" style="color: #4C63ED; font-size: 20px;">{{ $user->nomor_induk }}</p>
                <div class="sub-title">
                    <p class="sub-title" style="color: #b9bbc0;">Tanggal</p>
                    <p class="data-invoice mb-0"><?php echo date('Y - m - d'); ?></p>
                    <br>
                </div>
                </div>
            </div>
            <div class="px-5 py-5">
                <div class="card">
                    <div class="px-2">
                        <table class="table" style="font-size: 10px; width: 100%; border-collapse: collapse;">
                            <thead style="background-color: #f2f2f2;">
                                <tr>
                                    <th rowspan="2" style="padding: 5px; border: 1px solid #ddd;">No</th>
                                    <th rowspan="2" style="padding: 5px; border: 1px solid #ddd;">Tanggal</th>
                                    <th colspan="2" style="border-bottom: 1px solid black; padding: 5px; border: 1px solid #ddd;">Jam Kerja</th>
                                    <th colspan="2" style="border-bottom: 1px solid black; padding: 5px; border: 1px solid #ddd;">Jam Istirahat</th>
                                    <th colspan="2" style="border-bottom: 1px solid black; padding: 5px; border: 1px solid #ddd;">Total Jam Kerja</th>
                                    <th rowspan="2" style="padding: 5px; border: 1px solid #ddd;">Log Aktivitas</th>
                                    <th rowspan="2" style="padding: 5px; border: 1px solid #ddd;">Status Kehadiran</th>
                                    <th rowspan="2" style="padding: 5px; border: 1px solid #ddd;">Kebaikan</th>
                                    <th rowspan="2" style="padding: 5px; border: 1px solid #ddd;">Catatan</th>
                                </tr>
                                <tr>
                                    <th style="border-left: 1px solid black; padding: 5px; border: 1px solid #ddd;">Masuk</th>
                                    <th style="padding: 5px; border: 1px solid #ddd;">Pulang</th>
                                    <th style="border-left: 1px solid black; padding: 5px; border: 1px solid #ddd;">Mulai</th>
                                    <th style="padding: 5px; border: 1px solid #ddd;">Selesai</th>
                                    <th style="border-left: 1px solid black; padding: 5px; border: 1px solid #ddd;">Total Jam</th>
                                    <th style="padding: 5px; border: 1px solid #ddd;">(+)(-)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($presensi as $item)
                                <tr>
                                    <td style="padding: 5px; border: 1px solid #ddd;">{{ $loop->iteration }}</td>
                                    <td style="padding: 5px; border: 1px solid #ddd;">{{ $item->hari }}</td>
                                    <td style="padding: 5px; border: 1px solid #ddd;">{{ $item->jam_masuk }}</td>
                                    <td style="padding: 5px; border: 1px solid #ddd;">{{ $item->jam_pulang }}</td>
                                    <td style="padding: 5px; border: 1px solid #ddd;">{{ $item->jam_mulai_istirahat }}</td>
                                    <td style="padding: 5px; border: 1px solid #ddd;">{{ $item->jam_selesai_istirahat }}</td>
                                    <td style="padding: 5px; border: 1px solid #ddd;">{{ $item->total_jam_kerja }}</td>
                                    <td style="padding: 5px; border: 1px solid #ddd;">{{ $item->hutang_presensi }}</td>
                                    <td style="padding: 5px; border: 1px solid #ddd;">{{ $item->log_aktivitas }}</td>
                                    <td style="padding: 5px; border: 1px solid #ddd;">{{ $item->status_kehadiran }}</td>
                                    <td style="padding: 5px; border: 1px solid #ddd;">{{ $item->kebaikan }}</td>
                                    <td style="padding: 5px; border: 1px solid #ddd;">{{ $item->keterangan_status }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center px-5 py-4"
                style="background-color: #F9FAFC; color: #5E6470; font-size: 10px; height: 550px;">
            </div>
        </div>
    </div>
</body>
</html>







