<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convalidacion extends Model
{
    protected $table = 'convalidacion';

    protected $fillable = [
        'cod_matricula',
        'dni',
        'resolucion_convalidar',
        'observaciones',
    ];
    public function alumno()
    {
        return $this->belongsTo(Alumno::class)
            ->where('cod_matricula', $this->cod_matricula)
            ->where('dni', $this->dni);
    }
}
