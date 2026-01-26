<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clasificacion extends Model
{
    //
    protected $table = 'clasificaciones';
    public function clasificacion(){
        return $this->hasMany(Pelicula::class);
    }
}
