<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php if (isset($nombre)): ?>
        <p>El texto almacenado es: <?= $nombre ?></p>
    <?php else: ?>
        <p>No hay ningún texto almacenado</p>
    <?php endif; ?>
    <form action="index.php" method="post">
        <label for="user">Introduce el texto que deseas almacenar: </label>
        <input type="text" name="user" id="user">
        <input type="submit" value="Enviar" name="guardarDatos">
        <br>
        <input type="submit" value="Eliminar Cookies" name="eliminarCookies">
    </form>
</body>

</html>
