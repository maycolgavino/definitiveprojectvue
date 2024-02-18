<?php

namespace App\Models;
use App\Models\Alumno;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Titulo extends Model
{
    protected $table = 'titulo';

    protected $fillable = [
        'cod_matricula',
        'dni',
        'resolucion_aprobacion',
        'acta_de_sustentacion',
        'diploma_titulo',
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
