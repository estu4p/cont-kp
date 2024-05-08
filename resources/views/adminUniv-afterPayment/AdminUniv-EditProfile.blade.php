@extends('layouts/masterAfterPayProfil')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/AdminUniv-EditProfile.css') }}">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <div class="wadah">

        <div class="propil">
            <img src="{{ isset($user->foto_profil) ? asset('Admin-foto_profil/' . $user->foto_profil) : 'assets/images/atun.png' }}"
                alt="Profile Logo" class="gambarkiri">
            <div class="nama">{{ $user->nama_lengkap }}</div>
            <div class="email">{{ $user->email }}</div>
            <div class="about">About</div>
            <div class="keterangan">{{ $user->about }}</div>
        </div>

        <div id="preview" class="preview"></div>
        <div class="wadahedit d-flex">
            <div class=" p-5">
                <div class="atas d-flex flex-row  col-5">
                    <div id="previewZone">
                        <img src="{{ isset($user->foto_profil) ? asset('Admin-foto_profil/' . $user->foto_profil) : 'assets/images/atun.png' }}"
                            alt="Profile Logo" class="gambarkanan">
                    </div>
                    <form id="uploadForm" action="{{ route('AdminUniv.updateFoto', $user->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="upload col-5 d-flex flex-column mx-2 my-auto gap-1">
                            <label for="imageInput" class="custom-file-upload">
                                <button type="button" onclick="document.getElementById('imageInput').click()"
                                    style="border: 2px solid #00000080; border-radius: 6px; background-color: white; color: #00000080; font-size: 12px; font-weight: 600; padding: 5px 30px; text-transform: capitalize;">
                                    Change photo
                                </button>
                                <input type="file" name="foto_profil" id="imageInput" style="display: none;"
                                    onchange="uploadFile(event)">
                            </label>
                    </form>
                    {{-- <span class="remove m-0">remove</span> --}}
                    <button onclick="showAlertDeleteProfile('{{ $user->id }}')"
                        style="border: 0; color: red; background-color: transparent; text-transform: capitalize;">remove</button>
                </div>
            </div>

            <form action="{{ route('adminUniv.updateProfile') }}" method="POST">
                @csrf
                <div class="tengah row ">
                    <div class="judulkanan">Personal Details</div>
                    <div class="isi col-12 row justify-content-evenly  ">
                        <div class="form-group  col-6   p-3">
                            <label for="username">Nama lengkap</label>
                            <div class="input-group mb-3">
                                <input class="input form-control" type="text" id="name"
                                    placeholder="Atun Khostriatun" value="{{ $user->nama_lengkap }}" name="nama_lengkap">
                            </div>
                        </div>
                        <div class="form-group  col-6   p-3">
                            <label for="NoHP">No HP</label>
                            <div class="input-group mb-3">
                                <input class="input form-control" type="text" id="NoHP" placeholder="081326273187"
                                    value="{{ $user->no_hp }}" name="no_hp">
                            </div>
                        </div>
                        <div class="form-group  col-6   p-3">
                            <label for="email">Email</label>
                            <div class="input-group mb-3">
                                <input class="input form-control" type="email" id="email"
                                    placeholder="wahyudiatkinson@gmail.com" value="{{ $user->email }}" name="email">
                            </div>
                        </div>
                        <div class="form-group  col-6   p-3">
                            <label for="alamat">Alamat</label>
                            <div class="input-group mb-3">
                                <input class="input form-control" type="text" id="alamat" placeholder="Jateng"
                                    value="{{ $user->alamat }}" name="alamat">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bawah p-0 col-6">
                    <div class="judulkanan">Additional Info</div>
                    <div class="form-group form-floating">
                        <div class="col-12  ">
                            <label for="About">About</label>
                            <textarea id="About" class="form-control " style="width:97%;" name="about">{{ $user->about }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="tombol d-flex flex gap-2  align-items-end justify-content-end">
                    <button class="cancel">Cancel</button>
                    <button class="Update" type="submit">Update</button>
                </div>
        </div>
        </form>

    </div>
    </div>

    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content ">
                <div class="modal-body text-center">
                    <h3>Berhasil!</h3>
                    <img src="assets/images/berhasil.png" alt="Logo" class="logo">
                    <p>Perubahan berhasil</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showSuccessModal() {
            event.preventDefault();
            $('#successModal').modal('show');
            setTimeout(function() {
                $('#successModal').modal('hide');
                window.location.href = '/AdminUniv-Dashboard';
            }, 1000);
        }

        function uploadFile(event) {
            const file = event.target.files[0];
            const userId = "{{ $user->id }}";
            var formData = new FormData();
            formData.append('foto_profil', file);

            fetch('/univ-updateFoto/' + userId, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Response from server:', data);
                    // Update image source with the new uploaded image
                    const previewImage = document.getElementById('gambarKanan');
                    previewImage.src = data.newImageUrl;
                })
                .catch(error => {
                    console.error('Error uploading image:', error);
                });

            if (file) {
                const reader = new FileReader();

                reader.onload = function(event) {
                    const previewImage = document.getElementById('gambarKiri');
                    previewImage.src = event.target.result;

                    const previewImage2 = document.getElementById('gambarKanan');
                    previewImage2.src = event.target.result;
                };

                reader.readAsDataURL(file);
            }
        }

        function showAlertDeleteProfile(userId) {
            swal({
                    title: "Anda yakin?",
                    text: "Anda tidak akan dapat mengembalikan ini!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        fetch('/univ-deleteFoto/' + userId, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                }
                            })
                            .then(response => {
                                if (response.ok) {
                                    swal("Foto berhasil dihapus!", {
                                        icon: "success",
                                    });
                                    // Refresh halaman setelah foto dihapus
                                    setTimeout(function() {
                                        window.location.reload();
                                    }, 1000);
                                } else {
                                    throw new Error('Network response was not ok');
                                }
                            })
                            .catch(error => {
                                console.error('Error deleting photo:', error);
                                swal("Terjadi kesalahan saat menghapus foto!", {
                                    icon: "error",
                                });
                            });
                    } else {
                        swal("Foto tidak dihapus!");
                    }
                });
        }

        function setDefaultImage() {
            const defaultImageSrc = 'assets/images/atun.png';

            const previewImage = document.getElementById('gambarkiri');
            previewImage.src = defaultImageSrc;

            const previewImage2 = document.getElementById('gambarkanan');
            previewImage2.src = defaultImageSrc;
        }

        function handleImageChange(event) {
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    const previewImageKiri = document.getElementById('gambarKiri');
                    if (previewImageKiri) {
                        previewImageKiri.src = e.target.result;
                    }

                    const previewImageKanan = document.getElementById('gambarKanan');
                    if (previewImageKanan) {
                        previewImageKanan.src = e.target.result;
                    }
                };

                reader.readAsDataURL(file);
            }
        }


        const imageInput = document.getElementById('imageInput');
        imageInput.addEventListener('change', handleImageChange);

        const removeButton = document.querySelector('.remove');
        removeButton.addEventListener('click', function() {
            setDefaultImage();
        });


        function redirectToSubscriptionPage() {
            setTimeout(function() {
                alert("Perubahan berhasil");
            }, 5000);
        }

        document.querySelector('.Update').addEventListener('click', redirectToSubscriptionPage);
    </script>
@endsection
