<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

@php
    $idioma = request()->cookie('idioma');
@endphp

<body>
    @error('plazasCompletas')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    @error('torneoCerrado')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    @error('usuarioInscrito')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="continer">

        <div class="headerCrearTorneo">
            <header>
                <h2>
                    {{__('torneo.titulo')}}
                </h2>
                <div class="actions">
                    @auth
                        <span>
                            {{__('torneo.message')}}
                            {{ Auth::user()->name }}!</span>
                        <a href="{{ route('logout') }}">
                            <button class="btn btn-danger">Cerrar sesión</button>
                        </a>
                    @else
                        <a href="{{ route('loginForm') }}" class="btn">Iniciar sesión</a>
                        <a href="{{ route('registerForm') }}" class="btn">Crear cuenta</a>
                    @endauth
                </div>
            </header>

        </div>
        <div class="subtitleDiv">
            <h2>{{ __('torneo.subtitulo') }}</h2>
            @auth
                @if (Auth::user()->type == 'admin')
                    <a href="{{ route('createForm') }}" class="btn btn-success">Crear torneo</a>
                @endif
            @endauth
        </div>
        <table>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Juego</th>
                    <th>Fecha</th>
                    <th>Plazas</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($torneos as $t): ?>
                @php
                    $torneoLleno = $t->usuario->count() >= $t->plazas_totales;
                    $usuarioInscrito = $t->usuario->contains(Auth::id());
                    $noAbierto = $t->estado != 'abierto';
                @endphp
                <tr>
                    <td>{{ $t->titulo }}</td>
                    <td>{{ $t->juego->nombre }}</td>
                    <td>{{ $t->fecha_inicio }}</td>
                    <td>{{ $t->usuario->count() . '/' . $t->plazas_totales }}</td>
                    <td>
                        <?php    if ($t->estado === 'abierto'): ?>
                        <span class="abierto">Abierto</span>
                        <?php    else: ?>
                        <span class="cerrado">Cerrado</span>
                        <?php    endif; ?>
                    </td>
                    <td>
                        <a href="{{ route('show', ['id' => $t->id]) }}" class="btn">Ver más</a>
                        @auth
                            <!-- Inscribirse -->
                            <a href="{{ route('inscribirse', ['torneo_id' => $t->id]) }}"
                                class="btn {{ $noAbierto || $torneoLleno || $usuarioInscrito ? 'no-click' : 'btn-success' }}">Inscribirse</a>

                            @if (Auth::user()->type == 'admin')
                                <!-- Modificar -->
                                <a href="{{ route('modifyForm', ['id' => $t->id]) }}" class="btn btn-warning"
                                    title="Modificar torneo">Modificar</a>

                                <!-- Eliminar -->
                                <a href="{{ route('delete', ['id' => $t->id]) }}" class="btn btn-danger"
                                    title="Eliminar torneo">Eliminar</a>
                            @endif
                        @endauth
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div>
            <footer>
                <h1>Seleccion de idioma</h1>
                <form action="{{ route('setCookie') }}" method="POST">
                    @csrf

                    <select name="idioma" id="">
                        <option value="es" {{ __('torneo.lang') == 'es' ? 'selected' : '' }}>Castellano</option>
                        <option value="eus" {{ __('torneo.lang') == 'eus' ? 'selected' : '' }}>Euskera</option>
                    </select>
                    <input type="submit" value="Aceptar" class="btn ">
                </form>
            </footer>
        </div>
    </div>
</body>

</html>
