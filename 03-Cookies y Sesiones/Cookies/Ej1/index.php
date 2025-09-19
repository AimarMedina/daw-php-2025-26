<?php

    if(isset($_GET['user'])){
        $user = $_GET['user'];
        setcookie('user',$user);
    }

    if(isset($_COOKIE['user'])){
        $nombre = $_COOKIE['user'];
    }

include "index.view.php";
?>
