<?php

namespace App\Http\Controllers;

use App\Models\TorneoUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TorneoUsuarioController extends Controller
{
    public function inscribirse($torneo_id){
        $user = Auth::user()->id;
        TorneoUsuario::create([
            'id_Usuario' => $user,
            'id_Torneo' => $torneo_id
        ]);

    }
}
