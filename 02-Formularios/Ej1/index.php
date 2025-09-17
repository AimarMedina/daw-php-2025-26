<?php

    if(!empty($_GET)){
        $tmp = $_GET['tmp'];
        $unid = $_GET['unid'];
        $resultado = 0;
        if($unid == "celsius"){
            $resultado = ($tmp * 9/5)+32;
        }
        else{
            $resultado = ($tmp-32)*5/9;
        }
    }

    include "index.view.php";
?>
