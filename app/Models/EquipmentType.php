<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Equipment;

class EquipmentType extends Model
{
    use HasFactory;

    protected $table = 'equipment_types';

    protected $fillable = [
        'code',
        'name',
        'description',
        'icon',
    ];

    function equipment(){
        return $this->hasMany('Equipment');
    }
}
