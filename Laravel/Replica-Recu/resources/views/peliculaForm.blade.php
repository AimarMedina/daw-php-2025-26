@vite(['resources/css/app.css', 'resources/js/app.js'])
<div class="form">
    <h2>Crear nueva Pelicula</h2>
    <form action="{{ $pelicula->id ? route('modify', $pelicula->id) : route('create') }}" method="POST">

        @csrf

        @if ($pelicula->id)
            @method('PUT')
        @endif
        <div>
            <label>Título</label>
            <input type="text" name="titulo" required value="{{ $pelicula->titulo ?? old('titulo') }}">
            @error('titulo')
                <div class="error-msg">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label>Director</label>
            <input type="text" name="director" required value="{{ $pelicula->director ?? old('director') }}">
            @error('director')
                <div class="error-msg">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label>Genero</label>
            <input type="text" name="genero" required value="{{ $pelicula->genero ?? old('genero') }}">
            @error('genero')
                <div class="error-msg">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label>Fecha de estreno</label>
            <input type="date" name="fecha_estreno" required value="{{ $pelicula->fecha_estreno ?? old('fecha_estreno') }}">
            @error('fecha_estreno')
                <div class="error-msg">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label>Duracion (min)</label>
            <input type="text" name="duracion_min" required value="{{ $pelicula->duracion_min ?? old('duracion_min') }}">
            @error('duracion_min')
                <div class="error-msg">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label>Clasificacion</label>
            <select name="clasificacion_id" id="">
                @foreach ($clasificaciones as $clas)
                    <option value="{{$clas->id}} "@selected($pelicula->clasificacion?->clasificacion == $clas->clasificacion)>{{$clas->clasificacion}}</option>
                @endforeach
            </select>
            @error('clasificacion')
                <div class="error-msg">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label>Sinopsis</label>
            <textarea name="sinopsis">{{ $pelicula->sinopsis ?? old('sinopsis') }}</textarea>
            @error('sinopsis')
                <div class="error-msg">{{ $message }}</div>
            @enderror
        </div>


        <button type="submit">{{$pelicula->id ? 'Modificar' : 'Crear'}}</button>
        <a href="{{ route('index') }}" class="btn">Volver</a>
    </form>
</div>
