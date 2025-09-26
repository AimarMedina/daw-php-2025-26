<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f7fa;
            color: #333;
            padding: 40px;
            text-align: center;
        }

        /* Título principal */
        h1 {
            font-size: 26px;
            margin-bottom: 20px;
            color: #222;
        }

        /* Tarjeta del producto */
        .producto-card {
            max-width: 400px;
            margin: 0 auto 30px;
            padding: 20px;
            border-radius: 12px;
            background: #fff;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            text-align: left;
        }

        .producto-card h2 {
            margin-bottom: 15px;
            font-size: 20px;
            color: #4a90e2;
            border-bottom: 2px solid #eee;
            padding-bottom: 8px;
        }

        .producto-card ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .producto-card li {
            padding: 10px 0;
            border-bottom: 1px solid #f0f0f0;
            font-size: 15px;
        }

        .producto-card li:last-child {
            border-bottom: none;
        }

        .producto-card strong {
            color: #222;
        }

        /* Enlace estilo botón */
        a {
            display: inline-block;
            padding: 10px 18px;
            background-color: #4a90e2;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
            transition: 0.3s;
        }

        a:hover {
            background-color: #357ab8;
        }
    </style>
</head>

<body>
    <h1>Detalles de: <?= $productos[$producto]["Nombre"] ?></h1>

    <div class="producto-card">
        <h2>Detalles del producto</h2>
        <ul>
            <li><strong>ID:</strong> <?= $producto ?></li>
            <li><strong>Nombre:</strong> <?= $productos[$producto]["Nombre"] ?></li>
            <li><strong>Descripción:</strong> <?= $productos[$producto]["Descripción"] ?></li>
            <li><strong>Precio:</strong> <?= $productos[$producto]["Precio"] ?> €</li>
        </ul>
    </div>

    <a href="index.php">Volver a la tienda</a>


</body>

</html>
