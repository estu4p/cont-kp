@extends('layouts.masterAfterPay')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/quote.css') }}">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="kiri-putih p-3 ">
    <div class="h4 judul-kiri">Pengaturan</div>
    <div class="nav">
        <div class="">PENGATURAN UTAMA</div>
        <div class="quote " style="background-color:  #f9caca; font-weight: bold;  border-radius: 10px; width: 100%; ">
            <ul>
                <li><a href="/AdminUniv/setting/quote">Quote</a></li>
            </ul>
        </div>
    </div>
    <div class="hr">
        <hr>
    </div>
    <div class="navv">
        <div class="">PANEL ADMINISTRATOR</div>
        <div class="quote">
            <ul>
                <li><a href="/AdminUniv/setting/panel">User & Organizations</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container-fluid gap-0 p-0 wadah">

    <div class="kanan-tabel p-5  w-100 ">
        <div class="d-flex justify-content-between">

            <div class="quotes">
                <div class="d-flex justify-content-between border-0 border-black border-bottom p-3 hapus">
                    <p class="m-0 fs-6">Change your life now for better future</p>
                    <button class="border-0 bg-transparent" onclick="hapus()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
                        </svg>
                    </button>
                </div>
                <div class="d-flex justify-content-between border-0 border-black border-bottom p-3 hapus">
                    <p class="m-0 fs-6">Jujur selalu tertanam dihati</p>
                    <button class="border-0 bg-transparent" onclick="hapus()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
                        </svg>
                    </button>
                </div>
                <div class="d-flex justify-content-between border-0 border-black border-bottom p-3 hapus">
                    <p class="m-0 fs-6">Aku jujur dan disiplin</p>
                    <button class="border-0 bg-transparent" onclick="hapus()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
                        </svg>
                    </button>
                </div>
                <div class="d-flex justify-content-between border-0 border-black border-bottom p-3 hapus">
                    <p class="m-0 fs-6">Aku selalu mengembangkan potensiku</p>
                    <button class="border-0 bg-transparent" onclick="hapus()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
                        </svg>
                    </button>
                </div>
                <div class="d-flex justify-content-between border-0 border-black border-bottom p-3 hapus">
                    <p class="m-0 fs-6">Aku selalu melakukan yang terbaik</p>
                    <button class="border-0 bg-transparent" onclick="hapus()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
                        </svg>
                    </button>
                </div>
                <div class="d-flex justify-content-between border-0 border-black border-bottom p-3 hapus">
                    <p class="m-0 fs-6">Rasa malas adalah musuhku</p>
                    <button class="border-0 bg-transparent" onclick="hapus()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
                        </svg>
                    </button>
                </div>
                <div class="d-flex justify-content-between border-0 border-black border-bottom p-3 hapus">
                    <p class="m-0 fs-6">Hari ini harus lebih baik dari kemarin</p>
                    <button class="border-0 bg-transparent" onclick="hapus()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
                        </svg>
                    </button>
                </div>
                <div class="d-flex justify-content-between border-0 border-black border-bottom p-3 hapus">
                    <p class="m-0 fs-6">Tidak ada kata menyerah dalam diriku</p>
                    <button class="border-0 bg-transparent" onclick="hapus()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="ulangtahun">
                <div class="h6" style="text-align: center;">QUOTES ULANG TAHUN</div>
                <div class="wadahquote"> Selamat ulang tahun </div>
                <label for="quotes_ulangtahun" class="text-capitalize fw-semibold">edit quotes</label>
                <textarea name="quotes" id="quotes_ulangtahun" rows="4" placeholder="Masukkan quotes...." class="bg-white w-100 border-0 rounded p-2 px-3 mt-2" required></textarea>
                <div class="text-center">
                    <button type="submit" class="btn bg-danger bg-gradient text-white mt-3 w-50" onclick="update()">Simpan</button>
                </div>
            </div>
        </div>
        <div class="tambahquote">
            <div class="form-group">
                <input class=" inputquote" type="text" class="form-control" id="prodi" placeholder="Tambahkan Quotes">
            </div>
            <div class="d-flex justify-content-end gap-3 p-4">
                <button class="bt-batal">Batal</button>
                <button class="bt-tambah">Tambahkan</button>
            </div>
        </div>
    </div>

