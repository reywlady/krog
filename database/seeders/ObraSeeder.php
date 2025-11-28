<?php

namespace Database\Seeders;

use App\Models\Obra;
use Illuminate\Database\Seeder;

class ObraSeeder extends Seeder
{
    public function run()
    {
        $obras = [
            [
                'nombre' => 'Edificio Torres del Norte',
                'descripcion' => 'Construcción de edificio residencial de 15 pisos en el norte de la ciudad',
                'direccion' => 'Carrera 15 #123-45, Bogotá',
                'cliente' => 'Constructora Norte S.A.',
                'fecha_inicio' => '2024-01-15',
                'fecha_fin_estimada' => '2024-12-20',
                'presupuesto' => 2500000000,
                'estado' => 'en_proceso'
            ],
            [
                'nombre' => 'Centro Comercial Plaza Central',
                'descripcion' => 'Construcción de centro comercial con 100 locales comerciales',
                'direccion' => 'Avenida Principal #67-89, Medellín',
                'cliente' => 'Inversiones Comerciales Ltda.',
                'fecha_inicio' => '2024-02-01',
                'fecha_fin_estimada' => '2025-06-30',
                'presupuesto' => 5000000000,
                'estado' => 'en_proceso'
            ],
            [
                'nombre' => 'Puente La Concordia',
                'descripcion' => 'Construcción de puente vehicular de 200 metros de longitud',
                'direccion' => 'Vía a la Costa, Cali',
                'cliente' => 'Gobierno Departamental',
                'fecha_inicio' => '2023-11-10',
                'fecha_fin_estimada' => '2024-08-15',
                'presupuesto' => 1800000000,
                'estado' => 'en_proceso'
            ],
            [
                'nombre' => 'Conjunto Residencial Verde',
                'descripcion' => 'Urbanización con 50 casas campestres',
                'direccion' => 'Km 8 Vía a Pance, Cali',
                'cliente' => 'Constructora Habitat',
                'fecha_inicio' => '2023-08-20',
                'fecha_fin_estimada' => '2024-05-30',
                'presupuesto' => 3200000000,
                'estado' => 'finalizada'
            ],
            [
                'nombre' => 'Hospital Regional Sur',
                'descripcion' => 'Ampliación y remodelación del hospital regional',
                'direccion' => 'Calle 10 Sur #45-20, Bogotá',
                'cliente' => 'Ministerio de Salud',
                'fecha_inicio' => '2024-03-01',
                'fecha_fin_estimada' => '2025-11-15',
                'presupuesto' => 8000000000,
                'estado' => 'planificada'
            ]
        ];

        foreach ($obras as $obra) {
            Obra::create($obra);
        }
    }
}