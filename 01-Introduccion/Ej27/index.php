<?php
    $gruposMusicales = ["Metallica","Queen","Nirvana","AC/DC","U2","Coldplay"];

    function crearLista($array){
        $lista = "<ul>";
        foreach ($array as $valor){
            $lista .= "<li>" . $valor . "</li>";
        }
        $lista .= "</ul>";
        return $lista;
    }

    include "index.view.php";
?>
