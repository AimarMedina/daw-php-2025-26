<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $a = $_GET["a"];
    $b = $_GET["b"];

    $resta = $a - $b;
    echo "<p>La resta de $a menos $b es $resta</p>";

    $division = $a / $b;
    echo "<p>La división de $a entre $b es $division</p>";

    $aMAYORb = $a > $b;
    var_export($aMAYORb);

    $aMENORIGUALb = $a <= $b;
    var_export($aMENORIGUALb);
    ?>
</body>
</html>
