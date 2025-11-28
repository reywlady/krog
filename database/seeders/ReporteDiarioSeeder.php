<?php

namespace Database\Seeders;

use App\Models\ReporteDiario;
use App\Models\Obra;
use Illuminate\Database\Seeder;

class ReporteDiarioSeeder extends Seeder
{
    public function run()
    {
        $obras = Obra::all();
        $climas = ['Soleado', 'Parcialmente nublado', 'Nublado', 'Lluvia ligera', 'Lluvia intensa', 'Ventoso'];

        foreach ($obras as $obra) {
            // Crear reportes para los últimos 30 días
            for ($i = 30; $i >= 0; $i--) {
                // 70% de probabilidad de tener reporte ese día
                if (rand(1, 100) <= 70) {
                    $fecha = now()->subDays($i);
                    
                    ReporteDiario::create([
                        'obra_id' => $obra->id,
                        'fecha' => $fecha,
                        'resumen' => $this->generarResumen($obra->nombre),
                        'avance' => $this->generarAvance(),
                        'incidencias' => $this->generarIncidencias(),
                        'clima' => $climas[array_rand($climas)]
                    ]);
                }
            }
        }
    }

    private function generarResumen($nombreObra)
    {
        $resumenes = [
            "Trabajo normal en $nombreObra. Avance según lo programado.",
            "Jornada productiva en $nombreObra con buen rendimiento del personal.",
            "Actividades regulares en $nombreObra. Cumplimiento de metas diarias.",
            "Trabajo intensivo en $nombreObra para recuperar tiempo perdido.",
            "Jornada con actividades variadas en diferentes frentes de $nombreObra."
        ];

        return $resumenes[array_rand($resumenes)];
    }

    private function generarAvance()
    {
        $avances = [
            "Se completó el 95% de la cimentación en el sector norte.",
            "Avance del 70% en instalaciones eléctricas del primer piso.",
            "Se terminó la colocación de cerámicas en baños del nivel 2.",
            "Montaje de estructura metálica al 60% en área de cubiertas.",
            "Pintura de fachada completada en un 80%."
        ];

        return $avances[array_rand($avances)];
    }

    private function generarIncidencias()
    {
        $incidencias = [
            "Ninguna incidencia reportada.",
            "Falla menor en equipo menor, reparada durante la jornada.",
            "Lluvia por la mañana retrasó inicio de actividades 2 horas.",
            "Falta de material por retraso en entrega del proveedor.",
            "Ausencia de 2 trabajadores por permisos médicos."
        ];

        return rand(1, 100) <= 30 ? $incidencias[array_rand($incidencias)] : null;
    }
}