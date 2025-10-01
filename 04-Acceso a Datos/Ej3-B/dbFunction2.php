<?php

include_once "dbConnection.php";

$empleados = obtenerDatosEmpleados();

function obtenerDatosEmpleados(){
    $db_connection = connect();
    try{
        $sentencia = $db_connection->prepare("Select * From empleados");
        $sentencia->execute();
        $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);

        return $resultado;
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

function añadirEmpleado($persona)
{
        $db_connection = connect();

    $dato = [
        'DNI' => $persona["dni"],
        'Nombre' => $persona["nombre"],
        'Apellidos' =>$persona["apellidos"],
        'Email' => $persona["email"],
        'Sexo' => $persona["sexo"],
        'Curriculum' => $persona["curriculum"],
        'Edad' => $persona["edad"],
        'FechaNac' => $persona["fechaNacimiento"]
    ];
    try {
        $sentencia = $db_connection->prepare("Insert into empleados (DNI,Nombre,Apellidos,Email,Sexo,Curriculum,Edad,FechaNac) VALUES (:DNI,:Nombre,:Apellidos,:Email,:Sexo,:Curriculum,:Edad,:FechaNac)");
        $sentencia->execute($dato);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function eliminarEmpleado($epmleado)
{
        $db_connection = connect();

    $dato = ['DNI' => $epmleado];
    try {
        $sentencia = $db_connection->prepare("Delete from empleados where DNI=:DNI");
        $sentencia->execute($dato);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function eliminarEmpleados()
{
    $db_connection = connect();

    try {
        $sentencia = $db_connection->prepare("Delete from empleados");
        $sentencia->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function seleccionarEmpleado($empleado){
        $db_connection = connect();

    $dato = ['DNI' => $empleado];
    try {
        $sentencia = $db_connection->prepare("Select * from empleados where DNI=:DNI");
        $sentencia->execute($dato);
        $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $resultado;
}

function buscarEmpleadosNombre($empleado)
{
            $db_connection = connect();

    $dato = ['Nombre' => $empleado];
    try {
        $sentencia = $db_connection->prepare("Select * from empleados where Nombre=:Nombre");
        $sentencia->execute($dato);
        $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);

        if(empty($resultado)){
            return false;
        }
        return $resultado;
    } catch(Exception $e){
        echo $e->getMessage();
    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }
}
