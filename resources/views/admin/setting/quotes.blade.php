@extends('layouts.admin')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/adminAfter.css') }}">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <aside>
        <div class="sidebar" style="left: 250px; background-color: white;">
            <h5 class="text-capitalize mb-5" style="margin-left: -4rem;">pengaturan</h5>
            <div style="margin-left: -28px;">
                <h6 class="text-uppercase fw-normal" style="font-size: 14px;">pengaturan utama</h6>
                <ul class="text-capitalize fw-normal sub-menu" style="font-size: 14px;">
                    <li style="margin-left: 2rem;"><a href="/AdminUniv/setting/quotes"
                            class="text-black text-decoration-none">quotes</a></li>
                </ul>
                <hr class="line" />
                <h6 class="text-uppercase fw-normal mt-4" style="font-size: 14px;">panel administrator</h6>
                <ul class="text-capitalize fw-normal sub-menu" style="font-size: 14px;">
                    <li style="margin-left: 2rem;"><a href="/admin/setting/user"
                            class="text-black text-decoration-none">user & organization</a></li>
                </ul>
            </div>
        </div>
    </aside>

    <div class="d-flex gap-5" style="margin-left: 18rem; margin-top: 5%;">
        <div>
            <div class="d-flex flex-column" style="background-color: #E9E9E9; border-radius: 12px; padding: 40px;">
                @foreach ($quotes as $quote)
                    <div class="d-flex justify-content-between border-0 border-black border-bottom p-3">
                        <p class="m-0" style="font-size: 18px;">{{ $quote->quote }}</p>
                        <form id="formDelete" action="" method="POST" style="display: none">
                            @csrf
                            @method('DELETE')
                        </form>
                        <button class="border-0 bg-transparent" onclick="showAlert('{{ $quote->id }}')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-x-lg" viewBox="0 0 16 16">
                                <path
                                    d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
                            </svg>
                        </button>
                    </div>
                @endforeach
            </div>
            <div class="my-4">
                <form action="{{ route('admin-setting.quotes-store') }}" method="POST">
                    @csrf
                    <input type="text" name="quotes" id="addQuotes" placeholder="Tambahkan Quotes" class="w-100 p-3 rounded"
                        style="background-color: #E9E9E9; border: 0.5px solid #00000050;">
                    <div class="d-flex w-50 mt-3 float-end mb-5">
                        <button type="reset" class="border-0 bg-transparent w-50" style="margin-left: auto; padding: 8px;">Batal</button>
                        <button type="submit" class="w-50 btn btn-danger">Tambahkan</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="d-flex flex-column shadow-lg" style="background-color: #E9E9E9; border-radius: 12px; padding: 40px; width: 40%; height: fit-content; margin-right: 32px;">
            <h6 class="text-uppercase text-center">quotes ulang tahun</h6>
            <div class="text-capitalize bg-white w-100 rounded text-center p-1 mt-5 fw-semibold ">{{$quotes_ulangtahun->quote}}</div>
            <form class="mt-4" method="post" action="{{ route('admin-setting.quotes-ulangtahun-update', $quotes_ulangtahun->id) }}">
                @csrf
                @method('PATCH')
                <label for="quotes_ulangtahun" class="text-capitalize fw-semibold">edit quotes</label>
                <textarea name="quotes" id="quotes_ulangtahun" rows="4" placeholder="Masukkan quotes...." class="bg-white w-100 border-0 rounded p-2 px-3 mt-2" required></textarea>
                <div class="text-center">
                    <button type="submit" class="btn bg-danger bg-gradient text-white mt-3 w-50">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    @if (session('success'))
        <script>
            successMessage = "{{ session('success') }}";
            swal(successMessage, {
                icon: "success",
            });
        </script>
    @elseif (session('error'))
        <script>
            errorMessage = "{{ session('error') }}";
            swal({
                title: "Data Gagal Diperbaharui!",
                text: errorMessage,
                icon: "error",
                button: "OK!",
                });
        </script>
    @endif

    <script>
        function clearInput() {
            document.getElementById('addQuotes').value = '';
        }

        function showAlert(id) {
            swal({
                    title: "Apakah Anda yakin ingin menghapus quotes?",
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: "warning",
                    buttons: ["Batal", "Hapus"],
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        var formDelete = document.getElementById('formDelete');
                        formDelete.setAttribute('action', '/AdminUniv/setting/quotes/delete/' + id);
                        formDelete.submit();
                    } else {
                        swal("Data tidak jadi dihapus.");
                    }
                });
        }

        function successAlert() {
            swal("Data berhasil ditambahkan!", {
                icon: "success"
            })
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Mengambil pathname saat ini
            var currentPath = window.location.pathname;

            // Mengambil semua tautan di dalam sub-menu
            var menuLinks = document.querySelectorAll('.sub-menu a');

            // Loop melalui setiap tautan
            menuLinks.forEach(function(link) {
                // Memeriksa jika href dari tautan sama dengan pathname saat ini
                if (link.getAttribute('href') === currentPath) {
                    // Menambahkan kelas 'active' ke tautan yang sesuai
                    link.classList.add('active');
                }
            });
        });
    </script>
@endsection
