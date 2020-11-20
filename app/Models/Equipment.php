<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EquipmentType;

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
        return $this->belongsTo('EquipmentType');
    }
}
