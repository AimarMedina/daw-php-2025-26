<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Buscar País</h1>
    <p>El país buscado es: <?= $_GET['pais']; ?> y esta en la posicion <?= buscarPais($_GET['pais'], $paises) ?></p>
</body>
</html>
