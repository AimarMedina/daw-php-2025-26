<?php
include_once "dbFunction.php";

$listaCompra = actualizarLista();


if(isset($_GET['accion'])){
    switch($_GET['accion']){
        case "vaciarLista":
            vaciarLista();
            $listaCompra = actualizarLista();
            break;
        case "eliminarProducto":
            eliminarProducto($_GET['producto']);
            $listaCompra = actualizarLista();
            break;
        case "añadirProducto":
            añadirProducto($_GET['producto']);
            $listaCompra = actualizarLista();
    }
}



include "index.view.php";
