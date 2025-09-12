<?php
    $marcasCoches = ["BMW","Audi","Mercedes","Toyota","Hyundai","Kia"];

    function crearLista($array){
        $lista = "<ul>";
        $a = 0;
        do {
            $lista .= "<li id='$a'>" . $array[$a] . "</li>";
            $a++;
        } while ($a < count($array));
        $lista .= "</ul>";
        return $lista;
    }
    include "index.view.php";
?>
