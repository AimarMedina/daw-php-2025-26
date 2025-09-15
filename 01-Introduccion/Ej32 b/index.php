<?php
$estudiantes = [
    [
        "nombre" => "Aimar",
        "nota" => 7,
        "nota2" => 8
    ],
    [
        "nombre" => "Juan",
        "nota" => 3,
        "nota2" => 2
    ],
    [
        "nombre" => "Ana",
        "nota" => 9,
        "nota2" => 10
    ],
    [
        "nombre" => "Maria",
        "nota" => 4,
        "nota2" => 5
    ],
    [
        "nombre" => "Luis",
        "nota" => 6,
        "nota2" => 7
    ],
];

function color($nota) {
    return $nota >= 5 ? 'green' : 'red';
}

include "index.view.php";
?>
