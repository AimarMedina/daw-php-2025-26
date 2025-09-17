<?php
    if (!empty($_GET)){
        $enviado = true;
        $asunto = $_GET['asunto'];
        $nombre = $_GET['nombre'];
        $email = $_GET['email'];
        $motivo = $_GET['motivo'];
        $mensaje = $_GET['mensaje'];
    }
include "index.view.php";
?>
