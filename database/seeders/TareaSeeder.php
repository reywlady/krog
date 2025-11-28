<?php

namespace Database\Seeders;

use App\Models\Tarea;
use App\Models\Obra;
use Illuminate\Database\Seeder;

class TareaSeeder extends Seeder
{
    public function run()
    {
        $obras = Obra::all();
        $estados = ['pendiente', 'en_proceso', 'completada', 'atrasada'];
        $prioridades = ['baja', 'media', 'alta'];

        foreach ($obras as $obra) {
            $tareasPorObra = rand(8, 15); // 8-15 tareas por obra

            for ($i = 1; $i <= $tareasPorObra; $i++) {
                $fechaInicio = now()->subDays(rand(0, 90));
                $fechaFinEstimada = $fechaInicio->copy()->addDays(rand(15, 60));
                
                $estado = $estados[array_rand($estados)];
                
                // Si está completada, generar fechas reales
                $fechaInicioReal = null;
                $fechaFinReal = null;
                if ($estado === 'completada') {
                    $fechaInicioReal = $fechaInicio->copy()->addDays(rand(0, 5));
                    $fechaFinReal = $fechaInicioReal->copy()->addDays(rand(10, 50));
                } elseif ($estado === 'en_proceso') {
                    $fechaInicioReal = $fechaInicio->copy()->addDays(rand(0, 5));
                }

                Tarea::create([
                    'obra_id' => $obra->id,
                    'nombre' => $this->generarNombreTarea($i),
                    'descripcion' => $this->generarDescripcionTarea(),
                    'fecha_inicio_estimada' => $fechaInicio,
                    'fecha_fin_estimada' => $fechaFinEstimada,
                    'fecha_inicio_real' => $fechaInicioReal,
                    'fecha_fin_real' => $fechaFinReal,
                    'estado' => $estado,
                    'prioridad' => $prioridades[array_rand($prioridades)]
                ]);
            }
        }
    }

    private function generarNombreTarea($numero)
    {
        $tareas = [
            'Excavación y movimiento de tierra',
            'Cimentación y fundaciones',
            'Estructura de concreto armado',
            'Albañilería y mampostería',
            'Instalaciones eléctricas',
            'Instalaciones hidrosanitarias',
            'Instalación de ventanas y puertas',
            'Acabados en yeso y estuco',
            'Instalación de pisos y cerámicas',
            'Pintura y acabados finales',
            'Instalación de cielos rasos',
            'Montaje de escaleras',
            'Impermeabilización de cubiertas',
            'Instalación de redes de gas',
            'Landscaping y áreas exteriores'
        ];

        return $tareas[array_rand($tareas)] . " - Fase " . $numero;
    }

    private function generarDescripcionTarea()
    {
        $descripciones = [
            'Ejecución según planos aprobados y especificaciones técnicas.',
            'Trabajo que incluye preparación del terreno y control de calidad.',
            'Instalación con materiales de primera calidad y cumpliendo normas.',
            'Proceso que requiere supervisión constante y pruebas de funcionamiento.',
            'Actividad que debe coordinarse con otros gremios de la obra.'
        ];

        return $descripciones[array_rand($descripciones)];
    }
}