</div>
<!-- menambhakan quote -->
<script>
    // Fungsi untuk menambahkan quote baru
    function tambahQuote() {
        // Mendapatkan nilai dari input quote
        var quote = document.querySelector('.inputquote').value;

        // Mengecek apakah input tidak kosong
        if (quote.trim() !== '') {
            // Membuat elemen div untuk quote baru
            var newQuoteDiv = document.createElement('div');
            newQuoteDiv.classList.add('d-flex', 'justify-content-between', 'border-0', 'border-black', 'border-bottom', 'p-3', 'hapus');

            // Membuat elemen paragraf untuk teks quote
            var quoteParagraph = document.createElement('p');
            quoteParagraph.classList.add('m-0', 'fs-6');
            quoteParagraph.textContent = quote;

            // Membuat tombol untuk menghapus quote
            var deleteButton = document.createElement('button');
            deleteButton.classList.add('border-0', 'bg-transparent');
            deleteButton.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16"><path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" /></svg>';
            deleteButton.addEventListener('click', function() { // Mengubah ke event listener
                hapus(this); // Memanggil fungsi hapus() dengan parameter tombol hapus yang diklik
            });

            // Menambahkan teks quote dan tombol ke dalam div quote baru
            newQuoteDiv.appendChild(quoteParagraph);
            newQuoteDiv.appendChild(deleteButton);

            // Menambahkan quote baru ke dalam div dengan class "quotes"
            document.querySelector('.quotes').appendChild(newQuoteDiv);

            // Menampilkan pesan sukses
            swal("Data berhasil ditambahkan!", {
                icon: "success",
            });
        } else {
            // Menampilkan pesan error jika input kosong
            swal({
                title: "Data Gagal Diperbaharui!",
                text: "Quote tidak boleh kosong.",
                icon: "error",
                button: "OK!",
            });
        }
    }

    // Fungsi untuk menghapus quote
    function hapus(button) {
        // Menghapus elemen parent dari tombol yang di klik
        button.parentElement.remove();

        // Menampilkan pesan sukses
        swal("Berhasil menghapus quote", {
            icon: "success",
        });
    }

    // Menambahkan event listener untuk tombol "Tambahkan"
    document.querySelector('.bt-tambah').addEventListener('click', tambahQuote);

    // Menambahkan event listener untuk tombol "Batal"
    document.querySelector('.bt-batal').addEventListener('click', function() {
        // Mengosongkan nilai input quote
        document.querySelector('.inputquote').value = '';
    });
</script>
<!-- delete quote -->
<script>
    function hapus() {
        swal({
                title: "Apakah Anda yakin ingin menghapus quotes?",
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: "warning",
                buttons: ["Batal", "Hapus"],
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    // Menghapus elemen yang berisi quote
                    // Misalnya jika quote berada dalam elemen dengan class "hapus"
                    document.querySelector('.hapus').remove();

                    swal("Berhasil menghapus quote", {
                        icon: "success",
                    });
                } else {
                    swal("Quote tidak jadi dihapus");
                }
            });
    }
</script>
<!-- quote ulang tahun -->
<script>
     function update() {
        // Mengambil nilai dari textarea
        var inputQuote = document.getElementById('quotes_ulangtahun').value;
        
        // Memperbarui teks di dalam elemen div dengan class "wadahquote"
        document.querySelector('.wadahquote').innerText = inputQuote;
        
        // Menampilkan pesan sukses menggunakan SweetAlert
        swal("", "Quote berhasil diupdate!", "success");
    }
</script>

@endsection