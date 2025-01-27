<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Operator;
use App\Models\OperatorReport;
use App\Models\ShiftReport;
use App\Models\OperatorAttedance as OperatorAttendance;
use Yajra\DataTables\Facades\DataTables;

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
        // dd($request->input('operator_ids'));
        // Validasi input
        $request->validate([
            'shift_report_id' => 'required|exists:shift_report,id',
            'operator_ids' => 'required|array',
            'status' => 'required|array',
        ]);

        // Ambil data dari request
        $operatorIds = $request->input('operator_ids');
        $statuses = $request->input('status');

        // Hitung jumlah status operator
        $totalUnit = count($operatorIds);
        $dfitCount = 0;
        $sakitCount = 0;
        $stbCount = 0;

        foreach ($statuses as $status) {
            if ($status == 'dfit') {
                $dfitCount++;
            } elseif ($status == 'sakit') {
                $sakitCount++;
            } elseif ($status == 'stb') {
                $stbCount++;
            }
        }

        $siapMancal = $dfitCount; // Hanya `dfit` yang siap mancal

        // Simpan data ke tabel `operator_report`
        $operatorReport = OperatorReport::create([
            'shift_report_id' => $request->shift_report_id,
            'total_unit' => $totalUnit,
            'siap_mancal' => $siapMancal,
            'dfit' => $dfitCount,
            'sakit' => $sakitCount,
            'stb' => $stbCount,
            'mp_exp' => $request->input('mp_exp', 0),
        ]);

        // Simpan data absensi ke tabel `operator_attendance`
        foreach ($statuses as $operatorId => $status) {
            OperatorAttendance::updateOrCreate(
                ['operator_id' => $operatorId, 'shift_report_id' => $request->shift_report_id],
                ['status' => $status]
            );
        }

        // Redirect dengan pesan sukses
        return redirect()->route('operator.absen')->with('success', 'Data absensi berhasil disimpan.');
    }

    public function getOperators(Request $request)
    {
        if ($request->ajax()) {
            // Ambil data operator
            $data = Operator::all(); // Ganti dengan query yang sesuai kebutuhan

            // Tampilkan data operator dalam bentuk DataTables
            return DataTables::of($data)
                ->addColumn('status', function ($row) {
                    return '
                        <label>
                            <input type="radio" name="status[' . $row->id . ']" value="dfit" required> Dfit
                        </label>
                        <label>
                            <input type="radio" name="status[' . $row->id . ']" value="sakit"> Sakit
                        </label>
                        <label>
                            <input type="radio" name="status[' . $row->id . ']" value="stb"> Stb
                        </label>
                    ';
                })
                ->rawColumns(['status'])
                ->make(true);
        }
    }


}
