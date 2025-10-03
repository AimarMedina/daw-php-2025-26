<?php

function areaCuadradro($n1,$n2){
    try{
        if($n1 < 0 || $n2 < 0){
            throw new Exception("\n Ningun valor puede ser negativo \n");
        }

        echo $n1*$n2;
    }catch(Exception $e){
        echo $e->getMessage();
    }
}

areaCuadradro(10,10);
areaCuadradro(-5,10);
