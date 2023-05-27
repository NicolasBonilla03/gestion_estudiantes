<?php
require '../models/estudiante.php';
require '../models/nota.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/ActividadController.php';

use estudiante\Estudiante;
use nota\Nota;
use actividadController\ActividadController;

$nota = new Nota();
$nota->setId($_POST['id']);
$nota->setDesc($_POST['descripcion']);
$nota->setNota($_POST['nota']);

$actividadController = new ActividadController();
$resultado = $actividadController->update($nota->getId(), $nota);
if ($resultado) {
    echo '<h1>Actividad modificada</h1>';
} else {
    echo '<h1>No se pudo modificar la actividad</h1>';
}
?>
<br>
<a href="../vernotas.php">Volver a notas</a>