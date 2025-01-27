<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Harian Shift</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        h5, h4, p {
            margin: 5px 0;
        }
        .report-header {
            margin-bottom: 20px;
        }
        .report-content {
            margin-top: 20px;
        }
        .report-content p {
            margin: 2px 0;
        }
    </style>
</head>
<body>
    <div class="report-header">
        <h5>Laporan Harian Shift</h5>
        <p>HARI: {{ strtoupper($shiftReport->hari) }}</p>
        <p>SHIFT: {{ $shiftReport->shift == 1 ? 'Shift 1' : 'Shift 2' }}</p>
        <p>TANGGAL: {{ \Carbon\Carbon::parse($shiftReport->tanggal)->format('d M Y') }}</p>
        <h4>POPULASI UNIT CS 64</h4>
    </div>

    <div class="report-content">
        @foreach ($groupedPopulasi as $unitName => $populasi)
            <h4><b>{{ $unitName }} = {{ $populasi->count() }} Unit</b></h4>
            <p>*({{ implode(', ', $populasi->pluck('unit_number')->toArray()) }})</p>
            <p>Populasi: {{ $populasi->first()->populasi }} Unit</p>
            <p>Running: {{ $populasi->first()->running }} Unit</p>
            <p>BD: {{ $populasi->first()->breakdown }} Unit</p>

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
</body>
</html>
