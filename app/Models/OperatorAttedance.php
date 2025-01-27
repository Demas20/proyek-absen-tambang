<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperatorAttedance extends Model
{
    use HasFactory;
    protected $table = 'operator_attedance';
    protected $fillable = ['operator_id','shift_report_id','status'];
}
