<?php

namespace App\Http\Controllers;

use App\Models\ShiftReport;
use App\Models\UnitPopulasi;
use Illuminate\Http\Request;

class UnitPopulasiController extends Controller
{
    public function index()
    {
        $units = UnitPopulasi::all();
        return view('admin.unit-populasi.index', compact('units'));
    }
    public function create()
    {
        $shiftReport = ShiftReport::all();
        // dd($shiftReport);
        return view('admin.unit-populasi.create',compact('shiftReport'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'shift_report_id' => 'required',
            'unit_name' => 'required|string|max:255',
            'populasi' => 'required|integer|min:1',
            'running' => 'required',
            'breakdown' => 'required',
        ]);
        if ($request->running + $request->breakdown > $request->populasi) {
            return redirect()->back()->withErrors(['error' => 'Jumlah Running dan Breakdown tidak boleh melebihi Populasi.'])->withInput();
        }
    
        $unitPopulasi = UnitPopulasi::create($validatedData);

        return redirect()->route('unit-details.create',$unitPopulasi->id)->with('success', 'Unit added successfully!');
    }

    public function edit($id)
    {
        $unit = UnitPopulasi::findOrFail($id);
        return view('admin.unit-populasi.edit', compact('unit'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'unit_name' => 'required|string|max:255',
            'population' => 'required|integer|min:1',
        ]);

        $unit = UnitPopulasi::findOrFail($id);
        $unit->update($request->only('unit_name', 'population'));

        return redirect()->route('unit-populasi.index')->with('success', 'Unit updated successfully!');
    }

    public function destroy($id)
    {
        $unit = UnitPopulasi::findOrFail($id);
        $unit->delete();

        return redirect()->route('unit-populasi.index')->with('success', 'Unit deleted successfully!');
    }
    //detail
    public function createDetail(){
        $unitPopulasi = UnitPopulasi::all();
        return view('admin.unit-populasi.detail.create', compact('unitPopulasi'));
    }
}
