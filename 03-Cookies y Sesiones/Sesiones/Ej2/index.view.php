<?php
    $usuario = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p>Bienvenid@ <?= $usuarios[$usuario]["nombre"] ?></p>
    <form action="index.php" method="post">
        <input type="submit" value="Cerrar sesión" name="cerrarSesion">
    </form>
</body>

</html>