<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function esMayor($a,$b){
            if($a > $b)
                return true;
            else
                return false;
        }
        $resultado = esMayor($_GET["a"], $_GET["b"]);
        var_export($resultado);
    ?>
</body>
</html>
