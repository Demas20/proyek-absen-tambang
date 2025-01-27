<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShiftReport extends Model
{
    use HasFactory;
    protected $table = 'shift_report';
    protected $fillable = [
        'date',
        'shift',
        'total_unit',
        'operator_id',
    ];

    public function unitPopulasi()
    {
        return $this->hasMany(UnitPopulasi::class);
    }

    public function awbs()
    {
        return $this->hasMany(Awb::class);
    }
    public function operatorReport()
    {
        return $this->hasOne(OperatorReport::class);
    }
}
