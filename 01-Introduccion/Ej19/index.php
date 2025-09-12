<?php
    function sumas($a){
        $suma = 0;
        for ($i=0; $i <= $a ; $i++) {
            $suma += $i;
        }
        return $suma;
    }
    include "index.view.php";
?>
