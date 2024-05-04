<link rel="stylesheet" href="assets/Css/sidebar.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="sidebar">
    <img src="assets/images/logo.png" alt="Logo" class="logo">
    <ul class="nav flex-column">

        <li class="nav-item">
            <a class="nav-link {{ Request::is('AdminSistem-Dashboard') ? 'active' : '' }}" href="/AdminSistem-Dashboard">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('AdminSistem-Subcription') ? 'active' : '' }}" href="{{ route('subscriptions.index') }}">Langganan</a>
        </li>
        <li class="nav-item">

        <li class="nav-item">
            <div class="log-out align-items-center gap-3 d-flex flex-row w-100 justify-content-center logout">
            <button  onclick="showSweet()" style="background-color: transparent; border: none;">Log Out <i class="fa-solid fa-right-from-bracket"></i> </button>
            </div>
        </li>
        </li>
    </ul>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@12"></script>
<script>
    function showSweet() {
        swal("Log Out", "Apa anda yakin ingin keluar?", {
            buttons: ["Tidak", "Ya"],
        }).then((willLogout) => {
            if (willLogout) {
                window.location.href = "{{ route('logout.sistemlokasi') }}";
            }
        });
    }
</script>
