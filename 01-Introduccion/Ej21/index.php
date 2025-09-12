<?php
    function sumas($a){
        $suma = 0;
        for ($i=0; $i <= $a ; $i++) {
            if ($i % 2 == 0) {
                $suma += $i;
                if ($suma > 100){
                    return $suma -= $i;
                }
            }
        }
        return $suma;
    }
    include "index.view.php";
?>
