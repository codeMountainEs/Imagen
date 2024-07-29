<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'phone',
        'location',
        'street_address',
        'city',
        'state',
        'zip_code',

    ];


    public function clientes()
    {
        return $this->hasMany(Cliente::class);
    }

}
