<?php
require '../models/nota.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/ActividadController.php';
require '../models/estudiante.php';

use nota\Nota;
use estudiante\Estudiante;
use actividadController\ActividadController;

$nota = new Nota();
$estudiante = new Estudiante();
$nota->setId($_POST['id']);
$nota->setDesc($_POST['descripcion']);
$nota->setNota($_POST['nota']);
$nota->setCodEs($_POST['codigo']);



$actividadController = new ActividadController();
$resultado = $actividadController->create($nota);
if ($resultado) {
    echo '<h1>Actividad registrada</h1>';
} else {
    echo '<h1>No se pudo registrar la actividad</h1>';
}
?>
