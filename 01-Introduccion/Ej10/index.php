<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
        function concatenar($a,$b = "mundo"){
            return $a . " " . $b;
        }
        $a = $_GET["a"];
        $b = $_GET["b"] ?? "mundo";
        $resultado = concatenar($a);
    echo $resultado;
    ?>
</body>

</html>
