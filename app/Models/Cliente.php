<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'empresa_id',
        'code',
        'name',
        'description',
        'phone',
        'location',
        'street_address',
        'city',
        'state',
        'zip_code',
        'image',
        'is_active'

    ];


    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function obras()
    {
        return $this->hasMany(Obra::class);
    }



}




