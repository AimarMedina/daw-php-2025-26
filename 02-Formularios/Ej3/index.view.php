<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php if (isset($enviado)): ?>
        <ul>
            <li><b>Asunto</b>: <?= $asunto ?></li>
            <li><b>Nombre</b>: <?= $nombre ?></li>
            <li><b>Email</b>: <?= $email ?></li>
            <li><b>Motivo</b>: <?= $motivo ?></li>
            <li><b>Mensaje</b>: <?= $mensaje ?></li>
        </ul>
    <?php endif; ?>

    <form action="index.php" method="get">
        <label for="asunto">Asunto:</label><br>
        <input type="text" required id="asunto" name="asunto"><br><br>

        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre"><br><br>

        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email"><br><br>

        <label for="motivo">Motivo:</label><br>
        <select name="motivo" id="motivo">
            <option value="st">Soporte técnico</option>
            <option value="ip">Información de productos</option>
            <option value="q">Queja</option>
            <option value="o">Otro</option>
        </select><br><br>

        <label for="mensaje">Mensaje:</label><br>
        <textarea name="mensaje" id="mesaje"></textarea><br><br>

        <input type="submit" value="Enviar">

    </form>
</body>

</html>
