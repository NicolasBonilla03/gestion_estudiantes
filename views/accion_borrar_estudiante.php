<?php
require '../models/estudiante.php';
require '../models/nota.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/estudianteController.php';

use estudianteController\EstudianteController;

$estudianteController = new EstudianteController();
$resultado = $estudianteController->delete($_GET['codigo']);
if ($resultado) {
    echo '<h1>Usuario borrado</h1>';
} else {
    echo '<h1>No se pudo borrar el usuario</h1>';
}
?>
<br>
<a href="../index.php">Volver al inicio</a>
