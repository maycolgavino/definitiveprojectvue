<?php

namespace App\Http\Controllers\Archives;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Bachiller;

class AlumnoController extends Controller
{
    public function index()
    {
        // Obtener todos los alumnos
        $alumnos = Alumno::all();

        return response()->json($alumnos);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nombres' => 'required|string|max:30',
            'apellidos' => 'required|string|max:30',
            'cod_matricula' => 'required|digits:10',
            'dni' => 'required|digits:8',
            'box' => 'nullable',
            'obser' => 'nullable',
        ]);

        $alumnos = Alumno::create([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'cod_matricula' => $request->cod_matricula,
            'dni' => $request->dni,
            'numero_caja' => $request->box,
            'observaciones' => $request->obser,
            'fecha_ingreso' => now(),
            // Agrega más campos según sea necesario
        ]);
        $carpetaPrincipal = 'archivos/' . $request->dni;
        $carpetas = ['actas', 'resoluciones', 'certificados'];

        foreach ($carpetas as $carpeta) {
            Storage::makeDirectory($carpetaPrincipal . '/' . $carpeta);
        }
        // Alegria mi gente ;v
        // la vida es bella
        // como dice el bicho siuuuuuuuuuu
        // Puedes disparar eventos personalizados o realizar otras acciones después de crear el alumno

        return redirect()->route('archivos', ['dni' => $alumnos->dni, 'nombres' => $alumnos->nombres, 'apellidos' => $alumnos->apellidos, 'codigo' => $alumnos->cod_matricula]);
    }
    public function buscarAlumno($dni)
    {
        $alumno = Alumno::where('dni', $dni)->first();
        $bachiller = Bachiller::where('dni', $dni)->first();


        if (!$alumno) {
            return response()->json(['error' => 'No se encontró ningún alumno con el DNI proporcionado.'], 404);
        }

        return response()->json([
            'dni' => $alumno->dni,
            'nombres' => $alumno->nombres,
            'apellidos' => $alumno->apellidos,
            'codigo' => $alumno->cod_matricula,
            'num_caja' => $alumno->numero_caja,
            'obs' => $alumno->observaciones,
             'resolucion' => $bachiller->resolucion_bachiller,
            // Agrega más campos según sea necesario
        ]);
    }

    public function descargarArchivo(Request $request, $dni, $tipoArchivo)
    {
      // Validar el tipo de archivo
      if (!in_array($tipoArchivo, ['Actas', 'Resoluciones', 'Certificados'])) {
        return response()->json(['error' => 'Tipo de archivo no válido'], 400);
      }
      
      // Ruta del archivo
      $rutaArchivo = storage_path("app/archivos/$dni/$tipoArchivo");
      
      // Si el archivo no existe
      if (!file_exists($rutaArchivo)) {
        return response()->json(['error' => 'El archivo no existe'], 404);
      }
      
      // Descargar el archivo
      return response()->download($rutaArchivo);
    }
    

    public function update(Request $request, $id)
    {
        // Actualizar un alumno por su ID
        $alumno = Alumno::findOrFail($id);
        $alumno->update($request->all());

        return response()->json($alumno);
    }

    public function destroy($id)
    {
        // Eliminar un alumno por su ID
        $alumno = Alumno::findOrFail($id);
        $alumno->delete();

        return response()->json(null, 204);
    }
}
