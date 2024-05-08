<link rel="stylesheet" href="{{ asset('/assets/Css/sidebar.css') }}">
<div class="sidebar">
    <img src="{{ asset('/assets/images/logo.png') }}" alt="Logo" class="logo">
    <ul class="nav flex-column text-start">
        <li class="nav-item">
        </li>
        <li class="nav-item">
            <a class="nav-link  {{ Request::is('AdminUniv-Dashboard') ? 'active' : '' }} " href="/AdminUniv-Dashboard">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link  {{ Request::is('mitra-adminunivmitra') ? 'active' : '' }} " href="/mitra-adminunivmitra">Mitra</a>
        </li>
        <li class="nav-item">
            <a class="nav-link  {{ Request::is('AdminUniv/setting/quotes') ? 'active' : '' }} " href="/AdminUniv/setting/quotes">Pengaturan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link  {{ Request::is('AdminPaket') ? 'active' : '' }}" href="/AdminPaket">Paket</a>
        </li>
        <li class="nav-item">
            <a class="nav-link  {{ Request::is('RiwayatJangkaWaktu','RiwayatPembelian') ? 'active' : '' }}" href="/RiwayatJangkaWaktu">Riwayat</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('logout.admin') }}">
                @csrf
                <div class="log-out align-items-center gap-3 d-flex flex-row w-100 justify-content-center logout">
                    <b>Log Out</b> <i class="fa-solid fa-right-from-bracket"></i>
                </div>
            </a>


        </li>
    </ul>
</div>
