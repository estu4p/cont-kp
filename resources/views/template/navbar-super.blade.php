<link rel="stylesheet" href="{{ asset('assets/css/super-admin.css') }}">
</head>

<body>
    <div class="navbar d-flex justify-content-between text-decoration-none" style="color: #000000;">
        <div class="kosongan"></div>
        <div class="kanan d-flex flex-row justify-content-between gap-5">


            <div class="ml-5 mr-2"></div>
            <div>
                <i class="fa-solid fa-bell fa-2x non-clickable-icon" style="pointer-events: none;"></i>

            </div>
            <div class="d-flex justify-content-evenly flex-row text-center">
                <div class="navbar-profile">
                    <a href="/superAdmin/editProfil" at><span class="profile-name fw-bold">{{ $superAdmin->nama_lengkap }}</span></a>
                    <span class="profile-status" style="font-size: 14px;">{{ $superAdmin->status_akun }}</span>
                </div>
                <div class="navbar-logo">
                    @if ($superAdmin->foto_profil)
                    <img src="{{ asset('storage/' . $superAdmin->foto_profil) }}" width="180" alt="Profile Logo">
                    @else
                    <img src="{{ asset('assets/images/default-fotoProfil.png') }}" width="180" alt="Profile Logo">
                    @endif
                </div>
            </div>
        </div>

    </div>
</body>

