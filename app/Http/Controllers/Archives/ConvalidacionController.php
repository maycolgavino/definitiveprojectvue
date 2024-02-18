<?php

namespace App\Http\Controllers\Archives;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Convalidacion;

class ConvalidacionController extends Controller
{
    public function uploadC(Request $request)
    {
        // Valida la solicitud para todos los archivos
        $request->validate([
            'Conv_Resolucion' => 'required|mimes:pdf|max:10240',
        ]);
        $dni = $request->input('dni');
        $codigo = $request->input('codigo');
        $resoluciones = 'archivos/' . $dni . '/resoluciones';
        // Guarda cada archivo en el directorio storage/app/archivos

        $pathConv_Resolucion = $request->file('Conv_Resolucion')->storeAs($resoluciones, 'Convalidacion_Resolucion_' . $dni . '.pdf');


        $convalidacion = Convalidacion::create([
            'cod_matricula' => $codigo,
            'dni' => $dni,
            'resolucion_convalidar' => $pathConv_Resolucion,
            // 'fecha_ingreso' => now(),
            // Agrega más campos según sea necesario
        ]);

        return response()->json([
            'message' => 'Archivos  de Convalidacion subidos exitosamente',
            'paths' => [
                'Conv_Resolucion' => $pathConv_Resolucion,
            ],
            'dni' => $dni,
        ]);
    }
}
