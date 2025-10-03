<?php
namespace Models;
require_once 'Poligono.php';

class Triangulo extends Poligono{

    public function area(){
        return ($this->altura * $this->anchura) / 2;
    }
}
