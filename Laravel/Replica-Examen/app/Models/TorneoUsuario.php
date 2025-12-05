<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TorneoUsuario extends Model
{
    protected $fillable = [
        'id_Torneo',
        'id_Usuario'
    ];
}
