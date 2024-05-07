<link rel="stylesheet" href="{{ asset('assets/Css/sidebar.css') }}">
<div class="sidebar">
    <img src="{{ asset('assets/images/logo.png') }}" class="logo">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link {{ Route::is('dashboard.mahasiswa') ? 'active' : '' }}" href="{{ route('dashboard.mahasiswa') }}">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::is('jml_mahasiswa') ? 'active' : '' }}" href="{{ route('jml_mahasiswa') }}">Mahasiswa</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('presensi-contributor-univ', 'laporandatapresensi', 'datapresensisiswa', 'presensihadir', 'presensiizin', 'presensitidakhadir') ? 'active' : '' }}"
                href="/presensi-contributor-univ">Presensi</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('penilaianMahasiswa') ? 'active' : '' }}" href="/penilaianMahasiswa">Penilaian</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('pengaturan-contri') ? 'active' : '' }}" href="/pengaturan-contri">Pengaturan</a>
        </li>
    </ul>
    <div class="log-out align-items-center gap-3 d-flex flex-row w-100 justify-content-center logout">
        <b>Log Out</b> <i class="fa-solid fa-right-from-bracket"></i>
    </div>
</div>
