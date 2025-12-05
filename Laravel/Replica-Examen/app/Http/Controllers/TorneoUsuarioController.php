<?php

namespace App\Http\Controllers;

use App\Models\TorneoUsuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TorneoUsuarioController extends Controller
{
    public function inscribirse($torneo_id){
        if(!Auth::user()->id){
            
        }
        $user = Auth::user()->id;
        TorneoUsuarios::create([
            'id_Usuario' => $user,
            'id_Torneo' => $torneo_id
        ]);
        return redirect()->intended();
    }
}
