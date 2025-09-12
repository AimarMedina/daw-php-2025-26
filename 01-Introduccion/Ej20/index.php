<?php
    function sumas($a){
        $suma = 0;
        for ($i=0; $i <= $a ; $i++) {
            if ($i % 2 == 0) {
                $suma += $i;
            }
        }
        return $suma;
    }
    include "index.view.php";
?>
