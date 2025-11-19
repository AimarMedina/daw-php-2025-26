<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Torneo extends Model
{
    protected $fillable = [
        'titulo',
        'juego',
        'descripcion',
        'fecha_inicio',
        'plazas_totales',
        'estado',
    ];
}
