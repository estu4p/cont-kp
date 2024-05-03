<link rel="stylesheet" href="{{ asset('assets/css/AdminSistem/AdminSistem-inputnewpassword.css') }}">
<div class="content">
    <h1>Buat Password baru</h1>
    <p>Password baru harus berbeda dari password sebelumnya.</p>
</div>
<div class="inputan">
    <form id="resetPasswordForm" method="POST" action="{{ route('password.newAdminSistem') }}">
        @csrf
        <input type="password" placeholder="Ketikkan password baru" name="password" class="passwordbaru" oninput="checkPasswordMatch()"><br>
        <input type="password" placeholder="Konfirmasi password baru" name="password_confirmation" class="passwordbaru" oninput="checkPasswordMatch()">
        <br>
        <p id="passwordMatchError" style="color: red; display: none;">Password dan konfirmasi password harus sama.</p>
        <br>
        <button type="submit" class="botton" id="resetPasswordBtn">Reset Password</button>
    </form>
</div>

<div id="myModal" class="modal">
    <div class="modal-content">
        <h1>Berhasil !</h1>
        <img src="/assets/images/berhasil.png" alt="">
        <p>Password berhasil diubah silahkan login kembali</p>
    </div>
</div>

<script>
    // Get the modal element
    var modal = document.getElementById("myModal");

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
            // Redirect to login page
            window.location.href = "/user-AdminSistem/login";
        }
    }

    // Function to display modal and submit form
    function displayModalAndSubmitForm() {
        // Show the modal
        modal.style.display = "block";

        // Set timeout to close the modal after 2 seconds
        setTimeout(function() {
            // Hide the modal
            modal.style.display = "none";
            // Submit the form
            document.getElementById("resetPasswordForm").submit();
        }, 2000);
    }

    // Function to check if password and confirm password match
    function checkPasswordMatch() {
        var passwordField = document.querySelector('.passwordbaru[name="password"]');
        var confirmPasswordField = document.querySelector('.passwordbaru[name="password_confirmation"]');
        var resetPasswordBtn = document.getElementById("resetPasswordBtn");
        var passwordMatchError = document.getElementById("passwordMatchError");

        // Check if both passwords match
        if (passwordField.value === confirmPasswordField.value) {
            // Enable the reset password button and hide the error message
            resetPasswordBtn.disabled = false;
            passwordMatchError.style.display = 'none';
        } else {
            // Disable the reset password button and display the error message
            resetPasswordBtn.disabled = true;
            passwordMatchError.style.display = 'block';
        }
    }
</script>
