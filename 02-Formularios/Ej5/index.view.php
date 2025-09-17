<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Catálogo de productos</h1>
    <form action="index.php" method="post">
        <table>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Cantidad</th>
            </tr>
            <tr>
                <?php foreach ($productos as $key) : ?>
                    <td><?=$productos[$key]["nombre"] ?></td>
                <?php endforeach?>
            </tr>
        </table>
    </form>
</body>
</html>
