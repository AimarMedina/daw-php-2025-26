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

function validar($usuarios,$user, $passwd){
    if(isset($usuarios[$user])){
        if($usuarios[$user]["password"] === $passwd){
            return "Bienvenido " . $usuarios[$user]["nombre"];
        }
        return "Password incorrecto";
    }
    return "Usuario no encontrado";
}

include "index.view.php";
