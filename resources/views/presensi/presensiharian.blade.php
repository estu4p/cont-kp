@extends('layouts.master')

@section('content')
<div id="presentasi-harian">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Presensi Harian</h3>
                        <p>Data per tanggal 2023-09-04</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form action="#" method="GET">
                                    <div class="input-group">
                                        <input type="date" name="date" class="form-control" value="#">
                                        <button type="submit" class="btn btn-primary">Lihat Laporan Presensi</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{ route('presentasi_harian.export') }}" class="btn btn-success">Export Excel</a>
                            </div>
                        </div>
                        <br>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="20%">Nama</th>
                                    <th width="15%">Jam Kerja</th>
                                    <th width="15%">Jam Istirahat</th>
                                    <th width="15%">Total Jam Kerja</th>
                                    <th width="15%">Log Aktivitas</th>
                                    <th width="10%">Status</th>
                                    <th width="10%">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 1; $i <= 10; $i++)
                                <tr>
                                    <td>{{ $i }}</td>
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
@endpush
