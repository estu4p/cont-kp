@extends('layouts.masterSistem')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/AdminSistem-Subcription.css') }}">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



<body>
    <div class="container">



        <div>
            <h3 class="header-title">Subcription</h3>
        </div>

        <div class="search-bar p">
            <p>Cari data subcription</p>
        </div>

        <div class="search-bar px-2 search-wadah border border-secondary ovweflow-hidden">
            <i class="bi bi-search"></i>
            <input type="search" class="inputsearch" placeholder="pencarian">
        </div>
        <div>
            <select name="page" class="page">
                <option value="page">page 1 of 1</option>
            </select>
            <select name="item" class="item">
                <option value="item">5 item per page</option>
            </select>
        </div>
        <div class="tabel">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Perguruan Tinggi</th>
                        <th>Paket Berlangganan</th>
                        <th>Lokasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>1</td>
                        <td>Raihan Hafidz</td>
                        <td>valhanhafidz@gmail.com</td>
                        <td>Universitas Ahmad Dahlan</td>
                        <td>
                            <div class="Bronze">Bronze</di>
                        </td>
                        <td>Yogyakarta</td>
                        <td class="aksi d-flex flex-row justify-content-around">
                            <button class=" d-flex flex-column gap-0 p-0" style="border: none;" onclick="showEditModal()">

                                <i class="fas fa-pen m-0 p-0 blue-icon"></i>
                                <i class="fas fa-minus m-0" style="margin-top: -5px !important; color: blue;"></i>
                            </button>

                            <button style="border: none;" onclick="showdeletemodal()">
                                <i class="fa-solid fa-trash-can red-icon"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Syolita Widyandini</td>
                        <td>syalitawdya@gmail.com</td>
                        <td>Universitas Indonesia</td>
                        <td>
                            <div class="Silver">Silver</div>
                        </td>
                        <td>Yogyakarta</td>
                        <td class="aksi d-flex flex-row justify-content-around">
                            <button class=" d-flex flex-column gap-0 p-0" style="border: none;" onclick="showEditModal()">

                                <i class="fas fa-pen m-0 p-0 blue-icon"></i>
                                <i class="fas fa-minus m-0" style="margin-top: -5px !important; color: blue;"></i>
                            </button>

                            <button style="border: none;" onclick="showdeletemodal()">
                                <i class="fa-solid fa-trash-can red-icon"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>

                        <td>3</td>
                        <td>Canni Hernanda</td>
                        <td>dannhernando1/@gmail.com</td>
                        <td>Universitas Negeri Yogyakarta</td>
                        <td>
                            <div class="Bronze">Bronze</div>
                        </td>
                        <td>Yogyakarta</td>
                        <td class="aksi d-flex flex-row justify-content-around">
                            <button class=" d-flex flex-column gap-0 p-0" style="border: none;" onclick="showEditModal()">

                                <i class="fas fa-pen m-0 p-0 blue-icon"></i>
                                <i class="fas fa-minus m-0" style="margin-top: -5px !important; color: blue;"></i>
                            </button>

                            <button style="border: none;" onclick="showdeletemodal()">
                                <i class="fa-solid fa-trash-can red-icon"></i>

                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>4</td>
                        <td>Fetnan Adipurmowo</td>
                        <td>febrianadip@gmail.com</td>
                        <td>Universitas Gadjah Mada</td>
                        <td>
                            <div class="Gold">Gold</div>
                        </td>
                        <td>Yogyakarta</td>
                        <td class="aksi d-flex flex-row justify-content-around">
                            <button class=" d-flex flex-column gap-0 p-0" style="border: none;" onclick="showEditModal()">
                                <i class="fas fa-pen m-0 p-0 blue-icon"></i>
                                <i class="fas fa-minus m-0" style="margin-top: -5px !important; color: blue;"></i>
                            </button>

                            <button style="border: none;" onclick="showdeletemodal()">
                                <i class="fa-solid fa-trash-can red-icon"></i>
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>5</td>
                        <td>Yessa Khoirunissa</td>
                        <td>Yessaakhh@gmail.com</td>
                        <td>Universitas Alma ata</td>
                        <td>
                            <div class="Platinum">Platinum</di>
                        </td>
                        <td>Yogyakarta</td>
                        <td class="aksi d-flex flex-row justify-content-around">
                            <button class="d-flex flex-column gap-0 p-0" style="border: none;" onclick="showEditModal()">
                                <i class="fas fa-pen m-0 p-0 blue-icon"></i>
                                <i class="fas fa-minus m-0" style="margin-top: -5px !important; color: blue;"></i>


                            </button>

                            <button style="border: none;" onclick="showdeletemodal()">
                                <i class="fa-solid fa-trash-can red-icon"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">

                </li>
            </ul>
        </nav>


        <div id="edit-pelanggan" class="modal fade ">
            <div class="modal-dialog">
                <div class="modal-content wadah">
                    <div class="modal-header">
                        <h5 class="modal-title modaltitle">Edit Pelanggan</h5>

                    </div>
                    <div class="modal-body modalbodi">
                        <!-- Isi konten form modal disini -->
                        <div class="kiri">
                            <div class="form-group">
                                <label for="id-pelanggan">ID Pelanggan</label>
                                <input type="text" class="inputt3" id="id-pelanggan" name="id-pelanggan" value="001-012-1111" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="inputt" id="nama" name="nama" placeholder="Raihan Hafidz">
                            </div>
                            <div class="form-group">
                                <label for="Email">Email</label>
                                <input type="text" class="inputt" id="Email" name="Email" placeholder="RaihanHafidz@gmail.com">
                            </div>
                            <div class="form-group">
                                <label for="Telepon">Telepon</label>
                                <input type="text" class="inputt" id="Telepon" name="Telepon" placeholder="081234567890">
                            </div>
                            <div class="form-group">
                                <label for="Sekolah">Sekolah/perguruantinggi</label>
                                <input type="text" class="inputt" id="Sekolah" name="Sekolah" placeholder="Universitas Ahmad Dahlan">
                            </div>
                        </div>
                        <div class="kanann">
                            <div class="form-group">
                                <label for="paket-berlangganan">Paket Berlangganan:</label>
                                <div class="custom-select">
                                    <select class="inputt" id="paket-berlangganan" name="paket-berlangganan">
                                        <option class="opsions" value="Bronze">Bronze</option>
                                        <hr>
                                        <option class="opsions" value="Silver">Silver</option>
                                        <hr>
                                        <option class="opsions" value="Gold">Gold</option>
                                        <hr>
                                        <option class="opsions" value="Platinum">Platinum</option>
                                        <hr>
                                    </select>
                                </div>


                            </div>
                            <div style="display: flex;">
                                <div class="form-group">
                                    <label for="start-date">Start Date:</label>
                                    <input class="inputt2" type="date" id="start-date" name="start-date" value="2023-10-23">
                                </div>
                                <div class="form-group">
                                    <label for="end-date">End Date:</label>
                                    <span>to</span>
                                    <input class="inputt2" type="date" id="end-date" name="end-date" value="2024-01-23">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="telepon">Harga</label>
                                <input class="inputt" type="tel" id="telepon" name="telepon" value="Rp.1.000.000">
                            </div>
                            <div class="form-group">
                                <label for="status-berlangganan">Status Berlangganan:</label>
                                <div class="custom-select">
                                    <select class="inputt" id="paket-berlangganan" name="paket-berlangganan">
                                        <option class="opsions" value="Akti">Aktif</option>
                                        <hr>
                                        <option class="opsions" value="Tidak aktif">Tidak aktif</option>
                                        <hr>
                                    </select>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>

                        <button type="submit" class="btn btn-danger" onclick="showSuccessModal()">Simpan</button>

                    </div>
                </div>
            </div>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>





            <script>
                function showdeletemodal() {
                    swal({
                        title: "Hapus",
                        text: "Apakah anda yakin ingin menghapus?",
                        buttons: {
                            cancel: {
                                text: "Batal",
                                value: null,
                                visible: true,
                                className: "swal-button--cancel",
                                closeModal: true,
                            },
                            confirm: {
                                text: "ya",
                                value: true,
                                visible: true,
                                className: "swal-button--confirm",
                                closeModal: true,
                            },
                        },
                        reverseButtons: true, // Mengubah posisi tombol menjadi kiri (batal) dan kanan (ok)
                    });
                }

                function showEditModal() {
                    $('#edit-pelanggan').modal('show');
                }

                function showSuccessModal() {
                    swal("Successfully Saved", "user has been changed.", "success")
                        .then((value) => {
                            if (value) {
                                location.reload(); // Refresh halaman web
                            }
                        });
                }

                var x, i, j, l, ll, selElmnt, a, b, c;
                /* Look for any elements with the class "custom-select": */
                x = document.getElementsByClassName("custom-select");
                l = x.length;
                for (i = 0; i < l; i++) {
                    selElmnt = x[i].getElementsByTagName("select")[0];
                    ll = selElmnt.length;
                    /* For each element, create a new DIV that will act as the selected item: */
                    a = document.createElement("DIV");
                    a.setAttribute("class", "select-selected");
                    a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
                    x[i].appendChild(a);
                    /* For each element, create a new DIV that will contain the option list: */
                    b = document.createElement("DIV");
                    b.setAttribute("class", "select-items select-hide");
                    for (j = 1; j < ll; j++) {
                        /* For each option in the original select element,
                        create a new DIV that will act as an option item: */
                        c = document.createElement("DIV");
                        c.innerHTML = selElmnt.options[j].innerHTML;
                        c.addEventListener("click", function(e) {
                            /* When an item is clicked, update the original select box,
                            and the selected item: */
                            var y, i, k, s, h, sl, yl;
                            s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                            sl = s.length;
                            h = this.parentNode.previousSibling;
                            for (i = 0; i < sl; i++) {
                                if (s.options[i].innerHTML == this.innerHTML) {
                                    s.selectedIndex = i;
                                    h.innerHTML = this.innerHTML;
                                    y = this.parentNode.getElementsByClassName("same-as-selected");
                                    yl = y.length;
                                    for (k = 0; k < yl; k++) {
                                        y[k].removeAttribute("class");
                                    }
                                    this.setAttribute("class", "same-as-selected");
                                    break;
                                }
                            }
                            h.click();
                        });
                        b.appendChild(c);
                    }
                    x[i].appendChild(b);
                    a.addEventListener("click", function(e) {
                        /* When the select box is clicked, close any other select boxes,
                        and open/close the current select box: */
                        e.stopPropagation();
                        closeAllSelect(this);
                        this.nextSibling.classList.toggle("select-hide");
                        this.classList.toggle("select-arrow-active");
                    });
                }

                function closeAllSelect(elmnt) {
                    /* A function that will close all select boxes in the document,
                    except the current select box: */
                    var x, y, i, xl, yl, arrNo = [];
                    x = document.getElementsByClassName("select-items");
                    y = document.getElementsByClassName("select-selected");
                    xl = x.length;
                    yl = y.length;
                    for (i = 0; i < yl; i++) {
                        if (elmnt == y[i]) {
                            arrNo.push(i)
                        } else {
                            y[i].classList.remove("select-arrow-active");
                        }
                    }
                    for (i = 0; i < xl; i++) {
                        if (arrNo.indexOf(i)) {
                            x[i].classList.add("select-hide");
                        }
                    }
                }

                /* If the user clicks anywhere outside the select box,
                then close all select boxes: */
                document.addEventListener("click", closeAllSelect);
            </script>

            @endsection