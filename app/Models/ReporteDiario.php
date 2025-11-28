<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReporteDiario extends Model
{
    use HasFactory;

    protected $fillable = [
        'obra_id',
        'fecha',
        'resumen',
        'avance',
        'incidencias',
        'clima'
    ];

    protected $casts = [
        'fecha' => 'date'
    ];

    // Relaciones
    public function obra()
    {
        return $this->belongsTo(Obra::class);
    }
}