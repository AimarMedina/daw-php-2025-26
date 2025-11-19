<html>
<head>
    <title>RevistApp</title>
</head>
<body>
    <h1>Revistapp</h1>
    <h2>Listado artículos:</h2>
    <a href="{{ route('formulario')}}">Crear articulo</a>
    <table>
        <tr><th>Enlace</th><th>Título</th></tr>
        @foreach ($articulos as $articulo)
        <tr>
            <td><a href="{{ route('mostrar', $articulo['id']) }}">Ver</a></td>
            <td>{{ ($articulo['titulo']) }}</td>
        </tr>
        @endforeach
    </ul>
</body>
</html>
