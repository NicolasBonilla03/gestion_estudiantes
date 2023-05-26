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
$nota->setDesc($_POST['descripcion']);
$nota->setNota($_POST['nota']);

$actividadController = new ActividadController();
$resultado = $actividadController->update($nota->getDesc(), $nota, $nota->getNota(), $nota);
if ($resultado) {
    echo '<h1>Usuarios modificado</h1>';
} else {
    echo '<h1>No se pudo modificar el estudiante</h1>';
}
?>
<br>
<a href="../index.php">Volver al inicio</a>