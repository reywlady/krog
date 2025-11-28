<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;

    protected $table = 'personals';

    protected $fillable = [
        'nombre',
        'email',
        'telefono',
        'especialidad'
    ];

    // Relaciones
    public function obras()
    {
        return $this->belongsToMany(Obra::class, 'obra_personal')
                    ->withPivot('fecha_inicio', 'fecha_fin', 'rol');
    }
}