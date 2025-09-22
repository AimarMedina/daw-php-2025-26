<?php
include "index.datos.php";
session_start();

function verificarSesion($sesion)
{
    if (!isset($_SESSION[$sesion])) {
        return false;
    }

    return true;
}
function validarInicioSesion($usuarios, $user, $passwd)
{
    if (isset($usuarios[$user])) {
        if ($usuarios[$user]["password"] === $passwd) {
            return 0;
        }
        return 1;
    }
    return 2;
}
function cerrarSesion()
{
    unset($_SESSION['usuario']);
    include "index.login.php";
}

$Error_Mssg = [1 => "Password incorrecto", 2 => "Usuario Incorrecto"];


if (isset($_POST['iniciarSesion'])) {
    if (verificarSesion('usuario')) {
        $usuario = $_SESSION['usuario'];
        include "index.view.php";
    } else {
        if (!empty($_POST['usr']) && !empty($_POST['passwd'])) {
            $enviado = true;
            $login = validarInicioSesion($usuarios, $_POST['usr'], $_POST['passwd']);
            switch ($login) {
                case 0:
                    $_SESSION['usuario'] = $_POST['usr'];
                    include "index.view.php";
                    break;
                case 1:
                case 2:
                    include_once "index.login.php";
                    break;
            }
        } else {
            include_once "index.login.php";
        }
    }
} else if (isset($_POST['cerrarSesion'])) {
    cerrarSesion();
} else {
    if (verificarSesion('usuario')) {
        include "index.view.php";
    } else {
        include_once "index.login.php";
    }
}

