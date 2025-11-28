<?php

namespace App\Http\Controllers;

use App\Models\Obra;
use Illuminate\Http\Request;

class ObraController extends Controller
{
    public function index()
    {
        $obras = Obra::all();
        return view('obras.index', compact('obras'));
    }

    public function create()
    {
        return view('obras.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'direccion' => 'nullable|string',
            'cliente' => 'nullable|string|max:255',
            'fecha_inicio' => 'nullable|date',
            'fecha_fin_estimada' => 'nullable|date|after_or_equal:fecha_inicio',
            'presupuesto' => 'nullable|numeric|min:0',
            'estado' => 'nullable|in:planificada,en_proceso,pausada,finalizada,cancelada'
        ]);

        Obra::create($request->all());

        return redirect()->route('obras.index')
            ->with('success', 'Obra creada exitosamente.');
    }

    public function show(Obra $obra)
    {
        $obra->load(['personal', 'materiales', 'tareas', 'reportesDiarios']);
        return view('obras.show', compact('obra'));
    }

    public function edit(Obra $obra)
    {
        return view('obras.edit', compact('obra'));
    }

    public function update(Request $request, Obra $obra)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'direccion' => 'nullable|string',
            'cliente' => 'nullable|string|max:255',
            'fecha_inicio' => 'nullable|date',
            'fecha_fin_estimada' => 'nullable|date|after_or_equal:fecha_inicio',
            'presupuesto' => 'nullable|numeric|min:0',
            'estado' => 'nullable|in:planificada,en_proceso,pausada,finalizada,cancelada'
        ]);

        $obra->update($request->all());

        return redirect()->route('obras.index')
            ->with('success', 'Obra actualizada exitosamente.');
    }

    public function destroy(Obra $obra)
    {
        $obra->delete();

        return redirect()->route('obras.index')
            ->with('success', 'Obra eliminada exitosamente.');
    }
}