<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Awb extends Model
{
    use HasFactory;

    protected $fillable = [
        'shift_report_id',
        'unit_type',
        'awb_code',
        'status',
    ];

    public function shiftReport()
    {
        return $this->belongsTo(ShiftReport::class);
    }
}
