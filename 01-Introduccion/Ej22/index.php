<?php
    $paises = ["España", "Francia", "Italia", "Portugal", "Alemania"];
    function buscarPais($pais, $array){
        for ($i = 0; $i < count($array); $i++) {
            if ($array[$i] == $pais) {
                return $i;
            }
            return -1;
        }
    }
    include "index.view.php";
?>
