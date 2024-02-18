<?php

namespace App\Http\Controllers\Archives;

use App\Http\Controllers\Controller;
use App\Models\Maestria;
use Illuminate\Http\Request;

class MaestriaController extends Controller
{
    public function uploadM(Request $request)
    {
        // Valida la solicitud para todos los archivos
        $request->validate([
            'Mae_Diploma' => 'required|mimes:pdf|max:10240',
            'Mae_Resolucion' => 'required|mimes:pdf|max:10240',
            'Mae_Acta' => 'required|mimes:pdf|max:10240',
        ]);
        $dni = $request->input('dni');
        $codigo = $request->input('codigo');
        $certificados = 'archivos/' . $dni . '/certificados';
        $actas = 'archivos/' . $dni . '/actas';
        $resoluciones = 'archivos/' . $dni . '/resoluciones';
        // Guarda cada archivo en el directorio storage/app/archivos

        $pathMae_Diploma = $request->file('Mae_Diploma')->storeAs($certificados, 'Maestria_Diploma_' . $dni . '.pdf');
        $pathMae_Resolucion = $request->file('Mae_Resolucion')->storeAs($resoluciones, 'Maestria_Resolucion_' . $dni . '.pdf');
        $pathMae_Acta = $request->file('Mae_Acta')->storeAs($actas, 'Maestria_Acta_' . $dni . '.pdf');


        $maestria = Maestria::create([
            'cod_matricula' => $codigo,
            'dni' => $dni,
            'resolucion_maestria' => $pathMae_Resolucion,
            'diploma_maestria' => $pathMae_Diploma,
            'acta' => $pathMae_Acta,
            // 'fecha_ingreso' => now(),
            // Agrega más campos según sea necesario
        ]);

        return response()->json([
            'message' => 'Archivos  de Maestria subidos exitosamente',
            'paths' => [
                'Mae_Diploma' => $pathMae_Diploma,
                'Mae_Resolucion' => $pathMae_Resolucion,
                'Mae_Acta' => $pathMae_Acta,
            ],
            'dni' => $dni,
        ]);
    }
}
