@extends('layouts.masterMitra')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/adminafterpayment.css') }}">
 
<div class="wadah p-5">
    <h2 class="text-center mb-5">DATA MITRA</h2>

   <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addDataModal">
    tambah mitra
</button>

<!-- Modal -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <!-- Modal -->
            <div class="modal fade" id="addDataModal" tabindex="-1" role="dialog" aria-labelledby="addDataModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addDataModalLabel">Add New Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Form for adding new data -->
                            <form action="{{ route('mitra') }}" method="POST">
                                @csrf <!-- CSRF Protection -->
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Enter name">
                                </div>
                                <!-- Add more form fields as needed -->
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <!-- Search Bar -->
            <div class="wrap">
                <div class="search">
                    <input type="text" class="searchTerm" placeholder="cari data mitra">
                    <button type="submit" class="searchButton">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

  

 

   
         
    