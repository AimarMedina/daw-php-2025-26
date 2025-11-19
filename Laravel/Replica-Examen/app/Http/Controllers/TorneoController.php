<?php

namespace App\Http\Controllers;

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
        return view('torneoForm',['torneo'=>$torneo]);
    }
    public function createForm(){
        $torneo = new Torneo();
        return view('torneoForm',['torneo'=>$torneo]);
    }
}
