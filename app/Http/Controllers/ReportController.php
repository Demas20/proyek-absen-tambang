<?php

namespace App\Http\Controllers;

use App\Models\Operator;
use App\Models\OperatorReport;
use App\Models\ShiftReport;
use App\Models\OperatorAttedance;
use App\Models\UnitDetail;
use App\Models\UnitPopulasi;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class ReportController extends Controller
{
    public function generateDailyReport(Request $request)
    {
        // $tanggal = $request->input('tanggal');
        // $shift = $request->input('shift');

        // // Mengambil data ShiftReport berdasarkan tanggal dan shift
        // $shiftReport = ShiftReport::whereDate('tanggal', Carbon::parse($tanggal))
        //                            ->where('shift', $shift)
        //                            ->first();
        // dd($shift);
        // // Jika shiftReport ditemukan, ambil data unit dan attendance

        //     $unitReport = OperatorReport::where('shift_report_id', $shiftReport->id)->first();
        //     $attendanceData = OperatorAttedance::where('shift_report_id', $shiftReport->id)
        //                                     ->join('operators', 'unit_attendance.operator_id', '=', 'operators.id')
        //                                     ->select('operators.name', 'unit_attendance.status')
        //                                     ->get();

        //     // Menghitung jumlah operator berdasarkan status
        //     $dfitOperators = $attendanceData->where('status', 'dfit')->count();
        //     $sakitOperators = $attendanceData->where('status', 'sakit')->count();
        //     $stbOperators = $attendanceData->where('status', 'stb')->count();
        //     $activeOperators = $attendanceData->where('status', 'aktif')->count();


        return view('admin.report.daily');
    }
    public function generateDailyReports(Request $request)
    {
        $tanggal = $request->input('tanggal');
        $shift = $request->input('shift');

        // Mengambil data ShiftReport berdasarkan tanggal dan shift
        $shiftReport = ShiftReport::whereDate('tanggal', Carbon::parse($tanggal))
                                   ->where('shift', $shift)
                                   ->first();

        // Jika shiftReport ditemukan, ambil data unit dan attendance
        if ($shiftReport) {
            $operatorPopulasi = UnitDetail::where('shift_report_id', $shiftReport->id)
                ->join('unit_populasi', 'unit_details.unit_populasi_id', '=', 'unit_populasi.id')
                ->select('unit_populasi.unit_name', 'unit_details.status','unit_populasi.populasi', 'unit_populasi.running', 'unit_populasi.breakdown', 'unit_details.unit_number')
                ->get();

            // Group by unit_name
            $groupedPopulasi = $operatorPopulasi->groupBy('unit_name');
            $unitReport = OperatorReport::where('shift_report_id', $shiftReport->id)->first();
            $attendanceData = OperatorAttedance::where('shift_report_id', $shiftReport->id)
                                            ->join('operator', 'operator_attedance.operator_id', '=', 'operator.id')
                                            ->select('operator.nama', 'operator_attedance.status')
                                            ->get();
                                            // dd($unitReport);
            // Menghitung jumlah operator berdasarkan status
            $dfitOperators = $attendanceData->where('status', 'dfit')->count();
            $sakitOperators = $attendanceData->where('status', 'sakit')->count();
            $stbOperators = $attendanceData->where('status', 'stb')->count();
            $activeOperators = $attendanceData->where('status', 'aktif')->count();
            // dd($groupedPopulasi);
            return view('admin.report.daily', compact('shiftReport','groupedPopulasi','operatorPopulasi', 'unitReport', 'attendanceData', 'dfitOperators', 'sakitOperators', 'stbOperators', 'activeOperators'));
        }

        return back()->with('error', 'Laporan tidak ditemukan untuk tanggal dan shift yang dipilih.');
    }

    public function exportReport(Request $request)
    {
        // dd("HELLO");
         // Ambil data berdasarkan filter
        $tanggal = $request->input('tanggal');
        $shift = $request->input('shift');

        // Ambil data laporan berdasarkan filter
        $shiftReport = ShiftReport::whereDate('tanggal', $tanggal)
            ->where('shift', $shift)
            ->firstOrFail();

        $operatorPopulasi = UnitDetail::where('shift_report_id', $shiftReport->id)
            ->join('unit_populasi', 'unit_details.unit_populasi_id', '=', 'unit_populasi.id')
            ->select('unit_populasi.unit_name', 'unit_populasi.populasi', 'unit_populasi.running', 'unit_populasi.breakdown', 'unit_details.unit_number', 'unit_details.status')
            ->get();

        // Group by unit_name
        $groupedPopulasi = $operatorPopulasi->groupBy('unit_name');
        $unitReport = OperatorReport::where('shift_report_id', $shiftReport->id)->first();
            $attendanceData = OperatorAttedance::where('shift_report_id', $shiftReport->id)
                                            ->join('operator', 'operator_attedance.operator_id', '=', 'operator.id')
                                            ->select('operator.nama', 'operator_attedance.status')
                                            ->get();
                                            // dd($unitReport);
            // Menghitung jumlah operator berdasarkan status
            $dfitOperators = $attendanceData->where('status', 'dfit')->count();
            $sakitOperators = $attendanceData->where('status', 'sakit')->count();
            $stbOperators = $attendanceData->where('status', 'stb')->count();
            $activeOperators = $attendanceData->where('status', 'aktif')->count();
        // Generate PDF
        $pdf = PDF::loadView('laporan_pdf', compact('shiftReport','groupedPopulasi','operatorPopulasi', 'unitReport', 'attendanceData', 'dfitOperators', 'sakitOperators', 'stbOperators', 'activeOperators'));
        // dd($pdf);
        // Download PDF
        return $pdf->download('laporan_harian_' . $shiftReport->shift . '_' . \Carbon\Carbon::parse($shiftReport->tanggal)->format('Y-m-d') . '.pdf');
    }
}
