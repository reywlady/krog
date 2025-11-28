<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;

    protected $fillable = [
        'obra_id',
        'nombre',
        'tipo',
        'descripcion',
        'archivo_path',
        'fecha_subida'
    ];

    protected $casts = [
        'fecha_subida' => 'date'
    ];

    // Relaciones
    public function obra()
    {
        return $this->belongsTo(Obra::class);
    }
}