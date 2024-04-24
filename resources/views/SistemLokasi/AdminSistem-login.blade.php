<link rel="stylesheet" href="{{ asset('assets/css/AdminSistem/AdminSistem-login.css') }}">
<div class="Rectangle">
   <div class="ikon"><img src="/assets/images/gembok.png"></div>
   <div class="heading"><p class="style_heading">Log In</p></div>
   <div style=" display: flex; flex-direction: column;">
    <label class="username">Username/Email</label>
    <input type="username" class="inputt"placeholder="Masukkan username / email">
   </div>
   <br>
   <div style=" display: flex; flex-direction: column;">
    <label class="username">Password</label>
    <input type="password" class="inputt"placeholder="Masukkan password">
   </div>
   <br>
   <div style="display: flex; justify-content: space-between;">
    <div class="pengingat">
        <input type="checkbox"> <p>ingatkan saya</p>
    </div>
    <div class="resetsandi">
        <p>Lupa kata sandi? <a href="/user-AdminSistem/resetpassword" style="color: #660708">Reset</a></p>
    </div>
   </div>
   <br>
   <div style="text-align:center">
    <a href="/AdminSistem-Dashboard"><button class="TombolLogin">Login as Administrator</button></a>
   </div>
   <div class="daftarakun">
    <p>Belum punya akun? <a href="#" style="color: #660708">Daftar</a> </p>
   </div>
   </div>




</div>
