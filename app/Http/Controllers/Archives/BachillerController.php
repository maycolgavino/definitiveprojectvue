<?php

namespace App\Http\Controllers\Archives;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bachiller;
use Illuminate\Support\Facades\Storage;

class BachillerController extends Controller
{

    public function upload(Request $request)
    {
        // Valida la solicitud para todos los archivos
        $request->validate([
            'Bach_CopiaDNI' => 'required|mimes:pdf|max:10240',
            'Bach_CertEstu' => 'required|mimes:pdf|max:10240',
            'Bach_Constancia' => 'required|mimes:pdf|max:10240',
            'Bach_Diploma' => 'required|mimes:pdf|max:10240',
            'Bach_Resolucion' => 'required|mimes:pdf|max:10240',
            'Bach_Acta' => 'required|mimes:pdf|max:10240',
        ]);
        $dni = $request->input('dni');
        $codigo = $request->input('codigo');
        $certificados = 'archivos/' . $dni . '/certificados';
        $actas = 'archivos/' . $dni . '/actas';
        $resoluciones = 'archivos/' . $dni . '/resoluciones';
        // Guarda cada archivo en el directorio storage/app/archivos
        $pathBach_CopiaDNI = $request->file('Bach_CopiaDNI')->storeAs($certificados, 'Bachiller_CopiaDNI_' . $dni . '.pdf');
        $pathBach_CertEstu = $request->file('Bach_CertEstu')->storeAs($certificados, 'Bachiller_CertEstu_' . $dni . '.pdf');
        $pathBach_Constancia = $request->file('Bach_Constancia')->storeAs($certificados, 'Bachiller_Constancia_' . $dni . '.pdf');
        $pathBach_Diploma = $request->file('Bach_Diploma')->storeAs($certificados, 'Bachiller_Diploma_' . $dni . '.pdf');
        $pathBach_Resolucion = $request->file('Bach_Resolucion')->storeAs($resoluciones, 'Bachiller_Resolucion_' . $dni . '.pdf');
        $pathBach_Acta = $request->file('Bach_Acta')->storeAs($actas, 'Bachiller_Acta_' . $dni . '.pdf');


        $bachiller = Bachiller::create([
            'cod_matricula'=>$codigo ,
            'dni'=>$dni,
            'resolucion_bachiller'=>$pathBach_Resolucion,
            'diploma_bachiller'=>$pathBach_Diploma,
            'certificado_estudios'=> $pathBach_CertEstu,
            'constancia_ingreso'=> $pathBach_Constancia,
            'copia_dni'=>$pathBach_CopiaDNI,
            'acta'=>$pathBach_Acta, 
            'fecha_ingreso' => now(),
            // Agrega más campos según sea necesario
        ]);
        
        return response()->json([
            'message' => 'Archivos subidos exitosamente',
            'paths' => [
                'Bach_CopiaDNI' => $pathBach_CopiaDNI,
                'Bach_CertEstu' => $pathBach_CertEstu,
                'Bach_Constancia' => $pathBach_Constancia,
                'Bach_Diploma' => $pathBach_Diploma,
                'Bach_Resolucion' => $pathBach_Resolucion,
                'Bach_Acta' => $pathBach_Acta,
            ],
            'dni' => $dni,
        ]);
    }

    


}
