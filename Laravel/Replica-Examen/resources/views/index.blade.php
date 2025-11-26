<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div>
        <div>
            <header>
                <h2>Torneos disponibles</h2>
                @auth
                    <div class="actions">
                        <span>Bienvenido, {{ Auth::user()->name }}</span>
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
                    <td><?= $t->juego ?></td>
                    <td><?= $t->fecha ?></td>
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
    </div>
</body>

</html>
