<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Peliculas - MVC</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header class="container">
        <h2>
            {{ __('pelicula.title') }}
        </h2>
        <div class="actions">
            @auth
                <span>
                    ¡{{ __('pelicula.welcome') }},
                    {{ Auth::user()->name }}!</span>
                <a href="{{ route('logout') }}">
                    <button class="btn btn-danger">Cerrar sesión</button>
                </a>
            @else
                <a href="{{ route('loginForm') }}" class="btn">Iniciar sesión</a>
                {{-- <a href="{{ route('registerForm') }}" class="btn">Crear cuenta</a> --}}
            @endauth
        </div>
    </header>

    <main class="container">
        <div>
            <div>
                <h2>{{ __('pelicula.subtitle') }}</h2>
                @auth
                    @if (Auth::user()->type == 'admin')
                        <a href="{{ route('createForm') }}" class="btn btn-success">Añadir Película</a>
                    @endif
                @endauth
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Director</th>
                        <th>Estreno</th>
                        <th>Duración (min)</th>
                        <th>Clasificación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($peliculas as $p)
                        <tr>
                            <td>{{ $p->titulo }}</td>
                            <td>{{ $p->director }}</td>
                            <td>{{ $p->fecha_estreno }}</td>
                            <td>{{ $p->duracion_min }}</td>
                            <td>{{ $p->clasificacion->clasificacion }}</td>
                            <td>
                                <a href="{{ route('verMas', ['id' => $p->id]) }}" class="btn">Ver más</a>
                                @auth
                                    @if (Auth::user()->type == 'admin')
                                        <a href="{{ route('modifyForm', ['id' => $p->id]) }}"
                                            class="btn btn-warning">Modificar</a>
                                        <a href="{{ route('delete', ['id' => $p->id]) }}" class="btn btn-danger">Eliminar</a>
                                    @endif
                                @endauth
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

    <footer class="container">
        <div class="container">
            <p>© Películas - 2025</p>
            <form method="post" action="{{ route('setLanguage') }}">
                @csrf
                <label>Idioma:</label>
                <select name="idioma" class="select-inline">
                    <option value="es">Castellano</option>
                    <option value="eu">Euskera</option>
                </select>
                <button type="submit" class="btn">Cambiar</button>
            </form>
        </div>
    </footer>
</body>

</html>
