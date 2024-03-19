<link rel="stylesheet" href="{{ asset('assets/css/super-admin.css') }}">
</head>

<body>
    <a href="/super-admin/ubah-profil" class="navbar d-flex justify-content-between text-decoration-none" style=" color: #000000;">
      <div class="kosongan"></div>
        <div class="kanan d-flex flex-row justify-content-between gap-5">
            <div class="ml-5 mr-2">
              <i class="fa-solid fa-bell fa-2x"></i>               
            </div>
            <div class="d-flex justify-content-evenly flex-row text-center">
                <div class="navbar-profile">
                    <span class="profile-name fw-bold">{{ $superAdmin->nama_lengkap }}</span>
                    <span class="profile-status" style="font-size: 14px;">{{ $superAdmin->status_akun }}</span>
                </div>
                <div class="navbar-logo">
                    <img src="{{ asset('assets/images/Rectangle 22.png') }}" alt="Profile Logo">
                </div>
            </div>

        </div>

    </a>
