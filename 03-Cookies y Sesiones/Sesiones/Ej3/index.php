<?php
include "index.datos.php";
session_start();

if (!isset($_SESSION['intentosFallidos'])) {
    $_SESSION['intentosFallidos'] = 0;
}

function verificarSesion($sesion)
{
    return  isset($_SESSION[$sesion]);


}
function validarInicioSesion($usuarios, $user, $passwd, $intentosFallidos)
{
    if ($intentosFallidos < 3) {
        if (isset($usuarios[$user])) {
            if ($usuarios[$user]["password"] === $passwd) {
                return 0;
            }
            return 1;
        }
        return 2;
    }
    return 3;

}
function cerrarSesion()
{
    unset($_SESSION['usuario']);
    $_SESSION['intentosFallidos'] = 0;

    include "index.login.php";
}

$Error_Mssg = [
    1 => "Password incorrecto",
    2 => "Usuario Incorrecto",
    3 => "Intentos de acceso superados, se te ha denegado el acceso"
];


if (isset($_POST['iniciarSesion'])) {
    if (verificarSesion('usuario')) {
        $usuario = $_SESSION['usuario'];
        include "index.view.php";
    } else {

        $user = $_POST['usr'] ?? null;
        $passwd = $_POST['passwd'] ?? null;
        if ($user && $passwd) {
            $enviado = true;
            $login = validarInicioSesion($usuarios, $_POST['usr'], $_POST['passwd'], $_SESSION['intentosFallidos']);
            switch ($login) {
                case 0:
                    $_SESSION['usuario'] = $_POST['usr'];
                    $_SESSION['intentosFallidos'] = 0;
                    include "index.view.php";
                    break;
                case 1:
                case 2:
                    $_SESSION['intentosFallidos']++;
                    include_once "index.login.php";
                    echo $_SESSION['intentosFallidos'];
                    break;
                case 3:
                    $_SESSION['accesoDenegado'] = $_SESSION['intentosFallidos'];
                    include "index.accesoDenegado.php";
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

