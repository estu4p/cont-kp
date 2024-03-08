@extends('layouts.sidebarUser')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/penilaianmahasiswa.css') }}">
<html lang="en">
<head>
    <form class="form-inline  mt-5 d-flex justify-content-end px-3">
        <input class="form-control mr-sm-2 "style="width:40% !important;" type="search" placeholder="Search" aria-label="Search">

      </form>
    </nav>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penilaian Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
    <div class="judul">
        <h1>Penilaian Mahasiswa</h1>
    </div>
    <select name="page" class="page">
        <option value="page">page 1 of 5</option>
        <option value="page">page 2 of 5</option>
        <option value="page">page 3 of 5</option>
        <option value="page">page 4 of 5</option>
        <option value="page">page 5 of 5</option>
    </select>
    <select name="item" class="item">
        <option value="item">5 item per page</option>
        <option value="item">10 item per page</option>
        <option value="item">15 item per page</option>
        <option value="item">20 item per page</option>
    </select>

</head>
<body>

    <div class="container row d-flex justify-content-center">

        <div class="table-responsive col-11 my-4 p-0 border border-secondary overflow-hidden rounded rounded-2"
            >
            <table class="table table-bordered table-striped "style="margin-bottom:0 !important;" >
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>Divisi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td>1</td>
                        <td>Syalita Widyandini</td>
                        <td>2000018247</td>
                        <td>UI/UX</td>
                        <td ><button type="button" class="btn btn-primary">Active</button></td>
                        <td class="" style="position: relative;">
                            <div class="tengahin d-flex w-100  align-items-center" >
                            <i class=" w-100 text-center fa-solid fa-note-sticky"></i>
                            </div>
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td>2</td>
                        <td>Fairuza Attar Aviciena</td>
                        <td>2000018247</td>
                        <td>UI/UX</td>
                        <td><button type="button" class="btn btn-primary">Active</button></td>
                        <td style="position: relative;">
                            <div class="tengahin d-flex w-100  align-items-center" >
                                <i class=" w-100 text-center fa-solid fa-note-sticky"></i>
                                </div>
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td>3</td>
                        <td>Danni Hernando</td>
                        <td>2000018247</td>
                        <td>UI/UX</td>
                        <td><button type="button" class="btn btn-primary">Active</button></td>
                        <td style="position: relative;">
                            <div class="tengahin d-flex w-100  align-items-center" >
                                <i class=" w-100 text-center fa-solid fa-note-sticky"></i>
                                </div>
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td>4</td>
                        <td>Febnan Adipumowo</td>
                        <td>2000018247</td>
                        <td>UI/UX</td>
                        <td ><button type="button" class="btn btn-danger">Inactive</button></td>
                        <td style="position: relative;">
                            <div class="tengahin d-flex w-100  align-items-center" >
                                <i class=" w-100 text-center fa-solid fa-note-sticky"></i>
                                </div>
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td>5</td>
                        <td>Yessa Khoirunissa</td>
                        <td>2000018247</td>
                        <td>PROGRAMMER</td>
                        <td ><button type="button" class="btn btn-success">Done</button></td>
                        <td style="position: relative;">
                            <div class="tengahin d-flex w-100  align-items-center" >
                                <i class=" w-100 text-center fa-solid fa-note-sticky"></i>

                                </div>
                        </td>
                    </tr>

                </tbody>

            </table>
        </div>
    </div>
    <div style="text-align: center;">

    </div>
</body>
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        @for ($i = 1; $i <= 10; $i++)
            @if ($i <= 3 || ($i >= 4 && $i <= 10))
                <li class="page-item"><a class="page-link" href="#">{{ $i }}</a></li>
            @elseif ($i == 11)
                <li class="page-item disabled">
                    <span class="page-link">...</span>
                </li>
            @endif
        @endfor
    </ul>
</nav>

        </li>
    </ul>
</nav>

        </li>
    </ul>
</nav>
      </li>
    </ul>
  </nav>
</html>
