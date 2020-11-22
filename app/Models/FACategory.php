<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FACategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function icon(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->belongsTo('\App\Models\FAIcon');
    }
}
