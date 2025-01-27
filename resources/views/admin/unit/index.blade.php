@extends('admin.master')
@section('content')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Unit</h5>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="index.html"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Unit</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="card p-2">
    <div class="card-header">
        <a href="{{ route('unit-populasi.create') }}" class="btn btn-info">Tambah Unit</a>
    </div>
</div>
@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif
<div class="pcoded-inner-content">
    <table class="table">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Unit Name</th>
                <th>Running</th>
                <th>Breakdown</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($units as $unit)
                <tr>
                    <td>{{$unit->shiftReport->tanggal}}</td>
                    <td>{{ $unit->unit_name }}</td>
                    <td>{{ $unit->running }}</td>
                    <td>{{ $unit->breakdown }}</td>
                    <td>
                        <a href="{{route('unit-details.create',$unit->id)}}" class="btn btn-info">
                            <i class="fa fa-eye"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Tanggal</th>
                <th>Unit Name</th>
                <th>Type</th>
                <th>Running</th>
                <th>Breakdown</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
    </table>
</div>


@endsection
