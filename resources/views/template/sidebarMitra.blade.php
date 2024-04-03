<link rel="stylesheet" href="assets/Css/sidebar.css">
<div class="sidebar">
    <img src="assets/images/logo.png" alt="Logo" class="logo">
    <ul class="nav flex-column">
        <li class="nav-item">
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/contributorformitra-dashboard">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/contributorformitra-devisi">Devisi</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Presensi</a>
        </li>
        <li class="nav-item">
                <a class=" nav-link {{ Request::is('penilaian-mahasiswa') ? 'active' : '' }}" href="/penilaian-mahasiswa">Penilaian</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('manage-devisi', 'manage-shift') ? 'active' : '' }}" href="/manage-devisi">Pengaturan</a>
        </li>
        <li class="nav-item">
            <div class="log-out align-items-center gap-3 d-flex flex-row w-100 justify-content-center logout">
                <b>Log Out</b> <i class="fa-solid fa-right-from-bracket"></i>
            </div>
        </li>
    </ul>
</div>
