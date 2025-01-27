<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperatorReport extends Model
{
    use HasFactory;
    protected $table = 'operator_report';
    protected $fillable = [
        'shift_report_id',
        'operator_id',
        'total_unit',
        'siap_mancal',
        'dfit', 
        'sakit',
        'stb', 
        'mp_exp'
    ];

    public function shiftReport()
    {
        return $this->belongsTo(ShiftReport::class);
    }
}
