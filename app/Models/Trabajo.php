<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajo extends Model
{
    use HasFactory;
    protected $fillable = [
        'obra_id',
        'user_id',
        'trabajo_tipo_id',
        'code',
        'name',
        'description',
        'images',
        'is_active',

    ];
    protected $casts = ['images' => 'array'];

    public function trabajo_tipo()
    {
        return $this->belongsTo(TrabajoTipo::class);
    }

    public function obra()
    {
        return $this->belongsTo(Obra::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
