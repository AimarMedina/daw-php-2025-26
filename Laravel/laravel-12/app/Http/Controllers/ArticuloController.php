<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Articulo;

class ArticuloController extends Controller
{

    public function index()
    {
        $articulos = Articulo::all();
        return view('articulos.articulos', [
            'articulos' => $articulos
        ]);
    }

    public function show($id)
    {
        $articulo = Articulo::find($id);
        return view('articulos.show', [
            'articulo' => $articulo
        ]);
    }

    public function create()
    {
        return view('articulos.formulario');
    }

    public function store(Request $request)
    {
        //Validar la petición:
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' =>'required|string'
        ]);
        /* Si la validación falla se redirigirá al usuario
        a la página previa. Si pasa la validación, el controlador
        continuará ejecutándose.
        */

        // Insertar el artículo en la BBDD tras su validación.
        Articulo::create($validated);

        return redirect(route('articulos'));
    }
}
