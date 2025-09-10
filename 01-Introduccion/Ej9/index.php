<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function concatenar($a,$b){
            return $a . " " . $b;
        }
        $resultado = concatenar($_GET["a"], $_GET["b"]);
        echo $resultado;
    ?>
</body>
</html>
