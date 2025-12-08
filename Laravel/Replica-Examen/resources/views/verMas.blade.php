  @vite(['resources/css/app.css', 'resources/js/app.js'])
 <div>
     <h2><?= $torneo->titulo ?></h2>

     <div>
        <p><strong>Juego:</strong> <?= $torneo->juego->nombre ?></p>
        <p><strong>Fecha de inicio:</strong> <?= $torneo->fecha_inicio ?></p>
        <p><strong>Plazas totales:</strong> <?= $torneo->plazas_totales ?></p>
        <p><strong>Estado:</strong>
            <?php if ($torneo->estado === 'abierto'): ?>
                <span>Abierto</span>
            <?php else: ?>
                <span>Cerrado</span>
            <?php endif; ?>
        </p>

        <?php if (!empty($torneo->descripcion)): ?>
            <p><strong>Descripción:</strong></p>
            <p><?= $torneo->descripcion ?></p>
        <?php endif; ?>
        @if (Auth()->check())
            @if ($torneo->usuario->count() > 0)
                <h2>Usuarios inscritos:</h2>
                <table>
                <thead>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Fecha Inscripcion</th>
                </thead>
                <tbody>
                        @foreach ($torneo->usuario as $usuario )
                        <tr>
                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>{{ $usuario->pivot->created_at->format('d/m/Y - H:i') }}</td>
                        </tr>
                        @endforeach

                </tbody>
                </table>
            @endif
        @endif

     </div>

     <div>
         <a href="{{route('index')}}" class="btn btn-secondary">Volver al listado</a>
     </div>
 </div>
