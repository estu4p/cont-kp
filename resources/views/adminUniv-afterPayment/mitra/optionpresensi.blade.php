@extends('layouts.masterAfterPay')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link href="/assets/css//optionpresensi.css" rel="stylesheet">
<script src="{{ asset('js/app.js') }}"></script>
<div id="presentasi-harian">
    <i class="fs-1 fa-solid fa-chevron-left"></i>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 style="font-size: 50px;">Presensi Harian</h3>
                        <p>Data per tanggal 2023-09-04</p>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div style="display: flex; justify-content: space-between;">
                        <a class="btn" href="/mitra-pengaturpersensi">
                            <i class="fa-solid fa-gear"></i>
                            Pengatur Presensi
                        </a>
                        <div>
                            <div style="float:left;">
                                <div style="position: relative;">
                                    <i class="fa-solid fa-search" style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%);"></i>
                                    <input type="date" name="date" id="date-input" class="search">
                                    <p id="date-text"></p>
                                </div>
                            </div>
                            <div class="dropdown">
                                <button class="dropbtn"><i class="fa-solid fa-filter"></i>Filter<i class="fa-solid fa-chevron-down"></i></button>
                                <div class="dropdown-content">
                                    <div style="border-bottom: 1px solid #000;">
                                        <label>Status</label><br>
                                        <input type="checkbox" id="checkbox1">
                                        <label for="checkbox1">Hadir</label><br>
                                        <input type="checkbox" id="checkbox2">
                                        <label for="checkbox2">Izin</label><br>
                                        <input type="checkbox" id="checkbox3">
                                        <label for="checkbox3">Alpa</label><br>
                                    </div>
                                    <label for="checkbox1">Shift</label><br>
                                    <input type="checkbox" id="checkbox2">
                                    <label for="checkbox2">Shift pagi</label><br>
                                    <input type="checkbox" id="checkbox3">
                                    <label for="checkbox3">Shift Middle</label><br>
                                    <input type="checkbox" id="checkbox3">
                                    <label for="checkbox3">Shift Siang</label><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 text-right">
            </div>
        </div>

        <table class="table">
            <thead style="text-align: center;">
                <tr>
                    <th rowspan="2">No</th>
                    <th rowspan="2">Nama</th>
                    <th colspan="2">Jam Kerja</th>
                    <th colspan="2">Jam Istirahat</th>
                    <th colspan="2">Total Jam Kerja</th>
                    <th colspan="2">Log Aktivitas</th>
                    <th rowspan="2">Status Kehadiran</th>
                    <th rowspan="2">Kebaikan</th>
                </tr>
                <tr>
                    <th>Masuk</th>
                    <th>Pulang</th>
                    <th>Mulai</th>
                    <th>Selesai</th>
                    <th>Total Jam</th>
                    <th>(-)(+)</th>
                    <th>Log Aktivitas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($userAdmin as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="bates" href><a href="/mitra-detailprofil/{{ $user->id }}">{{ $user->nama_lengkap }}</a></td>
                    <td>{{ $user->presensi->jam_masuk }}</td>
                    <td>{{ $user->presensi->jam_pulang }}</td>
                    <td>{{ $user->presensi->jam_mulai_istirahat}}</td>
                    <td>{{ $user->presensi->jam_selesai_istirahat }}</td>
                    <td>{{ $user->presensi->total_jam_kerja }}</td>
                    <td>{{ $user->presensi->log_aktivitas }}</td>
                    <td>{{ $user->presensi->status_kehadiran }}</td>
                    <td>{{ $user->presensi->kebaikan }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <button class="btnpdf"><i class="fas fa-download"></i> PDF</button>
    </div>

   
</div>

<script>
    const checkButton = document.getElementById('check-button');
    const crossButton = document.getElementById('cross-button');

    checkButton.addEventListener('click', function() {
        checkButton.classList.add('active');
        crossButton.classList.remove('active');
    });

    crossButton.addEventListener('click', function() {
        crossButton.classList.add('active');
        checkButton.classList.remove('active');
    });

    function showsukses(){
        swal("berhasil", "perubahan waktu berhasil disimpan", "success");
    }


    function handleButtonClick(buttonNumber) {
    var buttonId = 'button' + buttonNumber;
    var button = document.getElementById(buttonId);
    if (!button.classList.contains('btn-with-checkmark')) {
        button.classList.add('btn-with-checkmark');
    } else {
        button.classList.remove('btn-with-checkmark');
    }
    // Isi fungsi disini sesuai dengan aksi yang ingin dilakukan ketika tombol diklik
}


    
</script>

@endsection
