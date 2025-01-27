@extends('admin.master')
@section('content')
<h2 class="p-2">Tambah Detail Unit untuk {{ $unitPopulasi->unit_name }}</h2>
<p class="p-2">Total Populasi: {{ $unitPopulasi->populasi }}</p>
<p class="card-text p-2">Jumlah Detail Saat Ini: {{ $unitPopulasi->unitDetails->count() }}</p>

@if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
            <p style="color: red;">{{ $error }}</p>
        @endforeach
    </div>
@endif
<div class="row p-2">
    <div class="col">
        <div class="card p-2">
            <div class="card-header">
                <h2 class="card-text">Tambah Detail</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('unit-details.store', $unitPopulasi->id) }}" method="POST">
                    @csrf
                    <label for="unit_number">Kode Unit:</label>
                    <input type="text" id="unit_number" class="form-control" name="unit_number" required>
                
                    <label for="status">Status:</label>
                    <select id="status" name="status" required class="form-control">
                        <option value="Running">Running</option>
                        <option value="Breakdown">Breakdown</option>
                    </select>
                
                    <button type="submit" class="btn btn-success m-2">Tambah Detail</button>
                </form>
            </div>
        </div>
    </div>
    
</div>
<h3>Daftar Detail Unit</h3>
<div class="row p-3">
    <div class="col">
        <table border="1" class="table table-bordered p-2">
            <thead>
                <tr>
                    <th>Kode Unit</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if ($unitDetails && $unitDetails->isNotEmpty())
                    @foreach ($unitDetails as $detail)
                        <tr>
                            <td>{{ $detail->unit_number }}</td>
                            <td>{{ $detail->status }}</td>
                            <td>
                                <form method="POST" action="{{ route('unit-details.update', $detail->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <label>
                                        <input type="radio" name="status" value="Breakdown" 
                                            {{ $detail->status === 'Breakdown' ? 'checked' : '' }}> Breakdown
                                    </label>
                                    <label>
                                        <input type="radio" name="status" value="Running" 
                                            {{ $detail->status === 'Running' ? 'checked' : '' }}> Running
                                    </label>
                                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="2">Belum ada detail unit.</td>
                    </tr>
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <th>Kode Unit</th>
                    <th>Status</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>


@endsection