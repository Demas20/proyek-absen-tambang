@extends('admin.master')
@section('content')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Tambah Unit</h5>
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
@if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
            <p style="color: red;">{{ $error }}</p>
        @endforeach
    </div>
@endif

<div class="row justify-content-center p-2">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <div class="card-text"><h2>Form Tambah Unit</h2></div>
            </div>
            <div class="card-body">
                <form action="{{ route('unit-populasi.store') }}" method="POST">
                    @csrf
                    <label for="unit_name">Nama Unit:</label>
                    <input type="text" name="unit_name" class="form-control" id="unit_name" required>
                    <br>
                    <label for="population">Populasi:</label>
                    <input type="number" name="populasi" class="form-control" id="populasi" required>
                    <br>
                    <label for="running">Running:</label>
                    <input type="number" name="running" class="form-control" id="running" required>
                    <br>
                    <label for="breakdown">Breakdown:</label>
                    <input type="number" name="breakdown" class="form-control" id="breakdown" required>
                    <br>
                    <label for="shift">Shift</label>
                    <select name="shift_report_id" id="" class="form-control">
                        @foreach ($shiftReport as $item)
                            <option value="{{$item->id}}">
                                @if ($item->shift == 2)
                                    Malam {{$item->hari}} | {{$item->tanggal}}
                                @elseif ($item->shift == 1)
                                    Pagi {{$item->hari}}  | {{$item->tanggal}}
                                @endif
                            </option>
                        @endforeach

                    </select>
                    <button type="submit" class="btn btn-success m-2">Simpan</button>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection