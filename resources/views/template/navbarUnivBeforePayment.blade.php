<head>
  <link rel="stylesheet" href="{{ asset('assets/css/navbar.css') }}">
</head>

<body>
  <nav class="navbar d-flex justify-content-between">
    <div class="kosongan"></div>
    <div class="kanan  d-flex flex-row justify-content-between gap-5">
      <div class="ml-5  mr-2">
        <i class="bi bi-bell" style="font-size: 30px; position: relative;">
          <!-- Bulatan notifikasi -->
          <span class="badge">3</span>
        </i>
      </div>
      <div class="d-flex justify-content-evenly flex-row ">
        <a href="/AdminUniv-EditProfile" style="text-decoration: none; color: #000;">
          <div class="navbar-profile">
            <a href="/AdminUniv-EditProfile" style="text-decoration: none; color: #000;">
              <span class="profile-name">Wahyu Atkinson</span>
            </a>
          </div>
          <div class="navbar-logo">
            <img src="assets/images/epos.png" alt="Profile Logo">
          </div>
        </a>
      </div>
    </div>
  </nav>
  <script>
    // Ambil elemen navbar
    const navbar = document.querySelector('.navbar');

    // Tambahkan event listener untuk mendeteksi scroll
    window.addEventListener('scroll', function() {
      // Periksa posisi scroll
      if (window.scrollY > 0) {
        // Jika posisi scroll lebih dari 0, tambahkan class 'navbar-scrolled'
        navbar.classList.add('navbar-scrolled');
      } else {
        // Jika tidak, hapus class 'navbar-scrolled'
        navbar.classList.remove('navbar-scrolled');
      }
    });
  </script>
</body>