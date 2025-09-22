<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="post">
        <label for="usr">Introduzca el usuario: </label>
        <input type="text" name="usr" id="usr"><br><br>

        <label for="passwd">Introduzca la contraseña:</label>
        <input type="password" name="passwd" id="passwd"><br><br>

        <input type="submit" value="Enviar" name="iniciarSesion">
    </form>

    <?php if(isset($enviado) && $login !== 0):?>
        <p style="color: red;"><?=$Error_Mssg[$login]?></p>
    <?php endif;?>
</body>
</html>
