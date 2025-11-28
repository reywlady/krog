<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'obra_id',
        'proveedor_id',
        'numero_cotizacion',
        'fecha',
        'monto_total',
        'estado',
        'archivo_path'
    ];

    protected $casts = [
        'fecha' => 'date',
        'monto_total' => 'decimal:2'
    ];

    // Relaciones
    public function obra()
    {
        return $this->belongsTo(Obra::class);
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }
}