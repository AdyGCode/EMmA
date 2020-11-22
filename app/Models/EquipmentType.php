<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipmentType extends Model
{
    use HasFactory;

    protected $table = 'equipment_types';

    protected $fillable = [
        'code',
        'name',
        'description',
        'f_a_icon_id',
    ];

    public function equipment()
    {
        return $this->hasMany('\App\Models\Equipment');
    }

    public function icon()
    {
        return $this->belongsTo('\App\Models\FAIcon');
    }

    public function iconName($iconID)
    {
        return FAIcon::whereId($iconID)->first()->name;
    }

    public function iconSet($iconID)
    {
        return FAIcon::whereId($iconID)->first()->set;
    }
}
