<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obra extends Model
{
    use HasFactory;

    protected $table = 'obras';

    protected $fillable = [
        'nombre',
        'descripcion',
        'direccion',
        'cliente',
        'fecha_inicio',
        'fecha_fin_estimada',
        'presupuesto',
        'estado'
    ];

    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_fin_estimada' => 'date',
        'presupuesto' => 'decimal:2'
    ];

    // Relaciones
    public function personal()
    {
        return $this->belongsToMany(Personal::class, 'obra_personal')
                    ->withPivot('fecha_inicio', 'fecha_fin', 'rol');
    }

    public function materiales()
    {
        return $this->belongsToMany(Material::class, 'obra_materiales')
                    ->withPivot('cantidad', 'fecha_requerida', 'estado');
    }

    public function tareas()
    {
        return $this->hasMany(Tarea::class);
    }

    public function reportesDiarios()
    {
        return $this->hasMany(ReporteDiario::class);
    }

    public function cotizaciones()
    {
        return $this->hasMany(Cotizacion::class);
    }

    public function documentos()
    {
        return $this->hasMany(Documento::class);
    }

    public function permisosAcceso()
    {
        return $this->hasMany(PermisoAcceso::class);
    }
}