<?php
include "index.baseDatos.php";

$listaCompra = actualizarLista($dbh);

function actualizarLista($dbh)
{
    $sentencia = $dbh->prepare("Select * From productos");
    $sentencia->execute();
    $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    return $resultado;
};

function añadirProducto($producto, $dbh)
{
    $dato = ['name' => $producto];
    try {
        $sentencia = $dbh->prepare("Insert into productos (nombre) VALUES (:name)");
        $sentencia->execute($dato);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function eliminarProducto($producto, $dbh)
{
    $dato = ['id' => $producto];
    try {
        $sentencia = $dbh->prepare("Delete from productos where id=:id");
        $sentencia->execute($dato);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function vaciarLista($dbh)
{
    try {
        $sentencia = $dbh->prepare("Delete from productos");
        $sentencia->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

if (isset($_POST['añadirProducto'])) {
    añadirProducto($_POST['producto'], $dbh);
    $listaCompra = actualizarLista($dbh);
}

if(isset($_GET['accion'])){
    switch($_GET['accion']){
        case "vaciarLista":
            vaciarLista($dbh);
            $listaCompra = actualizarLista($dbh);
            break;
        case "eliminarProducto":
            eliminarProducto($_GET['producto'],$dbh);
            $listaCompra = actualizarLista($dbh);
            break;
    }
}



include "index.view.php";
