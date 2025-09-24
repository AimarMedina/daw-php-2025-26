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

        input[type="submit"] {
            padding: 10px 15px;
            background-color: #4a90e2;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            transition: background 0.3s;
            margin-top: 20px;
        }

        /* Select estilo moderno */
        select {
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
            outline: none;
            font-size: 14px;
            transition: 0.2s;
            background-color: #fff;
            cursor: pointer;
        }

        select:focus {
            border-color: #4a90e2;
            box-shadow: 0 0 5px rgba(74, 144, 226, 0.4);
        }

        .idioma{
            margin: 20px;
            gap: 6px;
            position: absolute;
            top: 0 ;
            right: 0;
            display: flex;
            flex-direction: column;
        }
    </style>
</head>

<body>
    <div>
        <h1>Catálogo de productos</h1><br>

        <form action="index.php" method="post" class="idioma">
            <select name="idioma" id="idioma">
                <option value="ESP">Castellano</option>
                <option value="EUS">Euskera</option>
            </select>
            <input type="submit" name="CambiarIdioma" value="Aceptar">
        </form>

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
                        <td><input type="submit" name="<?= $key ?>" value="Comprar"></td>
                    </tr>
                <?php endforeach ?>
            </table><br>

        </form>
    </div>
    <div>
        <?php if (count($_SESSION['productosSeleccionadosCantidad']) > 0):  ?>
            <h1>Precio total:</h1>
            <p>El importe de la compra realizado es de <?= $precioTotal ?>€</p>
            <br>
            <h1>Detalle de la compra</h1>
            <ul>
                <?php foreach ($_SESSION['productosSeleccionadosCantidad'] as $key => $cantidad): ?>
                    <li><?= $productos[$key]["Nombre"] ?>(<?= $_SESSION['productosSeleccionadosCantidad'][$key] ?>)</li>
                <?php endforeach; ?>
            </ul>
            <form action="index.php" method="post">
                <input type="submit" value="Vaciar cesta" name="VaciarCesta">
            </form>
        <?php else: ?>
            <h1>La cesta esta vacía</h1>
            <p>Compra algun producto para que la cesta crezca</p>
        <?php endif; ?>
    </div>

</body>

</html>
