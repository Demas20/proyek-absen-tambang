<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function karyawanindex(){
        return view('admin.karyawan.index');
    }
    public function dashboard(){
        return view('admin.index');
    }
}
