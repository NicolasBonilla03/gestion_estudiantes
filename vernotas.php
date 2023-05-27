<?php
require 'models/estudiante.php';
require 'models/nota.php';
require 'controllers/conexionDbController.php';
require 'controllers/baseController.php';
require 'controllers/ActividadController.php';

use actividadController\ActividadController;

$actividadController = new ActividadController();
$codigo = $_GET['codigo'];
$notas = $actividadController->read($codigo);
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
        <a href="views/form_actividad.php?codigo=<?php echo $codigo;?>">Registrar notas</a>
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
                $cont=0;
                $notaa=0;
                foreach ($notas as $nota) {
                    $cont=1+$cont;
                    echo '<tr>';
                    echo '  <td>' . $nota->getId() . '</td>';
                    echo '  <td>' . $nota->getDesc() . '</td>';
                    echo '  <td>' . $nota->getNota() . '</td>';
                    echo '  <td>';
                    $notaa=$nota->getNota()+$notaa;
                    $promedio = $notaa/$cont;
                    echo '      <a href="views/accion_modificar_actividad.php?id=' . $nota->getId() . '">modificar</a>';
                    echo '      <a href="views/accion_borrar_actividad.php?id=' . $nota->getId() . '">borrar</a>';
                    echo '  </td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
        <p>El promedio es <?php echo $promedio;?></p>
        <?php 
        if($promedio<3){
            echo '<h1 style="color: red">No aprobaste</h1>';
        }else{
            echo '<h1 style="color: green">Felicidades, aprobaste</h1>';
        }
        ?>
    </main>
</body>

</html>