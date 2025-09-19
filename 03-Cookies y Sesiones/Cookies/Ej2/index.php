<?php

if (isset($_POST['guardarDatos'])) {
    if (isset($_POST['user'])) {
        $user = $_POST['user'];
        setcookie('user', $user);
    }

    if (isset($_COOKIE['user'])) {
        $nombre = $_COOKIE['user'];
    }
}
else if (isset($_POST['eliminarCookies'])) {
    setcookie('user', "", -1);
}

include "index.view.php";
