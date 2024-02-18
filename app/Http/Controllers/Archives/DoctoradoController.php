<?php

namespace App\Http\Controllers\Archives;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctorado;

class DoctoradoController extends Controller
{
    public function uploadD(Request $request)
    {
        // Valida la solicitud para todos los archivos
        $request->validate([
            'Doc_Diploma' => 'required|mimes:pdf|max:10240',
            'Doc_Resolucion' => 'required|mimes:pdf|max:10240',
            'Doc_Acta' => 'required|mimes:pdf|max:10240',
        ]);
        $dni = $request->input('dni');
        $codigo = $request->input('codigo');
        $certificados = 'archivos/' . $dni . '/certificados';
        $actas = 'archivos/' . $dni . '/actas';
        $resoluciones = 'archivos/' . $dni . '/resoluciones';
        // Guarda cada archivo en el directorio storage/app/archivos

        $pathDoc_Diploma = $request->file('Doc_Diploma')->storeAs($certificados, 'Doctorado_Diploma_' . $dni . '.pdf');
        $pathDoc_Resolucion = $request->file('Doc_Resolucion')->storeAs($resoluciones, 'Doctorado_Resolucion_' . $dni . '.pdf');
        $pathDoc_Acta = $request->file('Doc_Acta')->storeAs($actas, 'Doctorado_Acta_' . $dni . '.pdf');


        $doctorado = Doctorado::create([
            'cod_matricula' => $codigo,
            'dni' => $dni,
            'resolucion_doctorado' => $pathDoc_Resolucion,
            'titulo_doctorado' => $pathDoc_Diploma,
            'acta' => $pathDoc_Acta,
            // 'fecha_ingreso' => now(),
            // Agrega más campos según sea necesario
        ]);

        return response()->json([
            'message' => 'Archivos  de Doctorado subidos exitosamente',
            'paths' => [
                'Doc_Diploma' => $pathDoc_Diploma,
                'Doc_Resolucion' => $pathDoc_Resolucion,
                'Doc_Acta' => $pathDoc_Acta,
            ],
            'dni' => $dni,
        ]);
    }
    
}
