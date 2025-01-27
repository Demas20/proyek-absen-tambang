<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UnitPopulasiController;
use App\Http\Controllers\UnitDetailController;
use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade as PDF;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard/admin', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('karyawan/index', [AdminController::class, 'karyawanindex'])->name('karyawan.index');
    //data Unit
    Route::get('/dashboard/unit/alat/truck-truck/type/', [UnitController::class, 'index'])->name('unit.index');

    //unit populasi
    Route::get('/unit-populasi', [UnitPopulasiController::class, 'index'])->name('unit-populasi.index');
    Route::get('/unit-populasi/create', [UnitPopulasiController::class, 'create'])->name('unit-populasi.create');
    Route::post('/unit-populasi', [UnitPopulasiController::class, 'store'])->name('unit-populasi.store');
    Route::get('/unit-populasi/{id}/edit', [UnitPopulasiController::class, 'edit'])->name('unit-populasi.edit');
    Route::put('/unit-populasi/{id}', [UnitPopulasiController::class, 'update'])->name('unit-populasi.update');
    Route::delete('/unit-populasi/{id}', [UnitPopulasiController::class, 'destroy'])->name('unit-populasi.destroy');
    //detail
    Route::get('unit-populasi/{id}/add-details', [UnitDetailController::class, 'create'])->name('unit-details.create');
    Route::post('unit-populasi/{id}/add-details', [UnitDetailController::class, 'store'])->name('unit-details.store');
    Route::put('/unit-details/{id}', [UnitDetailController::class, 'update'])->name('unit-details.update');

    //awb

    //OPERATOR
    Route::get('/operator',[OperatorController::class, 'index'])->name('operator.index');
    Route::get('/operator/create',[OperatorController::class, 'create'])->name('operator.create');
    Route::post('/operator/create', [OperatorController::class, 'store'])->name('operator.store');
    Route::get('/operator/{id}/edit-operator', [OperatorController::class, 'edit'])->name('operator.edit');
    Route::put('/operator/{id}/update-operator', [OperatorController::class, 'update'])->name('operator.update');

    Route::get('/absen-operator', [OperatorController::class, 'absen'])->name('operator.absen');
    Route::post('/operator_report/store', [OperatorController::class, 'stores'])->name('operator_report.store');
    Route::get('/operator/ajax', [OperatorController::class, 'getOperators'])->name('operator.ajax');

    // Route untuk menampilkan laporan berdasarkan filter
Route::get('/daily-report', [ReportController::class, 'generateDailyReport'])->name('daily.report');
Route::get('/daily-report/reports', [ReportController::class, 'generateDailyReports'])->name('daily.reports');

// Route untuk mengunduh laporan dalam format Excel atau PDF
Route::get('/report/export', [ReportController::class, 'exportReport'])->name('report.export');


});



