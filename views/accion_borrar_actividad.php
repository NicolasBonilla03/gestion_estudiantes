<?php
require '../models/estudiante.php';
require '../models/nota.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/ActividadController.php';

use actividadController\ActividadController;

$actividadController = new ActividadController();
$resultado = $actividadController->deleteAct($_GET['id']);
if ($resultado) {
    echo '<h1>Actividad borrada</h1>';
} else {
    echo '<h1>No se pudo borrar el usuario</h1>';
}
