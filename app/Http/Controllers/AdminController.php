<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\OperatorReport;
use App\Models\OperatorAttedance;
use App\Models\Operator;
use App\Models\UnitPopulasi;
use App\Models\UnitDetail;

class AdminController extends Controller
{
    public function karyawanindex(){
        return view('admin.karyawan.index');
    }
    public function dashboard(){
        $operator = Operator::count();
        $unitPopulasi = UnitPopulasi::count();

        // Ambil data absensi operator per hari ini
    $today = now()->toDateString(); // Tanggal hari ini
    $absensiOperator = OperatorAttedance::whereDate('created_at', $today)->get(); // Ganti "Absensi" dengan model absensi Anda
    // dd($absensiOperator);
    // Hitung status absensi
    $dfit = $absensiOperator->where('status', 'dfit')->count();
    $sakit = $absensiOperator->where('status', 'sakit')->count();
    $stb = $absensiOperator->where('status', 'stb')->count();
    $mp_exp = $absensiOperator->where('status', 'mp_exp')->count();
        // dd($unitPopulasi);
        $unitRunning = UnitPopulasi::sum('running');
        $breakdown = UnitPopulasi::sum('breakdown');
        // dd($unitRunning);
        return view('admin.index',compact('operator','unitPopulasi','breakdown','dfit','sakit','stb','mp_exp','unitRunning'));
    }
}
