<?php
require '../models/estudiante.php';
require '../models/nota.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/estudianteController.php';

use estudianteController\EstudianteController;

$estudianteController = new EstudianteController();
$resultado = $estudianteController->deleteAct($_GET['codigoEstudiante']);
if ($resultado) {
    echo '<h1>Actividad borrada</h1>';
} else {
    echo '<h1>No se pudo borrar el usuario</h1>';
}
