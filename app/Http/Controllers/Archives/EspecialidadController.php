<?php

namespace App\Http\Controllers\Archives;

use App\Http\Controllers\Controller;
use App\Models\Especialidad;
use Illuminate\Http\Request;

class EspecialidadController extends Controller
{
    public function uploadE(Request $request)
    {
        // Valida la solicitud para todos los archivos
        $request->validate([
            'Esp_Resolucion' => 'required|mimes:pdf|max:10240',
            'Esp_Acta' => 'required|mimes:pdf|max:10240',
        ]);
        $dni = $request->input('dni');
        $codigo = $request->input('codigo');
        $actas = 'archivos/' . $dni . '/actas';
        $resoluciones = 'archivos/' . $dni . '/resoluciones';
        // Guarda cada archivo en el directorio storage/app/archivos

        $pathEsp_Resolucion = $request->file('Esp_Resolucion')->storeAs($resoluciones, 'Especialidad_Resolucion_' . $dni . '.pdf');
        $pathEsp_Acta = $request->file('Esp_Acta')->storeAs($actas, 'Especialidad_Acta_' . $dni . '.pdf');


        $especialidad = Especialidad::create([
            'cod_matricula' => $codigo,
            'dni' => $dni,
            'resolucion_especialidad' => $pathEsp_Resolucion,
            'acta_especialidad' => $pathEsp_Acta,
            // 'fecha_ingreso' => now(),
            // Agrega más campos según sea necesario
        ]);

        return response()->json([
            'message' => 'Archivos  de Especialidad subidos exitosamente',
            'paths' => [
                'Esp_Resolucion' => $pathEsp_Resolucion,
                'Esp_Acta' => $pathEsp_Acta,
            ],
            'dni' => $dni,
        ]);
    }
}
