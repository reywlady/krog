<?php

namespace Database\Seeders;

use App\Models\Proveedor;
use Illuminate\Database\Seeder;

class ProveedorSeeder extends Seeder
{
    public function run()
    {
        $proveedores = [
            [
                'nombre' => 'Materiales Construcción S.A.',
                'contacto' => 'Carlos Rodríguez',
                'telefono' => '+57 300 123 4567',
                'email' => 'ventas@materialessa.com',
                'direccion' => 'Calle 123 #45-67, Bogotá'
            ],
            [
                'nombre' => 'Hierros y Metales Ltda.',
                'contacto' => 'María González',
                'telefono' => '+57 310 987 6543',
                'email' => 'info@hierrosymetales.com',
                'direccion' => 'Av. Principal #89-10, Medellín'
            ],
            [
                'nombre' => 'Cementos Nacionales',
                'contacto' => 'Roberto Silva',
                'telefono' => '+57 320 555 8888',
                'email' => 'contacto@cementosnacionales.com',
                'direccion' => 'Zona Industrial, Cali'
            ],
            [
                'nombre' => 'Maderas del Caribe',
                'contacto' => 'Ana Martínez',
                'telefono' => '+57 315 444 3333',
                'email' => 'maderas@caribe.com',
                'direccion' => 'Puerto Colombia, Barranquilla'
            ],
            [
                'nombre' => 'Eléctricos y Más',
                'contacto' => 'Pedro López',
                'telefono' => '+57 301 666 9999',
                'email' => 'pedro@electricosymas.com',
                'direccion' => 'Centro Comercial Plaza, Cartagena'
            ]
        ];

        foreach ($proveedores as $proveedor) {
            Proveedor::create($proveedor);
        }
    }
}