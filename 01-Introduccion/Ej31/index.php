<?php

    $numeros;

    for ($i=0; $i < 20 ; $i++) { 
        $numeros[$i] = rand(1,999);
    }

    $numeroMasAlto = max($numeros);
    $numeroMasBajo = min($numeros);

include "index.view.php";
?>