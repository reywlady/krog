<?php

namespace Database\Seeders;

use App\Models\Documento;
use App\Models\Obra;
use Illuminate\Database\Seeder;

class DocumentoSeeder extends Seeder
{
    public function run()
    {
        $obras = Obra::all();
        $tipos = ['planos', 'contrato', 'permiso', 'estudio', 'certificado', 'reporte'];

        foreach ($obras as $obra) {
            // 5-10 documentos por obra
            $numeroDocumentos = rand(5, 10);
            
            for ($i = 0; $i < $numeroDocumentos; $i++) {
                $tipo = $tipos[array_rand($tipos)];
                $fechaSubida = now()->subDays(rand(1, 120));
                
                Documento::create([
                    'obra_id' => $obra->id,
                    'nombre' => $this->generarNombreDocumento($tipo, $i + 1),
                    'tipo' => $tipo,
                    'descripcion' => $this->generarDescripcionDocumento($tipo),
                    'archivo_path' => 'documentos/' . $obra->id . '/doc_' . ($i + 1) . '.pdf',
                    'fecha_subida' => $fechaSubida
                ]);
            }
        }
    }

    private function generarNombreDocumento($tipo, $numero)
    {
        $nombres = [
            'planos' => ['Planos Arquitectónicos', 'Planos Estructurales', 'Planos Eléctricos', 'Planos Hidrosanitarios'],
            'contrato' => ['Contrato Principal', 'Adenda al Contrato', 'Contrato de Subcontratista'],
            'permiso' => ['Permiso de Construcción', 'Licencia Ambiental', 'Permiso de Ocupación'],
            'estudio' => ['Estudio de Suelos', 'Estudio Topográfico', 'Estudio de Impacto Ambiental'],
            'certificado' => ['Certificado de Sismo Resistencia', 'Certificado de Calidad', 'Certificado de Cumplimiento'],
            'reporte' => ['Reporte de Avance', 'Reporte de Inspección', 'Reporte Fotográfico']
        ];

        return $nombres[$tipo][array_rand($nombres[$tipo])] . ' - V' . $numero;
    }

    private function generarDescripcionDocumento($tipo)
    {
        $descripciones = [
            'planos' => 'Documentación técnica con especificaciones detalladas del proyecto.',
            'contrato' => 'Documento legal que establece los términos y condiciones del proyecto.',
            'permiso' => 'Autorización oficial para la ejecución de las obras.',
            'estudio' => 'Análisis técnico especializado requerido para el proyecto.',
            'certificado' => 'Documento que acredita el cumplimiento de normativas.',
            'reporte' => 'Documento informativo sobre el estado y progreso del proyecto.'
        ];

        return $descripciones[$tipo];
    }
}