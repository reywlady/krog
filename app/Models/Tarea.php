<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;

    protected $fillable = [
        'obra_id',
        'nombre',
        'descripcion',
        'fecha_inicio_estimada',
        'fecha_fin_estimada',
        'fecha_inicio_real',
        'fecha_fin_real',
        'estado',
        'prioridad'
    ];

    protected $casts = [
        'fecha_inicio_estimada' => 'date',
        'fecha_fin_estimada' => 'date',
        'fecha_inicio_real' => 'date',
        'fecha_fin_real' => 'date'
    ];

    // Relaciones
    public function obra()
    {
        return $this->belongsTo(Obra::class);
    }
}