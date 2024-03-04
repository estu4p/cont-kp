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
                                    </div>
                                </div>
                                <div style="float:left;">
                                    <select>
                                        <option value="">&#x25BC; Filter</option>
                                        <option value="Hadir">Hadir</option>
                                        <option value="Izin">Izin</option>
                                        <option value="Tidak Hadir">Tidak Hadir</option>
                                    </select>
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
                                    <th width="8%">Jam Kerja <br>masuk &nbsp pulang</th>
                                    <th width="8%">Jam Istirahat <br> mulai &nbsp selesai</th>
                                    <th width="8%">Total Jam Kerja <br>total jam &nbsp (+)(-)</th>
                                    <th width="15%">Log Aktivitas <br> Log Aktivitas &nbsp aksi </th>
                                    <th width="5%">Status <br>kehadiran</th>
                                    <th width="10%">kebaikan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 1; $i <= 10; $i++)
                                <tr>
                                    <td><input type="checkbox" id="checkbox_{{ $i }}"> &nbsp; {{ $i }}</td>
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

@endpush
