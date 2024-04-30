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
            <a href="#" style="text-decoration: none; color: #000;">
                <div class="d-flex justify-content-evenly flex-row ">
                    <div class="navbar-profile">
                        <span class="profile-name fw-bold">{{ $superAdmin->nama_lengkap ?? '' }}</span>
                        <span class="profile-status" style="font-size: 14px;">{{ $superAdmin->status_akun ?? '' }}</span>
                    </div>
                    <div class="navbar-logo">
                        <div class="navbar-logo">
                            @if ($superAdmin->foto_profil ?? '')
                            <img src="{{ asset('storage/' . $superAdmin->foto_profil) }}" alt="Foto Profil" class="foto-profil-nav">
                            @else
                            <img src="{{ asset('assets/images/User Thumb.png') }}" width="180" alt="Profile Logo" class="foto-profil-nav">
                            @endif
                        </div>
                    </div>
                </div>
            </a>
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