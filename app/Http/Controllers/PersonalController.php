<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use App\Models\Obra;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public function index()
    {
        $personal = Personal::with('obras')->get();
        return view('personal.index', compact('personal'));
    }

    public function create()
    {
        $obras = Obra::all();
        return view('personal.create', compact('obras'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'nullable|email|unique:personals,email',
            'telefono' => 'nullable|string|max:20',
            'especialidad' => 'nullable|string|max:255'
        ]);

        $personal = Personal::create($request->all());

        if ($request->has('obras')) {
            $personal->obras()->attach($request->obras, [
                'rol' => $request->rol,
                'fecha_inicio' => $request->fecha_inicio
            ]);
        }

        return redirect()->route('personal.index')
            ->with('success', 'Personal creado exitosamente.');
    }

    public function show(Personal $personal)
    {
        $personal->load('obras');
        return view('personal.show', compact('personal'));
    }

    public function edit(Personal $personal)
    {
        $obras = Obra::all();
        $personal->load('obras');
        return view('personal.edit', compact('personal', 'obras'));
    }

    public function update(Request $request, Personal $personal)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'nullable|email|unique:personals,email,' . $personal->id,
            'telefono' => 'nullable|string|max:20',
            'especialidad' => 'nullable|string|max:255'
        ]);

        $personal->update($request->all());

        if ($request->has('obras')) {
            $personal->obras()->sync($request->obras);
        }

        return redirect()->route('personal.index')
            ->with('success', 'Personal actualizado exitosamente.');
    }

    public function destroy(Personal $personal)
    {
        $personal->delete();

        return redirect()->route('personal.index')
            ->with('success', 'Personal eliminado exitosamente.');
    }
}