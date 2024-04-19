<link rel="stylesheet" href="{{ asset('assets/css/AdminSistem/AdminSistem-inputnewpassword.css') }}">
<div class="content">
    <h1>Buat Password baru</h1>
    <p>Password baru harus berbeda dari password sebelumnya.</p>
</div>
<div class="inputan">
<input type="password"  placeholder="Ketikkan password baru" class="passwordbaru"><br>
<input type="password"  placeholder="Ketikkan password baru" class="passwordbaru">
</div>
<div class="tombol-Continue">
    <button class="botton" id="resetPasswordBtn">Reset Password</button>
</div>

<div id="myModal" class="modal">
    <div class="modal-content">
      <h1>Berhasil !</h1>
      <img src="/assets/images/berhasil.png" alt="">
      <p>Password berhasil diubah silahkan login kembali</p>
    </div>
  </div>

  <script>
    // Get the button element
var button = document.getElementById("resetPasswordBtn");

// Get the modal element
var modal = document.getElementById("myModal");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
button.onclick = function() {
  // Show the modal
  modal.style.display = "block";

  // Set timeout to close the modal after 2 seconds
  setTimeout(function() {
    // Hide the modal
    modal.style.display = "none";
    // Redirect to /user-AdminSistem/login
    window.location.href = "/user-AdminSistem/login";
  }, 2000);
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
  </script>

