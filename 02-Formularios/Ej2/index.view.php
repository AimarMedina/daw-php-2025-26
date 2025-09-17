<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3>Calculadora</h3>
    <?php if (isset($resultado)) : ?>
        <p>Último resultado: <?= $resultado ?></p>
    <?php endif; ?>

    <form action="index.php" method="post">
        <label for="n1">Primer número:</label>
        <input type="number" name="n1" id="n1">
        <br>
        <br>
        <label for="n2">Segundo número</label>
        <input type="number" name="n2" id="n2">
        <br>
        <br>
        <label for="op">Seleccione la operación deseada</label>
        <select name="op" id="op">
            <option value="suma">Suma</option>
            <option value="mult">Multipilcación</option>
            <option value="div">División</option>
            <option value="resta">Resta</option>
        </select>
        <br>
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>
