<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObraTipo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'is_active',

    ];

    public function obras()
    {
        return $this->hasMany(Obra::class);
    }
}
