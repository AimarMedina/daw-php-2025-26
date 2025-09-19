<?php
session_start();

if (isset($_POST['añadirAsistente'])) {
    if (isset($_POST['asistente'])) {

        if (!isset($_SESSION['asistentes'])) {
            if ($_POST['asistente'] !== "") {
                $_SESSION['asistentes'] = [];
            }
        }
        if ($_POST['asistente'] !== "") {
            $_SESSION['asistentes'][] = $_POST['asistente'];
        }
    }
} else if (isset($_POST['vaciarLista'])) {
    if (isset($_SESSION['asistentes'])) {
        unset($_SESSION['asistentes']);
    }
}

function verificarSesion($sesion)
{
    if (!isset($_SESSION[$sesion])) {
        return false;
    }
    return true;
}

if (verificarSesion('asistentes')) {
    $personas = $_SESSION['asistentes'];
}


include "index.view.php";
