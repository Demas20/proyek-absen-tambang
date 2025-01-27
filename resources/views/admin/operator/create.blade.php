@extends('admin.master')
@section('title')
    Tambah Operator
@endsection
@section('content')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Data Operator</h5>
                    <p class="m-b-0">Tambah Operator</p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="index.html"> <i class="fa fa-user"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Tambah Operator Operator</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<h2 class="p-2">Tambah Operator</h2>
<div class="pcoded-inner-content">
    <div class="main-body">
        <form action="{{route('operator.create')}}" method="post">
            @csrf
            <label for="nama">Nama</label>
            <input type="text" id="nama" class="form-control" name="nama" required>

            <label for="jk">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="" class="form-control">
                <option value="wanita">Wanita</option>
                <option value="pria">Pria</option>
            </select>
            <button type="submit" class="btn btn-success m-2">Simpan</button>
        </form>
    </div>
</div>
@endsection