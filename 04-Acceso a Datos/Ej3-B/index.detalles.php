<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>App de Gestión de Empleados</title>
</head>
<body>
    <h1>App de Gestión de Empleados</h1>
    <p>Bienvenido a la aplicación de aprendizaje de Gestión de Empleados. Este ejercicio tiene como objetivo repasar el acceso a datos mediante PDO y comenzar a separar la lógica de las páginas de la presentación y del acceso a datos.</p>

    <div class="table">
        <table>
            <tr>
                <th>DNI</th>
                <td><?=$empleado["DNI"]?></td>
            </tr>
            <tr>
                <th>Nombre</th>
                <td><?=$empleado["Nombre"]?></td>
            </tr>
            <tr>
                <th>Apellidos</th>
                <td><?=$empleado["Apellidos"]?></td>
            </tr>
            <tr>
                <th>Edad</th>
                <td><?=$empleado["Edad"]?></td>
            </tr>
            <tr>
                <th>Fecha de Nacimiento</th>
                <td><?=$empleado["FechaNac"]?></td>
            </tr>
            <tr>
                <th>Sexo</th>
                <td><?=$empleado["Sexo"]?></td>
            </tr>
            <tr>
                <th>Curriculum</th>
                <td><?=$empleado["Curriculum"]?></td>
            </tr>
        </table>
    </div>

<div class="btn-container">
    <a href="index.php" class="btn-volver">Volver</a>
</div></body>
</html>
