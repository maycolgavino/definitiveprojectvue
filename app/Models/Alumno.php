<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = 'alumno';

    protected $fillable = [
        'cod_matricula',
        'dni',
        'apellidos',
        'nombres',
        'fecha_ingreso',
        'numero_caja',
        'observaciones',
    ];
}
