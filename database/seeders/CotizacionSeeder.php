<?php

namespace Database\Seeders;

use App\Models\Cotizacion;
use App\Models\Obra;
use App\Models\Proveedor;
use Illuminate\Database\Seeder;

class CotizacionSeeder extends Seeder
{
    public function run()
    {
        $obras = Obra::all();
        $proveedores = Proveedor::all();
        $estados = ['pendiente', 'aprobada', 'rechazada'];

        foreach ($obras as $obra) {
            // 3-6 cotizaciones por obra
            $numeroCotizaciones = rand(3, 6);
            
            for ($i = 0; $i < $numeroCotizaciones; $i++) {
                $proveedor = $proveedores->random();
                $fecha = now()->subDays(rand(1, 90));
                
                Cotizacion::create([
                    'obra_id' => $obra->id,
                    'proveedor_id' => $proveedor->id,
                    'numero_cotizacion' => 'COT-' . $obra->id . '-' . ($i + 1) . '-' . date('Ymd', $fecha->timestamp),
                    'fecha' => $fecha,
                    'monto_total' => rand(5000000, 50000000),
                    'estado' => $estados[array_rand($estados)],
                    'archivo_path' => null // En un caso real, aquí iría la ruta del archivo
                ]);
            }
        }
    }
}