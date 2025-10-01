<?php
include_once "dbConnection.php";


function actualizarLista()
{
    $db_connection = connect();

    $sentencia = $db_connection->prepare("Select * From productos");
    $sentencia->execute();
    $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    return $resultado;
};

function añadirProducto($producto,)
{
    $db_connection = connect();
    $dato = ['name' => $producto];

    try {
        $sentencia = $db_connection->prepare("Insert into productos (nombre) VALUES (:name)");
        $sentencia->execute($dato);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function eliminarProducto($producto,)
{
    $db_connection = connect();
    $dato = ['id' => $producto];
    try {
        $sentencia = $db_connection->prepare("Delete from productos where id=:id");
        $sentencia->execute($dato);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function vaciarLista()
{
    $db_connection = connect();
    try {
        $sentencia = $db_connection->prepare("Delete from productos");
        $sentencia->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
