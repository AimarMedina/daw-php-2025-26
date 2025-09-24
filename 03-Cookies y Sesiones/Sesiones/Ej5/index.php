<?php
include "index.datos.php";
session_start();

if (!isset($_SESSION['productosSeleccionadosCantidad'])) {
    $_SESSION['productosSeleccionadosCantidad'] = [];
}

foreach ($productos as $key => $valor) {
    if (isset($_POST[$key])) {
        if (isset($_SESSION['productosSeleccionadosCantidad'][$key])) {
            $_SESSION['productosSeleccionadosCantidad'][$key] = (int)$_SESSION['productosSeleccionadosCantidad'][$key] + 1;
        } else {
            $_SESSION['productosSeleccionadosCantidad'][$key] = 1;
        }
    }
}

$precioTotal = 0;
if (!empty($_SESSION['productosSeleccionadosCantidad'])) {
    $precioTotal = calcularPrecioTotal($_SESSION['productosSeleccionadosCantidad'], $productos);
}


if (isset($_POST['VaciarCesta'])) {
    $_SESSION['productosSeleccionadosCantidad'] = [];
}


    setcookie('idioma', );
    if ($_COOKIE['idioma'] == null){
        echo "Hola";
    };
if (isset($_POST['CambiarIdioma'])) {
    $idioma = $_GET['idioma'];

}

include "index.view.php";

function calcularPrecioTotal($productosSeleccionados, $productos)
{
    $precioTotal = 0;
    foreach ($productosSeleccionados as $key => $cantidad) {
        if (isset($productos[$key])) {
            $precioTotal += $productos[$key]["Precio"] * $cantidad;
        }
    }
    return number_format($precioTotal, 2);
}

function verificarSesion($sesion)
{
    if (!isset($_SESSION[$sesion])) {
        return false;
    }
    return true;
}
