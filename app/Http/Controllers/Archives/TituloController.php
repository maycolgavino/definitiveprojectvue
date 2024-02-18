<?php

namespace App\Http\Controllers\Archives;

use App\Http\Controllers\Controller;
use App\Models\Titulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TituloController extends Controller
{
    public function uploadT(Request $request)
    {
        // Valida la solicitud para todos los archivos
        $request->validate([
            'Tit_Diploma' => 'required|mimes:pdf|max:10240',
            'Tit_Resolucion' => 'required|mimes:pdf|max:10240',
            'Tit_Acta' => 'required|mimes:pdf|max:10240',
        ]);
        $dni = $request->input('dni');
        $codigo = $request->input('codigo');
        $certificados = 'archivos/' . $dni . '/certificados';
        $actas = 'archivos/' . $dni . '/actas';
        $resoluciones = 'archivos/' . $dni . '/resoluciones';
        // Guarda cada archivo en el directorio storage/app/archivos

        $pathTit_Diploma = $request->file('Tit_Diploma')->storeAs($certificados, 'Titulo_Diploma_' . $dni . '.pdf');
        $pathTit_Resolucion = $request->file('Tit_Resolucion')->storeAs($resoluciones, 'Titulo_Resolucion_' . $dni . '.pdf');
        $pathTit_Acta = $request->file('Tit_Acta')->storeAs($actas, 'Titulo_Acta_' . $dni . '.pdf');


        $titulos = Titulo::create([
            'cod_matricula' => $codigo,
            'dni' => $dni,
            'resolucion_aprobacion' => $pathTit_Resolucion,
            'diploma_titulo' => $pathTit_Diploma,
            'acta_de_sustentacion' => $pathTit_Acta,
            // 'fecha_ingreso' => now(),
            // Agrega más campos según sea necesario
        ]);

        return response()->json([
            'message' => 'Archivos  de Titulo subidos exitosamente',
            'paths' => [
                'Tit_Diploma' => $pathTit_Diploma,
                'Tit_Resolucion' => $pathTit_Resolucion,
                'Tit_Acta' => $pathTit_Acta,
            ],
            'dni' => $dni,
        ]);
    }
}
