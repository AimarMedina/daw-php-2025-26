<?php

function divison($n1,$n2){
    try{
        if($n2 == 0){
            throw new Exception("El segundo número no puede ser 0");
        }

        echo $n1/$n2;
    }catch(Exception $e){
        echo $e->getMessage();
    }
}

divison(10,0);
divison(10,2);
