<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermisoAcceso extends Model
{
    use HasFactory;

    protected $fillable = [
        'obra_id',
        'usuario_id',
        'tipo_permiso',
        'fecha_inicio',
        'fecha_fin'
    ];

    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date'
    ];

    // Relaciones
    public function obra()
    {
        return $this->belongsTo(Obra::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}