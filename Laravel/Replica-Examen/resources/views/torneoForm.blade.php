@vite(['resources/css/app.css', 'resources/js/app.js'])
<div>
    <h2>Crear nuevo torneo</h2>
    <form action="index.php?controller=TorneoController&accion=store" method="post">
        <div>
            <label>Título</label>
            @if (isset($torneo))
                <input type="text" name="titulo" required value="{{ $torneo->titulo ?? '' }}">
            @endif
        </div>
        <div>
            <label>Juego</label>
            <input type="text" name="juego" required value="{{ $torneo->juego ?? '' }}">
        </div>
        <div>
            <label>Fecha</label>
            <input type="date" name="fecha" required value="{{ $torneo->fecha_inicio ?? '' }}">
        </div>
        <div>
            <label>Plazas totales</label>
            <input type="number" name="plazas_totales" min="2" max="100" required value="{{ $torneo->plazas_totales ?? '' }}">
        </div>
        <div>
            <label>Descripción</label>
            <textarea name="descripcion">{{ $torneo->descripcion ?? '' }}</textarea>
        </div>
        <button type="submit">Crear</button>
        <a href="{{ route('index') }}" class="btn">Volver</a>
    </form>
</div>
