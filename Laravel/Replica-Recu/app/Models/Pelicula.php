<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    //
    protected $fillable = [
        'titulo',
        'director',
        'genero',
        'sinopsis',
        'fecha_estreno',
        'duracion_min',
        'clasificacion_id'
    ];

    public function clasificacion(){
        return $this->belongsTo(Clasificacion::class,'clasificacion_id');
    }
}
