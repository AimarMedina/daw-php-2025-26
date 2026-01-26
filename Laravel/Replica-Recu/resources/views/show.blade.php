<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Peliculas - MVC</title>
    <link rel="stylesheet" href="assets/style.css" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])

  </head>
  <body>
    <main class="container">
      <div>
        <h2>{{$pelicula->titulo}}</h2>

        <div>
          <p><strong>Director:</strong> {{$pelicula->director}}</p>
          <p><strong>Género:</strong> {{$pelicula->genero}}</p>
          <p><strong>Fecha de Estreno:</strong> {{$pelicula->fecha_estreno}}</p>
          <p><strong>Duración (min):</strong> {{$pelicula->duracion_min}}</p>
          <p>
            <strong>Clasificación:</strong>
            <span>{{$pelicula->clasificacion->clasificacion}}</span>
          </p>

          <p><strong>Sinopsis:</strong></p>
          <p>
            {{$pelicula->sinopsis}}
          </p>
        </div>

        <div>
          <a href="{{route('index')}}" class="btn btn-secondary">Volver al listado</a>
      </div>
    </main>
  </body>
</html>
