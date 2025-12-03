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
    $idioma = request()->cookie('idioma', 'es');
@endphp

<body>
    <div>
        <div>
            <header>
                <h2>
                    @if ($idioma == 'es')
                        Torneos disponibles
                    @else
                        Eskaintzen diren txapelketak
                    @endif
                </h2>
                @auth
                    <div class="actions">
                        <span>
                            @if ($idioma == 'es')
                                Bienvenido,
                            @else
                                Ongi etorri,
                            @endif
                             {{ Auth::user()->name }}</span>
                        <a href="{{ route('logout') }}">
                            <button class="btn-danger">Cerrar sesión</button>
                        </a>
                    </div>
                @else
                    <a href="{{ route('loginForm') }}">Iniciar sesión</a>
                @endauth
            </header>
            @auth
                <a href="{{ route('createForm') }}" class="btn btn-success">Crear torneo</a>
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
                <tr>
                    <td><?= $t->titulo ?></td>
                    <td><?= $t->juego->nombre ?></td>
                    <td><?= $t->fecha_inicio ?></td>
                    <td><?= $t->plazas_totales ?></td>
                    <td>
                        <?php if ($t->estado === 'abierto'): ?>
                        <span>Abierto</span>
                        <?php else: ?>
                        <span>Cerrado</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="{{ route('show', ['id' => $t->id]) }}" class="btn">Ver
                            más</a>
                        @auth
                            <!-- Modificar -->
                            <a href="{{ route('modifyForm', ['id' => $t->id]) }}" class="btn btn-warning"
                                title="Modificar torneo">Modificar</a>


                            <!-- Eliminar -->
                            <a href="{{ route('delete', ['id' => $t->id]) }}" class="btn btn-danger"
                                title="Eliminar torneo">Eliminar</a>
                        @endauth
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div>
            <footer>
                <h1>Seleccion de idioma</h1>
                <form action="{{ route('setCookie') }}" method="GET">
                    @csrf

                    <select name="idioma" id="">
                        <option value="es" @selected($idioma == 'es')>Castellano</option>
                        <option value="eus" @selected($idioma == 'eus')>Euskera</option>
                    </select>
                    <input type="submit" value="Aceptar" class="btn ">
                </form>
            </footer>
        </div>
    </div>
</body>

</html>
