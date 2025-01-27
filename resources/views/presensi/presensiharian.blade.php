@extends('layouts.master')

@section('content')

<link rel="stylesheet" href="{{ asset('assets/css/presensi/presensiharian.css') }}">
<div id="presentasi-harian">
    <div class="card">
        <div class="card-header">
            <h3 style="font-size: 50px;">Presensi Harian</h3>
            <p>Data per tanggal <?php echo date('Y - m - d'); ?></p>
        </div>
    </div>
</div>
<div class="card-body">
    <div class="row">
        <div style=" display: flex; justify-content: space-between;">
            <a class="btn" href="/laporandatapresensi">
                <i class="fa-solid fa-eye"></i>
                Lihat Laporan Presensi
            </a>

            <button id="btn-pdf" class="btn">
                <i class="fas fa-download"></i>
                PDF
            </button>

            <div>
                <div class="tgl-filter">
                    <i class="kaca-pembesar fa-solid fa-magnifying-glass"></i><input type="date" class="tgl">
                    <i class="filter fa-solid fa-filter"></i> Filter <i class="down fas fa-angle-down collapse-btn" onclick="toggleCollapse(this)"></i>
                    <div class="collapsed" id="collapseContent">
                        <div class="status-shift">
                            <div class="isistatus-shift">
                                <label>Status</label>
                                <br>
                                <input type="checkbox"> Hadir
                                <br>
                                <input type="checkbox"> Izin
                                <br>
                                <input type="checkbox"> Tidak Hadir
                                <br>
                                <hr>
                                <label>Shift</label>
                                <br>
                                <input type="checkbox"> Shift Pagi
                                <br>
                                <input type="checkbox"> Shift Middle
                                <br>
                                <input type="checkbox"> Shift Siang
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>

    <table class="table" style="font-size: 10px;">
        <thead style="text-align: center;">
            <tr>
                <th rowspan="2" style="vertical-align: middle;"><input type="checkbox" onchange="checkAll(this)"
                        name="chk[]"id="#" name="">&nbsp;No</th>
                <th rowspan="2" style="vertical-align: middle;">Nama</th>
                <th colspan="2" style="border-bottom: 1px solid black;">Jam Kerja</th>
                <th colspan="2" style="border-bottom: 1px solid black;">Jam Istirahat</th>
                <th colspan="2" style="border-bottom: 1px solid black;">Total Jam Kerja</th>
                <th colspan="2" style="border-bottom: 1px solid black;">Log Aktivitas</th>
                <th rowspan="2">Status <br>Kehadiran</th>
                <th rowspan="2" style="vertical-align: middle;">Kebaikan</th>
            </tr>
            <tr>
                <th>Masuk</th>
                <th style="border-left: 1px solid black;">Pulang</th>
                <th>Mulai</th>
                <th style="border-left: 1px solid black;">Selesai</th>
                <th>Total Jam</th>
                <th style="border-left: 1px solid black;">(-)(+)</th>
                <th class="bates">Log Aktivitas</th>
                <th style="border-left: 1px solid black;">
                    <div class="">Aksi</div>


                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($presensi as $index => $data)
            <tr>
                <td><input type="checkbox" id="#" name=""> &nbsp; {{ $index + 1 }}</td>
                <td class="bates" href><a href="/datapresensisiswa/{{ $data->user->id }}">{{ $data->user->nama_lengkap }}</a></td>
                <td>{{ $data->jam_masuk }}</td>
                <td>{{ $data->jam_pulang }}</td>
                <td>{{ $data->jam_mulai_istirahat }}</td>
                <td>{{ $data->jam_selesai_istirahat }}</td>
                <td>{{ $data->total_jam_kerja }}</td>
                <td>{{ $data->kurang_jam_kerja }}</td>
                <td>{{ $data->log_aktivitas }}</td>
                <td>
                    <input type="radio" id="check" name="button-toggle" class="toggle-button" />
                    <label for="check" class="round-button-check" tabindex="1"><i class="fa-solid fa-check"></i></label>

                    <input type="radio" id="cross" name="button-toggle" class="toggle-button" />
                    <label for="cross" class="round-button-cross" tabindex="1"><i class="fa-solid fa-xmark"></i></label>
                </td>
                <td>{{ $data->status_kehadiran }}</td>
                <td>{{ $data->kebaikan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- <button id="btn-pdf" class="btnpdf"><i class="fas fa-download"></i> PDF</button> -->
</div>

@endsection

@section('scripts')
<script>

    // Fungsi untuk mengunduh PDF saat tombol PDF diklik
    document.getElementById('btn-pdf').addEventListener('click', function() {
        // Mengarahkan ke rute untuk mengunduh PDF
        window.location.href = "{{ route('cetak.presensi', ['nama_lengkap' => $nama_lengkap]) }}";
    });

    function toggleCollapse(icon) {
        var content = document.getElementById('collapseContent');
        content.classList.toggle('collapsed');

        // Mengubah ikon
        if (content.classList.contains('collapsed')) {
            icon.classList.remove('fa-angle-up');
            icon.classList.add('fa-angle-down');
        } else {
            icon.classList.remove('fa-angle-down');
            icon.classList.add('fa-angle-up');
        }
    }

</script>
@endsection
