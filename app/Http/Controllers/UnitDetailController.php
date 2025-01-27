<?php

namespace App\Http\Controllers;

use App\Models\UnitPopulasi;
use App\Models\UnitDetail;
use Illuminate\Http\Request;

class UnitDetailController extends Controller
{
    public function create($id)
    {
        $unitPopulasi = UnitPopulasi::findOrFail($id);
        $unitDetails = $unitPopulasi->unitDetails;
        // dd($unitDetails);
        return view('admin.unit-populasi.detail.create', compact('unitPopulasi', 'unitDetails'));
    }

    public function store(Request $request, $id)
{
    $unitPopulasi = UnitPopulasi::findOrFail($id);

    // Hitung jumlah detail yang sudah ada
    $runningCount = $unitPopulasi->unitDetails()->where('status', 'Running')->count();
    $breakdownCount = $unitPopulasi->unitDetails()->where('status', 'Breakdown')->count();

    // Validasi: Pastikan tidak melebihi batas
    if ($request->status == 'Running' && $runningCount >= $unitPopulasi->running) {
        return redirect()->back()->withErrors(['error' => 'Jumlah Running sudah mencapai batas.'])->withInput();
    }
    if ($request->status == 'Breakdown' && $breakdownCount >= $unitPopulasi->breakdown) {
        return redirect()->back()->withErrors(['error' => 'Jumlah Breakdown sudah mencapai batas.'])->withInput();
    }

    // Validasi jumlah entri tidak boleh melebihi populasi
    if ($unitPopulasi->unitDetails->count() >= $unitPopulasi->populasi) {
        return redirect()->back()->withErrors(['error' => 'Jumlah unit detail tidak boleh melebihi populasi.']);
    }

    // Simpan data dengan memastikan unit_populasi_id disertakan
    $unitPopulasi->unitDetails()->create([
        'unit_number' => $request->unit_number,
        'status' => $request->status,
    ]);

    return redirect()->route('unit-details.create', $id)
                     ->with('success', 'Detail unit berhasil ditambahkan.');
}
public function update(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:Running,Breakdown',
    ]);

    $unitDetail = UnitDetail::findOrFail($id);

    // Update status
    $unitDetail->update([
        'status' => $request->status,
    ]);

    return redirect()->back()->with('success', 'Status unit berhasil diperbarui.');
}

}
