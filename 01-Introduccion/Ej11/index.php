<?php
    function concatenar($a, $b = 'Hola')
    {
        return $a . " " . $b;
    }
    $resultado = concatenar($_GET["a"]);
    
    require "index.view.php";
?>
