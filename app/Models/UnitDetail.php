<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitDetail extends Model
{
    use HasFactory;
    protected $fillable = ['unit_populasi_id', 'unit_number', 'status'];

    public function unitPopulasi()
    {
        return $this->belongsTo(UnitPopulasi::class);
    }
}
