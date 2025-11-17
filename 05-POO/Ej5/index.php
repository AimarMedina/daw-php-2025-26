<?php

include_once 'Models/Persona.php';

use Models\Persona;

$persona1 = new Persona;
$persona2 = new Persona;
$persona3 = new Persona;
$persona4 = new Persona;
$persona5 = new Persona;

echo Persona::$personasEnElMundo;

