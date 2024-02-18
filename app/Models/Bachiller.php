<?php

namespace App\Models;

use
 
Illuminate\Database\Eloquent\Factories\HasFactory;
use
 
Illuminate\Database\Eloquent\Model;
use
 
Illuminate\Support\Facades\Storage;

class Bachiller extends Model
{
    protected $table = 'bachiller';

    protected $fillable = [
        'cod_matricula',
        'dni',
        'resolucion_bachiller',
        'diploma_bachiller',
        'certificado_estudios',
        'constancia_ingreso',
        'copia_dni',
        'acta',
        'observaciones',
    ];

    public function alumno()
    {
        return $this->belongsTo(Alumno::class)
            ->where('cod_matricula', $this->cod_matricula)
            ->where('dni', $this->dni);
    }

    
}