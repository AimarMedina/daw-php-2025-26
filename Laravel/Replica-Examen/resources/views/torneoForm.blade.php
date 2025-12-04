@vite(['resources/css/app.css', 'resources/js/app.js'])
<div>
    <h2>Crear nuevo torneo</h2>
    <form action="{{ $torneo->id ? route('modify', $torneo->id) : route('create') }}" method="POST">
        @csrf

        @if($torneo->id)
            @method('PUT')
        @endif

        <div>
            <label>Título</label>
            <input type="text" name="titulo" required value="{{ $torneo->titulo ?? '' }}">

        </div>
        <div>
            <label>Juego</label>
            <select name="juego" id="">
                @foreach ($juegos as $juego)
                    <option value="{{$juego->id}}" {{ $juego->id == $torneo->juego?->id ? 'selected' : '' }}>{{$juego->nombre}}</option>
                @endforeach
            </select>

        </div>
        <div>
            <label>Fecha</label>
            <input type="date" name="fecha_inicio" required value="{{ $torneo->fecha_inicio ?? '' }}">

        </div>
        <div>
            <label>Plazas totales</label>
            <input type="number" name="plazas_totales" min="2" max="100" required value="{{ $torneo->plazas_totales ?? '' }}">
        </div>
        <div>
            <label>Estado</label>
            <select name="estado" id="estado">
                <option value="abierto">Abierto</option>
                <option value="cerrado">Cerrado</option>
            </select>
        </div>
        <div>
            <label>Descripción</label>
            <textarea name="descripcion">{{ $torneo->descripcion ?? '' }}</textarea>
        </div>
        <button type="submit">
            @if($torneo->id)
                Modificar
            @else
                Crear
            @endif
        </button>
        <a href="{{ route('index') }}" class="btn">Volver</a>
    </form>
</div>
