<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitPopulasi extends Model
{
    use HasFactory;
    protected $table = 'unit_populasi';
    protected $fillable = [
        'shift_report_id',
        'unit_name',
        'type',
        'populasi',
        'running',
        'breakdown',
    ];

    public function shiftReport()
    {
        return $this->belongsTo(ShiftReport::class);
    }
    public function unitDetails()
    {
        return $this->hasMany(UnitDetail::class);
    }
}
