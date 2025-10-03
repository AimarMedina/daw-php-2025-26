<?php

require_once "Publicacion.php";

$publicacion1 = new Publicacion(2002, "Santillana", "Las piramides de egipto", "Piramides");
$publicacion2 = new Publicacion(1952, "Santillana", "Las piramides de Tutankamon", "Piramides2");


echo $publicacion1->leer();
echo $publicacion1->escribir("de mi casa")
?>

<br>

<?php
echo $publicacion2->leer();
echo $publicacion2->escribir("de tu casa");
