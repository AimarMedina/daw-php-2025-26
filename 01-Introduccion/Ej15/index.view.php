<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Datos</h1>
    <p>El <?= $_GET["clave"]?> de <?=$_GET["nombre"] ?> es <?= getDatos($diccionario, $_GET["nombre"], $_GET["clave"]) ?></p>
</body>
</html>
