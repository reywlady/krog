<?php

namespace App\Http\Controllers;

use App\Models\ReporteDiario;
use App\Models\Obra;
use Illuminate\Http\Request;

class ReporteDiarioController extends Controller
{
    public function index()
    {
        $reportes = ReporteDiario::with('obra')->get();
        return view('reporte-diarios.index', compact('reportes'));
    }

    public function create()
    {
        $obras = Obra::all();
        return view('reporte-diarios.create', compact('obras'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'obra_id' => 'required|exists:obras,id',
            'fecha' => 'required|date',
            'resumen' => 'nullable|string',
            'avance' => 'nullable|string',
            'incidencias' => 'nullable|string',
            'clima' => 'nullable|string|max:100'
        ]);

        ReporteDiario::create($request->all());

        return redirect()->route('reporte-diarios.index')
            ->with('success', 'Reporte diario creado exitosamente.');
    }

    public function show(ReporteDiario $reporteDiario)
    {
        $reporteDiario->load('obra');
        return view('reporte-diarios.show', compact('reporteDiario'));
    }

    public function edit(ReporteDiario $reporteDiario)
    {
        $obras = Obra::all();
        return view('reporte-diarios.edit', compact('reporteDiario', 'obras'));
    }

    public function update(Request $request, ReporteDiario $reporteDiario)
    {
        $request->validate([
            'obra_id' => 'required|exists:obras,id',
            'fecha' => 'required|date',
            'resumen' => 'nullable|string',
            'avance' => 'nullable|string',
            'incidencias' => 'nullable|string',
            'clima' => 'nullable|string|max:100'
        ]);

        $reporteDiario->update($request->all());

        return redirect()->route('reporte-diarios.index')
            ->with('success', 'Reporte diario actualizado exitosamente.');
    }

    public function destroy(ReporteDiario $reporteDiario)
    {
        $reporteDiario->delete();

        return redirect()->route('reporte-diarios.index')
            ->with('success', 'Reporte diario eliminado exitosamente.');
    }
}