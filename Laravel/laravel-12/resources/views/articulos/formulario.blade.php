<html>
<head>
    <title>RevistApp</title>
</head>
<body>
    <h1>Revistapp</h1>
    <h2>Crear un artículo:</h2>

    <form method="POST" action="{{ route('insertar') }}">
        @csrf
        <p><label>Titulo: </label><input type="text" name="titulo"></p>
        <p><label>Contenido: </label><input type="text" name="contenido"></p>
        <button type="submit">Crear</button>
    </form>
    <a href="{{ route('articulos') }}">Volver</a>
</body>
</html>
