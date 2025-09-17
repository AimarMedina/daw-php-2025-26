<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php if (isset($resultado)): ?>
        <b>Resultado de la conversión (<?= $tmp . " " . $unid ?>): <?=$resultado ?></b> <br><br>
    <?php endif; ?>
    <form action="index.php" method="get">
        <label for="tmp">Introduce la temperatura: </label>
        <input type="number" name="tmp" required id="tmp">
        <br><br>
        <label for="unid">Indica la unidad de la temperatura introducida: </label>
        <select name="unid" id="unid">
            <option value="celsius">Celsius</option>
            <option value="farenheit">Farenheit</option>
        </select><br><br>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>
