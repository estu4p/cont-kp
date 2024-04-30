@extends('layouts.masterMitra')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/contributorformitra/editprofile.css') }}">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="wadah">
    <div class="propil"> 
        <div class="gambarkiri" > 
            <img src="{{ isset($userMitra->foto_profil) ? asset('storage/assets/images/' . $userMitra->foto_profil) : "assets/images/atun.png"}}" style="border-radius: 50%;" width="80" alt="Foto Profil" id="gambarKiri">
        </div>
        <div class="nama">{{ $userMitra->nama_lengkap }}</div>
        <div class="email">{{ $userMitra->email }}</div>
        <div class="about">About</div>
        <div class="keterangan">{{ $userMitra->about }}</div>
    </div>
    
    <div class="bg-white p-4 rounded tes col-xl-7 col-lg-7 col-md-11 col-sm-9">
        <div class="d-flex gap-4">
            <img src="{{ isset($userMitra->foto_profil) ? asset('storage/assets/images/' . $userMitra->foto_profil) : "assets/images/atun.png"}}" style="border-radius: 50%;" width="80" alt="Foto Profil" id="gambarKanan">
            <div class="my-auto d-flex flex-column align-items-center" style="flex-direction: row;">
                <form action="{{ route('contributorformitra.updateFoto', $userMitra->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <input type="file" name="foto_profile" id="uploadFoto" style="display: none;" onchange="uploadFile(event)">
                    <button type="button" onclick="document.getElementById('uploadFoto').click()" style="border: 2px solid #00000080; border-radius: 6px; background-color: white; color: #00000080; font-size: 12px; font-weight: 600; padding: 8px 12px; text-transform: capitalize;">
                        Change photo
                    </button>
                </form>
                <button onclick="showAlertDeleteProfile('{{ $userMitra->id }}')"
                    style="border: 0; color: red; background-color: transparent; text-transform: capitalize;">remove</button>
                    
            </div>
        </div>
            
        <form action="{{ route('contributorformitra.updateProfile', $userMitra->id )}}" method="POST">
            @csrf
            @method('PUT')
            <h6 class="mb-4 mt-5 text-capitalize" style="font-weight: 700; opacity: 0.8;">personal details</h6>
            <div class="text-capitalize">
                <div class="row">
                    <div class="col d-flex flex-column">
                        <label for="nama" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">nama lengkap</label>
                        <input type="text" name="nama_lengkap" value="{{ $userMitra->nama_lengkap }}"
                            class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;" id="">
                    </div>
                    <div class="col d-flex flex-column">
                        <label for="email" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">email</label>
                        <input type="email" name="email" value="{{ $userMitra->email }}"
                            class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;" id="">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col d-flex flex-column">
                        <label for="hp" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">No HP</label>
                        <input type="text" name="no_hp" value="{{ $userMitra->no_hp }}"
                            class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;" id="">
                    </div>
                    <div class="col d-flex flex-column">
                        <label for="alamat" style="font-size: 14px; margin-bottom: 8px; opacity: 0.8;">alamat</label>
                        <input type="text" name="alamat" value="{{ $userMitra->alamat }}"
                            class="px-3 py-2 border-0 border-bottom" style="background-color: #F2F4F8;" id="">
                    </div>
                </div>
            </div>
            <div class="bawah p-0 col-6">
                <div class="judulkanan">Additional Info</div>
                <div class="form-group col-4 p-2">
                    <label for="about">About</label>
                </div>
                <div class="form-group form-floating">
                    <div class="col-12">
                        <textarea id="about" class="tex-about" name="about" class="form-control" style="width:97%;" placeholder="{{ $userMitra->about }}"></textarea>
                    </div>
                </div>
            </div>
            <div class="tombol d-flex flex gap-2 align-items-end justify-content-end">
                <a href="{{ url('contributorformitra-dashboard') }}" type="button" style="background-color: #02020259; color: white; padding: 8px 16px; border-radius: 8px; border: 0;">Cancel</a>
                <button type="submit" style="background-color: #A4161A; color: white; padding: 8px 16px; border-radius: 8px; border: 0;">Update</button>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
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
            window.location.href = '/contributorformitra-dashboard';
        }, 1000);
    }

    function uploadFile(event) {
        const file = event.target.files[0];
        const userId = "{{ $userMitra->id }}";
        var formData = new FormData();
        formData.append('foto_profile', file);
        
        fetch('/contributorformitra/updateFoto/' + userId, {
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
            // Handle response from server as needed
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
                        fetch('/contributorformitra-deleteFoto/' + userId, {
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
</script>

@endsection
