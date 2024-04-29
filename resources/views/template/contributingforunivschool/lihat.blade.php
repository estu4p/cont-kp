@extends('layouts.master')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/lihat.css') }}">

    <div class="container-fluid border row justify-content-center mt-5">
        <div class="card border col-11 d-flex flex-column p-0">
            <div class="atas border w-100 row justify-content-start align-items-center p-2 m-0 bg-black">
                <div class="gambar-atas d-flex justify-content-center align-items-center">
                    <i class="text-white fs-2 fa-solid fa-user"></i>
                </div>
                <div class="identitas d-flex p-3 flex-column col-4">
                    <p class="m-0 text-white"><b> {{ $user }}</b></p>
                    <p class="m-0 text-white"><b>{{ $Id->nomor_induk }}</b></p>
                </div>
            </div>
            <div class="bawah w-100 d-flex flex-column p-5">
                <div class="bawah-satu w-100 row">
                    <div class="bawah-satu-kiri col-7 d-flex flex-column">
                        <div class="pengetahuan w-100 d-flex flex-column p-3 py-0">
                            <h5>Pengetahuan</h5>
                            <br>

                            @foreach ($nilaiPemahaman as $nilaiPemahaman)
                                {{-- @foreach ($user->penilaian as $nilai) --}}

                                    <div class="pemahaman-topik w-100 row">
                                        <p class="col-8 m-0">Pemahaman Topik Magang</p>
                                        @if ($nilaiPemahaman)
                                            <p class="col-3 d-flex justify-content-center border-2 rounded border border-dark px-5 py-0"
                                            style="background-color: #DCDCDC">{{ $nilaiPemahaman->nilai }}</p>
                                        @else
                                            <p class="col-3 d-flex justify-content-center border-2 rounded border border-dark px-5 py-0"
                                            style="background-color: #DCDCDC">-</p>
                                        @endif
                                    </div>
                                    <div class="pemahaman-topik w-100 row">
                                        <p class="col-8 m-0">Pemahaman ruang lingkup magang</p>
                                        @if ($nilaiPemahaman)
                                            <p class="col-3 d-flex justify-content-center border-2 rounded border border-dark px-5 py-0"
                                                style="background-color: #DCDCDC">{{ $nilaiPemahaman->nilai }}</p>
                                        @else
                                            <p class="col-3 d-flex justify-content-center border-2 rounded border border-dark px-5 py-0"
                                            style="background-color: #DCDCDC">-</p>
                                        @endif
                                    </div>
                                {{-- {{-- @endforeach --}}
                            @endforeach
                        </div>
                        <div class="keterampilan w-100 d-flex flex-column p-3">
                            <h5>Keterampilan</h5>
                            <br>
                            <div class="pemahaman-topik w-100 row ">
                                <p class="col-8 m-0">Identifikasi masalah</p>
                                <p class="col-3 d-flex justify-content-center border-2 rounded border border-dark px-5 py-0"
                                    style="background-color: #DCDCDC">{{ $penilaian->nilai }}</p>
                            </div>
                            <div class="pemahaman-topik w-100 row">
                                <p class="col-8 m-0">Pemecahan masalah</p>
                                <p class="col-3 d-flex justify-content-center border-2 rounded border border-dark px-5 py-0"
                                    style="background-color: #DCDCDC">{{ $penilaian->nilai }}</p>
                            </div>
                            <div class="pemahaman-topik w-100 row">
                                <p class="col-8 m-0">Hasil kerja</p>
                                <p class="col-3 d-flex justify-content-center border-2 rounded border border-dark px-5 py-0"
                                    style="background-color: #DCDCDC">{{ $penilaian->nilai }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="lainnya col-5 d-flex flex-column p-3 py-0">
                        <h5 class="+ m-0">Lainnya</h5>
                        <br>
                        <div class="pemahaman-topik w-100 row ">
                            <p class="col-8 m-0">Partisipasi</p>
                            <p class="col-3 d-flex justify-content-center border-2 rounded border border-dark px-5 py-0"
                                style="background-color: #DCDCDC">{{ $penilaian->nilai }}</p>
                        </div>
                        <div class="pemahaman-topik w-100 row">
                            <p class="col-8 m-0">Kejujuran</p>
                            <p class="col-3 d-flex justify-content-center border-2 rounded border border-dark px-5 py-0"
                                style="background-color: #DCDCDC">{{ $penilaian->nilai }}</p>
                        </div>
                        <div class="pemahaman-topik w-100 row">
                            <p class="col-8 m-0">Kedisiplinan</p>
                            <p class="col-3 d-flex justify-content-center border-2 rounded border border-dark px-5 py-0"
                                style="background-color: #DCDCDC">{{ $penilaian->nilai }}</p>
                        </div>
                        <div class="pemahaman-topik w-100 row">
                            <p class="col-8 m-0">Tangung jawab</p>
                            <p class="col-3 d-flex justify-content-center border-2 rounded border border-dark px-5 py-0"
                                style="background-color: #DCDCDC">{{ $penilaian->nilai }}</p>
                        </div>nilai
                        <div class="pemahaman-topik w-100 row">
                            <p class="col-8 m-0">Inisiatif</p>
                            <p class="col-3 d-flex justify-content-center border-2 rounded border border-dark px-5 py-0"
                                style="background-color: #DCDCDC">{{ $penilaian->nilai }}</p>
                        </div>
                    </div>
                    <div class="bawah-dua w-100 p-5 gap-3" style="margin-left: -20px ">
                        <h5 class="my-3">Kritik Saran</h5>
                        <div class="form-floating col-12" style="text-align: left;">
                            <textarea class="ta" placeholder="Kerja Bagus." id="floatingTextarea2"
                                style="height: 200px; background-color:#DCDCDC;width:930px
                                overflow: hidden; white-space: nowrap; resize: none;">{{ $penilaian->kritik_saran }}</textarea>
                        </div>
                        <br>
                        {{-- @endforeach --}}
                        <button type="button" class="btn btn-primary">Download</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <script>
        $(document).ready(function() {
            //  var id = <?php echo json_encode($Id->id); ?>;
            var id = {{ $Id->id }};

        $.ajax({
            url:"{{ asset('assets/css/lihat.css') }}"+id ,
            method: 'GET',
            data: { id: id },
            // data: data,
            success: function(response) {
                // Menampilkan data penilaian
                $('.user').text(response.user);
                $('.nomor_induk').text(response.Id.nomor_induk);

                // Menampilkan data nilai pemahaman tanpa duplikat
                var uniqueSubIds = {};
                $.each(response.nilai, function(index, nilai) {
                    if (!uniqueSubIds[nilai.sub_id]) {
                        uniqueSubIds[nilai.sub_id] = true;
                        $('.nilaiPemahaman').append('<div><p>Pemahaman ' + nilai.subKategori.nama + '</p><p>Nilai: ' + nilai.nilai + '</p></div>');
                    }
                });
            }
        });

        })
    <script> --}}

 {{-- <script>
        $(document).ready(function() {
            $.ajax({
                url: '/lihat/{id}',
                method: 'GET',
                success: function(response) {
                    var penilaianBySubId = {};

                    // Memproses data yang diterima
                    response.nilai.forEach(function(item) {
                        // Mengecek apakah sub_id sudah ada dalam objek penilaianBySubId
                        if (!penilaianBySubId[item.sub_id]) {
                            // Jika belum ada, tambahkan sub_id ke objek dan inisialisasikan dengan array kosong
                            penilaianBySubId[item.sub_id] = [];
                        }
                        // Tambahkan data penilaian ke dalam array sesuai dengan sub_id
                        penilaianBySubId[item.sub_id].push(item);
                    });

                    // Menampilkan data penilaian ke dalam div berdasarkan sub_id
                    Object.keys(penilaianBySubId).forEach(function(subId) {
                        // Membuat div untuk menampilkan data penilaian
                        var penilaianDiv = $('<div>');

                        // Menambahkan judul sub_id
                        penilaianDiv.append('<h2>Sub-ID: ' + subId + '</h2>');

                    });
                }
            });
        });
    </script> --}}
@endsection
