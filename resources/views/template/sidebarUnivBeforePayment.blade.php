<link rel="stylesheet" href="assets/Css/sidebar.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="sidebar">
    <img src="assets/images/logo.png" alt="Logo" class="logo">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link" onclick="showAlert()" style="color: #857777;">Dashboard <i
                    class="fa-solid fa-lock"></i></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" onclick="showAlert()" style="color: #857777;">Mitra <i class="fa-solid fa-lock"></i></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" onclick="showAlert()" style="color: #857777;">Pengaturan <i
                    class="fa-solid fa-lock"></i></a>

        </li>
        <li class="nav-item">
            <a class="nav-link" style="font-weight: bold;">Paket</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" onclick="showAlert()" style="color: #857777;">Riwayat <i
                    class="fa-solid fa-lock"></i></a>

        </li>
        <div class="log-out align-items-center gap-3 d-flex flex-row w-100 justify-content-center logout" ">
        <button  onclick="showSweet()" style="background-color: transparent; border: none;">Log Out <i class="fa-solid fa-right-from-bracket"></i> </button>

          </div>
        </div>
    </li>
  </ul>
</div>

<div class="modal fade" id="berlangganan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
            Silahkan berlangganan terlebih dahulu!
        </div>
      </div>
    </div>
  </div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@12"></script>
<script>
    function showAlert() {
        $('#berlangganan').modal('show'); // Show the modal
        setTimeout(function() {
            // Hide the modal after one second
        }, 1000);
    }

    function showSweet() {
    swal("Log Out", "Apa anda yakin ingin keluar?", {
        buttons: ["Tidak", "Ya"],
    }).then((willLogout) => {
        if (willLogout) {
            window.location.href = "/loginpage"; // Ganti dengan URL halaman login Anda
        }
    });
}


</script>
