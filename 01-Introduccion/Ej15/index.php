<?php
    $diccionario = [
        "Juan" => [
            "edad" => 28,
            "email" => "juan@example.com"
        ],
        "María" => [
            "edad" => 34,
            "email" => "maria@example.com"
        ]
    ];

    function getDatos($diccionario, $usuario, $clave) {
        if (isset($diccionario[$usuario])) {
            return $diccionario[$usuario][$clave];
        }
        return "No encontrado";
    }
    include "index.view.php";
?>
