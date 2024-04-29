@extends('layouts.user')

@section('content')
    <div id="myModal" class="modal">
        <div class="modal-content text-capitalize py-3">
            <h4 class="text-center fw-bold py-4" style="color: #A61C1CE5;">silahkan pilih tempat magang</h4>
            <form action="{{ route('pilihMitra', ['id' => Auth::id()]) }}" method="POST">
                @csrf
                <label for="mitra" class="fw-semibold">mitra</label>
                <select name="mitra_id" id="mitra" class="form-select">
                    <option value="">Pilih Mitra Anda</option>
                    @foreach ($mitra as $id => $namaMitra)
                        <option value="{{ $id }}">{{ $namaMitra }}</option>
                    @endforeach
                </select>
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <p style="font-size: 14px;">Mitra belum terdaftar? <a href="" class="text-danger">Hubungi admin</a>
                </p>

                <label for="divisi" class="fw-semibold mt-2">divisi</label>
                <select name="divisi_id" id="divisi" class="form-select">
                    <option value="">Pilih Divisi Anda</option>
                    @foreach ($divisi as $id => $namaDivisi)
                        <option value="{{ $id }}">{{ $namaDivisi }}</option>
                    @endforeach
                </select>

                <div class="text-center mt-5 mb-5">
                    <button type="submit" id="submit-button"
                        class="reg-button border-0 shadow fw-semibold text-decoration-none"
                        style="background-color: #A61C1CE5; padding: 10px 20px; pointer-events: none; opacity: 0.5;">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <div class="home" style="color: white;">
        <div class="d-flex">
            <p class="date">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-calendar4-week"
                    viewBox="0 0 16 16">
                    <path
                        d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M2 2a1 1 0 0 0-1 1v1h14V3a1 1 0 0 0-1-1zm13 3H1v9a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1z" />
                    <path
                        d="M11 7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-2 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z" />
                </svg>
                <span id="date"></span>
            </p>
            <p id="time">00:00:00</p>
        </div>
        <h2 class="quotes">"Quotes quotes quotes quotes quotes"</h2>
        <div class="d-flex">
            <div class="profile">
                <div class="p-2">
                    <img src="{{ asset('assets/images/profil.png') }}" class="img-profile" alt="">
                </div>
                <div>
                    <form action="{{ route('profil', ['id' => Auth::id()]) }}" method="GET">
                        @csrf
                        <p><b>{{ $user->nama_lengkap }}</b></p>
                        <p>NIP: MJ/{{ $nama_divisi->nama_divisi }}/
                            {{ $nama_sekolah->nama_sekolah}}/
                            {{$today}}
                        </p>
                    </form>
                </div>
            </div>
            <button class="logout"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    class="bi bi-box-arrow-right mt-4" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
                    <path fill-rule="evenodd"
                        d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                </svg></button>
        </div>
    </div>

    <div class="content-home">
        <div class="absen">
            <h3 class="shift">shift middle</h3>
            <div class="button-absen">
                <button class="btn-masuk">Masuk</button>
                <button class="btn-izin">Izin</button>
            </div>
        </div>
        <div class="w-75 p-4">
            <button class="btn-barcode">Lihat barcode saya</button>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="kehadiran">
                            <div class="lingkaran"></div>
                            <p class="fw-semibold">Masuk</p>
                            <p class="text-center">---</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="kehadiran">
                            <div class="lingkaran"></div>
                            <p class="fw-semibold">Istirahat</p>
                            <p class="text-center">---</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="kehadiran">
                            <div class="lingkaran"></div>
                            <p class="fw-semibold">Kembali</p>
                            <p class="text-center">---</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="kehadiran">
                            <div class="lingkaran"></div>
                            <p class="fw-semibold">Pulang</p>
                            <p class="text-center">---</p>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center ">
                    <div class="col">
                        <div class="rounded p-2 mt-4" style="border: 2px solid #E9ECEF;">
                            <span class="fw-semibold p-2">Sudahkah Anda berbuat kebaikan hari ini?</span>
                            <textarea name="kebaikan" id="kebaikan" rows="4"
                                placeholder="Tambahkan kebaikan apa hari ini yang telah anda lakukan" class="m-2 p-2"
                                style="width: 96%; background-color: #E9ECEF; border: 0; border-radius: 4px; font-size: 12px; margin: 10px;"></textarea>
                            <div class="d-flex justify-content-end me-3" style="font-size: 14px;">
                                <button class="border-0 bg-white" style="width: 30%; height: 32px;">Batal</button>
                                <button
                                    style="background-color: #626F78; color: white; border-radius: 4px; width: 30%; height: 32px; border: 0;">Tambahkan</button>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="text-danger text-center mt-4">
                            <p class="fw-bold">Attention !</p>
                            <div class="d-flex gap-3">
                                <div class="border border-danger py-5 px-3" style="height: 160px; width: 60%;">
                                    <li style="font-size: 13px;">Kemarin anda absen pulang di kost jangan diulang!</li>
                                </div>
                                <div class="border border-danger p-3" style="height: 160px; width: 40%;">
                                    <p style="font-size: 12px;">Anda memiliki kekurangan jam kerja</p>
                                    <p class="mx-auto bg-danger-subtle w-75 border border-danger p-2"
                                        style="font-size: 13px">
                                        -14:01:53</p>
                                    <a href="" style="font-size: 12px;">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
            const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                'October', 'November', 'December'
            ];

            const dateElement = document.getElementById('date');
            const timeElement = document.getElementById('time');
            const today = new Date();

            const dayName = days[today.getDay()];
            const monthName = months[today.getMonth()];
            const dayOfMonth = today.getDate();
            const year = today.getFullYear();

            dateElement.textContent = `${dayName}, ${dayOfMonth} ${monthName} ${year}`;

            function updateTime() {
                const now = new Date();
                const hours = String(now.getHours()).padStart(2, '0');
                const minutes = String(now.getMinutes()).padStart(2, '0');
                const seconds = String(now.getSeconds()).padStart(2, '0');
                timeElement.textContent = `${hours}:${minutes}:${seconds}`;
            }

            setInterval(updateTime, 1000);
            updateTime();
        });

        document.addEventListener('DOMContentLoaded', function() {
            // Dapatkan modal
            var modal = document.getElementById('myModal');

            // Dapatkan input mitra dan divisi
            var mitraInput = document.getElementById("mitra");
            var divisiInput = document.getElementById("divisi");

            // Dapatkan tombol submit
            var submitButton = document.getElementById("submit-button");

            // Saat dokumen dimuat, tampilkan modal
            modal.style.display = "block";

            // Ketika pengguna mengklik di luar modal, sembunyikan modal
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }

            // Tambahkan event listener untuk kedua input
            mitraInput.addEventListener("change", toggleSubmitButton);
            divisiInput.addEventListener("change", toggleSubmitButton);

            // Fungsi untuk mengaktifkan/menonaktifkan tombol submit
            function toggleSubmitButton() {
                if (mitraInput.value !== "" && divisiInput.value !== "") {
                    submitButton.disabled = false;
                    submitButton.style.opacity = 1;
                    submitButton.style.pointerEvents = "auto";
                } else {
                    submitButton.disabled = true;
                    submitButton.style.opacity = 0.5;
                    submitButton.style.pointerEvents = "none";
                }
            }
        });
    </script>
@endsection
