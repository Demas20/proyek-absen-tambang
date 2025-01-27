@extends('admin.master')
@section('content')
     <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Anggota Unit</h5>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Anggota Unit</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="pcoded-inner-content">
         <!-- Daftar Kelas -->
         <div class="card">
            <div class="card-body">
                <h5 class="card-title">Daftar Unit Running</h5>
                <p class="card-text">Silakan pilih Unit Running</p>
                <div class="d-flex flex-wrap">
                    <!-- Tombol Kelas -->
                    <button class="btn btn-success btn-round">45</button>
                    <button class="btn btn-success btn-round">34</button>
                    <button class="btn btn-success btn-round">456</button>
                </div>
            </div>
        </div>

        <!-- Tanggal -->
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">Tanggal</h5>
                <div class="form-group">
                    <input type="date" class="form-control">
                </div>
            </div>
        </div>
    </div>
@endsection