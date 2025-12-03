<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Juego extends Model
{
    //
    public function torneo(){
        return $this->hasMany(Torneo::class);
    }
}
