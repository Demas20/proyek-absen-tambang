@extends('admin.master')
@section('title')
Absensi Operator
@endsection
@section('content')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Absensi Data Operator</h5>
                    <p class="m-b-0">Absensi Operator</p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="index.html"> <i class="fa fa-user"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Absensi Operator</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<div class="pcoded-inner-content">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('operator.create') }}" class="btn btn-success">TAMBAH OPERATOR</a>
        </div>
    </div>
    <div class="main-body">
        <div class="page-wrapper">
            <form action="{{ route('operator_report.store') }}" method="POST">
                @csrf
                <div id="hiddenFieldsContainer"></div>

                <label for="Shift">Shift</label>
                <select name="shift_report_id" class="form-control mb-2">
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

                <table id="" class="table table-bordered table-hover p-2">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($operator as $item)
                        <tr style="height: 10px;">
                            <td>
                                {{ $item->nama }}
                                <input type="hidden" name="operator_ids[]" value="{{ $item->id }}">
                            </td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>
                                <label>
                                    <input type="radio" name="status[{{ $item->id }}]" value="dfit" @checked(old('status.' . $item->id) == 'dfit')> Dfit
                                </label>
                                <label>
                                    <input type="radio" name="status[{{ $item->id }}]" value="sakit" @checked(old('status.' . $item->id) == 'sakit')> Sakit
                                </label>
                                <label>
                                    <input type="radio" name="status[{{ $item->id }}]" value="stb" @checked(old('status.' . $item->id) == 'stb')> Stb
                                </label>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary">Simpan Absensi</button>
            </form>
        </div>
    </div>
</div>

<script>
    // Menambahkan input hidden yang berisi operator_ids[] yang terpilih
    $('form').on('submit', function(e) {
        // Cek operator_ids yang dipilih
        var operatorIds = [];
        $('input[name="operator_ids[]"]:checked').each(function() {
            operatorIds.push($(this).val());
        });

        // Pastikan ada operator yang dipilih
        if (operatorIds.length === 0) {
            alert('Harap pilih operator!');
            e.preventDefault(); // Mencegah form disubmit
        }

        // Pastikan status juga dipilih untuk setiap operator
        var allStatus = {};
        $('#siswa tbody tr').each(function() {
            const operatorId = $(this).find('input[name="operator_ids[]"]').val();
            const selectedStatus = $(this).find('input[type="radio"]:checked').val();

            if (selectedStatus) {
                allStatus[operatorId] = selectedStatus;
            }
        });

        if (Object.keys(allStatus).length !== operatorIds.length) {
            alert('Harap pilih status untuk semua operator!');
            e.preventDefault(); // Mencegah form disubmit
        }

        // Menambahkan status yang dipilih sebagai input hidden
        const hiddenFieldContainer = $('#hiddenFieldsContainer');
        hiddenFieldContainer.html(''); // Kosongkan input hidden sebelumnya
        for (const [operatorId, status] of Object.entries(allStatus)) {
            hiddenFieldContainer.append(
                `<input type="hidden" name="status[${operatorId}]" value="${status}">`
            );
        }
    });
</script>
@endsection
