<?php

namespace Models;
require_once 'Poligono.php';

class Cuadrado extends Poligono{

    public function area(){
        return $this->altura * $this->anchura;
    }
}
