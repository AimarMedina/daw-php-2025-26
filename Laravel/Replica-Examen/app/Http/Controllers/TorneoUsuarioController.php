<?php

namespace App\Http\Controllers;

use App\Models\Torneo;
use App\Models\TorneoUsuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TorneoUsuarioController extends Controller
{
    public function inscribirse($torneo_id){

        $torneo = Torneo::find($torneo_id);
        $user = Auth::user()->id;

        if(!$user){
            return redirect()->route('error.auth');
        }

        if($torneo->estado === 'cerrado'){
            return back()->withErrors(['torneoCerrado' => 'Este torneo esta cerrado.']);
        }

        if($torneo->usuario->count() === $torneo->plazas_totales){
            return back()->withErrors(['plazasCompletas' => 'Este torneo ya está completo.']);
        }

        if($torneo->usuario->contains($user)){
            return back()->withErrors(['usuarioInscrito' => 'Ya estas inscrito a este torneo.']);
        }

        TorneoUsuarios::create([
            'id_Usuario' => $user,
            'id_Torneo' => $torneo_id
        ]);
        return redirect()->intended();
    }
}
