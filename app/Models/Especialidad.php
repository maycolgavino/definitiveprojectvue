<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    protected $table = 'especialidad';

    protected $fillable = [
        // Agrega aquí tus columnas
        'cod_matricula',
        'dni',
        'resolucion_bachiller',
        'diploma_bachiller',
        'resolucion_especialidad',
        'acta_especialidad',
        'observaciones',
    ];

    // Relación con la tabla Alumno
    public function alumno()
    {
        return $this->belongsTo(Alumno::class)
            ->where('cod_matricula', $this->cod_matricula)
            ->where('dni', $this->dni);
    }
}