<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function multiplicar($a, $b){
            return $a * $b;
        }
        $resultado = multiplicar($_GET["a"], $_GET["b"]);
        echo "<p>El resultado de la multiplicación es $resultado</p>";
    ?>
</body>
</html>
