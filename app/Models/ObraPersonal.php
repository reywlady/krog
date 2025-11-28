<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObraPersonal extends Model
{
    use HasFactory;

    protected $table = 'obra_personal';

    protected $fillable = [
        'obra_id',
        'personal_id',
        'fecha_inicio',
        'fecha_fin',
        'rol'
    ];

    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date'
    ];
}