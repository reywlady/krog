<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObraMaterial extends Model
{
    use HasFactory;

    protected $table = 'obra_materiales';

    protected $fillable = [
        'obra_id',
        'material_id',
        'cantidad',
        'fecha_requerida',
        'estado'
    ];

    protected $casts = [
        'fecha_requerida' => 'date',
        'cantidad' => 'decimal:2'
    ];
}