  @vite(['resources/css/app.css', 'resources/js/app.js'])
 <div>
     <h2><?= $torneo->titulo ?></h2>

     <div>
         <p><strong>Juego:</strong> <?= $torneo->juego->nombre ?></p>
         <p><strong>Fecha:</strong> <?= $torneo->fecha_inicio ?></p>
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
             <p><?= nl2br($torneo->descripcion) ?></p>
         <?php endif; ?>
     </div>

     <div>
         <a href="{{route('index')}}" class="btn btn-secondary">Volver al listado</a>
     </div>
 </div>
