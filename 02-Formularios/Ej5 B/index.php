<?php
$productos = [
    "p1" => [
        "Nombre" => "Logitech K120",
        "Descripción" => "Teclado multimedia USB plug&play, trabPoint Caps (10px, Soft Dome)",
        "Precio" => 25.99
    ],
    "p2" => [
        "Nombre" => "Razer DeathAdder V2",
        "Descripción" => "Ratón gaming ergonómico con sensor óptico de alta precisión",
        "Precio" => 59.99
    ],
    "p3" => [
        "Nombre" => "Corsair K95 RGB",
        "Descripción" => "Teclado mecánico con retroiluminación RGB y teclas programables",
        "Precio" => 199.99
    ],
    "p4" => [
        "Nombre" => "Logitech MX Master 3",
        "Descripción" => "Ratón inalámbrico avanzado para productividad con rueda de desplazamiento MagSpeed",
        "Precio" => 99.99
    ],
    "p5" => [
        "Nombre" => "HyperX Cloud II",
        "Descripción" => "Auriculares gaming con sonido envolvente 7.1 y micrófono desmontable",
        "Precio" => 89.99
    ],
    "p6" => [
        "Nombre" => "Samsung T7 Portable SSD",
        "Descripción" => "Disco sólido externo portátil, USB 3.2, hasta 1TB de almacenamiento",
        "Precio" => 129.99
    ]
];

if (!empty($_POST)) {
    $enviado = true;



    $productosSeleccionadosCantidad = [];

    foreach($productos as $clave => $valor){
        if (isset($_POST[$clave]) && $_POST[$clave] > 0) {
            $productosSeleccionadosCantidad[$clave] = (int)$_POST[$clave];
        }
    };


    $precioTotal = calcularPrecioTotal($productosSeleccionadosCantidad, $productos);
}

function calcularPrecioTotal($productosSeleccionados, $productos)
{
    $precioTotal = 0;
    foreach ($productosSeleccionados as $key => $cantidad) {
        if (isset($productos[$key])) {
            $precioTotal += $productos[$key]["Precio"] * $cantidad;
        }
    }
    return number_format($precioTotal, 2);
}

include "index.view.php";
