<html>
<head>
    <title>RevistApp</title>
</head>
<body>
    <h1>Revistapp</h1>
    <h2>Detalle del artículo:</h2>
    <p>Gracias por leer el artículo con id: {{ $articulo['id'] }}</p>
    <a href="{{ route('articulos') }}">Volver</a>
</body>
</html>
