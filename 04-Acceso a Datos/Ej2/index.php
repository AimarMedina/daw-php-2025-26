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

function añadirEmpleado($persona, $dbh)
{
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
        $sentencia = $dbh->prepare("Insert into empleados (DNI,Nombre,Apellidos,Email,Sexo,Curriculum,Edad,FechaNac) VALUES (:DNI,:Nombre,:Apellidos,:Email,:Sexo,:Curriculum,:Edad,:FechaNac)");
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

function eliminarEmpleados($dbh)
{
    try {
        $sentencia = $dbh->prepare("Delete from empleados");
        $sentencia->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function seleccionarEmpleado($empleado,$dbh){
    $dato = ['DNI' => $empleado];
    try {
        $sentencia = $dbh->prepare("Select * from empleados where DNI=:DNI");
        $sentencia->execute($dato);
        $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $resultado; 
}

if(isset($_GET['accion'])){
    switch($_GET['accion']){
        case "eliminarEmpleado":
            eliminarEmpleado($_GET['empleado'],$dbh);
            $empleados = actualizarTabla($dbh);
            break;
        case "eliminarEmpleados":
            eliminarEmpleados($dbh);
            $empleados = actualizarTabla($dbh);
            break;
        case "verDetalles":
            $empleado = seleccionarEmpleado($_GET['empleado'],$dbh);
            include "index.detalles.php";
            die();
    }
}

if(isset($_POST['añadirEmpleado'])){
    $persona = [
        "nombre" => $_POST['Nombre'],
        "apellidos" => $_POST['Apellidos'],
        "dni" => $_POST['DNI'],
        "email" => $_POST['Email'],
        "edad" => $_POST['Edad'],
        "fechaNacimiento" => $_POST['FechaNac'],
        "sexo" => $_POST['Sexo'],
        "curriculum" => $_POST['Curriculum'],
    ];
    $camposVacios = [];
    foreach ($persona as $key => $value) {
        if ($value == ""){
            array_push($camposVacios,$key);
        }
    };

    if (empty($camposVacios)){
        añadirEmpleado($persona,$dbh);
        $empleados = actualizarTabla($dbh);
    }else{
       $mensjaErrorCamposVacios = "";
    }
}

include "index.view.php";
