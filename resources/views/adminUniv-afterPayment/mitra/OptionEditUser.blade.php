@extends('layouts.masterAfterPay')
@section('content')
    <div class="container" style="width: 500px">
        <form action="{{ route('adminUniv.editUserPost', $user->id) }}" method="POST">
            @csrf
            <div>
                <label for="">Nama</label>
                <input class="form-control" type="text" placeholder="Default input" aria-label="default input example"
                    value="{{ $user->nama_lengkap }}" name="nama_lengkap" readonly>
            </div>
            <div>
                <label for="">Sekolah</label>
                <select class="form-select" aria-label="Default select example" name="sekolah">
                    <option selected>Pilih Sekolah</option>
                    @foreach ($sekolah as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_sekolah }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="">Mitra</label>
                <select class="form-select" aria-label="Default select example" name="mitra_id">
                    <option selected>Pilih Mitra</option>
                    @foreach ($mitra as $item)
                        <option value="1">{{ $item->nama_mitra }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="">Divisi</label>
                <select class="form-select" aria-label="Default select example" name="divisi_id">
                    <option selected>Pilih Divisi</option>
                    @foreach ($divisi as $item)
                        <option value="1">{{ $item->nama_divisi }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <button class="btn btn-primary mt-2" type="submit">submit</button>
            </div>
        </form>

    </div>
@endsection
