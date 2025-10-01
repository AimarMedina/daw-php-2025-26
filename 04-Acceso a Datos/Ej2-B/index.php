<?php

include_once "dbFunction.php";


if(isset($_GET['accion'])){
    switch($_GET['accion']){
        case "eliminarEmpleado":
            eliminarEmpleado($_GET['empleado']);
            $empleados = actualizarTabla();
            break;
        case "eliminarEmpleados":
            eliminarEmpleados();
            $empleados = actualizarTabla();
            break;
        case "verDetalles":
            $empleado = seleccionarEmpleado($_GET['empleado'],);
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
        añadirEmpleado($persona);
        $empleados = actualizarTabla();
    }else{
       $mensjaErrorCamposVacios = "";
    }
}

include "index.view.php";
