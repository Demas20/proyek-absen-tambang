@extends('admin.master')
@section('title')
    Edit Operator
@endsection
@section('content')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Data Operator</h5>
                    <p class="m-b-0">Edit Operator</p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="index.html"> <i class="fa fa-user"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Edit Operator</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<h2 class="p-2">Tambah Operator</h2>
<div class="pcoded-inner-content">
    <div class="main-body">
        <form action="{{route('operator.update', $operator->id)}}" method="post">
            @csrf
            @method('PUT')
            <label for="nama">Nama</label>
            <input type="text" id="nama" class="form-control" name="nama" value="{{$operator->nama}}"  required>

            <label for="jk">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                <option value="Laki-laki" {{ $operator->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ $operator->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
            <button type="submit" class="btn btn-success m-2">Simpan</button>
        </form>
    </div>
</div>
@endsection