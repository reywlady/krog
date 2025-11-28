<?php

namespace App\Http\Controllers;

use App\Models\Obra;
use App\Models\Personal;
use App\Models\Material;
use App\Models\Proveedor;
use App\Models\Tarea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalObras = Obra::count();
        $totalPersonal = Personal::count();
        $totalPersonal = 0;
//      $totalMateriales = Material::count();
        $totalMateriales = 0;
//      $totalProveedores = Proveedor::count();
        $totalProveedores = 0;
        
        $obrasRecientes = Obra::latest()->take(5)->get();
        $tareasPendientes = Tarea::where('estado', 'pendiente')
                                ->orWhere('estado', 'en_proceso')
                                ->with('obra')
                                ->latest()
                                ->take(5)
                                ->get();

        return view('dashboard', compact(
            'totalObras',
            'totalPersonal',
            'totalMateriales',
            'totalProveedores',
            'obrasRecientes',
            'tareasPendientes'
        ));
    }
}