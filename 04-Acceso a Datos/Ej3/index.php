<?php

include "index.baseDatos.php";

$empleados = obtenerDatosEmpleados($dbh);

function obtenerDatosEmpleados($dbh){
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

function seleccionarEmpleado($empleado,$dbh)
{
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

function buscarEmpleadosNombre($empleado,$dbh)
{
    $dato = ['Nombre' => $empleado];
    try {
        $sentencia = $dbh->prepare("Select * from empleados where Nombre=:Nombre");
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

if(isset($_GET['accion'])){
    switch($_GET['accion']){
        case "eliminarEmpleado":
            eliminarEmpleado($_GET['empleado'],$dbh);
            $empleados = obtenerDatosEmpleados($dbh);
            break;
        case "eliminarEmpleados":
            eliminarEmpleados($dbh);
            $empleados = obtenerDatosEmpleados($dbh);
            break;
        case "verDetalles":
            $empleado = seleccionarEmpleado($_GET['empleado'],$dbh);
            include "index.detalles.php";
            die();
        case "BuscarEmpleados":
            if ($_GET['Nombre']){
                $resultado = buscarEmpleadosNombre($_GET['Nombre'],$dbh);
                if($resultado){
                    $empleados = $resultado;
                }
            }else{
                $empleados = obtenerDatosEmpleados($dbh);
            }
            break;
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
        $empleados = obtenerDatosEmpleados($dbh);
    }else{
       $mensjaErrorCamposVacios = "";
    }
}

include "index.view.php";
