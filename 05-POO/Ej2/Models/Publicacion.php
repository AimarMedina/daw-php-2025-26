<?php

namespace Models;

class Publicacion{
    private $año;
    private $editorial;
    private $titulo;
    private $texto;


    function __construct($año,$editorial,$titulo,$texto)
    {
        $this->año = $año;
        $this->editorial = $editorial;
        $this->titulo = $titulo;
        $this->texto = $texto;
    }

    public function leer(){
        return $this->texto;
    }

    public function escribir($string){
        return $this->texto. " " .$string;
    }

}
