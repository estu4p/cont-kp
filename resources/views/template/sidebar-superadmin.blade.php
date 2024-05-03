<link rel="stylesheet" href="{{ asset('assets/Css/sidebar.css') }}">
<div class="sidebar">
  <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="logo">
  <ul class="nav flex-column d-flex justify-content-center">
    <!-- <li class="nav-item">
      <a class="nav-link" href="/superAdmin">Dashboard</a>
    </li> -->
    <li class="nav-item">
      <a class="nav-link {{ Request::is('superAdmin') ? 'active' : '' }}" href="/superAdmin">Dashboard</a>
    </li>
    <!-- <li class="nav-item">
      <a class="nav-link">Data Admin</a>
    </li> -->
    <li class="nav-item">
      <a class="nav-link {{ Request::is('superAdmin/dataAdmin*') ? 'active' : '' }}" href="/superAdmin/dataAdmin">Data Admin</a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ Request::is('superAdmin/langganan*') ? 'active' : '' }}" href="/superAdmin/langganan">Langganan</a>
    </li>

    <!-- <li class="nav-item">
      <a class="nav-link" href="/superAdmin/langganan">Langganan</a>
    </li> -->
    <a href="{{ route('logout.superadmin') }}">
      @csrf
      <div class="log-out align-items-center gap-3 d-flex flex-row w-100 justify-content-center logout">
        <b>Log Out</b> <i class="fa-solid fa-right-from-bracket"></i>
      </div>
    </a>
</div>
</li>
</ul>
</div>
