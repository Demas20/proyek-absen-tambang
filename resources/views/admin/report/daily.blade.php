@extends('admin.master')
@section('title', 'Laporan Harian')

@section('content')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Laporan Harian Data Operator</h5>
                    <p class="m-b-0">Laporan Harian Operator</p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="index.html"> <i class="fa fa-user"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Laporan Harian Operator</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="pcoded-inner-content">
    <div class="main-body">
        <div class="row">
            <div class="col">
                <div class="sidebar-filter">
                    <h5>Filter Laporan</h5>

                    <form action="{{ route('daily.reports') }}" method="GET">
                        <!-- Filter Tanggal -->
                        @csrf
                        <div class="form-group">
                            <label for="tanggal">Tanggal:</label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ old('tanggal') }}">
                        </div>

                        <!-- Filter Shift -->
                        <div class="form-group">
                            <label for="shift">Shift:</label>
                            <select name="shift" id="shift" class="form-control">
                                <option value="1" {{ old('shift') == '1' ? 'selected' : '' }}>Shift 1</option>
                                <option value="2" {{ old('shift') == '2' ? 'selected' : '' }}>Shift 2</option>
                            </select>
                        </div>

                        <!-- Tombol Submit Filter -->
                        <button type="submit" class="btn btn-primary">Tampilkan Laporan</button>
                    </form>

                    <hr>

                    <!-- Tombol Unduh Laporan -->
                    <h5>Unduh Laporan</h5>
                    <form action="{{ route('report.export') }}" method="GET">
                        @csrf
                        <input type="date" class="form-control" name="tanggal">
                        <div class="form-group">
                            <label for="shift">Shift:</label>
                            <select name="shift" id="shift" class="form-control">
                                <option value="1" {{ old('shift') == '1' ? 'selected' : '' }}>Shift 1</option>
                                <option value="2" {{ old('shift') == '2' ? 'selected' : '' }}>Shift 2</option>
                            </select>
                        </div>
                        <button type="submit" name="format" value="excel" class="btn btn-success">Unduh Excel</button>
                        <button type="submit" name="format" value="pdf" class="btn btn-danger">Unduh PDF</button>
                    </form>
                </div>
            </div>

            <div class="col">
                <!-- Laporan yang ditampilkan berdasarkan filter -->
                @if(isset($shiftReport))
                    <div class="report-header">
                        <h5>Laporan Harian Shift</h5>
                        <p>HARI: {{ strtoupper($shiftReport->hari) }}</p>
                        <p>SHIFT: {{ $shiftReport->shift == 1 ? 'Shift 1' : 'Shift 2' }}</p>
                        <p>TANGGAL: {{ \Carbon\Carbon::parse($shiftReport->tanggal)->format('d M Y') }}</p>
                        <h4>POPULASI UNIT CS 64</h4>
                    </div>

                    <!-- Menampilkan detail laporan -->
                    <div class="report-content">
                        @foreach ($groupedPopulasi as $unitName => $populasi)
                            <h4><b>{{ $unitName }} = {{ $populasi->count() }} Unit</b></h4>
                            <p>*({{ implode(', ', $populasi->pluck('unit_number')->toArray()) }})</p>
                            <p>Populasi: {{ $populasi->first()->populasi }} Unit</p>
                            <p>Running: {{ $populasi->first()->running }} Unit</p>
                            <p>BD: {{ $populasi->first()->breakdown }} Unit</p>
                            <!-- Menampilkan unit breakdown -->
                            @php
                                $breakdownUnits = $populasi->filter(function($unit) {
                                    return $unit->status === 'Breakdown'; // Sesuaikan dengan status breakdown yang ada
                                });
                            @endphp

                            @if($breakdownUnits->count())
                                <p>- {{ implode(', ', $breakdownUnits->pluck('unit_number')->toArray()) }}</p>
                            @endif
                        @endforeach

                        <h5>AWB 9 Unit:</h5>
                        <p><strong>P410 Pendek = 5 Unit</strong></p>
                        <p><strong>(459, 463, 464, 465, 414)</strong></p>
                        <p><strong>P360 = 4 Unit</strong></p>
                        <p><strong>(199, 219, 353, 354)</strong></p>
                        <p><strong>Populasi AWB:</strong> 9 Unit</p>
                        <p><strong>Running AWB:</strong> 9 Unit</p>
                        <p><strong>BD:</strong> - Unit</p>

                        <h5>DI SUPPORT CS LAIN/RM</h5>
                        <p>SUPPORT CS LAIN/RM</p>

                        <h4>Report Operator</h4>
                        <p><strong>Total:</strong> {{$unitReport->total_unit}}</p>
                        <p><strong>Siap Mancal:</strong> {{$unitReport->siap_mancal}}</p>

                        <p><strong>DFIT:</strong>{{$dfitOperators}}</p>
                        <p><strong>Sakit:</strong>{{$sakitOperators}}</p>
                        <p><strong>Stb:</strong> {{$stbOperators}}</p>
                        <p><strong>MP Exp:</strong> -</p>

                        <p><strong>Terima kasih</strong></p>
                    </div>
                @endif
            </div>

        </div>

    </div>
</div>
@endsection
