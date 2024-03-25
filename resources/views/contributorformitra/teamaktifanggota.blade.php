@extends('layouts.masterMitra')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/contributorformitra/teamaktifanggota.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<div class="ruangan">
<div class="top">
    <div>
      <a href="/contributorformitra-devisi"><i class="keluar bi bi-chevron-left"></i></a>
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
    <br>

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
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>2</td>
    <td>Fairuza Attar Aviciena</td>
    <td>2000018247</td>
    <td>UI/UX</td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>3</td>
    <td>Danni Hernando</td>
    <td>2000018247</td>
    <td>UI/UX</td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>4</td>
    <td>Azizi Shafa Asadel</td>
    <td>2000018247</td>
    <td>UI/UX</td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>5</td>
    <td>Yessica tamara</td>
    <td>2000018247</td>
    <td>UI/UX</td>
    <td></td>
    <td></td>
  </tr>
</tbody>
</table>


</div>
@endsection
