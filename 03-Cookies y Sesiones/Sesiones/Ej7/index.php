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

if (isset($_GET['accion'])) {
    switch ($_GET['accion']) {
        case "verDetalles":
            $producto = $_GET['producto'];
            include "index.detalles.php";
            die();
            break;
        case "anadirFavorito":
            $producto = $_GET['producto'];
            $nuevosFavoritos = generarCookie($producto);
            break;
        case "vaciarCesta":
            $_SESSION['productosSeleccionadosCantidad'] = [];
            break;
    }
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

function generarCookie($producto)
{
    $favoritos = [];
    if (isset($_COOKIE['favoritos'])) {
        $favoritos = explode(",", $_COOKIE['favoritos']);
    }

    if (!in_array($producto, $favoritos)) {
        $favoritos[] = $producto;
    }
    setcookie("favoritos", implode(",", $favoritos));

    return $favoritos;
}


function esFavorito($producto)
{
    if (isset($_COOKIE['favoritos'])) {
        $favoritos = explode(",", $_COOKIE['favoritos']);
        return in_array($producto, $favoritos);
    }
    return false;
}
