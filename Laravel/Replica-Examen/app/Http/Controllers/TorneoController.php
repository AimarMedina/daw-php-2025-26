<?php

namespace App\Http\Controllers;

use App\Models\Juego;
use Illuminate\Http\Request;
use App\Models\Torneo;

class TorneoController extends Controller
{
    //

    public function index(){
        $torneos = Torneo::all();
        return view('index',['torneos'=>$torneos]);
    }
    public function show($id){
        $torneo = Torneo::find($id);
        return view('verMas',['torneo'=>$torneo]);
    }
    public function delete($id){
        $torneo = Torneo::find($id);
        $torneo->delete();
        return redirect()->route('index');
    }
    public function modifyForm($id){
        $torneo = Torneo::find($id);
        $juegos = Juego::all();

        return view('torneoForm',['torneo'=>$torneo,'juegos' => $juegos]);
    }
    public function createForm(){
        $torneo = new Torneo();
        $juegos = Juego::all();
        return view('torneoForm',['torneo'=>$torneo,'juegos' => $juegos]);
    }

    public function modify($id, Request $req){
        $torneo = Torneo::find($id);
        $torneo->titulo = $req->titulo;
        $torneo->id_juego = $req->juego;
        $torneo->fecha_inicio = $req->fecha_inicio;
        $torneo->plazas_totales = $req->plazas_totales;
        $torneo->estado = $req->estado == 'abierto' ? true : false;

        $torneo->save();
        return redirect()->route('index');
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'id_juego' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'fecha_inicio' => 'required|date',
            'plazas_totales' => 'required|integer|min:1',
            'estado' => 'required|in:abierto,cerrado',
        ]);

        Torneo::create($data);

        return redirect()->route('index');
    }


}
