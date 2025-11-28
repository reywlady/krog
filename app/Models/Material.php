<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $table = 'materials';

    protected $fillable = [
        'nombre',
        'descripcion',
        'unidad_medida',
        'precio_unitario',
        'proveedor_id'
    ];

    protected $casts = [
        'precio_unitario' => 'decimal:2'
    ];

    // Relaciones
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }

    public function obras()
    {
        return $this->belongsToMany(Obra::class, 'obra_materiales')
                    ->withPivot('cantidad', 'fecha_requerida', 'estado');
    }
}