<?php
    $marcasCoches = ["BMW","Audi","Mercedes","Toyota","Hyundai","Kia"];

    function crearLista($array){
        $lista = "<ul>";
        $a = 0;

        foreach ($array as $valor){
            $lista .= "<li>" . $valor . "</li>";
        }

        $lista .= "</ul>";
        return $lista;
    }
    include "index.view.php";
?>
