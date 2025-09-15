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

function crearElemento($valor){
    if( is_numeric($valor))
        if($valor >= 5){
            return "<td style='color:green;'>$valor</td>";
        } else {
            return "<td style='color:red;'>$valor</td>";
        }
    else {
        return "<td>$valor</td>";
    }
}
function crearTabla($array) {
    $tabla = "<table border='1'><tr><th>Nombre</th><th>Nota 1</th><th>Nota 2</th><th>Media</th></tr>";
    foreach ($array as $estudiante) {
        $media = ($estudiante['nota'] + $estudiante['nota2']) / 2;
        $tabla .= "<tr>
            " . crearElemento($estudiante['nombre']) . "
            " . crearElemento($estudiante['nota']) . "
            " . crearElemento($estudiante['nota2']) . "
            " . crearElemento(number_format($media, 2)) . "
        </tr>";
    }
    $tabla .= "</table>";
    return $tabla;
}

include "index.view.php";
?>
