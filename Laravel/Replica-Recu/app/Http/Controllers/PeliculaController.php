<?php

namespace App\Http\Controllers;

use App\Models\Clasificacion;
use App\Models\Pelicula;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    //
    public function index(){
        $peliculas = Pelicula::all();
        return view('index',['peliculas'=>$peliculas]);
    }
    public function show($id){
        $pelicula = Pelicula::find($id);
        return view('show',['pelicula'=>$pelicula]);
    }

    public function modifyForm($id){
        $pelicula = Pelicula::find($id);
        $clasificaciones = Clasificacion::all();
        return view('peliculaForm',['pelicula'=>$pelicula,'clasificaciones' => $clasificaciones]);
    }

    public function createForm(){
        $pelicula = new Pelicula;
        $clasificaciones = Clasificacion::all();
        return view('peliculaForm',['pelicula'=>$pelicula,'clasificaciones' => $clasificaciones]);
    }

    public function modify($id, Request $request){
        $pelicula = Pelicula::find($id);
        $pelicula->titulo = $request->titulo;
        $pelicula->director = $request->director;
        $pelicula->genero = $request->genero;
        $pelicula->fecha_estreno = $request->fecha_estreno;
        $pelicula->duracion_min = $request->duracion_min;
        $pelicula->clasificacion_id = $request->clasificacion_id;
        $pelicula->sinopsis = $request->sinopsis;

        $pelicula->save();

        return redirect()->intended('/');
    }

    public function create(Request $request){
        $data = $request->validate([
            'titulo' => 'required|string|min:10|max:100',
            'director' => 'required|string|min:10|max:100',
            'genero' => 'required|string|min:10|max:100',
            'fecha_estreno' => 'required|date',
            'duracion_min' => 'required|integer|min:0',
            'clasificacion_id' => 'required|in:1,2,3,4',
            'sinopsis' => 'required|string|min:20|max:255',
        ],[
            'titulo' => 'Titulo no valido',
            'director' => 'Director no valido',
            'genero' => 'Genero no valido',
            'fecha_estreno' => 'Fecha de estreno no valido',
            'duracion_min' => 'Duracion no valido',
            'clasificacion' => 'Clasificacion no valido',
            'sinopsis' => 'Sinopsis no valido',
        ]);

        Pelicula::create($data);

        return redirect()->intended('/');

    }
}
