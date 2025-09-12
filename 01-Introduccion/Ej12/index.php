    <?php
        $ciudades = array("Paris", "Berlin", "Amsterdan", "Praga");

        function getValor($array, $posicion){
            return $array[$posicion];
        }

        function setValor($array, $posicion, $valor){
            return $array[$posicion] = $valor;
        }

        function getValores($array){
            $ciudadesString = "";
            for ($i=0; $i < count($array); $i++) {
                $ciudadesString .= $array[$i] . " ";
            }
            return $ciudadesString;
        }

        $posicion = $_GET["posicion"];
        $valor = $_GET["valor"];

        $ciudad = getValor($ciudades, $posicion);

        $ciudadNueva = setValor($ciudades, $posicion, $valor);
        $ciudades = getValores($ciudades);

        include "index.view.php"
    ?>
