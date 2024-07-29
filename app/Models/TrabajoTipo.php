<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrabajoTipo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'is_active',

    ];

    public function trabajos()
    {
        return $this->hasMany(Trabajo::class);
    }
}
