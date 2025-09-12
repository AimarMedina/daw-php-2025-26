<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Animales</h1>
    <ul>
        <li>Cantidad de animales <?= $cantidadAnimales ?></li>
    </ul>
    <h1>Colores</h1>
    <ul>
        <li>Cantidad de colores <?= $cantidadColores ?></li>
    </ul>
    <h1>Nuevos Animales</h1>
    <ul>
        <li>
            <?= print_r($animales, true) ?>
        </li>
    </ul>
    <h1>Nuevos Colores</h1>
    <ul>
        <li>
            <?= var_export($colores)?>
        </li>
    </ul>
    <h1>Animales y Colores</h1>
    <ul>
        <li>
            <?= var_export($animalesYcolores)?>
        </li>
</body>
</html>
