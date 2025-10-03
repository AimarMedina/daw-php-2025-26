<?php

require_once "Models/Cuadrado.php";
require_once "Models/Triangulo.php";

use Models\Cuadrado;
use Models\Triangulo;

$cuadrado = new Cuadrado;

$cuadrado->setAltura(10);
$cuadrado->setAnchura(-10);

echo $cuadrado->area();

$triangulo = new Triangulo;

$triangulo->setAltura(100);
$triangulo->setAnchura(10);

echo $triangulo->area();

