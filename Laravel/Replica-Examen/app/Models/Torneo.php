<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Torneo extends Model
{
    protected $fillable = [
        'titulo',
        'id_juego',
        'descripcion',
        'fecha_inicio',
        'plazas_totales',
        'estado',
    ];

    public function juego(){
        return $this->belongsTo(Juego::class, 'id_juego');
    }
    public function usuario(){
        return $this->belongsToMany(User::class, 'torneo_usuarios', 'id_Torneo', 'id_Usuario')->withPivot('created_at');
    }
}
