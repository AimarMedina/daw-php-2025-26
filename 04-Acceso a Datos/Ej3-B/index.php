<?php

include "dbFunction2.php";


if (isset($_GET['accion'])) {
    switch ($_GET['accion']) {
        case "eliminarEmpleado":
            eliminarEmpleado($_GET['empleado']);
            $empleados = obtenerDatosEmpleados();
            break;
        case "eliminarEmpleados":
            eliminarEmpleados($dbh);
            $empleados = obtenerDatosEmpleados();
            break;
        case "verDetalles":
            $empleado = seleccionarEmpleado($_GET['empleado']);
            include "index.detalles.php";
            die();
        case "buscarEmpleadosNombre":
            if ($_GET['nombre']) {
                $resultado = buscarEmpleadosNombre($_GET['nombre']);
                if ($resultado) {
                    $empleados = $resultado;
                }
            } else {
                $empleados = obtenerDatosEmpleados();
            }
            break;
    }
}

if (isset($_POST['añadirEmpleado'])) {
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
        if ($value == "") {
            array_push($camposVacios, $key);
        }
    };

    if (empty($camposVacios)) {
        añadirEmpleado($persona);
        $empleados = obtenerDatosEmpleados();
    } else {
        $mensjaErrorCamposVacios = "";
    }
}

include "index.view.php";
