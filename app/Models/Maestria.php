<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maestria extends Model
{
    protected $table = 'maestria';

    protected $fillable = [
        'cod_matricula',
        'dni',
        'resolucion_maestria',
        'diploma_maestria',
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
