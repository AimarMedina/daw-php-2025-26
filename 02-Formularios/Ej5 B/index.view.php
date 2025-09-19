<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        table {
            border-collapse: collapse;
        }

        td,
        th {
            border-top: 1px solid lightgrey;
            padding: 8px
        }

        body {
            display: flex;
            gap: 50px;
            justify-content: center;
            align-items: center;
            width: 100vw;
            height: 100vh;
        }
        input[type="submit"]{
            background-color: #2d2170ff;
            cursor: pointer;
            padding: 5px;
            border: 1px solid;
            border-radius: 2px;
            color: #000;
        }
    </style>
</head>

<body>
    <div>
        <h1>Catálogo de productos</h1><br>
        <form action="index.php" method="post">
            <table>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                </tr>
                <?php foreach ($productos as $key => $producto): ?>
                    <tr>
                        <td><?= $producto["Nombre"] ?></td>
                        <td><?= $producto["Descripción"] ?></td>
                        <td><?= $producto["Precio"] ?>€</td>
                        <td><input type="number" name="<?= $key ?>" min="0" value="0"></td>
                    </tr>
                <?php endforeach ?>
            </table><br>
            <input type="submit" value="Comprar">
        </form>
    </div>
    <div>
        <?php if (isset($enviado)): ?>
            <h1>Precio total:</h1>
            <p>El importe de la compra realizado es de <?= $precioTotal ?>€</p>
            <br>
            <h1>Detalle de la compra</h1>
            <ul>
                <?php foreach ($productosSeleccionadosCantidad as $key => $cantidad): ?>
                    <li><?= $productos[$key]["Nombre"] ?> (<?= $cantidad ?>)</li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>

</body>

</html>
