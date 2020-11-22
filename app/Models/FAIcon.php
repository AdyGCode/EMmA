<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAIcon extends Model
{
    use HasFactory;

    protected $fillable = [
        'set',
        'name',
        'free',
        'f_a_category_id',
    ];

    public function equipmentTypes()
    {
        return $this->hasMany('\App\Models\EquipmentType');
    }

    public function categories()
    {
        return $this->hasMany('\App\Models\FACategory');
    }
}
