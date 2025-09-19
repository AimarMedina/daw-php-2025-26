<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php if (isset($idioma)): ?>
        <p>Idioma: <?= $idioma ?></p>
    <?php else: ?>
        <p>No hay ningún texto almacenado</p>
    <?php endif; ?>
    <form action="index.php" method="get">
        <label for="idioma">Elige tu idioma </label>
        <select name="languague" id="idioma">
            <option value="Euskera">Euskera</option>
            <option value="Castellano">Castellano</option>
        </select>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>
