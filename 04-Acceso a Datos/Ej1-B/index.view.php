<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Lista de la compra</title>

</head>
<body>
  <div class="container">
    <h1>Lista de la compra</h1>
    <?php if(!empty($listaCompra)):?>
      <ul>
        <?php foreach($listaCompra as $producto):?>
          <li>
            <span><?=$producto["nombre"]?></span>
            <a href="?accion=eliminarProducto&&producto=<?=$producto['id']?>">Eliminar</a>
          </li>
        <?php endforeach;?>
      </ul>
    <?php else:?>
      <p>La lista de la compra está vacía, añade algo para visualizarlo</p>
    <?php endif;?>

    <h3>Añadir elemento</h3>
    <form action="index.php" method="get">
      <input type="text" name="producto" placeholder="Ej: Pan, Leche...">
      <input type="hidden" name="accion" value="añadirProducto">
      <input type="submit" value="Añadir">
    </form>
    <a class="vaciar" href="?accion=vaciarLista">Vaciar lista</a>
  </div>
</body>
</html>
