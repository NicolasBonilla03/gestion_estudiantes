<?php
require 'models/estudiante.php';
require 'models/nota.php';
require 'controllers/conexionDbController.php';
require 'controllers/baseController.php';
require 'controllers/estudianteController.php';

use estudianteController\EstudianteController;

$estudianteController = new EstudianteController();

$notas = $estudianteController->readd();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <main>
        <h1>Lista de Notas</h1>
        <a href="views/form_estudiante.php">Registrar notas</a>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Descripcion</th>
                    <th>Nota</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($notas as $nota) {
                    echo '<tr>';
                    echo '  <td>' . $nota->getId() . '</td>';
                    echo '  <td>' . $nota->getDesc() . '</td>';
                    echo '  <td>' . $nota->getNota() . '</td>';
                    echo '  <td>';
                    echo '      <a href="views/accion_modificar_actividad.php?codigoEstudiante=' . $nota->getCodEs() . '">modificar</a>';
                    echo '      <a href="views/accion_borrar_actividad.php?codigoEstudiante=' . $nota->getCodEs() . '">borrar</a>';
                    echo '  </td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </main>
</body>

</html>