<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Nota 1</th>
            <th>Nota 2</th>
            <th>Media</th>
        </tr>
        <?php foreach ($estudiantes as $estudiante): ?>
            <tr>
                <td ><?= $estudiante['nombre'] ?></td>
                <td style= "color: <?= color($estudiante['nota'])?>"><?= $estudiante['nota'] ?></td>
                <td style= "color: <?= color($estudiante['nota2'])?>"><?= $estudiante['nota2'] ?></td>
                <td  style= "color: <?= color(($estudiante['nota'] + $estudiante['nota2'])/2) ?>"><?= ($estudiante['nota'] + $estudiante['nota2']) / 2 ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
