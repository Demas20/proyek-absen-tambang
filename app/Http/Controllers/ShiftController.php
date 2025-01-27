<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShiftReport;

class ShiftController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input shift
        $request->validate([
            'shift' => 'required|string',
            'hari' => 'required',
            'tanggal' => 'required',
        ]);

        session([
            'shift' => $request->shift,
            'hari' => $request->hari,
            'tanggal' => $request->tanggal,
        ]);
        
        // Jika perlu, juga simpan ke database
        $shiftReport = ShiftReport::create([
            'shift' => $request->shift,
            'hari' => $request->hari,
            'tanggal' => $request->tanggal,
        ]);

        // Redirect ke dashboard setelah shift disimpan
        return redirect()->route('dashboard')->with('success', 'Shift berhasil disimpan.');
    }

}
