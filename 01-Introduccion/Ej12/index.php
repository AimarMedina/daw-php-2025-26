<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $ciudades = array("Paris", "Berlin", "Amsterdan", "Praga");

        function getValor($array, $posicion){
            return $array[$posicion];
        }

        function setValor($array, $posicion, $valor){
            $array[$posicion] = $valor;
        }

        
    ?>
</body>
</html>
