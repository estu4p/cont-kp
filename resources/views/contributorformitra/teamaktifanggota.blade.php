@extends('layouts.masterMitra')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/contributorformitra/teamaktifanggota.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<div class="ruangan">
<div class="top">
    <div>
      <a href="/contributorformitra-devisi"><i class="keluar bi bi-chevron-left" style="color: black"></i></a>
    </div>
    <div class="input">
        <i class="fa-solid fa-magnifying-glass" style="padding-left: 10px"></i>
        <input type="search" class="inputsearch" placeholder="cari Nama Mahasiswa">
    </div>
</div>
    <div class="h1">
        <h1 class="h1">Data Mahasiswa</h1>
    </div>
    <br>
    <div class="filter">
    <div class="dropdown">
        <button class="tombolturun btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          Page 1 of 1
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#"></a></li>
          <li><a class="dropdown-item" href="#"></a></li>
          <li><a class="dropdown-item" href="#"></a></li>
        </ul>
      </div>
      <div class="dropdown">
        <button class="tombolturun btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        5 item per page
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#"></a></li>
          <li><a class="dropdown-item" href="#"></a></li>
          <li><a class="dropdown-item" href="#"></a></li>
        </ul>
      </div>
    </div>
    <br>

<div class="tabel">
<table class="table">
<thead>
  <tr>
    <th>No</th>
    <th>Nama</th>
    <th>NIM</th>
    <th>Divisi</th>
    <th>Status</th>
    <th></th>
  </tr>
</thead>
<tbody>
  <tr>
    <td>1</td>
    <td>Reva Fidela Pantjoro</td>
    <td>2000018247</td>
    <td>UI/UX</td>
    <td><span class="status">active</span></td>
    <td><div class="dropdown">
        <i class="bi bi-info-circle-fill" href="#" role="button" id="infoDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
        </a>
        <ul class="dropdown-menu" aria-labelledby="infoDropdown">
          <li><a class="dropdown-item" href="/contributorformitra-devisi-LihatProfil">Lihat Profil Mahasiswa</a></li>
          <li><a class="dropdown-item" href="#"></a></li>

        </ul>
      </div></td>
  </tr>
  <tr>
    <td>2</td>
    <td>Fairuza Attar Aviciena</td>
    <td>2000018247</td>
    <td>UI/UX</td>
    <td><span class="status">active</span></td>
    <td><div class="dropdown">
        <i class="bi bi-info-circle-fill" href="#" role="button" id="infoDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
        </a>
        <ul class="dropdown-menu" aria-labelledby="infoDropdown">
            <li><a class="dropdown-item" href="/contributorformitra-devisi-LihatProfil">Lihat Profil Mahasiswa</a></li>
            <li><a class="dropdown-item" href="#"></a></li>


        </ul>
      </div></td>
  </tr>
  <tr>
    <td>3</td>
    <td>Danni Hernando</td>
    <td>2000018247</td>
    <td>UI/UX</td>
    <td><span class="status">active</span></td>
    <td><div class="dropdown">
        <i class="bi bi-info-circle-fill" href="#" role="button" id="infoDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
        </a>
        <ul class="dropdown-menu" aria-labelledby="infoDropdown">
            <li><a class="dropdown-item" href="/contributorformitra-devisi-LihatProfil">Lihat Profil Mahasiswa</a></li>
            <li><a class="dropdown-item" href="#"></a></li>

        </ul>
      </div>
    </td>
  </tr>
  <tr>
    <td>4</td>
    <td>Azizi Shafa Asadel</td>
    <td>2000018247</td>
    <td>UI/UX</td>
    <td><span class="status">inactive</span></td>
    <td><div class="dropdown">
        <i class="bi bi-info-circle-fill" href="#" role="button" id="infoDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
        </a>
        <ul class="dropdown-menu" aria-labelledby="infoDropdown">
            <li><a class="dropdown-item" href="/contributorformitra-devisi-LihatProfil">Lihat Profil Mahasiswa</a></li>
            <li><a class="dropdown-item" href="#"></a></li>

        </ul>
      </div>
    </td>
  </tr>
  <tr>
    <td>5</td>
    <td>Yessica tamara</td>
    <td>2000018247</td>
    <td>UI/UX</td>
    <td><span class="status">done</span></td>
    <td><div class="dropdown">
        <i class="bi bi-info-circle-fill" href="#" role="button" id="infoDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
        </a>
        <ul class="dropdown-menu" aria-labelledby="infoDropdown">
            <li><a class="dropdown-item" href="/contributorformitra-devisi-LihatProfil">Lihat Profil Mahasiswa</a></li>
            <li><a class="dropdown-item" href="#"></a></li>

        </ul>
      </div>
    </td>
  </tr>
</tbody>
</table>
</div>

<nav aria-label="Page navigation example">
    <ul class="pagination page">
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
    </ul>
  </nav>

</div>
<script>

    var statusElements = document.querySelectorAll('.table tbody tr td:nth-child(5)');

    statusElements.forEach(function(element) {
      var status = element.textContent.trim().toLowerCase();
      var className = '';
      switch(status) {
        case 'active':
          className = 'active';
          break;
        case 'inactive':
          className = 'inactive';
          break;
        case 'done':
          className = 'done';
        break;
      }

      // Tambahkan kelas CSS yang sesuai ke elemen <span>
      var spanElement = element.querySelector('span');
      if (spanElement) {
        spanElement.classList.add(className);
      }
    });
  </script>

@endsection
