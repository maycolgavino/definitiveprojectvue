<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctorado extends Model
{
    protected $table = 'doctorado';

    protected $fillable = [
        'cod_matricula',
        'dni',
        'acta',
        'resolucion_doctorado',
        'titulo_doctorado',
        'observaciones',
    ];

    public function alumno()
    {
        return $this->belongsTo(Alumno::class)
        ->where('cod_matricula', $this->cod_matricula)
        ->where('dni', $this->dni);
    }
}
