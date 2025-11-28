<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use App\Models\Obra;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    public function index()
    {
        $tareas = Tarea::with('obra')->get();
        return view('tareas.index', compact('tareas'));
    }

    public function create()
    {
        $obras = Obra::all();
        return view('tareas.create', compact('obras'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'obra_id' => 'required|exists:obras,id',
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'fecha_inicio_estimada' => 'nullable|date',
            'fecha_fin_estimada' => 'nullable|date|after_or_equal:fecha_inicio_estimada',
            'fecha_inicio_real' => 'nullable|date',
            'fecha_fin_real' => 'nullable|date|after_or_equal:fecha_inicio_real',
            'estado' => 'nullable|in:pendiente,en_proceso,completada,atrasada',
            'prioridad' => 'nullable|in:baja,media,alta'
        ]);

        Tarea::create($request->all());

        return redirect()->route('tareas.index')
            ->with('success', 'Tarea creada exitosamente.');
    }

    public function show(Tarea $tarea)
    {
        $tarea->load('obra');
        return view('tareas.show', compact('tarea'));
    }

    public function edit(Tarea $tarea)
    {
        $obras = Obra::all();
        return view('tareas.edit', compact('tarea', 'obras'));
    }

    public function update(Request $request, Tarea $tarea)
    {
        $request->validate([
            'obra_id' => 'required|exists:obras,id',
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'fecha_inicio_estimada' => 'nullable|date',
            'fecha_fin_estimada' => 'nullable|date|after_or_equal:fecha_inicio_estimada',
            'fecha_inicio_real' => 'nullable|date',
            'fecha_fin_real' => 'nullable|date|after_or_equal:fecha_inicio_real',
            'estado' => 'nullable|in:pendiente,en_proceso,completada,atrasada',
            'prioridad' => 'nullable|in:baja,media,alta'
        ]);

        $tarea->update($request->all());

        return redirect()->route('tareas.index')
            ->with('success', 'Tarea actualizada exitosamente.');
    }

    public function destroy(Tarea $tarea)
    {
        $tarea->delete();

        return redirect()->route('tareas.index')
            ->with('success', 'Tarea eliminada exitosamente.');
    }
}