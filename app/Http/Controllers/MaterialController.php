<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index()
    {
        $materiales = Material::with('proveedor')->get();
        return view('materiales.index', compact('materiales'));
    }

    public function create()
    {
        $proveedores = Proveedor::all();
        return view('materiales.create', compact('proveedores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'unidad_medida' => 'nullable|string|max:50',
            'precio_unitario' => 'nullable|numeric|min:0',
            'proveedor_id' => 'required|exists:proveedores,id'
        ]);

        Material::create($request->all());

        return redirect()->route('materiales.index')
            ->with('success', 'Material creado exitosamente.');
    }

    public function show(Material $material)
    {
        $material->load('proveedor', 'obras');
        return view('materiales.show', compact('material'));
    }

    public function edit(Material $material)
    {
        $proveedores = Proveedor::all();
        return view('materiales.edit', compact('material', 'proveedores'));
    }

    public function update(Request $request, Material $material)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'unidad_medida' => 'nullable|string|max:50',
            'precio_unitario' => 'nullable|numeric|min:0',
            'proveedor_id' => 'required|exists:proveedores,id'
        ]);

        $material->update($request->all());

        return redirect()->route('materiales.index')
            ->with('success', 'Material actualizado exitosamente.');
    }

    public function destroy(Material $material)
    {
        $material->delete();

        return redirect()->route('materiales.index')
            ->with('success', 'Material eliminado exitosamente.');
    }
}