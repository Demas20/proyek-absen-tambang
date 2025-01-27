<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UnitPopulasi;

class UnitController extends Controller
{
    public function index()
    {
        $units = UnitPopulasi::with('shiftReport')->get();
        // dd($units);
        return view('admin.unit.index', compact('units'));
    }
}
