<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Operator;
use App\Models\OperatorReport;
use App\Models\ShiftReport;
use App\Models\OperatorAttedance as OperatorAttendance;

class OperatorController extends Controller
{
    public function index(){
        $operator = Operator::all();
        return view('admin.operator.index',compact('operator'));
    }
    public function create(){
        return view('admin.operator.create');
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'jenis_kelamin' => 'required|string|max:100',
        ]);

        Operator::create($validatedData);

        return redirect()->route('operator.index')->with('success', 'Operator added successfully!');
    }
    public function edit($id){
        $operator = Operator::findOrFail($id);
        return view('admin.operator.edit',compact('operator'));
    }
    public function update(Request $request, $id)
    {
        // Validasi data
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        ]);

        // Cari operator berdasarkan ID
        $operator = Operator::findOrFail($id);

        // Update data operator
        $operator->update([
            'nama' => $validated['nama'],
            'jenis_kelamin' => $validated['jenis_kelamin'],
        ]);

        // Redirect setelah berhasil update
        return redirect()->route('operator.index')->with('success', 'Data operator berhasil diperbarui!');
    }

    public function absen(){
        $operator = Operator::all();
        $shiftReport = ShiftReport::all();
        return view('admin.operator.absensi' ,compact('operator','shiftReport'));
    }
    public function stores(Request $request)
{
    $operatorIds = $request->input('operator_ids', []);
    $statuses = $request->input('status', []);
    $shiftReportIds = $request->input('shift_report_id', []);

    // Validasi shift_report_id
    $validShiftReportIds = ShiftReport::pluck('id')->toArray();
    foreach ($shiftReportIds as $shiftReportId) {
        if (!in_array($shiftReportId, $validShiftReportIds)) {
            return redirect()->back()->withErrors('Shift Report ID tidak valid.');
        }
    }
    // Validasi input
    if (empty($operatorIds)) {
        return redirect()->back()->withErrors('Operator tidak ditemukan.');
    }

    // Loop melalui operator untuk menyimpan data absensi
    foreach ($operatorIds as $operatorId) {
        $status = $statuses[$operatorId] ?? null;
        $shiftReportId = $shiftReportIds[$operatorId] ?? null;

        // Validasi status dan shift_report_id
        if (!$status || !$shiftReportId) {
            continue; // Skip jika data tidak lengkap
        }

        // Simpan data absensi operator ke tabel `operator_attendance`
        OperatorAttendance::updateOrCreate(
            [
                'operator_id' => $operatorId,
                'shift_report_id' => $shiftReportId,
            ],
            [
                'status' => $status,
            ]
        );
    }

    // Hitung ringkasan untuk tabel `operator_report`
    $shiftReportGroups = OperatorAttendance::selectRaw('shift_report_id, COUNT(*) as total_unit, 
            SUM(CASE WHEN status = "dfit" THEN 1 ELSE 0 END) as dfit,
            SUM(CASE WHEN status = "sakit" THEN 1 ELSE 0 END) as sakit,
            SUM(CASE WHEN status = "stb" THEN 1 ELSE 0 END) as stb')
        ->whereIn('shift_report_id', $shiftReportIds)
        ->groupBy('shift_report_id')
        ->get();

    // Simpan ringkasan ke tabel `operator_report`
    foreach ($shiftReportGroups as $group) {
        OperatorReport::updateOrCreate(
            [
                'shift_report_id' => $group->shift_report_id,
            ],
            [
                'total_unit' => $group->total_unit,
                'dfit' => $group->dfit,
                'sakit' => $group->sakit,
                'stb' => $group->stb,
                'siap_mancal' => $group->dfit, // Misal sama dengan dfit
                'mp_exp' => 0, // Atur jika ada data tambahan
            ]
        );
    }

    return redirect()->back()->with('success', 'Absensi berhasil disimpan.');
}



}
