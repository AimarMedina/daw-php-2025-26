<?php require('layers/header.php') ?>
<div class="container">
    <div class="table">
        <h1>Listado de empleados</h1>
        <?php if (!empty($empleados)): ?>
            <form action="index.php" class="buscarEmpleados" method="get">
                <input type="text" name="nombre">
                <input type="hidden" name="accion" value="buscarEmpleadosNombre">
                <input type="submit" value="Buscar Empleado">
            </form>
            <table>
                <tr>
                    <th>DNI</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Opciones</th>
                </tr>
                <?php foreach ($empleados as $empleado): ?>
                    <tr>
                        <td><?= $empleado["DNI"] ?></td>
                        <td><?= $empleado["Nombre"] ?></td>
                        <td><?= $empleado["Apellidos"] ?></td>
                        <td><a href="?accion=verDetalles&&empleado=<?= $empleado["DNI"] ?>">Ver detalles</a> | <a href="?accion=eliminarEmpleado&&empleado=<?= $empleado["DNI"] ?>">Eliminar empleado</a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <p>*Opción secreta: <a href="?accion=eliminarEmpleados">Vaciar Lista</a></p>
        <?php else: ?>
            <p>No hay empleados guardados en la base de datos</p>
        <?php endif; ?>
    </div>
    <div class="form">
        <form action="index.php?" method="post">
            <input type="text" placeholder="Nombre" name="Nombre">
            <input type="text" placeholder="Apellidos" name="Apellidos">
            <input type="number" placeholder="Edad" name="Edad">
            <input type="date" name="FechaNac">
            <input type="email" placeholder="Email" name="Email">
            <input type="text" placeholder="DNI" name="DNI">
            <select name="Sexo" id="sexo">
                <option value="hombre" selected>Hombre</option>
                <option value="mujer">Mujer</option>
            </select>
            <textarea name="Curriculum" id="cv" placeholder="Curriculum"></textarea>
            <input type="submit" value="Añadir" name="añadirEmpleado">
        </form> <br>
        <?php if (isset($mensjaErrorCamposVacios)): ?>
            <p class="error">Faltan Campos por rellenar: <?= implode(", ", $camposVacios) ?>.</p>
        <?php endif; ?>
    </div>
</div>
</body>

</html>
