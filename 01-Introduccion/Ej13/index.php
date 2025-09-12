<?php
    $animales = array("Perro", "Gato", "Pájaro", "Pez");
    $colores = array("Rojo", "Verde", "Azul", "Amarillo");

    $cantidadAnimales = count($animales);
    $cantidadColores = count($colores);


    array_push($animales, "Conejo");
    array_unshift($colores, "Naranja");

    $animalesYcolores = array_merge($animales, $colores);

    include  "index.view.php";
?>
