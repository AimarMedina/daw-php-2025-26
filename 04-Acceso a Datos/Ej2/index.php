<?php

include "index.baseDatos.php";

$empleados = actualizarTabla($dbh);

function actualizarTabla($dbh){
    try{
        $sentencia = $dbh->prepare("Select * From empleados");
        $sentencia->execute();
        $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);

        return $resultado;
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

function añadirEmpleado($producto, $dbh)
{
    $dato = ['name' => $producto];
    try {
        $sentencia = $dbh->prepare("Insert into productos (nombre) VALUES (:name)");
        $sentencia->execute($dato);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function eliminarEmpleado($epmleado, $dbh)
{
    $dato = ['DNI' => $epmleado];
    try {
        $sentencia = $dbh->prepare("Delete from empleados where DNI=:DNI");
        $sentencia->execute($dato);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

if(isset($_GET['accion'])){
    switch($_GET['accion']){
        case "eliminarEmpleado":
            eliminarEmpleado($_GET['empleado'],$dbh);
            break;
    }
}

include "index.view.php";
