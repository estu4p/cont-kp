@extends('layouts.masterSistem')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/AdminSistem-Subcription.css') }}">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



<body>
    <div class="container">
        <div>
            <h3 class="header-title">Subcription</h3>
        </div>

        <div class="search-bar p">
            <p>Cari data subcription</p>
        </div>

        <div class="search-bar px-2 search-wadah  ovweflow-hidden">
            <i class="bi bi-search"></i>
            <input type="search" class="inputsearch" placeholder="pencarian">
        </div>
        <div>
            <select name="page" class="page">
                <option value="1">page 1 of 2</option>
            </select>
            <select name="item" class="bodi">
                <option value="5" selected>5 item per page</option>
            </select>
        </div>

        <div class="tabel">
            <table class="table table-striped">
                <thead class="text-center">
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
                    @php
                    $no = 1;
                    @endphp
                    @foreach($subscriptions as $subscription)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td class="align-middle">{{ $subscription->nama_lengkap }}</td>
                        <td class="align-middle">{{ $subscription->email }}</td>
                        <td class="align-middle">{{ $subscription->sekolah }}</td>
                        @if ($subscription->paket === 'Bronze')
                        <td class="text-center">
                            <p style="background-color: #AF3333; color: white; border-radius: 20px; padding: 8px; width: 80%; margin: auto;">
                                {{ $subscription->paket }}
                            </p>
                        </td>
                        @elseif ($subscription->paket === 'Silver')
                        <td class="text-center">
                            <p style="background-color: #1A4CFF; color: white; border-radius: 20px; padding: 8px; width: 80%; margin: auto;">
                                {{ $subscription->paket }}
                            </p>
                        </td>
                        @elseif ($subscription->paket === 'Gold')
                        <td class="text-center">
                            <p style="background-color: #1AA158; color: white; border-radius: 20px; padding: 8px; width: 80%; margin: auto;">
                                {{ $subscription->paket }}
                            </p>
                        </td>
                        @else
                        <td class="text-center">
                            <p style="background-color: #4A1A88; color: white; border-radius: 20px; padding: 8px; width: 80%; margin: auto;">
                                {{ $subscription->paket }}
                            </p>
                        </td>
                        @endif
                        <td class="align-middle">{{ $subscription->lokasi }}</td>
                        <td>
                            <div class="aksi d-flex flex-row justify-content-around ">
                                <button class=" d-flex flex-column gap-0 p-0" style="border: none;" onclick="showEditModal('{{ $subscription->id }}', '{{ $subscription->nama_lengkap }}', '{{ $subscription->email }}', '{{ $subscription->telepon }}', '{{ $subscription->sekolah }}', '{{ $subscription->paket }}', '{{ $subscription->tanggal }}', '{{ $subscription->tanggal_berakhir }}', '{{ $subscription->harga }}', '{{ $subscription->status }}')">
                                    <i class="fas fa-pen m-0 p-0 blue-icon"></i>
                                    <i class="fas fa-minus m-0" style="margin-top: -5px !important; color: blue;"></i>
                                </button>
                                <form action="{{ route('subscriptions.deleteSubs', ['id' => $subscription->id]) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="border: none;" onclick="return showdeletemodal(event)">
                                        <i class="fa-solid fa-trash-can red-icon"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <nav aria-label="Page ">
            <ul class="paging pagination">
                <li class="page-item "><a class="page-link" href="#">1

                    </a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item disabled"><a class="page-link" href="#">...</a></li>
                <li class="page-item"><a class="page-link" href="#">10</a></li>
            </ul>
        </nav>

        <div id="edit-pelanggan" class="modal fade ">
            <div class="modal-dialog">
                <div class="modal-content wadah">
                    <div class="modal-header">
                        <h5 class="modal-title modaltitle">Edit Pelanggan</h5>
                    </div>
                    <form method="POST" id="edit-form">
                        @csrf
                        @method('PUT')
                        <div class="modal-body modalbodi">
                            <!-- Isi konten form modal disini -->
                            @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <div class="kiri">
                                <div class="form-group">
                                    <label for="id-pelanggan">ID Pelanggan</label>
                                    <input type="text" class="inputt3" id="id-pelanggan" name="id-pelanggan" value="001-012-1111" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="hidden" name="nama" value="{{ optional($subscription->user)->user_id}}">
                                    <input type="text" class="inputt" id="nama" value="{{ optional($subscription->user)->nama_lengkap}}">
                                </div>
                                <div class="form-group">
                                    <label for="Email">Email</label>
                                    <input type="text" class="inputt" id="Email" name="email" value="{{ optional($subscription->user)->email}}" placeholder="email">
                                </div>
                                <div class="form-group">
                                    <label for="Telepon">Telepon</label>
                                    <input type="number" class="inputt" id="Telepon" name="no_hp" value="{{optional($subscription->user)->no_hp}}">
                                </div>
                                <div class="form-group">
                                    <label for="Sekolah">Sekolah/perguruantinggi</label>
                                    <!-- <input type="text" class="inputt" id="Sekolah" name="sekolah" placeholder="sekolah/perguruan tinggi" > -->
                                    <select class="form-select" aria-label="Default select example" name="sekolah">
                                        <option selected>{{optional($subscription->user)->sekolah}}</option>
                                        @foreach($allSekolah as $item)
                                            <option value="{{$item->id}}">{{$item->nama_sekolah}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="kanann">
                                <div class="form-group">
                                    <label for="paket-berlangganan">Paket Berlangganan:</label>
                                    <div class="custom-select">
                                        <select class="inputt" id="paket-berlangganan" name="paket_berlangganan">
                                            @foreach ($subscriptions as $p)
                                            <option class="opsions" value="{{ $p->id }}">{{ $p->paket }}</option>
                                            @endforeach
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
                                        <span style="padding-left: 5px;">to</span>
                                        <input class="inputt2" type="date" id="end-date" name="end-date" value="2024-01-23">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input class="inputt" type="text" id="harga" name="harga" value="{{$subscription->harga}}">
                                </div>
                                <div class="form-group">
                                    <label for="status-berlangganan">Status Berlangganan:</label>
                                    <div class="custom-select">
                                        <select class="inputt" id="status_akun" name="status_berlangganan">
                                            <option class="opsions" value="aktif">Aktif</option>
                                            <option class="opsions" value="alumni">Tidak aktif</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>


        <script>
            function showEditModal(subscriptionId, nama, email, no_hp, sekolah, paket, startDate, endDate, harga, status) {
                $('#edit-form').attr('action', '/AdminSistem-Subcription/' + subscriptionId + '/update');
                $('#id-pelanggan').val(subscriptionId);
                $('#nama').val(nama);
                $('#Email').val(email);
                $('#Telepon').val(no_hp);
                $('#Sekolah').val(sekolah);
                // Set nilai opsi yang dipilih pada elemen select
                $('#paket-berlangganan').val(paket);

                // Atur opsi yang dipilih menjadi selected
                $('#paket-berlangganan option').filter(function() {
                    return $(this).text() === paket;
                }).prop('selected', true);
                $('#start-date').val(startDate);
                $('#end-date').val(endDate);
                $('#harga').val(harga);
                $('#status-berlangganan').val(status);

                $('#edit-pelanggan').modal('show');
            }

            function submitEditForm() {
                //mengambil nilai dari form
                var idPelanggan = $('#id-pelanggan').val();
                var nama = $('#nama').val();
                var email = $('#Email').val();
                var telepon = $('#Telepon').val();
                var sekolah = $('#Sekolah').val();
                var paketBerlangganan = $('#paket-berlangganan').val();
                var startDate = $('#start-date').val();
                var endDate = $('#end-date').val();
                var harga = $('#harga').val();
                var statusBerlangganan = $('#status-berlangganan').val();

                //mengirim data form ke endpoint
                $.ajax({
                    type: 'PUT',
                    URL: '/subscriptions/' + idPelanggan + '/update',
                    data: {
                        nama_lengkap: nama,
                        email: email,
                        telepon: telepon,
                        sekolah: sekolah,
                        paket_berlangganan: paketBerlangganan,
                        tgl_masuk: startDate,
                        tgl_keluar: endDate,
                        harga: harga,
                        status_akun: statusBerlangganan
                    },
                    success: function(response) {
                        //tampilkan pesan sukses
                        alert('Subscription update successfully');
                        //tutup modal edit
                        $('#edit-pelanggan').modal('hide');
                    },
                    error: function(xhr, status, error) {
                        //tampilkan pesan error
                        alert('Error: ' + error);
                    },
                });
            }

            // Fungsi untuk menampilkan modal konfirmasi penghapusan
            function showdeletemodal(event) {
                event.preventDefault();
                swal({
                        title: "Hapus",
                        text: "Apakah anda yakin ingin menghapus!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            // Jika pengguna mengonfirmasi penghapusan, submit form
                            event.target.closest('.delete-form').submit();
                        } else {
                            swal("Penghapusan dibatalkan.");
                        }
                    });
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





            document.addEventListener('DOMContentLoaded', function() {
                const pageLinks = document.querySelectorAll('.paging .page-link');

                pageLinks.forEach(link => {
                    link.addEventListener('click', function(e) {
                        e.preventDefault(); // Menghentikan aksi default dari link

                        // Mendapatkan nomor halaman dari teks
                        const pageNumber = parseInt(this.textContent.trim());

                        // Menghapus kelas 'active' dari semua link pagination
                        pageLinks.forEach(page => page.classList.remove('active'));

                        // Menambahkan kelas 'active' ke yang diklik
                        this.classList.add('active');

                        // Mengambil semua baris tabel
                        const rows = document.querySelectorAll('tr');

                        // Menyembunyikan semua baris kecuali yang sesuai dengan nomor halaman yang dipilih
                        rows.forEach(row => {
                            if (row.children.length > 0 && parseInt(row.children[0].textContent) !== pageNumber) {
                                row.style.display = 'none';
                            } else {
                                row.style.display = 'table-row';
                            }
                        });
                    });
                });
            });


            // Mendapatkan elemen input pencarian
            const searchInput = document.querySelector('.inputsearch');

            // Mendapatkan semua baris tabel
            const rows = document.querySelectorAll('table tbody tr');

            // Fungsi untuk menyaring baris berdasarkan kata kunci pencarian
            const filterRows = (searchTerm) => {
                searchTerm = searchTerm.toLowerCase(); // Mengkonversi kata kunci pencarian menjadi lowercase

                rows.forEach(row => {
                    const cells = row.querySelectorAll('td'); // Mendapatkan sel-sel dalam setiap baris

                    // Memeriksa setiap sel untuk mencocokkan kata kunci pencarian
                    let found = false;
                    cells.forEach(cell => {
                        const text = cell.innerText.toLowerCase();
                        if (text.includes(searchTerm)) {
                            found = true;
                        }
                    });

                    // Menampilkan atau menyembunyikan baris berdasarkan hasil pencarian
                    if (found) {
                        row.style.display = ''; // Menampilkan baris
                    } else {
                        row.style.display = 'none'; // Menyembunyikan baris
                    }
                });
            };

            // Event listener untuk memanggil fungsi filterRows saat input pencarian berubah
            searchInput.addEventListener('input', () => {
                filterRows(searchInput.value);
            });
        </script>


        @endsection