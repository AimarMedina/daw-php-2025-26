<?php

$usuarios = [
    "user1" => [
        "nombre" => "Nora",
        "password" => "123123",
        "email" => "nora@php.net"
    ],
    "user2" => [
        "nombre" => "Juan",
        "password" => "456456",
        "email" => "juan@php.net"
    ],
    "user3" => [
        "nombre" => "Ana",
        "password" => "789789",
        "email" => "ana@php.net"
    ]
];

$Error_Mssg = [1 => "Password incorrecto", 2 => "Usuario Incorrecto"];

function validar($usuarios, $user, $passwd)
{
    if (isset($usuarios[$user])) {
        if ($usuarios[$user]["password"] === $passwd) {
            return 0;
        }
        return 1;
    }
    return 2;
}

if (!empty($_GET['usr']) || !empty($_GET['passwd'])) {
    $enviado = true;
    $user = $_GET['usr'];
    $passwd = $_GET['passwd'];

    $login = validar($usuarios, $user, $passwd);

    switch ($login) {
        case 0:
            $nombre = $usuarios[$user]["nombre"];
            include "index.view.php";
            break;
        default:
            include "index.login.view.php";
    }
} else {
    include "index.login.view.php";
}
