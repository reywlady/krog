<?php

namespace Database\Seeders;

use App\Models\Material;
use App\Models\Proveedor;
use App\Models\Obra;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    public function run()
    {
        $materiales = [
            [
                'nombre' => 'Cemento Gris',
                'descripcion' => 'Cemento Portland para construcción general',
                'unidad_medida' => 'kg',
                'precio_unitario' => 1200,
                'proveedor_id' => 1
            ],
            [
                'nombre' => 'Varilla Corrugada 1/2"',
                'descripcion' => 'Varilla de acero corrugado grado 60',
                'unidad_medida' => 'unidad',
                'precio_unitario' => 25000,
                'proveedor_id' => 2
            ],
            [
                'nombre' => 'Arena de Río',
                'descripcion' => 'Arena lavada para mezclas de concreto',
                'unidad_medida' => 'm3',
                'precio_unitario' => 85000,
                'proveedor_id' => 1
            ],
            [
                'nombre' => 'Grava 3/4"',
                'descripcion' => 'Grava triturada para concreto',
                'unidad_medida' => 'm3',
                'precio_unitario' => 95000,
                'proveedor_id' => 1
            ],
            [
                'nombre' => 'Ladrillo 6 Huecos',
                'descripcion' => 'Ladrillo cerámico para mampostería',
                'unidad_medida' => 'unidad',
                'precio_unitario' => 800,
                'proveedor_id' => 1
            ],
            [
                'nombre' => 'Tubo PVC 2"',
                'descripcion' => 'Tubo de PVC para instalaciones hidráulicas',
                'unidad_medida' => 'unidad',
                'precio_unitario' => 15000,
                'proveedor_id' => 4
            ],
            [
                'nombre' => 'Cable THHN 12 AWG',
                'descripcion' => 'Cable eléctrico para instalaciones internas',
                'unidad_medida' => 'm',
                'precio_unitario' => 3500,
                'proveedor_id' => 5
            ],
            [
                'nombre' => 'Pintura Vinílica',
                'descripcion' => 'Pintura para interiores y exteriores',
                'unidad_medida' => 'galón',
                'precio_unitario' => 45000,
                'proveedor_id' => 1
            ],
            [
                'nombre' => 'Madera Pino 2x4',
                'descripcion' => 'Madera para encofrados y estructuras temporales',
                'unidad_medida' => 'm',
                'precio_unitario' => 12000,
                'proveedor_id' => 4
            ],
            [
                'nombre' => 'Cerámica 40x40',
                'descripcion' => 'Baldosa cerámica para pisos',
                'unidad_medida' => 'm2',
                'precio_unitario' => 35000,
                'proveedor_id' => 1
            ]
        ];

        $materialIds = [];
        foreach ($materiales as $material) {
            $m = Material::create($material);
            $materialIds[] = $m->id;
        }

        // Asignar materiales a obras
        $obras = Obra::all();
        $estados = ['solicitado', 'en_camino', 'recibido', 'utilizado'];

        foreach ($obras as $obra) {
            // Tomar 4-7 materiales aleatorios para cada obra
            $materialesAleatorios = array_rand($materialIds, rand(4, 7));
            if (!is_array($materialesAleatorios)) {
                $materialesAleatorios = [$materialesAleatorios];
            }
            
            foreach ($materialesAleatorios as $materialIndex) {
                $obra->materiales()->attach($materialIds[$materialIndex], [
                    'cantidad' => rand(10, 1000),
                    'fecha_requerida' => now()->addDays(rand(1, 60)),
                    'estado' => $estados[array_rand($estados)]
                ]);
            }
        }
    }
}