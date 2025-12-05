<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TorneoUsuarios extends Model
{
    protected $fillable = [
        'id_Torneo',
        'id_Usuario'
    ];
}
