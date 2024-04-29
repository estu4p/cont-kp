<link rel="stylesheet" href="{{ asset('assets/css/AdminSistem/AdminSistem-inputnewpassword.css') }}">
<div class="content">
    <h1>Buat Password baru</h1>
    <p>Password baru harus berbeda dari password sebelumnya.</p>
</div>
<div class="inputan">
    <form id="resetPasswordForm" method="POST" action="{{ route('password.newAdminSistem') }}">
        @csrf
        <input type="password" placeholder="Ketikkan password baru" name="password" class="passwordbaru"><br>
        <input type="password" placeholder="Konfirmasi password baru" name="password_confirmation" class="passwordbaru">
        <br><br>
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

    // Get the form element
    var form = document.getElementById("resetPasswordForm");

    // When the form is submitted
    form.addEventListener('submit', function(event) {
        // Prevent the default form submission
        event.preventDefault();
        // Display modal and submit form
        displayModalAndSubmitForm();
    });

// Get the form element
var form = document.getElementById("resetPasswordForm");

// When the form is submitted
form.addEventListener('submit', function(event) {
    // Prevent the default form submission
    event.preventDefault();

    // Get the password input fields
    var passwordField = document.querySelector('.passwordbaru[name="password"]');
    var confirmPasswordField = document.querySelector('.passwordbaru[name="password_confirmation"]');

    // Get the values of password input fields
    var passwordValue = passwordField.value.trim();
    var confirmPasswordValue = confirmPasswordField.value.trim();

    // Check if both password fields are filled
    if (passwordValue === '' || confirmPasswordValue === '') {
        // Display an error message or take any other action you prefer
        alert("Harap isi kedua input password.");
        return;
    }

    // Display modal and submit form if both passwords are filled
    displayModalAndSubmitForm();
});

// Get the form element
var form = document.getElementById("resetPasswordForm");

// When the form is submitted
form.addEventListener('submit', function(event) {
    // Prevent the default form submission
    event.preventDefault();

    // Get the password input fields
    var passwordField = document.querySelector('.passwordbaru[name="password"]');
    var confirmPasswordField = document.querySelector('.passwordbaru[name="password_confirmation"]');

    // Get the values of password input fields
    var passwordValue = passwordField.value.trim();
    var confirmPasswordValue = confirmPasswordField.value.trim();

    // Check if both password fields are filled
    if (passwordValue === '' || confirmPasswordValue === '') {
        // Display an error message or take any other action you prefer
        alert("Harap isi kedua input password.");
        return;
    }

    // Check if both passwords have more than 8 characters
    if (passwordValue.length <= 8 || confirmPasswordValue.length <= 8) {
        // Display an error message or take any other action you prefer
        alert("Password harus lebih dari 8 karakter.");
        return;
    }

    // Display modal and submit form if both passwords are filled and meet length requirement
    displayModalAndSubmitForm();
});



</script>
