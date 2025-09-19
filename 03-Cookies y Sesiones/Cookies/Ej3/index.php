<?php

    
    if(isset($_GET['languague'])){
        $languague = $_GET['languague'];
        setcookie('languague',$languague);
    }

    if(isset($_COOKIE['languague'])){
        $idioma = $_COOKIE['languague'];
    }

include "index.view.php";
?>
