@extends('layouts.master')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('assets/css/presensiharian.css') }}">
<div id="presentasi-harian">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 style="font-size: 50px;">Presensi Harian</h3>
                        <p>Data per tanggal 2023-09-04</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div style=" display: flex; justify-content: space-between;">
                                <button class="btn">
                                  <i class="fa-regular fa-eye"></i>
                                  Lihat Laporan Presensi
                                </button>
                                <div>
                                <div style="float:left;">
                                    <div style="position: relative;">
                                        <i class="fa-solid fa-search" style="position: absolute; left: 10px; top: 50%; transform: translateY(-50%);"></i>
                                        <input type="date" name="date" id="date-input" style="padding-left: 30px;">
                                        <p id="date-text"></p>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <button class="dropbtn">Filter &#9660;</button>
                                    <div class="dropdown-content">
                                      <label>Status</label><br>
                                      <input type="checkbox" id="checkbox2">
                                      <label for="checkbox2">Hadir</label><br>
                                      <input type="checkbox" id="checkbox3">
                                      <label for="checkbox3">Izin</label><br>
                                      <input type="checkbox" id="checkbox3">
                                      <label for="checkbox3">Izin</label><br>
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
                        <br>
                        <table class="table table-sm table-bordered table-striped" style="font-size: 10px;">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="15%">Nama</th>
                                    <th width="8%">Jam Kerja <br>masuk &nbsp; pulang</th>
                                    <th width="8%">Jam Istirahat <br> mulai &nbsp; selesai</th>
                                    <th width="8%">Total Jam Kerja <br>total jam &nbsp; (+)(-)</th>
                                    <th width="15%">Log Aktivitas <br> Log Aktivitas &nbsp; aksi </th>
                                    <th width="5%">Status <br>kehadiran</th>
                                    <th width="10%">kebaikan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 1; $i <= 10; $i++)
                                <tr>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <button class="btnpdf"><i class="fas fa-download"></i> PDF</button>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // Datatable
        $('#table-presentasi').DataTable();
    });
</script>
<script>
    function search() {
      var date = document.getElementById("dateInput").value;
      // Lakukan sesuatu dengan tanggal yang dipilih
      console.log("Date:", date);
    }
  </script>

  <script>
    const dateInput = document.getElementById('date-input');
    const dateText = document.getElementById('date-text');

    dateInput.addEventListener('input', function() {
        const dateValue = new Date(this.value);
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        const dateString = dateValue.toLocaleDateString('en-US', options);
        dateText.textContent = dateString;
    });
</script>

<script>
    function toggleDropdown() {
        var dropdown = document.getElementById('dropdown');
        dropdown.classList.toggle('active');
    }

    function closeDropdown() {
        var dropdown = document.getElementById('dropdown');
        if (!dropdown.contains(event.relatedTarget)) {
            dropdown.classList.remove('active');
        }
    }
</script>


@endpush
