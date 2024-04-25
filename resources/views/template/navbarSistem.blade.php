  <link rel="stylesheet" href="{{ asset('assets/css/navbar.css') }}">
  </head>

  <body>
      <nav class="navbar d-flex justify-content-between">
        <div class="kosongan"></div>
          <div class="kanan  d-flex flex-row justify-content-between">
              <div class="ml-5  mr-2">
                <i class="fa-solid fa-bell fa-2x"></i>               </div>
              <div class="d-flex justify-content-evenly flex-row ">
                
                  <div class="navbar-profile">
                  
                      <span class="profile-name">{{ $userAdmin->nama_lengkap }}</span>
                      <span class="profile-status">{{ $userAdmin->status_akun }}</span>
                      
                  </div>
                  <a href="/AdminSistem-Editprofile"> <div class="navbar-logo">
                      <img src="{{ isset($userAdmin->foto_profil) ? asset('storage/assets/images/' . $userAdmin->foto_profil) : "assets/images/atun.png" }}" style="border-radius: 50%;" alt="Profile Logo"></a>
                  </div>
                  
               
              </div>

          </div>

      </nav>
