<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obra extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'obra_tipos_id',
        'name',
        'description',
        'phone',
        'location',
        'street_address',
        'city',
        'state',
        'zip_code',
        'image',
        'is_active',

    ];


    public function obra_tipo()
    {
        return $this->belongsTo(ObraTipo::class);
    }

    public function trabajos()
    {
        return $this->hasMany(Trabajo::class);
    }
}



