<?php
$estudiantes = ["Ane", "Markel", "Nora", "Danel", "Amaia", "Izaro"];

function crearLista($array)
{
    $lista = "<ul>";
    for ($i = 0; $i < count($array); $i++) {
        $lista .= "<li id='$i'>" . $array[$i] . "</li>";
    }
    $lista .= "</ul>";
    return $lista;
}

include "index.view.php";
