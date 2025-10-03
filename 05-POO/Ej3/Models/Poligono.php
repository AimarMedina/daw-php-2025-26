<?php

namespace Models;

class Poligono
{
    private $color;
    protected $altura;
    protected $anchura;


    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color)
    {
        return $this->color = $color ? $color : "Sin color";
    }

    public function getAltura()
    {
        return $this->altura;
    }

    public function setAltura($altura)
    {
        return $this->altura = $altura > 0? $altura : 0;
    }

    public function getAnchura()
    {
        return $this->anchura;
    }

    public function setAnchura($anchura)
    {
        return $this->anchura = $anchura > 0 ? $anchura : 0;
    }
}
