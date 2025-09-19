<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Lista de asistentes</h2>
    <?php if (isset($personas)): ?>
        <ul>
            <?php foreach ($personas as $persona): ?>
                <li><?= $persona ?></li>
            <?php endforeach ?>
        </ul>
    <?php else: ?>
        <p>Todavía no hay asistentes, cuando añadas uno aparecera aquí</p>
    <?php endif; ?>
    <h3>Añadir asistente</h3>
    <form action="index.php" method="post">
        <input type="text" name="asistente">
        <input type="submit" value="Añadir" name="añadirAsistente">
        <br><br>
        <input type="submit" value="Vaciar lista" name="vaciarLista">
    </form>

</body>

</html>
