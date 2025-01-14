<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'description',
        'equipment_type_id',
    ];

    function equipmentType()
    {
        return $this->belongsTo('\App\Models\EquipmentType');
    }
}
