<?php

namespace Database\Seeders;

use App\Models\Personal;
use App\Models\Obra;
use Illuminate\Database\Seeder;

class PersonalSeeder extends Seeder
{
    public function run()
    {
        $personal = [
            [
                'nombre' => 'Carlos Mendoza',
                'email' => 'carlos.mendoza@constructora.com',
                'telefono' => '+57 300 111 2233',
                'especialidad' => 'Ingeniero Civil'
            ],
            [
                'nombre' => 'Ana Rodríguez',
                'email' => 'ana.rodriguez@constructora.com',
                'telefono' => '+57 310 222 3344',
                'especialidad' => 'Arquitecta'
            ],
            [
                'nombre' => 'Miguel Torres',
                'email' => 'miguel.torres@constructora.com',
                'telefono' => '+57 320 333 4455',
                'especialidad' => 'Maestro de Obra'
            ],
            [
                'nombre' => 'Laura García',
                'email' => 'laura.garcia@constructora.com',
                'telefono' => '+57 315 444 5566',
                'especialidad' => 'Ingeniera Estructural'
            ],
            [
                'nombre' => 'Roberto Silva',
                'email' => 'roberto.silva@constructora.com',
                'telefono' => '+57 301 555 6677',
                'especialidad' => 'Electricista'
            ],
            [
                'nombre' => 'Sofia Martínez',
                'email' => 'sofia.martinez@constructora.com',
                'telefono' => '+57 302 666 7788',
                'especialidad' => 'Fontanera'
            ],
            [
                'nombre' => 'David López',
                'email' => 'david.lopez@constructora.com',
                'telefono' => '+57 304 777 8899',
                'especialidad' => 'Obrero General'
            ],
            [
                'nombre' => 'Elena Castro',
                'email' => 'elena.castro@constructora.com',
                'telefono' => '+57 305 888 9900',
                'especialidad' => 'Ayudante de Obra'
            ]
        ];

        $personalIds = [];
        foreach ($personal as $persona) {
            $p = Personal::create($persona);
            $personalIds[] = $p->id;
        }

        // Asignar personal a obras
        $obras = Obra::all();
        
        foreach ($obras as $obra) {
            // Tomar 3-5 personas aleatorias para cada obra
            $personalAleatorio = array_rand($personalIds, rand(3, 5));
            if (!is_array($personalAleatorio)) {
                $personalAleatorio = [$personalAleatorio];
            }
            
            foreach ($personalAleatorio as $index => $personalId) {
                $roles = ['Supervisor', 'Obrero', 'Especialista', 'Ayudante', 'Maestro'];
                $obra->personal()->attach($personalIds[$personalId], [
                    'fecha_inicio' => now()->subDays(rand(30, 180)),
                    'fecha_fin' => rand(0, 1) ? now()->addDays(rand(60, 300)) : null,
                    'rol' => $roles[array_rand($roles)]
                ]);
            }
        }
    }
}