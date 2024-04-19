<link rel="stylesheet" href="assets/css/super-admin.css">
<div class="sidebar">
    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="logo">
  <ul class="nav flex-column">
    <li class="nav-item">
      <a class="nav-link {{ Request::is('superAdmin') ? 'active' : '' }}" href="{{ url('/superAdmin') }}">Dashboard</a>
  </li>
  
      <li class="nav-item">
        <a class="nav-link {{ Request::is('superAdmin/dataAdmin') ? 'active' : '' }}" href="{{ url('/superAdmin/dataAdmin') }}">Data Admin</a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link {{ Request::is('superAdmin/langganan') ? 'active' : '' }}" href="{{ url('/superAdmin/langganan') }}">Langganan</a>
  </li>
    <div class="log-out align-items-center gap-3 d-flex flex-row w-100 justify-content-center logout">
        <b>Log Out</b> <i class="fa-solid fa-right-from-bracket"></i>
          </div>
        </div>
    </li>
  </ul>
</div>
